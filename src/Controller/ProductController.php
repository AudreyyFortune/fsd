<?php

namespace App\Controller;

use App\Entity\ProductSizePrice;
use App\Form\ProductSizeType;
use App\Repository\ProductTranslationRepository;
use App\Repository\ProductSizePriceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ProductController extends AbstractController
{
    private ProductTranslationRepository $productTranslationRepository;
	private ProductSizePriceRepository $productSizePriceRepository;

    public function __construct(
        ProductTranslationRepository $productTranslationRepository,
		ProductSizePriceRepository $productSizePriceRepository,
        )
    {
        $this->productTranslationRepository = $productTranslationRepository;
		$this->productSizePriceRepository = $productSizePriceRepository;
	}

    #[Route('/product/{slug}', name: 'app_product')]
    public function index(string $slug, Request $request, SessionInterface $session): Response
    {
		// the request language
        $lang = $request->getLocale();

		// we get the country in session
        $country = $session->get('country');

		// if you have not selected a country before -> redirection to the homepage
        if (null === $country) {    
            return $this->redirectToRoute('international');
        }

		// we cut the url to separate the name of the product and the reference
        $productSlug = explode('-', $slug);
        $refProduct = end($productSlug);

		// we get the properties and translation of the product concerned and we put in session
        $productTranslation = $this->productTranslationRepository->getProductTranslation($lang, $refProduct)[0];
		$session->set('product', $productTranslation);

		// the different product sizes and associated prices are collected for this product
		$productSize = $this->productSizePriceRepository->findBy(['name' => $productTranslation['price_name']]);

		$productSize['name'] = $productSize[0]->getName();
		$productSize['list_size']['product.category_1.size.text.html'] = $productSize[0]->getCategory1();

		if ($productSize['name'] !== 'single') {
			$productSize['list_size']['product.category_2.size.text.html'] = $productSize[0]->getCategory2();
			$productSize['list_size']['product.category_3.size.text.html'] = $productSize[0]->getCategory3();
		}

		// we create the form and submit it
		$productSizeTest = new ProductSizePrice();
		$form = $this->createForm(ProductSizeType::class, $productSizeTest, [
			'productSize' => $productSize['list_size'],
		]);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			// put the selected price in the session
			$priceSize = $form['name']->getData();
			$session->set('priceSize', $priceSize);
			return $this->redirectToRoute('order');
		}

		// rendering
        return $this->render('product/index.html.twig', [
            'controller_name' => 'ProductController',
            'bodyClass' => 'product',
            'lang' => $lang,
            'product' => $productTranslation,
			'productSize' => $productSize,
            'country' => $country,
			'choices' => $productSize['list_size'],
			'form' => $form->createView(),
        ]);
    }
}
