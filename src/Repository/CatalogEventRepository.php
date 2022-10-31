<?php

namespace App\Repository;

use App\Entity\CatalogEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CatalogEvent>
 *
 * @method CatalogEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method CatalogEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method CatalogEvent[]    findAll()
 * @method CatalogEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CatalogEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CatalogEvent::class);
    }

}
