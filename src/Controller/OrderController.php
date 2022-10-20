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
    #[Route('/order', name: 'app_order')]
    public function index(Request $request, EntityManagerInterface $em, SessionInterface $session): Response
    {
		$lang = $request->getLocale();

		$product = $session->get('product');
		//dump($product);

		$priceSize = $session->get('priceSize');
		//dump($priceSize);

		$country = $session->get('country');
		dump($country);


		$order = new Order();
		$form = $this->createForm(OrderType::class, $order, [
			'isFuneral' => $product['isFuneral'],
		]);
		$form->handleRequest($request);


		if ($form->isSubmitted() && $form->isValid()) {

			$now = new \DateTime();
			$order->setOrderDate($now);
			$order->setIdProduct($product['id']);
			$order->setProductPrice($priceSize);
			$order->setTotal($priceSize + 15);

			dump($order);

			$em->persist($order);
			$em->flush();

		}

        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
			'bodyClass' => 'order',
			'lang' => $lang,
			'form' => $form->createView(),
			'country' => $country
        ]);
    }
}
