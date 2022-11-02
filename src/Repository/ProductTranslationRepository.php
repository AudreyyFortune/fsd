<?php

namespace App\Repository;

use App\Entity\ProductTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProductTranslation>
 *
 * @method ProductTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductTranslation[]    findAll()
 * @method ProductTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductTranslation::class);
    }

    public function getProductTranslation($lang, $refProduct)
    {    
        return $this->createQueryBuilder('pt')        
                    ->select('p.id, p.name, p.reference, p.src_img, pt.description, pzp.name AS price_name, p.isFuneral')        
                    ->join('pt.id_product', 'p')   
                    ->join('p.id_price_category', 'pzp')
                    ->where('p.reference = :refProduct')
                    ->andWhere('pt.locale = :locale')
                    ->setParameter('refProduct', $refProduct) 
                    ->setParameter('locale', $lang)    
                    ->getQuery()
                    ->getSingleResult()
                    ;
    }
}
