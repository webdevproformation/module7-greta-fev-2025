<?php 

namespace App\Form ;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;

class EtudiantType extends AbstractType{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("prenom")
                ->add("nom")
                ->add("description" , TextareaType::class)
                ->add("age" , NumberType::class)
                ->add("creer", ButtonType::class)
        ;
    }
}