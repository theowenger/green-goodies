<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class BasketController extends AbstractController
{
    #[Route('/user/basket', name: 'basket')]
    public function index(SessionInterface $session): Response
    {
        $basket = $session->get('basket', []);

        $totalPrice = 0;
        foreach ($basket as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return $this->render('basket.html.twig', [
            'basket' => $basket,
            'totalPrice' => $totalPrice,
        ]);
    }
}
