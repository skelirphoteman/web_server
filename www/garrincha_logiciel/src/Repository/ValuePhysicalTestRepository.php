<?php

namespace App\Repository;

use App\Entity\ValuePhysicalTest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ValuePhysicalTest|null find($id, $lockMode = null, $lockVersion = null)
 * @method ValuePhysicalTest|null findOneBy(array $criteria, array $orderBy = null)
 * @method ValuePhysicalTest[]    findAll()
 * @method ValuePhysicalTest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ValuePhysicalTestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ValuePhysicalTest::class);
    }

    public function findValueSportPlayerToJson($id): array
    {
        

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT v.id, v.value, categorie.name FROM value_physical_test v
                LEFT JOIN categories_test categorie ON v.categories_test_id = categorie.id
                WHERE v.sport_player_id = :id
            ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    // /**
    //  * @return ValuePhysicalTest[] Returns an array of ValuePhysicalTest objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ValuePhysicalTest
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
