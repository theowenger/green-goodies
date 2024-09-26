<?php

namespace App\Security;

use Lexik\Bundle\JWTAuthenticationBundle\Security\User\JWTUserProvider;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\Exception\CustomUserMessageAuthenticationException;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

class AppCustomAuthenticator extends AbstractAuthenticator
{
    private $jwtManager;
    private $userProvider;

    public function __construct(JWTTokenManagerInterface $jwtManager, UserProviderInterface $userProvider)
    {
        $this->jwtManager = $jwtManager;
        $this->userProvider = $userProvider;
    }

    public function supports(Request $request): ?bool
    {
        // On vérifie si la requête contient un JWT dans l'en-tête Authorization
        return $request->headers->has('Authorization');
    }

    public function authenticate(Request $request): SelfValidatingPassport
    {
        // On extrait le token depuis l'en-tête Authorization
        $authHeader = $request->headers->get('Authorization');
        if (null === $authHeader || !str_starts_with($authHeader, 'Bearer ')) {
            throw new CustomUserMessageAuthenticationException('No JWT token found in request');
        }

        $token = str_replace('Bearer ', '', $authHeader);

        try {
            // On vérifie si le token est valide
            $data = $this->jwtManager->decodeFromJsonWebToken($token);
        } catch (\Exception $e) {
            throw new CustomUserMessageAuthenticationException('Invalid JWT token');
        }

        return new SelfValidatingPassport(new UserBadge($data['username']));
    }

    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // Redirection ou autre logique après authentification réussie
        return null; // Pas de redirection nécessaire dans une API
    }

    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): JsonResponse
    {
        return new JsonResponse(['error' => 'Authentication Failed'], Response::HTTP_UNAUTHORIZED);
    }
}