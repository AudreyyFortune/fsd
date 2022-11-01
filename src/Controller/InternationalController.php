<?php

namespace App\Controller;

use App\Repository\CountryTranslationRepository;
use App\Repository\CatalogEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class InternationalController extends AbstractController
{
    private CountryTranslationRepository $countryTranslationRepository;
    private CatalogEventRepository $catalogEventRepository;

    public function __construct(
        CountryTranslationRepository $countryTranslationRepository,
        CatalogEventRepository $catalogEventRepository,
        )
    {
        $this->countryTranslationRepository = $countryTranslationRepository;
        $this->catalogEventRepository = $catalogEventRepository;
    }

    #[Route('/', name: 'international')]
    public function index(Request $request): Response
    {
		// the request language
        $lang = $request->getLocale();

		// list of countries by language
        $countries = $this->countryTranslationRepository->getCountriesList($lang);
		// list of available events
        $catalogEvents = $this->catalogEventRepository->findBy(['enabled' => true]);

		// rendering
        return $this->render('international/index.html.twig', [
            'bodyClass' => 'international',
            'searchBloc' => [
                'countries' => $countries,
                'catalogEvents' => $catalogEvents,
            ],
        ]);
    }
}