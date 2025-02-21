<?php 

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class BackController extends AbstractController{

    #[Route("/dashboard" , name:"page_dashboard")]
    public function dashboard():Response
    {
        // http://192.1.1.1/recette/index.php?id=1
        // $_GET => super globale => créé par PHP 
        // $_POST
        // $_SESSION
        // $_FILE 
        // Request

        $data = [
            "user" => [
                "nom" => "Alain",
                "role" => "admin",
                "dt_connexion" => "21 Février 2025"
            ],
            "session" => [
                [ "id" => 1 , "nom" => "PS4" , "prix" => 2000    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 30000 ]
            ]
        ];
        return $this->render("back/dashboard.html.twig", $data); 
    }

    // http://127.0.0.1:8000/gestion-article/1
    #[Route("/gestion-article/{id}" , name:"gestion_article")]
    public function gestionArticle(Request $request){
        // injection de dépendance 

        $data = [
            "produits" => [
                [ "id" => 1 , "nom" => "PS4" , "prix" => 200    ],
                [ "id" => 2 , "nom" => "PS5" , "prix" => 500    ],
                [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
            ]
        ];
        // http://127.0.0.1:8000/gestion-article/1 => afficher le produit concerné
        // http://127.0.0.1:8000/gestion-article/2
        // http://127.0.0.1:8000/gestion-article/3
        // http://127.0.0.1:8000/gestion-article/123

        $id = $request->attributes->get("id");

        // recherche dans un tableau si l'id dans l'url existe dans le tableau
        $resultat = [];
        foreach($data["produits"] as $produit){
            if($produit["id"] == $id){
                $resultat[] = $produit ; 
            }
        }

        if(count($resultat) === 0){
            return $this->render("back/404.html.twig");
        }
        return $this->render("back/produit.html.twig" , $resultat[0]);
        // dd($resultat); // dump and die(); 
    }

}