<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class AddItemOnBasketController extends AbstractController
{
    #[Route('/basket/{id}', name: 'add_to_basket')]
    public function index(Product $product,Security $security, SessionInterface $session, Request $request): Response
    {
        $basket = $session->get('basket', []);

        $productId = $product->getId();
        if (isset($basket[$productId])) {
            // Si le produit est déjà dans le panier, on met à jour la quantité
            $basket[$productId]['quantity'] = $request->get('quantity', 1);
        } else {
            $basket[$productId] = [
                'id' => $product->getId(),
                'name' => $product->getName(),
                'price' => $product->getPrice(),
                'quantity' => $request->get('quantity', 1),
                'picture' => $product->getPicture()
            ];
        }

        $session->set('basket', $basket);

        return $this->redirectToRoute('basket');
    }
}
