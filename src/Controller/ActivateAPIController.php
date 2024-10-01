<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\CommandRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ActivateAPIController extends AbstractController
{
    #[Route('/user/api', name: 'activate_api', methods: ['POST'])]
    public function index(CommandRepository $commandRepository, Security $security, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $security->getUser();

        $isApiActive = $user->getIsAPIActive();

        if($isApiActive){
            $user->setIsAPIActive(false);
        }
        else {
            $user->setIsAPIActive(true);
        }

        $entityManager->persist($user);
        $entityManager->flush();

        $commands = $commandRepository->findBy(['user' => $user], ['id' => 'DESC'] );

        return $this->redirectToRoute('account');
    }
}
