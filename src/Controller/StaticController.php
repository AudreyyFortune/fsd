<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class StaticController extends AbstractController
{
    #[Route('/{slug}', name: 'static')]
    public function index(string $slug, Request $request): Response
    {
		// rendering
        return $this->render('static/index.html.twig', [
			'bodyClass' => 'static',
            'key' => $slug,
            'lang' => $request->getLocale(),
        ]);
    }
}