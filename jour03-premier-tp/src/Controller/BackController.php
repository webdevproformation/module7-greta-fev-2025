<?php 

namespace App\Controller ;

use App\Entity\Etudiant;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    #[Route("/gestion-users/{id}" , name:"page_gestion_users")]
    public function gestionUser( Request $request ){
        $data = [
            "users" => [
               [ "id" => 1 , "nom" => "ALain" , "age" => 22 , "role" => "admin" ],
               [ "id" => 2 , "nom" => "Céline" , "age" => 45 , "role" => "rédacteur" ],
               [ "id" => 3 , "nom" => "Zorro" , "age" => 18 , "role" => "rédacteur" ],
            ]
        ];
        $id = $request->attributes->get("id"); // $_GET
        $resultat = [];
        foreach($data["users"] as $user){
            if($user["id"] == $id){
                $resultat[] = $user ;
            }
        }
        if(count($resultat) === 0){
            return $this->render("back/404.html.twig");
        }   
        return $this->render("back/users.html.twig" , $resultat[0]);
    }

    #[Route("/inscription" , name:"page_inscription")]
    public function inscription( Request $request){

        dump($request->request->get("email")); // $_POST["email"]


        return $this->render("back/inscription.html.twig"); 
    }

    // http://127.0.0.1:8000/add-9-etudiant
    #[Route("/add-9-etudiant" , name : "page_9_etudiant")]
    public function add9Etudiants (
        EntityManagerInterface $em
    ){

        $prenom = ["Alain" , "Pierre" , "Julien" , "Céline"];
        $nom = ["DUPONT" , "DUFOUR" , "DUPIEU" , "DUPRES"];

        for($i = 1 ; $i < 10; $i++){
            shuffle($prenom );
            shuffle($nom );
            $etudiant = new Etudiant();
            $etudiant->setPrenom($prenom[0])
                     ->setNom($nom [0])
                     ->setTelephone("060606060$i")
                     ->setDtNaissance(new DateTime("2024-01-0$i"))
                     ->setIsAdmin(TRUE)
                     ->setAge($i);
            $em->persist($etudiant);
        }
        $em->flush();
        return new Response("9 étudiants viennent d'être créés");

    }

}