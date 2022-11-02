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
                    ->getQuery()
                    ->getArrayResult()    
                    ;
    }
}
