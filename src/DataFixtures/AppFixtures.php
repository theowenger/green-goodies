<?php

namespace App\DataFixtures;

use App\Entity\Command;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Random\RandomException;

class AppFixtures extends Fixture
{
    public const FIRST_NAMES = ["Alice", "Bob", "Charlie", "David", "Eva", "Fiona", "George", "Hannah", "Ian", "Jasmine"];
    public const LAST_NAMES = ["Dupont", "Martin", "Bernard", "Thomas", "Robert", "Petit", "Durand", "Leroy", "Moreau", "Laurent"];


    /**
     * @throws RandomException
     */
    public function load(ObjectManager $manager): void
    {
        $this->loadUsers(10, $manager);
        $this->loadProducts(10, $manager);
        $this->LoadCommands(10, $manager);

        $manager->flush();
    }

    private function loadUsers(int $quantity,ObjectManager $manager): void
    {


        for ($i = 0; $i < $quantity; $i++) {
            $password = "secret";

            $user = new User();

            $user->setFirstName(self::FIRST_NAMES[$i]);
            $user->setLastName(self::LAST_NAMES[$i]);
            $user->setMail($user->getFirstName() . $user->getLastName() . "@gmail.com");
            $user->setPassword(password_hash($password, PASSWORD_DEFAULT));

            $manager->persist($user);
        }
        $manager->flush();
    }

    /**
     * @throws RandomException
     */
    private function loadProducts(int $quantity, ObjectManager $manager): void
    {
        for ($i = 0; $i < $quantity; $i++) {
            $product = new Product();

            $product->setName("product n°" . $i);
            $product->setPrice(random_int(1, 100));
            $product->setShortDescription("short description " . $i);
            $product->setFullDescription("full description " . $i);
            $product->setPicture("picture " . $i);

            $manager->persist($product);
        }
        $manager->flush();
    }

    /**
     * @throws RandomException
     */
    private function loadCommands(int $quantity, ObjectManager $manager): void
    {
        $userRepository = $manager->getRepository(User::class);
        $productRepository = $manager->getRepository(Product::class);

        $products = $productRepository->findAll();
        $users = $userRepository->findAll();

        foreach ($users as $user) {
            for ($i = 0; $i < $quantity; $i++) {
                $command = new Command();

                $command->setUser($user);
                $command->setDate(date: new \DateTime());
                $command->setTotalPrice(random_int(10, 1000));
                for($j = 0; $j < 3; $j++) {
                    $randomProduct = $products[array_rand($products)];
                    $command->addProduct($randomProduct);
                }
                $manager->persist($command);
            }
        }
        $manager->flush();
    }
}
