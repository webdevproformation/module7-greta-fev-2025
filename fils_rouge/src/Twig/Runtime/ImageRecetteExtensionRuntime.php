<?php

namespace App\Twig\Runtime;

use Symfony\Component\HttpFoundation\RequestStack;
use Twig\Extension\RuntimeExtensionInterface;

class ImageRecetteExtensionRuntime implements RuntimeExtensionInterface
{

    public function __construct(
        private RequestStack $request
    )
    {
        
    }

    public function image_recette( ?string $nom_fichier , int $width = 120 , string $class = "img-thumbnail" )
    {

        if(empty($nom_fichier)){
            return '<img src="https://placehold.co/600x400?text=image+non+disponible" alt="" width="'. $width .'" class="'. $class .'">';
        }

        $redirectUri = sprintf(
            '%s://%s:%s',
            $this->request->getCurrentRequest()->getScheme(),
            $this->request->getCurrentRequest()->getHost(),
            8000
        );
        return '<img src="'. $redirectUri .'/img/' . $nom_fichier .'" alt="" width="'. $width  .'" class="'. $class .'">';
    }
}
