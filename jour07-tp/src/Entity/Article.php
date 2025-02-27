<?php 

namespace App\Entity ;

use App\Repository\ArticleRepository;
use Doctrine\ORM\Mapping as ORM ;

// symfony console make:entity 

#[ORM\Entity( repositoryClass:ArticleRepository::class )]
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

    #[ORM\Column]
    private ?float $prix = null;
    
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
    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of titre
     */ 
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of titre
     *
     * @return  self
     */ 
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of url_img
     */ 
    public function getUrlImg()
    {
        return $this->url_img;
    }

    /**
     * Set the value of url_img
     *
     * @return  self
     */ 
    public function setUrlImg($url_img)
    {
        $this->url_img = $url_img;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of auteur
     */ 
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Set the value of auteur
     *
     * @return  self
     */ 
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get the value of dt_creation
     */ 
    public function getDtCreation()
    {
        return $this->dt_creation;
    }

    /**
     * Set the value of dt_creation
     *
     * @return  self
     */ 
    public function setDtCreation($dt_creation)
    {
        $this->dt_creation = $dt_creation;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }
}
