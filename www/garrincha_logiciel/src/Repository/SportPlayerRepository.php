<?php

namespace App\Repository;

use App\Entity\SportPlayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SportPlayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method SportPlayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method SportPlayer[]    findAll()
 * @method SportPlayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SportPlayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SportPlayer::class);
    }

    /**
     * @return SportPlayer[]
     */
    public function findSportPlayersToJson(): array
    {
        

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
            SELECT p.id, p.name, p.surname, media.image_filename FROM sport_player p 
                LEFT JOIN media ON p.profil_image_id = media.id
                WHERE p.statue = 10
            ';
        $stmt = $conn->prepare($sql);
        $stmt->execute();

    // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }

    public function findSportPlayerInformationToJson($id): array
    {
        

        $conn = $this->getEntityManager()->getConnection();

        $sql = "
            SELECT p.id, p.name, p.surname, p.birthday, media.image_filename, caracteristics.team, caracteristics.level, caracteristics.position, caracteristics.strong_foot, caracteristics.weight, caracteristics.size FROM sport_player p 
                LEFT JOIN media ON p.profil_image_id = media.id
                LEFT JOIN caracteristics_sport_player caracteristics ON p.caracteristics_id = caracteristics.id
                WHERE p.id = :id
            ";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

    // returns an array of arrays (i.e. a raw data set)
        return $stmt->fetchAll();
    }
    // /**
    //  * @return SportPlayer[] Returns an array of SportPlayer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SportPlayer
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
