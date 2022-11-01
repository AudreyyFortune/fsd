<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'contact')]
    public function index(Request $request, EntityManagerInterface $em, MailService $mailer): Response
    {
		// variables
		$isSend = false;

		// we create the contact form and submit it
        $demand = new Contact();
        $form = $this->createForm(ContactType::class, $demand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // updating of variables
            $now = new \DateTime();
            $demand->setSendStatus(Contact::SEND);
            $demand->setDateSend($now);
            // sending an email
            $mailer->sendEmail($demand->getEmail(), $demand->getSubject(), $demand->getQuestion());
            // insertion into database
            $em->persist($demand);
            $em->flush();

            $isSend = true;
        }

		// rendering
        return $this->render('contact/index.html.twig', [
            'lang' => $request->getLocale(),
            'form' => $form->createView(),
            'isSend' => $isSend,
        ]);
    }
}
