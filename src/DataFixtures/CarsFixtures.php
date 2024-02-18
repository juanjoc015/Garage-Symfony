<?php

namespace App\DataFixtures;

use App\Entity\Car;
use App\Enum\CarsBrandEnum;
use App\Repository\UserRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CarsFixtures extends Fixture implements DependentFixtureInterface
{
    public function __construct(private UserRepository $userRepository)
    {     
    }
    public function load(ObjectManager $manager): void
    {
        $users = $this->userRepository->findAll(); 
        for ($i = 1; $i <= 20; $i++) {
            $car = new Car();

            $car->setName('véhicule ' . $i)
                ->setBrand($this->getBrand())
                ->setDescription('description ' . $i)
                ->setPrice(mt_rand(10000, 100000))
                ->setMileage(mt_rand(1000, 100000))
                ->setYear(mt_rand(2000, 2021))
                ->setImage('https://placehold.co/600x400')
                ->setUser($users[0])
            ;

            $manager->persist($car);
        }


        $manager->flush();
    }

    private function getBrand(): string
    {
        return array_rand(CarsBrandEnum::getBrands());
    }
    public function getDependencies(): array
    {
        return [UserFixtures::class];
    }
}
