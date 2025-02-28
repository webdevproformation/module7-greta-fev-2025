<?php 

namespace App\Form ;

use App\Entity\Etudiant;
use App\Repository\EtudiantRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType{

    public function __construct(
        private EtudiantRepository $etudiantRepository
    )
    { 
    }

    private function getEtudiants(): array
    {
        $etudiants = $this->etudiantRepository->findAll();
        $resultats = [];
        /** @var Etudiant $etudiant */
        foreach($etudiants as $etudiant){
            $nom_complet = $etudiant->getPrenom() . " " . $etudiant->getNom();
            $resultats[ $nom_complet ] = $nom_complet; 
        }
        return  $resultats; 
    }
    // méthode qui va permettre de créer les champs du formulaire
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add("titre")
                ->add("description", TextareaType::class)
                ->add("auteur" , ChoiceType::class , [
                    "choices" => $this->getEtudiants(),
                    "placeholder" => "choisir un auteur",
                ])
                ->add("duree" , NumberType::class)
                ->add("url_img" , UrlType::class , [
                    "data" => "https://picsum.photos/400/300"
                ])
                ->add("prix" , MoneyType::class)
                ->add("creer" , SubmitType::class)
        ;
    }
}