<?php

namespace App\Repository;

use App\Entity\POI;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method POI|null find($id, $lockMode = null, $lockVersion = null)
 * @method POI|null findOneBy(array $criteria, array $orderBy = null)
 * @method POI[]    findAll()
 * @method POI[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class POIRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, POI::class);
    }

    // /**
    //  * @return POI[] Returns an array of POI objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?POI
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
