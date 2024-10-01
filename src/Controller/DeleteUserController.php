<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class DeleteUserController extends AbstractController
{
    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    #[Route('/user/delete', name: 'delete_user', methods: ['POST'])]
    public function index(Security $security, EntityManagerInterface $entityManager,  TokenStorageInterface $tokenStorage): Response
    {
        /** @var User $user */
        $user = $security->getUser();
        $entityManager->remove($user);
        $entityManager->flush();
        $tokenStorage->setToken(null);

//        $this->container->get('session')->invalidate();

        return $this->redirectToRoute('app_home');
    }
}
