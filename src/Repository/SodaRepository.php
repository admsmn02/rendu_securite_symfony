<?php

namespace App\Repository;

use App\Entity\Soda;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Soda>
 *
 * @method Soda|null find($id, $lockMode = null, $lockVersion = null)
 * @method Soda|null findOneBy(array $criteria, array $orderBy = null)
 * @method Soda[]    findAll()
 * @method Soda[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SodaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Soda::class);
    }

    //    /**
    //     * @return Soda[] Returns an array of Soda objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Soda
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
