<?php

namespace App\DataFixtures;

use App\Entity\Hour;
use App\Enum\DaysEnum;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        foreach (array_flip(DaysEnum::getDays()) as $day) {
            $hour = new Hour();
            $hour->setStartDate(new \DateTime('08:00:00'));
            $hour->setEndDate(new \DateTime('17:00:00'));
            $hour->setClosed($day === DaysEnum::SUNDAY ? true : false) ;
            $hour->setDay($day);

            $manager->persist($hour);
        }

        $manager->flush();
    }
}
