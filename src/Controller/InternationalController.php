<?php

namespace App\Controller;

// use App\Service\LangNavigator;
use App\Repository\CountryRepository;
use App\Repository\CountryTranslationRepository;
use App\Repository\CatalogEventRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;


class InternationalController extends AbstractController
{
    // protected LangNavigator $langNavigator;

    // public function __construct(LangNavigator $langNavigator)
    // { 
    //     $this->langNavigator = $langNavigator;
    // }

    private CountryRepository $countryRepository;
    private CountryTranslationRepository $countryTranslationRepository;
    private CatalogEventRepository $catalogEventRepository;

    public function __construct(
        CountryRepository $countryRepository,
        CountryTranslationRepository $countryTranslationRepository,
        CatalogEventRepository $catalogEventRepository,
        )
    {
        $this->countryRepository = $countryRepository;
        $this->countryTranslationRepository = $countryTranslationRepository;
        $this->catalogEventRepository = $catalogEventRepository;
    }


    #[Route('/', name: 'app_international')]
    public function index(Request $request, TranslatorInterface $translator): Response
    {
        $lang = $request->getLocale();

        // $countries = $this->countryRepository->getAllCountries();
        $countries = $this->countryTranslationRepository->getCountriesList($lang);
        $catalogEvents = $this->catalogEventRepository->findBy(['enabled' => true]);
        

        return $this->render('international/index.html.twig', [
            'controller_name' => 'InternationalController',
            'lang' => $lang,
            'bodyClass' => 'international',
            'searchBloc' => [
                'countries' => $countries,
                'catalogEvents' => $catalogEvents,
            ],
        ]);
    }
}
