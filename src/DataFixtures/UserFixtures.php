<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\User; // Assuming you have a User entity in App\Entity

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Create a normal user
        $user = new User();
        $user->setEmail('normalUser@example.com');
        $user->setPassword('normalUserPassword'); // Make sure to hash the password in a real application
        $user->setRoles(['ROLE_USER']); // Assuming 'ROLE_USER' is the role for a normal user

        // Create an admin user
        $admin = new User();
        $admin->setEmail('adminUser@example.com');
        $admin->setPassword('adminUserPassword'); // Make sure to hash the password in a real application
        $admin->setRoles(['ROLE_ADMIN']); // Assuming 'ROLE_ADMIN' is the role for an admin user

        // Persist the users
        $manager->persist($user);
        $manager->persist($admin);

        // Flush the manager to save the users
        $manager->flush();
    }
}