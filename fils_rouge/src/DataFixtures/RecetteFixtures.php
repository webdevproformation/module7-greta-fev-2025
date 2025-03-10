<?php

namespace App\DataFixtures;

use App\Entity\Auteur;
use App\Entity\Category;
use Faker\Factory;
use App\Entity\Recette;
use DateTimeImmutable;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class RecetteFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
       for($i = 0 ; $i < 300 ; $i++){
        $recette = new Recette();
        $recette->setTitre($faker->realText(20))
                ->setDescription($faker->realText(400))
                ->setPrix($faker->numberBetween(5, 200))
                ->setDtCreation(new DateTimeImmutable($faker->dateTimeThisCentury()->format('Y-m-d H:i:s')))
                ->setAuteur( $this->getReference("auteur_". $faker->numberBetween(0,1) , Auteur::class))
                ->setCategory($this->getReference("categorie_". $faker->numberBetween(0,2) , Category::class))
            ;
        $manager->persist($recette);
        $this->addReference("recette_$i" , $recette); 
       }
        $manager->flush();
    }
    
    public function getDependencies(): array
    {
        return [
            AuteurFixtures::class ,
            CategoryFixtures::class
        ];
    }
}
