<?php 

namespace App\Controller ;

// use Symfony\Component\Routing\Annotation\Route;
// pour Nada
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController {

    #[Route("/presentation" , name:"page_presentation")]
    public function presentation(){
        return $this->render("front/presentation.html.twig");
    }

    /**
     * @Route("/presentation" , name="page_presentation")
     * pour Nada
     */
    /* public function presentation(){
        return $this->render("front/presentation.html.twig");
    } */

    #[Route("/exo" , name:"page_exo")]
    public function exo(){
        return $this->render("front/exo.html.twig"); 
    }

    #[Route("/etudiant" , name:"page_etudiant")]
    public function etudiant(){
        // envoyer des données du Controller => la vue 
        $data = [
            "nom" => "Alain" ,
            "age" => 20 ,
            "competences" => ["PHP" , "JS" , "Symfony"]
        ];
        return $this->render("front/etudiant.html.twig", $data) ; 
    }

    #[Route("/formation", name:"page_formation")]
    public function formation(){
        $data = [
            "nom" => "DWWM",
            "duree" => 6 ,
            "unite" => "mois",
            "modules" => ["html", "css", "php" , "symfony", "js"],
            "dt_debut" => "1er Septembre 2024"
        ];
        return $this->render("front/formation.html.twig", $data);
    }

}
