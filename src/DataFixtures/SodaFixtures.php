<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Soda;

class SodaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $soda = new Soda();
        $soda->setName('Coca-Cola');
        $soda->setPrice(1.99);
        $soda->setQuantity(100);
        $soda->setSlug('coca-cola-' . uniqid());
        $manager->persist($soda);
        // $manager->persist($product);

        $manager->flush();
    }
}
