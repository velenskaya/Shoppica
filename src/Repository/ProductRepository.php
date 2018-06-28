<?php

namespace App\Repository;

use App\Entity\Brand;
use App\Entity\Category;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * @param Category $category
     * @param Brand $brand
     * @param int $page
     * @param int $limitPerPage
     * @return Product[]
     */
    public function getProductsByFilter(
        Category $category = null,
        Brand $brand = null,
        int $page = 1,
        int $limitPerPage = 3
    ) {
        if ($category) {
            $categories = array_merge([$category], $category->getChilds()->toArray());
        }

        $qb =  $this->createQueryBuilder('product');

        if ($brand) {
            $qb->andWhere('product.brand = :test');
            $qb->setParameter('test', $brand);
        }

        if ($category) {
            $qb->andWhere('product.category IN (:categories)');
            $qb->setParameter('categories', $categories);
        }

        return $qb->orderBy('product.id', 'ASC')
            ->setFirstResult(($page - 1) * $limitPerPage)
            ->setMaxResults($limitPerPage)
            ->getQuery()
            ->getResult();
    }

//    /**
//     * @return Product[] Returns an array of Product objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Product
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
