<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\CommandRepository;
use Doctrine\ORM\EntityManagerInterface;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;

class APILoginController extends AbstractController
{
    /**
     * @throws \JsonException
     */
    #[Route('/api/login', name: 'login_api', methods: ['POST'])]
    public function index(
        Request $request,
        EntityManagerInterface $entityManager,
        JWTTokenManagerInterface $tokenManager,
        UserPasswordHasherInterface $passwordHasher
    ): JsonResponse
    {
        $data = json_decode($request->getContent(), true, 512, JSON_THROW_ON_ERROR);

        $username = $data['username'] ?? null;
        $password = $data['password'] ?? null;

        if (!$username || !$password) {
            return new JsonResponse(['error' => 'Missing credentials'], 400);
        }
        /** @var User $user */
        $user = $entityManager->getRepository(User::class)->findOneBy(['email' => $username]);

        if (!$user || !$passwordHasher->isPasswordValid($user, $password)) {
            return new JsonResponse(['error' => 'Invalid credentials'], 401);
        }

        if (!$user->getIsAPIActive()) {
            return new JsonResponse(['error' => 'API access not allowed'], 403);
        }

        $token = $tokenManager->create($user);

        return new JsonResponse(['token' => $token]);
    }
}
