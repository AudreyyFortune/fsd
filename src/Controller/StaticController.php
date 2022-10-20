<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class StaticController extends AbstractController
{
    // #[Route('/static', name: 'app_static')]
    // public function index(): Response
    // {
    //     return $this->render('static/index.html.twig', [
    //         'controller_name' => 'StaticController',
    //     ]);
    // }

    #[Route('/{slug}', name: 'app_static')]
    public function index(string $slug, Request $request, TranslatorInterface $translator): Response
    {
        $lang = $request->getLocale();
        
        return $this->render('static/index.html.twig', [
            'controller_name' => 'StaticController',
            'key' => $slug,
            'lang' => $lang,
        ]);
    }


    
}
