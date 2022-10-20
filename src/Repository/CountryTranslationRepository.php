<?php

namespace App\Repository;

use App\Entity\CountryTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CountryTranslation>
 *
 * @method CountryTranslation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CountryTranslation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CountryTranslation[]    findAll()
 * @method CountryTranslation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CountryTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CountryTranslation::class);
    }

    public function getCountriesList($lang)
    {    
        return $this->createQueryBuilder('ct')        
                    ->select('ct.name, ct.name_file, c.isocode, c.sapa')        
                    ->join('ct.id_country', 'c')        
                    ->where('ct.locale = :locale')        
                    ->setParameter('locale', $lang)       
                    ->orderBy('ct.name', 'ASC')        
                    ->getQuery()
                    ->getArrayResult()    
                    ;   
            
    }


    // public function add(CountryTranslation $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->persist($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

    // public function remove(CountryTranslation $entity, bool $flush = false): void
    // {
    //     $this->getEntityManager()->remove($entity);

    //     if ($flush) {
    //         $this->getEntityManager()->flush();
    //     }
    // }

//    /**
//     * @return CountryTranslation[] Returns an array of CountryTranslation objects
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

//    public function findOneBySomeField($value): ?CountryTranslation
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}