<?php

namespace App\Controller\Back;

use App\Entity\Recette;
use App\Form\RecetteType;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\CommentaireRepository;
use App\Repository\RecetteRepository;
use DateTimeImmutable;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/recette')]
#[IsGranted("ROLE_USER")]
final class RecetteController extends AbstractController
{
    #[Route(name: 'app_recette_index', methods: ['GET'])]
    public function index(RecetteRepository $recetteRepository): Response
    {

        if(in_array("ROLE_REDACTEUR" ,$this->getUser()->getRoles())){
            /** @var Auteur $auteur */
            $auteur = $this->getUser();
            $recettes = $auteur->getRecettes();
        }else {
            $recettes = $recetteRepository->findAll() ;
        }


        return $this->render('recette/index.html.twig', [
            'recettes' => $recettes 
        ]);
    }

    #[Route('/new', name: 'app_recette_new', methods: ['GET', 'POST'])]
    public function new(
        Request $request, 
        EntityManagerInterface $entityManager ,
        SluggerInterface $slugger,
        #[Autowire('%kernel.project_dir%/public/img')] string $path_dossier_public
    ): Response
    {
        $recette = new Recette();
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var UploadedFile $image */
            $image = $form->get("miniature")->getData();

            if($image){
                $nom_original = pathinfo($image->getClientOriginalName() , PATHINFO_FILENAME);
                $nom_safe = $slugger->slug($nom_original);
                $nom_final = $nom_safe . "-" . uniqid() . "." .$image->guessExtension();
                
                try{
                    $image->move( $path_dossier_public , $nom_final);
                }catch(FileException $f){

                }

                $recette->setImage($nom_final);
            }

            $entityManager->persist($recette);
            $entityManager->flush();

            return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recette/new.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_show', methods: ['GET' , 'POST'])]
    public function show(
        Recette $recette ,
        Request $request ,
        EntityManagerInterface $em ,
        
    ): Response
    {
        $commentaire = new Commentaire();
        $form = $this->createForm(CommentaireType::class , $commentaire , [
            "form_single" => false
        ]);

        $form->handleRequest( $request );

        if($form->isSubmitted() && $form->isValid()){

            $commentaire = $form->getData();
            $commentaire->setDtCreation(new DateTimeImmutable())
                        ->setRecette($recette);

            $em->persist($commentaire);
            $em->flush(); 

            // vider le formulaire 
            $form = $this->createForm(CommentaireType::class , null , [
                "form_single" => false
            ]);

        }

        return $this->render('recette/show.html.twig', [
            'recette' => $recette,
            "commentaires" => $recette->getCommentaires() , 
            "form" => $form->createView()
        ]);
    }

    #[Route('/{id}/edit', name: 'app_recette_edit', methods: ['GET', 'POST'])]
    public function edit(
        Request $request, 
        Recette $recette, 
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger,
        #[Autowire('%kernel.project_dir%/public/img')] string $path_dossier_public
    ): Response
    {
        $form = $this->createForm(RecetteType::class, $recette);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $image = $form->get("miniature")->getData();

            if($image){
                $nom_original = pathinfo($image->getClientOriginalName() , PATHINFO_FILENAME);
                $nom_safe = $slugger->slug($nom_original);
                $nom_final = $nom_safe . "-" . uniqid() . "." .$image->guessExtension();
                
                try{
                    $image->move( $path_dossier_public , $nom_final);
                }catch(FileException $f){

                }

                $recette->setImage($nom_final);
            }


            $entityManager->persist($recette);
            $entityManager->flush();

            return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('recette/edit.html.twig', [
            'recette' => $recette,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_recette_delete', methods: ['POST'])]
    public function delete(Request $request, Recette $recette, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recette->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($recette);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_recette_index', [], Response::HTTP_SEE_OTHER);
    }
}
