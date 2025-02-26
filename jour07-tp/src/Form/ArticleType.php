<?php 

namespace App\Form ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;

class ArticleType extends AbstractType{

    // méthode qui va permettre de créer les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("titre")
                ->add("description", TextareaType::class)
                ->add("auteur")
                ->add("duree" , NumberType::class)
                ->add("url_img" , UrlType::class)
                ->add("creer" , ButtonType::class)
        ;
    }
}