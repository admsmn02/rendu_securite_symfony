<?php

namespace App\Controller;

use App\Entity\Soda;
use App\Form\SodaType;
use App\Repository\SodaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;

/**
 * @Route("/soda")
 */
class SodaController extends AbstractController
{
    #[Route('/', name: 'soda_index', methods: ['GET'])]
    public function index(SodaRepository $sodaRepository): Response
    {
        $sodas = $sodaRepository->findAll();
        return $this->render('soda/index.html.twig', [
            'sodas' => $sodas,
        ]);
    }

    #[Route('/soda/new', name: 'new', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_ADMIN")]
    public function new(Request $request, EntityManagerInterface $em): Response
    {
        $soda = new Soda();
        $form = $this->createForm(SodaType::class, $soda);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $soda->setSlug($soda->getName() . '-' . uniqid());
            $em->persist($soda);
            $em->flush();

            return $this->redirectToRoute('soda_index');
        }

        return $this->render('soda/new.html.twig', [
            'soda' => $soda,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/soda/show/{slug}', name: 'show', methods: ['GET'])]
    public function show(Soda $soda): Response
    {
        return $this->render('soda/show.html.twig', [
            'soda' => $soda,
        ]);
    }

    #[Route('/soda/edit/{slug}', name: 'edit', methods: ['GET', 'POST'])]
    #[IsGranted("ROLE_ADMIN")]
    public function edit(Request $request, Soda $soda, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(SodaType::class, $soda);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Optionally, update the slug if the name has changed
            // $soda->setSlug($soda->getName() . '-' . uniqid());
    
            $em->flush();
    
            return $this->redirectToRoute('soda_index');
        }
    
        return $this->render('soda/edit.html.twig', [
            'soda' => $soda,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/soda/delete/{slug}', name: 'delete', methods: ['POST'])]
    #[IsGranted("ROLE_ADMIN")]
    public function delete(Request $request, Soda $soda, EntityManagerInterface $em): Response
    {
        if ($this->isCsrfTokenValid('delete'.$soda->getId(), $request->request->get('_token'))) {
            $em->remove($soda);
            $em->flush();
        }

        return $this->redirectToRoute('soda_index');
    }
}