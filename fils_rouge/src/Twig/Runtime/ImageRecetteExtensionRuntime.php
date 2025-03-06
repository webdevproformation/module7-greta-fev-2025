<?php

namespace App\Twig\Runtime;

use Symfony\Component\HttpFoundation\Request;
use Twig\Extension\RuntimeExtensionInterface;
use Symfony\Component\HttpFoundation\UrlHelper;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImageRecetteExtensionRuntime implements RuntimeExtensionInterface
{

    public function image_recette( ?string $nom_fichier , int $width = 120 )
    {
        
       
        if(empty($nom_fichier)){
            return '<img src="https://placehold.co/600x400?text=image+non+disponible" alt="" width="'. $width .'" class="img-thumbnail">';
        }
        return '<img src="https://127.0.0.1:8000/img/' . $nom_fichier .'" alt="" width="'. $width  .'" class="img-thumbnail">';
    }
}
