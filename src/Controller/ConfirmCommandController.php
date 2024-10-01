<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Command;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Attribute\Route;

class ConfirmCommandController extends AbstractController
{
    #[Route('/command', name: 'confirm_command', methods: ["POST"])]
    public function index(Security $security, SessionInterface $session, EntityManagerInterface $entityManager): Response
    {
        /** @var User $user */
        $user = $security->getUser();

        $basket = $session->get('basket', []);

        dump($basket);

        $command = new Command();

        $command->setUser($user);
        $command->setDate(new \DateTime());

        $totalPrice = 0;
        foreach ($basket as $article) {
            dump($article);
            $product = $entityManager->getRepository(Product::class)->find($article['id']);
            if ($product) {
                $command->addProduct($product);
                $totalPrice += $product->getPrice();
            }
        }
        $command->setTotalPrice($totalPrice);

        $entityManager->persist($command);
        $entityManager->flush();

        $session->set('basket', []);

        return $this->redirectToRoute('basket', ['id' => $user->getId()]);
    }
}
