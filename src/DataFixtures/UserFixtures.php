<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User; 
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher
    )
    {
    }

    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <=10; $i++) {
            $user = new User();
            $user->setEmail('user' . $i . '@example.com');
            $user->setPassword(
                $this->userPasswordHasher->hashPassword(
                    $user,
                    'password'
                )
            );

            if ($i == 1) {
                $user->setRoles(['ROLE_ADMIN']);
            } else {
                $user->setRoles(['ROLE_USER']);
            }

            $manager->persist($user);
        }
        $manager->flush();
    }
}