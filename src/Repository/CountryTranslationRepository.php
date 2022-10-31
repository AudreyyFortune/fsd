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
                    ->select('c.id, ct.name, ct.name_file, c.isocode, c.sapa')
                    ->join('ct.id_country', 'c')
                    ->where('ct.locale = :locale')        
                    ->setParameter('locale', $lang)       
                    ->orderBy('ct.name', 'ASC')        
                    ->getQuery()
                    ->getArrayResult()    
                    ;   
            
    }

	public function getCountryIdBySlug($lang, $slug)
	{
		return $this->createQueryBuilder('ct')
					->select('c.id')
					->join('ct.id_country', 'c')
					->where('ct.name_file = :slug')
					->setParameter('slug', $slug)
					->andWhere('ct.locale = :locale')
					->setParameter('locale', $lang)
					->getQuery()
					->getResult()
					;
	}


	public function getNameFileCountryByIdAndLang($idCountry, $lang)
	{
		return $this->createQueryBuilder('ct')
					->select('ct.name_file')
					->where('ct.locale = :locale')
					->setParameter('locale', $lang)
					->andWhere('ct.id_country = :idCountry')
					->setParameter('idCountry', $idCountry)
					->getQuery()
					->getResult()
					;
	}

}
