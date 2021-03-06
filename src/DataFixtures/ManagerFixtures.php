<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Manager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class ManagerFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $objectManager): void
    {
        $manager = new Manager();
        $manager
            ->setFirstName('Liz')
            ->setLastName('Solene')
            ->setEmail('solene@liz.com')
            ->setPassword($this->userPasswordHasher->hashPassword($manager, 'password'));
        $objectManager->persist($manager);
        $objectManager->flush();

        $manager2 = new Manager();
        $manager2
            ->setFirstName('Julian')
            ->setLastName('Dolerni')
            ->setEmail('julian@dolerni.com')
            ->setPassword($this->userPasswordHasher->hashPassword($manager2, 'password'));
        $objectManager->persist($manager2);
        $objectManager->flush();
    }
}
