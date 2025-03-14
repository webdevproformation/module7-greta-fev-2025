<?php 

namespace App\Controller ;

use App\Repository\ArticleRepository;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FrontController extends AbstractController{

    #[Route("/" , name:"page_home")]
    public function accueil(
        ArticleRepository $articleRepository
    )
    {
        $articles = $articleRepository->findAll(); // SELECT * FROM article 

        return $this->render("front/home.html.twig" , [ "articles" => $articles ]);
    }

    #[Route("/presentation" , name:"page_presentation")]
    public function presentation()
    {
        return $this->render("front/presentation.html.twig");
    }

    #[Route("/mention-legale" , name: "page_mention_legale")]
    public function mentionLegale() // camelCase
    { 
        return $this->render("front/mention_legale.html.twig");
    }

    #[Route("/connexion" , name: "page_connexion")]
    public function connexion()
    {
        return $this->render("front/connexion.html.twig");
    }
    
}