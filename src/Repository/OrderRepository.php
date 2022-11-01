<?php

namespace App\Repository;

use App\Entity\Order;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @extends ServiceEntityRepository<Order>
 *
 * @method Order|null find($id, $lockMode = null, $lockVersion = null)
 * @method Order|null findOneBy(array $criteria, array $orderBy = null)
 * @method Order[]    findAll()
 * @method Order[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Order::class);
    }

	public function getOrderDetails($orderId)
	{
		return $this->createQueryBuilder('o')
					->select('o.total, o.delivery_hour, o.delivery_date, r.title as recCivility,
						r.name as recName, r.firstname as recFirstname, r.adress as recAdress, r.city as recCity, 
						r.country as recCountry, r.zipcode as recZipcode, r.additional_adress as recAddAdress, 
						r.phone as recPhone, r.details as recDetail, r.funeral_ceremony as recFunCeremony, 
						s.title as senCivility, s.name as senName, s.firstname as senFirstname, s.email as senEmail, 
						s.adress as senAdress, s.zipcode as senZipcode, s.city as senCity, s.country as senCountry,
						s.company as senCompany, s.phone as senPhone, p.src_img
					')
					->join('o.recipient', 'r')
					->join('o.sender', 's')
					->leftJoin(Product::class, 'p', JOIN::WITH, 'o.id_product = p.id')
					->where('o.id = :orderId')
					->setParameter('orderId', $orderId)
					->getQuery()
					->getArrayResult()[0]
					;
	}
}
