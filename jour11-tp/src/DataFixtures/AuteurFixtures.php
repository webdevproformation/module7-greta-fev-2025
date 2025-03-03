<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Auteur;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AuteurFixtures extends Fixture
{
    // symfony console make:fixture

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create();

        for($i = 0 ; $i < 50 ; $i++){
            $auteur = new Auteur();
            $auteur->setPrenom($faker->firstName())
                   ->setNom($faker->lastName())
                   ->setEmail($faker->email());
            
            $manager->persist($auteur); 

            // attention il faut mettre cette ligne APRES le persist
            // cette ligne va nous permettre d'utiliser une entité dans une autre fixture
            $this->addReference( "auteur_$i" , $auteur ); 
        }
        // symfony console doctrine:fixture:load
        // vider toutes les tables de base de données ET remplir avec nos fixtures 
        $manager->flush();
    }
}

// cas pratique => créer 30 commentaires via DataFixtures ET Faker 
