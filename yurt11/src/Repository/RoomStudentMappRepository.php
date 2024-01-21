<?php

namespace App\Repository;

use App\Entity\RoomStudentMapp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RoomStudentMapp>
 *
 * @method RoomStudentMapp|null find($id, $lockMode = null, $lockVersion = null)
 * @method RoomStudentMapp|null findOneBy(array $criteria, array $orderBy = null)
 * @method RoomStudentMapp[]    findAll()
 * @method RoomStudentMapp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoomStudentMappRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RoomStudentMapp::class);
    }

//    /**
//     * @return RoomStudentMapp[] Returns an array of RoomStudentMapp objects
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

//    public function findOneBySomeField($value): ?RoomStudentMapp
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
