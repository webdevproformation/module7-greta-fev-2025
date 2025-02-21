<?php 

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackController extends AbstractController{

    #[Route("/dashboard" , name:"page_dashboard")]
    public function dashboard():Response
    {
        // $_GET
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

}