<?php 

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
// use Symfony\Component\Routing\Annotation\Route;
// pour Nada

class BoutiqueController extends AbstractController{

    #[Route("/catalogue", name:"page_catalogue" )]
    public function catalogue(){

        $data = [
            "produits" => [
                [ "id" => 1 , "nom" => "PS4" , "prix" => 200    ],
                [ "id" => 2 , "nom" => "PS5" , "prix" => 500    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
            ]
        ];

        return $this->render("boutique/catalogue.html.twig" , $data); 
    }

    #[Route("/panier" , name:"page_panier")]
    public function panier():Response
    {
        $data = [
            "panier" => [
                [ "id" => 2 , "nom" => "PS5" , "prix" => 500    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
            ]
        ];
        return $this->render("boutique/panier.html.twig", $data);
    }
}