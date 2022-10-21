<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class StaticController extends AbstractController
{
    #[Route('/{slug}', name: 'app_static')]
    public function index(string $slug, Request $request, TranslatorInterface $translator): Response
    {
		// the request language
        $lang = $request->getLocale();

		// rendering
        return $this->render('static/index.html.twig', [
            'controller_name' => 'StaticController',
			'bodyClass' => 'static',
            'key' => $slug,
            'lang' => $lang,
        ]);
    }
}