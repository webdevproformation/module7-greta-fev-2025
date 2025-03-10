<?php

namespace App\DataFixtures;

use Faker\Factory;
use DateTimeImmutable;
use App\Entity\Commentaire;
use App\Entity\Recette;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentaireFixtures extends Fixture  implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create("fr_FR");
        for($i = 0 ; $i < 1_000 ; $i++){

            $commentaire = new Commentaire();
            $commentaire->setEmail($faker->email())
                        ->setSujet($faker->words(5 , true))
                        ->setMessage($faker->realText(60))
                        ->setDtCreation($faker->dateTimeThisCentury())
                        ->setRecette($this->getReference("recette_" . $faker->numberBetween(0,299) , Recette::class))
                        ; 
            $manager->persist($commentaire);
        }
        $manager->flush();
    }
    public function getDependencies(): array
    {
        return [
            RecetteFixtures::class
        ];
    }
}
