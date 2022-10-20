<?php

namespace App\Controller;

use App\Repository\CatalogProductRepository;
use App\Repository\CountryTranslationRepository;
use App\Repository\CatalogEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CountryController extends AbstractController
{
    private CatalogProductRepository $catalogProductRepository;
    private CountryTranslationRepository $countryTranslationRepository;
    private CatalogEventRepository $catalogEventRepository;

    public function __construct(
        CatalogProductRepository $catalogProductRepository,
        CountryTranslationRepository $countryTranslationRepository,
        CatalogEventRepository $catalogEventRepository,
        )
    {
        $this->catalogProductRepository = $catalogProductRepository;
        $this->countryTranslationRepository = $countryTranslationRepository;
        $this->catalogEventRepository = $catalogEventRepository;
    }

    #[Route('/{slug}', name: 'app_country')]
    public function index(string $slug, Request $request, SessionInterface $session): Response
    {
		// the request language
        $lang = $request->getLocale();

		// retrieve the event stored in session
        $event = $request->query->get('event');

		// list of products by event
        $catalogProducts = $this->catalogProductRepository->getCatalogProductList($event);

		// list of countries by language
        $countries = $this->countryTranslationRepository->getCountriesList($lang);

		// retrieve the country and the event stored in session
        $session->set('country', $slug);
        $session->set('event', $event);

		// list of available events
        $catalogEvents = $this->catalogEventRepository->findBy(['enabled' => true]);

		// if you don't have an event, set no occasion (by default event=1)
        if (!$event) {
            return $this->redirect('?event=1');
        }

		// rendering
        return $this->render('country/index.html.twig', [
            'controller_name' => 'CountryController',
            'lang' => $lang,
            'country' => $slug,
            'event' => $event,
            'catalogProducts' => $catalogProducts,
            'searchBloc' => [
                'countries' => $countries,
                'catalogEvents' => $catalogEvents,
            ],
        ]);
    }
}
