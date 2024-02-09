<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CarsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 20; $i++) {
            
            $car = new Car();

            $car->setName( 'voiture ' . $i)
                ->setDescription('description ' . $i)
                ->setPrice(mt_rand(10000, 100000))
                ->setMileage(mt_rand(1000, 100000))
                ->setYear(mt_rand(2000, 2021))
                ->setImage('https://placehold.co/600x400');

            $manager->persist($car);
        }

        $manager->flush();
    }
}
