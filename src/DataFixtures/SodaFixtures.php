<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Soda;

class SodaFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $sodaNames = [
            'Coca-Cola',
            'Pepsi',
            'Sprite',
            'Fanta',
            'Mountain Dew',
            'Dr Pepper',
            'Aquarius',
            'Coca-Cola Zero',
            'Pepsi Max',
            'Sprite Zero',
            'Fanta Orange',
            'Mountain Dew Code Red',
            'Dr Pepper Cherry',
            'Aquarius Lemon',
            'Coca-Cola Cherry',
            'Pepsi Twist',
            'Sprite Lemon',
            'Fanta Grape',
            'Mountain Dew Blue Raspberry',
            'Dr Pepper Berry'
        ];
    
        foreach ($sodaNames as $name) {
            $soda = new Soda();
            $soda->setName($name);
            $soda->setPrice(rand(1, 3));
            $soda->setQuantity(rand(50, 150));
            $soda->setSlug(strtolower(str_replace(' ', '-', $name)) . '-' . uniqid());
            $imageName = strtolower(str_replace(' ', '-', $name)) . '.jpg';
            $soda->setImagePath($imageName);
            $manager->persist($soda);
        }
    
        $manager->flush();
    }
}
