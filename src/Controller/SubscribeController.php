<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SubscribeController extends AbstractController
{
    #[Route('/subscribe', name: 'subscribe')]
    public function index(): Response
    {
        return $this->render('subscribe.html.twig');
    }
}
