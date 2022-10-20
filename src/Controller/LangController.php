<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LangController extends AbstractController
{
    // #[Route('/change_locale/{locale}', name: 'app_lang')]
    // public function changeLocale($locale, Request $request): Response
    // {

    //     $request->getSession()->set('_locale', $locale);
    //     return $this->redirect($request->headers->get('referer'));
    // }
}
