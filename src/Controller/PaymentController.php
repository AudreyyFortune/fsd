<?php

namespace App\Controller;

use App\Repository\OrderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class PaymentController extends AbstractController
{
    #[Route('/payment', name: 'payment')]
    public function index(Request $request, SessionInterface $session, OrderRepository $orderRepository): Response
    {
		// we get the id of the command we have just placed in session
		$idOrder = $session->get('idOrder');

		// if the order exist
		if ($idOrder) {
			// rendering
			return $this->render('payment/index.html.twig', [
				'bodyClass' => 'payment',
				'order' => $orderRepository->getOrderDetails($idOrder),
			]);
		}

		// if the order doesn't exist -> redirection to the homepage
		return $this->redirectToRoute('international');
    }
}
