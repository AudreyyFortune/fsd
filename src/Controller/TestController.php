<?php

namespace App\Controller;

use App\Service\MailService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class TestController extends AbstractController
{
    // #[Route('/test', name: 'app_test')]
    #[Route('/{test}', name: 'app_test')]
    public function index(Request $request, TranslatorInterface $translator, MailService $mailService): Response
    {
        $lang = $request->getLocale();

        $mailMessage = "Test";
        $mailService->sendEmail();

        return $this->render('test/index.html.twig', [
            'controller_name' => 'TestController',
            'lang' => $lang,
        ]);
    }
}
