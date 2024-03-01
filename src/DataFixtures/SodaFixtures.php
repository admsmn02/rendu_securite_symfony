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
            'Dr Pepper Berry',
            'Aquarius Grape',
            'Coca-Cola Vanilla',
            'Pepsi Twist Lemon',
            'Sprite Grape',
            'Fanta Strawberry',
            'Mountain Dew Tropical Twist',
            'Dr Pepper Cherry Vanilla',
            'Aquarius Berry',
            'Coca-Cola Cherry Vanilla',
            'Pepsi Twist Berry',
            'Sprite Berry',
            'Fanta Berry',
            'Mountain Dew Tropical Twist Berry',
            'Dr Pepper Berry Vanilla',
            'Aquarius Berry Vanilla',
            'Coca-Cola Berry Vanilla',
            'Pepsi Twist Berry Vanilla',
            'Sprite Berry Vanilla',
            'Fanta Berry Vanilla',
            'Mountain Dew Tropical Twist Berry Vanilla'
        ];
    
        foreach ($sodaNames as $name) {
            $soda = new Soda();
            $soda->setName($name);
            $soda->setPrice(rand(1, 3));
            $soda->setQuantity(rand(50, 150));
            $soda->setSlug(strtolower(str_replace(' ', '-', $name)) . '-' . uniqid());
            $manager->persist($soda);
        }
    
        $manager->flush();
    }
}
