<?php

namespace App\Repository;

use App\Entity\KamerImage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method KamerImage|null find($id, $lockMode = null, $lockVersion = null)
 * @method KamerImage|null findOneBy(array $criteria, array $orderBy = null)
 * @method KamerImage[]    findAll()
 * @method KamerImage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KamerImageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, KamerImage::class);
    }

    // /**
    //  * @return KamerImage[] Returns an array of KamerImage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?KamerImage
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
