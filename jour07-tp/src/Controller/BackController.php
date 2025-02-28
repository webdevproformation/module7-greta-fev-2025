<?php 

namespace App\Controller ;

use App\Entity\User;
use App\Form\UserType;
use App\Entity\Article;
use App\Entity\Etudiant;
use App\Form\ArticleType;
use App\Form\EtudiantType;
use Doctrine\ORM\EntityManager;
use App\Repository\UserRepository;
use App\Repository\ArticleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BackController extends AbstractController{

    // https://127.0.0.1:8001/remplir-article
    #[Route("/remplir-article" )]
    public function remplirArticle(
        EntityManagerInterface $em
    ){
        $auteurs = ["Alain" , "Céline" , "Julien" , "Mohamed" , "Sarah"];
        for($i = 1 ; $i < 6 ; $i++){
           shuffle($auteurs);
           $article =  new Article();
           $article->setTitre("titre article $i")
                   ->setDescription("Lorem ipsum description article $i")
                   ->setDuree( random_int(10, 60) )
                   ->setUrlImg("https://picsum.photos/200/300")
                   ->setAuteur($auteurs[0])
    
                // étant donné que l'on mis en place une date par défaut via #[ORM\PrePersist] => ne pas mettre la date de création
                   ;
            $em->persist($article);
        }
        $em->flush();
        return new Response("création réussie de 5 articles ");
    }

    // Route()
    // /gestion-articles => ça va dans la barre d'adresse
    // name:"page_gestion_article" => la fonction path("page_gestion_article") dans twig
    #[Route("/gestion-articles", name:"page_gestion_article")]
    public function gestionArticles(
        ArticleRepository $articleRepository
    ){
        $articles = $articleRepository->findAll();
        return $this->render("back/gestion-articles.html.twig" , ["articles" => $articles]);
    }

    #[Route("/gestion-articles-delete-{id}", name:"page_delete_article")]
    public function supprimerArticle(
        EntityManagerInterface $em ,
        ArticleRepository $articleRepository ,
        Request $request 
    ){
        $id = $request->attributes->get("id");

        $article = $articleRepository->findOneBy(["id" => $id]);

        if(empty($article)){
            return new Response("Aucun article trouvé !!!");
        }

        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute("page_gestion_article");
    }


    #[Route("/gestion-articles-add" , name:"page_add_article")]
    public function ajouterArticle(
        Request $request, // $_POST
        EntityManagerInterface $em
    ){

        $form = $this->createForm(ArticleType::class); // créer le html du formulaire

        $form->handleRequest($request); // récupérer les valeurs du $_POST

        if($form->isSubmitted() && $form->isValid()){ // verification

            $data = $form->getData(); // voici le contenu de la variable $data => tableau associatif
            /**
             * [
             *  "titre" => "....",
             *  "description" => "....."
             *  "duree" => "....."
             *  "auteur" => "....."
             *  "url_img" => "....." https://placecats.com/300/200
             * ]
             */

            $article = new Article();
            $article->setTitre($data["titre"])
                    ->setDescription($data["description"])
                    ->setAuteur($data["auteur"])
                    ->setDuree($data["duree"])
                    ->setUrlImg($data["url_img"])
                    ->setPrix($data["prix"])
            ;
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");
        }

        return $this->render("back/form_create_article.html.twig" , [ 
            "form" => $form->createView()
            ]
        );
    }

    #[Route("/gestion-articles-update/{id}" , name: "page_update_article")]
    public function miseAJourArticle(
        EntityManagerInterface $em ,
        ArticleRepository $articleRepository ,
        Request $request 
    ){
        // récupérer l'article si il existe 

        $id = $request->attributes->get("id");

        $article = $articleRepository->findOneBy(["id" => $id]); // SELECT * FROM article WHERE id = :id 

        if(empty($article)){
            return new Response("aucune article trouvé");
        }

        // si ok afficher mon formulaire AVEC les données de l'article existant

        $form = $this->createForm(ArticleType::class , $article); // créer un formulaire REMPLI 

        // APRES 
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            // UPDATE
            // dd($article); // $article avec le handleRequest prendre les nouvelles données $_POST
            $em->persist($article);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");

        }


        return $this->render("back/form_update_article.html.twig" , [
            "form" => $form->createView()
        ]);
    }

    #[Route("/gestion-etudiant-add" , name:"page_add_etudiant")]
    public function ajouterEtudiant(
        Request $request,
        EntityManagerInterface $em
    ){
        $form = $this->createForm(EtudiantType::class);

        $form->handleRequest($request);// récupérer les valeurs du $_POST (saisie)

        if($form->isSubmitted() && $form->isValid()){

            // INSERT INTO
            $data = $form->getData();
            $etudiant = new Etudiant();
            $etudiant->setPrenom($data["prenom"])
                     ->setNom($data["nom"])
                     ->setAge($data["age"])
                     ->setDescription($data["description"]);
            $em->persist($etudiant);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");

        }

        return $this->render("back/form_create_etudiant.html.twig", [
            "form" => $form->createView() // => je veux avoir le html 
                                          // <form> ....
        ]);
    }   

    #[Route("/gestion-user-add" , name:"page_add_user")]
    public function ajouterUser(
        EntityManagerInterface $em,
        Request $request 
    )
    {
        $form = $this->createForm(UserType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();

            $user = new User();
            $user->setPrenom($data["prenom"])
                 ->setNom($data["nom"])
                 ->setAge($data["age"])
                 ->setCV($data["cv"])
                 ->setRole($data["role"])
            ;
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("page_gestion_article");

        }

        return $this->render("back/form_create_user.html.twig" , [
            "form" => $form->createView()
        ]);
    }

}