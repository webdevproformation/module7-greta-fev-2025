<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom')
            ->add('nom')
            ->add('age' , NumberType::class)
            ->add('cv' , TextareaType::class)
            ->add('role', ChoiceType::class , [
                "choices" => [
                    "admin" => "admin",
                    "redacteur" => "redacteur"
                ],
                "placeholder" => "Veuillez choisir un rôle"
            ])
            ->add('creer', SubmitType::class)
        ;
    }

}
