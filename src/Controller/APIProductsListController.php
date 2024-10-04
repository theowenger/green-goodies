<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

class APIProductsListController extends AbstractController
{
    /**
     * @throws \JsonException
     */
    #[Route('/api/products', name: 'products_list_api', methods: ['GET'])]
    public function index(
        EntityManagerInterface $entityManager,
        SerializerInterface $serializer,
    ): JsonResponse
    {
        /** @var User $user */
        $user = $this->getUser();

        if (!$user || !$user->getIsAPIActive()) {
            return new JsonResponse(['error' => 'API access not allowed'], 403);
        }

        $products = $entityManager->getRepository(Product::class)->findAll();

        $jsonProducts = $serializer->serialize($products, 'json', ['groups' => ['product']]);
        $decodedProducts = json_decode($jsonProducts, true, 512, JSON_THROW_ON_ERROR);


        return new JsonResponse(['products' => $decodedProducts], 200);
    }
}
