<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class StaticController extends AbstractController
{
    #[Route('/info/{slug}', name: 'static')]
    public function index(string $slug): Response
    {
		// rendering
        return $this->render('static/index.html.twig', [
			'bodyClass' => 'static',
            'key' => $slug,
        ]);
    }

	#[Route('/info/about-us', name: 'static_about')]
	public function about(TranslatorInterface $translator): Response
	{
		// rendering
		return $this->render('static/index.html.twig', [
			'bodyClass' => 'static',
			'key' => $translator->trans('footer.about-us.route.name'),
		]);
	}
}