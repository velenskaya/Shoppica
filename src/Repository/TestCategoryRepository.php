<?php

namespace App\Repository;

use App\Entity\TestCategory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TestCategory|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestCategory|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestCategory[]    findAll()
 * @method TestCategory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestCategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TestCategory::class);
    }

//    /**
//     * @return TestCategory[] Returns an array of TestCategory objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestCategory
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
