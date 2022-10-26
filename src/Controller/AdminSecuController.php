<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class AdminSecuController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
		// we create the register form and submit it
        $user = new User();
        $form = $this->createForm(RegisterType::class, $user);
		$form->handleRequest($request);

		if ($form->isSubmitted() && $form->isValid()) {
			// each registration is assigned the role of USER by default
			$user->setRoles(['ROLE_USER']);
			// the user's password is encrypted
			$hashedPassword = $passwordHasher->hashPassword($user, $user->getPassword());
			$user->setPassword($hashedPassword);
			// the user is created in a database
			$em->persist($user);
			$em->flush();
			// redirect to the login page
			return $this->redirectToRoute('login');
		}

		// rendering
        return $this->render('security/register.html.twig', [
            'lang' => $request->getLocale(),
            'form' => $form->createView(),
        ]);
    }

	#[Route('/login', name: 'login')]
	public function login(Request $request, AuthenticationUtils $authenticationUtils)
	{
		// the request language
		$lang = $request->getLocale();

	  	// get the login error if there is one
		$error = $authenticationUtils->getLastAuthenticationError();
		// last username entered by the user
		$lastUsername = $authenticationUtils->getLastUsername();

		// rendering
		return $this->render('security/login.html.twig', [
			'lang' => $lang,
			'last_username' => $lastUsername,
			'error' => $error,
		]);
	}

	#[Route('/logout', name: 'logout')]
	public function logout(Request $request) { }

}
