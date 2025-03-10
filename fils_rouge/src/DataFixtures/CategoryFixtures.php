<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = ["entrée", "plat", "dessert"];
        //                0                  2
        $faker = Factory::create("fr_FR");

        foreach($categories as $key => $categorie_name){
            $categorie = new Category();
            $categorie->setNom($categorie_name)
                      ->setDescription($faker->realText())
            ;
            $manager->persist($categorie);
            $this->addReference("categorie_$key", $categorie);
            // dernière ligne permet d'utiliser une référence dans la fixture de Recette 
        }
        $manager->flush();
    }
}
