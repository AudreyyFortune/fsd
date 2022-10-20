<?php

namespace App\Repository;

use App\Entity\CatalogProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CatalogProduct>
 *
 * @method CatalogProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatalogProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatalogProduct[]    findAll()
 * @method CatalogProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatalogProduct::class);
    }

    public function getCatalogProductList($event)
        {    
        return $this->createQueryBuilder('cp')        
                    ->select('cp.id, p.name, p.reference, p.src_img, pzp.category_1, pzp.category_2')        
                    ->join('cp.id_product', 'p')   
                    ->join('p.id_price_category', 'pzp')
                    ->where('cp.id_catalog = :event')
                    ->setParameter('event', $event)
                    //->orderBy('pzp.category_1', 'ASC')        
                    ->getQuery()
                    ->getArrayResult()    
                    ;   
            
    }


    // public function add(CatalogProduct $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(CatalogProduct $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return CatalogProduct[] Returns an array of CatalogProduct objects
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

//    public function findOneBySomeField($value): ?CatalogProduct
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
