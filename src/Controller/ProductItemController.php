<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ProductItemController extends AbstractController
{
    #[Route('/product/{id}')]
    public function index(Product $product, SessionInterface $session): Response
    {
        $basket = $session->get('basket', []);
        $productId = $product->getId();
        $quantity = 1;

        if (isset($basket[$productId])) {
            $quantity = $basket[$productId]['quantity'];
        }

        return $this->render('product-item.html.twig', [
            'product' => $product,
            'quantity' => $quantity,
            'inBasket' => isset($basket[$productId])
        ]);
    }
}
