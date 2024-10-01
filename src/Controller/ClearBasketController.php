<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ClearBasketController extends AbstractController
{
    #[Route('/basket', name: 'clear_basket', methods: ["POST"])]
    public function index(Security $security, SessionInterface $session, Request $request): Response
    {
        /** @var User $user */
        $user = $security->getUser();

        $session->set('basket', []);

        return $this->redirectToRoute('basket', ['id' => $user->getId()]);
    }
}
