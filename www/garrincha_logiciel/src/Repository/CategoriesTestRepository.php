<?php

namespace App\Repository;

use App\Entity\CategoriesTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CategoriesTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategoriesTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategoriesTest[]    findAll()
 * @method CategoriesTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategoriesTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoriesTest::class);
    }

    // /**
    //  * @return CategoriesTest[] Returns an array of CategoriesTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CategoriesTest
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
