<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function __invoke(EntityManagerInterface $manager): Response
    {
        $productRepository = $manager->getRepository(Product::class);
        $products = $productRepository->findAll();

        return $this->render('home.html.twig', ['products' => $products]);
    }
}
