<?php

namespace App\Repository;

use App\Entity\ProductSizePrice;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductSizePrice>
 *
 * @method ProductSizePrice|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductSizePrice|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductSizePrice[]    findAll()
 * @method ProductSizePrice[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductSizePriceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductSizePrice::class);
    }


    /*public function add(ProductSizePrice $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ProductSizePrice $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }*/

}
