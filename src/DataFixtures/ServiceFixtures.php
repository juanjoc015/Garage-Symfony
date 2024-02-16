<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Enum\CarsBrandEnum;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $service = new Service();

            $service->setTitle('Service N°' . $i)
                ->setDescription('Description du service n°' . $i)
            ;

            $manager->persist($service);
        }

        $manager->flush();
    }

    private function getBrand(): string
    {
        return array_rand(CarsBrandEnum::getBrands());
    }
}
