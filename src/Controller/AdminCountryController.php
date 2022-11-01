<?php

namespace App\Controller;

use App\Entity\Country;
use App\Form\CountryType;
use App\Repository\CountryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class AdminCountryController extends AbstractController
{
    #[Route('/admin/country', name: 'admin_country')]
    public function index(CountryRepository $repository): Response
    {
		// rendering
		return $this->render('admin_country/index.html.twig', [
            'countries' => $repository->findAll(),
        ]);
    }

	#[Route('/admin/country/add', name: 'admin_country_add')]
	#[Route('/admin/country/{id}', name: 'admin_country_edit')]
	public function register(Country $country = null, Request $request, EntityManagerInterface $em, TranslatorInterface $translator): Response
	{
		// if the country is null, it means that a new country will be created (Route /add)
		if($country === null) {
			$country = new Country();
		}

		// we create the contact form and submit it
		$form = $this->createForm(CountryType::class, $country);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			// message handling
			$country->getId() === null
				? $this->addFlash('success', $translator->trans('admin.country.result.add.text'))
				: $this->addFlash('success', $translator->trans('admin.country.result.edit.text'));

			// insertion into database
			$em->persist($country);
			$em->flush();
			return $this->redirectToRoute('admin_country');
		}

		// rendering
		return $this->render('admin_country/form.html.twig', [
			'form' => $form->createView(),
			'country' => $country,
		]);
	}


	#[Route('/admin/country/remove/{id}', name: 'admin_country_remove')]
	public function remove(Country $country, EntityManagerInterface $em, TranslatorInterface $translator): Response
	{
		// deletion into database
		$em->remove($country);
		$em->flush();
		// message handling
		$this->addFlash('success',$translator->trans('admin.country.result.remove.text'));

		return $this->redirectToRoute('admin_country');
	}
}
