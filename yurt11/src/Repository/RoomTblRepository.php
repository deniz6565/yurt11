<?php

namespace App\Repository;

use App\Entity\RoomTbl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RoomTbl>
 *
 * @method RoomTbl|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomTbl|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomTbl[]    findAll()
 * @method RoomTbl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomTblRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomTbl::class);
    }

//    /**
//     * @return RoomTbl[] Returns an array of RoomTbl objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RoomTbl
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
