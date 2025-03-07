<?php

namespace App\Form;

use App\Entity\Commentaire;
use App\Entity\Recette;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CommentaireType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('sujet')
            ->add('message')
        ;
        if($options["form_single"]){
            $builder
                ->add('dt_creation', null, [
                    'widget' => 'single_text',
                ])
                ->add('recette', EntityType::class, [
                    'class' => Recette::class,
                    'choice_label' => 'id',
                ])
            ;
        }
            
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaire::class,
            "form_single" => true 
        ]);
    }
}
