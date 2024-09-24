<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ProductItemController extends AbstractController
{
    #[Route('/product/{id}')]
    public function index(int $id, EntityManagerInterface $manager): Response
    {
        $productRepository = $manager->getRepository(Product::class);

        $product = $productRepository->find($id);

        if($product === null) {
            throw $this->createNotFoundException();
        }

        return $this->render('product-item.html.twig', ['product' => $product]);
    }
}
