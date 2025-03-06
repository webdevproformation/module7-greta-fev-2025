<?php

namespace App\Form;

use App\Entity\Auteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('email' , null , [
                "data" => empty($options["auteur"]) ? "" :  $options["auteur"]->getEmail()
            ])
            ->add('passwordPlainText' , null , [
                "required" => $options["password_obligatoire"]
            ])
            ->add('roles' , ChoiceType::class, [
                "choices" => [
                    'ROLE_ADMIN' => "ROLE_ADMIN",
                    'ROLE_REDACTEUR' => "ROLE_REDACTEUR"
                ],
                "placeholder" => "choisir un role",
                "data" => empty($options["auteur"]) ? "" :  $options["auteur"]->getRoles()[0]
                 // le champ du formulaire roles n'est pas associé au propriété roles dans l'entité Auteur::class
            ])
        ;
    }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // 'data_class' => Auteur::class,
            "auteur" => [] ,
            "password_obligatoire" => true
        ]);
    }
}
