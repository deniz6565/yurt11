<?php

namespace App\Repository;

use App\Entity\CompanyTbl;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CompanyTbl>
 *
 * @method CompanyTbl|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompanyTbl|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompanyTbl[]    findAll()
 * @method CompanyTbl[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompanyTblRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompanyTbl::class);
    }

//    /**
//     * @return CompanyTbl[] Returns an array of CompanyTbl objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?CompanyTbl
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
