<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\User;
use App\Repository\CommandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AccountController extends AbstractController
{
    #[Route('/user/account', name: 'account')]
    public function index(CommandRepository $commandRepository, Security $security): Response
    {
        /** @var User $user */
        $user = $security->getUser();

        $commands = $commandRepository->findBy(['user' => $user], ['id' => 'DESC'] );

        return $this->render('account.html.twig', ['commands' => $commands, 'isAPIActive' => $user->getIsAPIActive()]);
    }
}
