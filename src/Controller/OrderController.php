<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\user\Recipient;
use App\Entity\user\Sender;
use App\Form\OrderType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    #[Route('/order', name: 'order')]
    public function index(Request $request, EntityManagerInterface $em, SessionInterface $session): Response
    {
		// the selected country and product are retrieved in session
		$country = $session->get('country');
		$product = $session->get('product');

		// the price of the product selected in session is retrieved
		$priceSize = $session->get('priceSize');
		// the product is calculated with delivery costs
		$deliveryCosts = 15.00;
		$totalPrice = strval($priceSize + $deliveryCosts);

		// we create the order form and submit it
		$order = new Order();
		$form = $this->createForm(OrderType::class, $order, [
			'isFuneral' => $product['isFuneral'],
		]);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {

			// updating of variables
			$now = new \DateTime();
			$order->setOrderDate($now);
			$order->setIdProduct($product['id']);
			$order->setProductPrice($priceSize);
			$order->setTotal($totalPrice);

			// insertion into database
			$em->persist($order);
			$em->flush();

			$session->set('idOrder', $order->getId());

			// redirect to the payment page
			return $this->redirectToRoute('payment');
		}

		// rendering
        return $this->render('order/index.html.twig', [
			'bodyClass' => 'order',
			'form' => $form->createView(),
			'country' => $country,
			'product' => $product,
			'productPrice' => $priceSize,
			'totalPrice' => $totalPrice,
			'deliveryCosts' => $deliveryCosts
        ]);
    }
}