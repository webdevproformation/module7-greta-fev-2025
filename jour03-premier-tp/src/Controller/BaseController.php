<?php 

namespace App\Controller ;

use DateTime ;
use App\Entity\Pays;
use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController{

    // https://127.0.0.1:8001/ajouter-pays
    #[Route("/ajouter-pays" , name:"page_ajouter_pays")]
    public function ajouterPays(
        EntityManagerInterface $em
    ){
        $pays = new Pays(); // utiliser l'entité Pays 
        $pays->setNom("France")
             ->setCapitale("Paris")
             ->setPopulation(60_000_000)
             ->setDtCreation(new DateTime());
        
        $em->persist($pays); // effecter l'INSERT en base de données 
        $em->flush(); 

        return new Response("le pays est bien créé") ;
    }


    // https://127.0.0.1:8001/ajouter-etudiant
    #[Route("/ajouter-etudiant" , name:"page_ajouter_etudiant")]
    public function ajouterEtudiant(
        EntityManagerInterface $em
    ){
        $etudiant = new Etudiant();
        $etudiant->setPrenom("Alain")
                 ->setNom("DUPONT")
                 ->setAge(1)
                 ->setDtNaissance(new DateTime('2025-01-01'))
                 ->setIsAdmin(TRUE)
                 ->setTelephone("0606060660");

        $em->persist($etudiant);
        $em->flush();

        return new Response("fin exo création profil étudiant");
    }
    // https://127.0.0.1:8001/update-etudiant
    #[Route("/update-etudiant" , name : "page_update_etudiant")]
    public function updateEtudiant(
        EtudiantRepository $etudiantRepository,
        EntityManagerInterface $em
    ){
        // rechercher l'étudiant qui a l'id 2
        $etudiant = $etudiantRepository->findOneBy(["id" => 2]);

        if(empty($etudiant)){
            return new Response("aucun étudiant trouvé");
        }   

        $etudiant->setPrenom("Zorro")
                 ->setNom("Dufour");

        $em->persist($etudiant);
        $em->flush();
        return new Response("etudiant numéro 2 mis à jour"); 
    }

    // https://127.0.0.1:8001/delete-etudiant
    #[Route("/delete-etudiant" , name : "page_delete_etudiant")]
    public function deleteEtudiant(
        EtudiantRepository $etudiantRepository,
        EntityManagerInterface $em
    ){
        // rechercher l'étudiant qui a l'id 1
        $etudiant = $etudiantRepository->findOneBy(["id" => 1]);
        // SELECT * FROM etudiant WHERE id = 1  = $etudiant

        if(empty($etudiant)){
            return new Response("aucun étudiant trouvé");
        }

        $em->remove($etudiant);
        $em->flush();
        // DELETE FROM etudiant WHERE id = 1

        return new Response("l'étudiant numéro 1 vient d'être supprimé"); 
    }

    // https://127.0.0.1:8001/all-etudiant
    #[Route("/all-etudiant" , name:"page_all_etudiant")]
    public function allEtudiant(
        EtudiantRepository $etudiantRepository
    ){
        $etudiants = $etudiantRepository->findAll(); 
        // SELECT * FROM etudiants 
        return $this->render("base/etudiant.html.twig", [ "etudiants" => $etudiants ]);
    }

}