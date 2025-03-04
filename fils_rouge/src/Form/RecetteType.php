<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Recette;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre')
            ->add('description', TextareaType::class , [
                "attr" => [
                    "placeholder" => "présenter en détail comment réaliser cette recette",
                    "rows" => 8
                ]
            ])
            ->add('prix' , MoneyType::class , [
               "attr" => [  "placeholder" =>"0,00" ]
            ])
            ->add('dt_creation', null, [
                'widget' => 'single_text'
            ])
            ->add('auteur', EntityType::class, [
                "placeholder" => "Sélectionner une auteur pour cette recette",
                'class' => Auteur::class,
                'choice_label' => function(Auteur $auteur){
                    return "{$auteur->getPrenom()} {$auteur->getNom()} - {$auteur->getEmail()}" ; 
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
