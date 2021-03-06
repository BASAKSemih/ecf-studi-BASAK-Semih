<?php

declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class UserFixtures extends Fixture
{
    public function __construct(private UserPasswordHasherInterface $userPasswordHasher)
    {
    }

    public function load(ObjectManager $manager): void
    {
        $user = new User();
        $user
            ->setFirstName('Liz')
            ->setLastName('Solene')
            ->setEmail('mercedes@c63.com')
            ->setPassword($this->userPasswordHasher->hashPassword($user, 'password'));
        $manager->persist($user);
        $manager->flush();

        $user2 = new User();
        $user2
            ->setFirstName('David')
            ->setLastName('Solene')
            ->setEmail('david@c63.com')
            ->setPassword($this->userPasswordHasher->hashPassword($user2, 'password'));
        $manager->persist($user2);
        $manager->flush();
    }
}
