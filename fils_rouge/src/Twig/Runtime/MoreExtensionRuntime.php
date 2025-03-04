<?php

namespace App\Twig\Runtime;

use Twig\Extension\RuntimeExtensionInterface;

class MoreExtensionRuntime implements RuntimeExtensionInterface
{
    public function __construct()
    {
        // Inject dependencies if needed
    }

    public function more(string $text , int $nb_words = 15 ):string
    {
        $words = explode(" ", $text);
        if(count($words) <= $nb_words){
            return $text ;
        }
        $result = array_slice($words, 0, $nb_words);
        return implode( " " , $result) . " ...";
    }

    public function info_prix($prix):string
    {
        $class = ($prix < 30) ? "bg-success" : "bg-danger" ;
        $prix = number_format($prix , 2, "," , " ");
        return "<span class='$class badge'> $prix €</span>";
    }
}
