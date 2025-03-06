<?php

namespace App\Twig\Extension;

use App\Twig\Runtime\ImageRecetteExtensionRuntime;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class ImageRecetteExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('image_recette', [ImageRecetteExtensionRuntime::class, 'image_recette'] , ['is_safe' => ['html']]),
        ];
    }
}

// symfony console make:twig-extension
