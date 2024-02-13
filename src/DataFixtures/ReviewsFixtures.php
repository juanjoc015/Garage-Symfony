<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Review;


class ReviewsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Aquí creas y cargas tus objetos Review
        for ($i = 1; $i <= 10; $i++) {

            $review = new Review();
            
            $review->setlastName('nom ' . $i)
                    ->setMessage('Contenu de la critique ' . $i)
                    ->setRating(mt_rand(1, 5))
                    ->setCreatedAt(new \DateTime())
                    ;
                

            $manager->persist($review);
        }

        $manager->flush();
    }
}