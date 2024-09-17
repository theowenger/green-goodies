<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class NotFoundController extends AbstractController
{
    #[Route('/asasa', name: 'not-found')]
    public function index(): Response
    {
        return $this->render('not-found.html.twig');
    }
}
