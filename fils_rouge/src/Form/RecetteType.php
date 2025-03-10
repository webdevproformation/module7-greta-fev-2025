<?php

namespace App\Form;

use App\Entity\Auteur;
use App\Entity\Category;
use App\Entity\Recette;
use Masterminds\HTML5\Entities;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

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
            ->add("miniature" , FileType::class , [
                "label" => "Image à la une de la recette",
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    // https://developer.mozilla.org/en-US/docs/Web/HTTP/MIME_types/Common_types
                    new File([
                        'maxSize' => '5M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                            'image/webp',
                        ],
                        'mimeTypesMessage' => 'Veuillez télécharger un fichier image',
                    ])
                ],
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
                    return "{$auteur->getEmail()}" ; 
                },
            ])
            ->add("category" , EntityType::class, [ // Symfony\Bridge\Doctrine\Form\Type\EntityType
                "class" => Category::class , // App\Entity\Category
                "placeholder" => "Sélectionner une catégorie pour cette recette",
                'choice_label' => function(Category $categorie){
                    return "{$categorie->getNom()}" ; 
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
