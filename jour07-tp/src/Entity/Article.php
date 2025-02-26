<?php 

namespace App\Entity ;

use Doctrine\ORM\Mapping as ORM ;

// symfony console make:entity 

#[ORM\Entity()]
#[ORM\HasLifecycleCallbacks] // exécute des traitement AVANT / APRES la création de l'objet
class Article{

    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null ;

    #[ORM\Column(length:255)]
    private ?string $titre = null ;

    #[ORM\Column(length:255)]
    private ?string $url_img = null ;

    #[ORM\Column(type: "text")]
    private ?string $description = null ;

    #[ORM\Column(options:["default" => 1 , "unsigned" => true])]
    private ?int $duree = null ;

    #[ORM\Column(length:255)]
    private ?string $auteur = null ;

    #[ORM\Column()]
    private ?\DateTime $dt_creation = null ;
    
    // je veux QUE avant le persist DOCTRINE donne une valeur à la propriété dt_creation
    // $em->persist($objet)

    // https://symfony.com/doc/current/doctrine/events.html
    // Cycle de Vie / Doctrine 
    // effectuer / exécuter des traitements 
    // PrePersist/PostPersist, PreUpdate/PostUpdate
    //    INSERT                     UPDATE

    #[ORM\PrePersist]
    public function dtCreationMaintenant(){
        // si je veux donner une valeur par défaut à la clé $dt_creation
        $this->dt_creation = new \DateTime(); 
    }
    
}
