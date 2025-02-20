<?php 

namespace App\Controller ;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController{

    #[Route("/" , name:"home")]
    // annotation équivalent de tableau $routes dans le fichier index.php
    public function home(){
        return new Response("voici notre page d'accueil");
    }
    // http://127.0.0.1:8000/


    // attention chaque route DOIT avoir un nom différent
    #[Route("/contact" , name:"page_contact")]
    public function contact(){
        return new Response("je suis la page de contact !!!!");
        // https://127.0.0.1:8000/contact
    }
}