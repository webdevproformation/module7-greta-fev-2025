<?php

namespace App\Controller\Front;

use App\Repository\RecetteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontController extends AbstractController
{
    //https://127.0.0.1:8001/
    //https://127.0.0.1:8001/index.html.twig => NON !!! 
    #[Route('/', name: 'page_home')]
    public function index(
        RecetteRepository $recetteRepository,
        Request $request 
    ): Response
    {
        $trie = $request->query->get("trie", "desc");

        return $this->render('front/index.html.twig', [
           "recettes" => $recetteRepository->findWithCommentaireBy($trie),
           "trie" => $trie == "desc" ? "asc" : "desc"
        ]);
    }
}
