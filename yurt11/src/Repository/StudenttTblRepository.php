<?php

namespace App\Repository;

use App\Entity\StudenttTbl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<StudenttTbl>
 *
 * @method StudenttTbl|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudenttTbl|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudenttTbl[]    findAll()
 * @method StudenttTbl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudenttTblRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudenttTbl::class);
    }

//    /**
//     * @return StudenttTbl[] Returns an array of StudenttTbl objects
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

//    public function findOneBySomeField($value): ?StudenttTbl
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
