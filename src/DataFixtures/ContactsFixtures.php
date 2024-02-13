<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Contact;


class ContactsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Aquí creas y cargas tus objetos Contact
        for ($i = 1; $i <= 10; $i++) {

            $contact = new Contact();
            
            $contact->setLastname('nom ' . $i)
                    ->setFirstname('prenom' . $i)
                    ->setEmail($contact->getLastname() . '.' . $contact->getFirstname() . '@example.com')
                    ->setPhone('0654548789')
                    ->setMessage('lorem ipsun')
                    ;
                

            $manager->persist($contact);
        }

        $manager->flush();
    }
}