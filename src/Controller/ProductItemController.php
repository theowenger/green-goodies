<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductItemController extends AbstractController
{
    #[Route('/product/{id}')]
    public function index(int $id): Response
    {
        return $this->render('product-item.html.twig');
    }
}
