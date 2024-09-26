<?php

declare(strict_types=1);

namespace App\Controller;

use App\Form\LoginFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login(AuthenticationUtils $authenticationUtils, Request $request): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        // Create the form
        $form = $this->createForm(LoginFormType::class, [
            'email' => $lastUsername // Pre-fill the email field with the last username
        ]);

        return $this->render('security/login.html.twig', [
            'loginForm' => $form->createView(),
            'error' => $error,
        ]);
    }
}