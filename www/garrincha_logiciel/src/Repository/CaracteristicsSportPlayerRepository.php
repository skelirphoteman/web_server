<?php

namespace App\Repository;

use App\Entity\CaracteristicsSportPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method CaracteristicsSportPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method CaracteristicsSportPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method CaracteristicsSportPlayer[]    findAll()
 * @method CaracteristicsSportPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CaracteristicsSportPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CaracteristicsSportPlayer::class);
    }

    // /**
    //  * @return CaracteristicsSportPlayer[] Returns an array of CaracteristicsSportPlayer objects
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
    public function findOneBySomeField($value): ?CaracteristicsSportPlayer
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
