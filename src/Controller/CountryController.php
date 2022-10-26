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

    #[Route('/{slug}', name: 'country')]
    public function index(string $slug, Request $request, SessionInterface $session): Response
    {
		// the request language
        $lang = $request->getLocale();

		// retrieve the event stored in session
        $currentEvent = $request->query->get('event');

		// list of products by event
        $catalogProducts = $this->catalogProductRepository->getCatalogProductList($currentEvent);

		// list of countries by language
        $countries = $this->countryTranslationRepository->getCountriesList($lang);

		// put the country stored in session
        $session->set('country', $slug);

		// return the id country by the slug save in session
		$countrySlug = $this->countryTranslationRepository->getCountryIdBySlug($lang, $slug);

		if ($countrySlug) {
			$countryId = $countrySlug[0]['id'];
			// the country id and the event are put in session
			$session->set('idCountry', $countryId);
			$session->set('event', $currentEvent);
		}

		//retrieve the country id stored in session (useful when changing languages)
		$countryId = $session->get('idCountry');
		//we find the country of the page according to its id (useful when changing languages)
		$country = $this->countryTranslationRepository->getNameFileCountryByIdAndLang($countryId, $lang)[0]['name_file'];
		//retrieve the event id stored in session (useful when changing languages)
		$event = $session->get('event');

		// list of available events
        $catalogEvents = $this->catalogEventRepository->findBy(['enabled' => true]);

		// if you don't have a current event
		if (!$currentEvent) {
			return $this->redirect($country.'?event='.$event);
		}

		// rendering
        return $this->render('country/index.html.twig', [
			'bodyClass' => 'country',
            'lang' => $lang,
            'country' => $country,
            'event' => $event,
            'catalogProducts' => $catalogProducts,
            'searchBloc' => [
                'countries' => $countries,
                'catalogEvents' => $catalogEvents,
            ],
        ]);
    }
}
