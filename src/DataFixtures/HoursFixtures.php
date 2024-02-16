<?php

namespace App\DataFixtures;

use App\Entity\Hour;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class HoursFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Arreglo de días de la semana en francés
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];


        foreach ($days as $day) {
            
            $hour = new Hour();
            $hour->setStartDate(new \DateTime('08:00:00')); 
            $hour->setEndDate(new \DateTime('17:00:00'));   
            $hour->setClosed($day === 'Dimanche' ? true : false) ;                      
            $hour->setDay($day);

            $manager->persist($hour);
        }

        $manager->flush();
    }
}
