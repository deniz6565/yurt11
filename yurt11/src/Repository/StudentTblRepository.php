<?php

namespace App\Repository;

use App\Entity\StudentTbl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudentTbl>
 *
 * @method StudentTbl|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentTbl|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentTbl[]    findAll()
 * @method StudentTbl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentTblRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentTbl::class);
    }

//    /**
//     * @return StudentTbl[] Returns an array of StudentTbl objects
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

//    public function findOneBySomeField($value): ?StudentTbl
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
