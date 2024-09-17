<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class BasketController extends AbstractController
{
    #[Route('/user/{id}/basket', name: 'basket')]
    public function index(int $id): Response
    {
        return $this->render('basket.html.twig');
    }
}
