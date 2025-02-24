<?php 

namespace App\Entity ;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapping as ORM ;

#[ORM\Entity(repositoryClass:EtudiantRepository::class)]
class Etudiant{

    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null ;

    #[ORM\Column(length:255)]
    private ?string $prenom = null ;

    #[ORM\Column(length:255)]
    private ?string $nom = null ;

    #[ORM\Column(options:["default" => 10 , "unsigned" => true ] , type:"smallint")]
    private ?int $age = null ;

    #[ORM\Column()]
    private ?\DateTime $dt_naissance = null ;

    #[ORM\Column()]
    private ?bool $is_admin = null ; 

    #[ORM\Column(length:20)]
    private ?string $telephone = null ;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of dt_naissance
     */ 
    public function getDtNaissance()
    {
        return $this->dt_naissance;
    }

    /**
     * Set the value of dt_naissance
     *
     * @return  self
     */ 
    public function setDtNaissance($dt_naissance)
    {
        $this->dt_naissance = $dt_naissance;

        return $this;
    }

    /**
     * Get the value of is_admin
     */ 
    public function isAdmin()
    {
        return $this->is_admin;
    }

    /**
     * Set the value of is_admin
     *
     * @return  self
     */ 
    public function setIsAdmin($is_admin)
    {
        $this->is_admin = $is_admin;

        return $this;
    }

    /**
     * Get the value of telephone
     */ 
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     *
     * @return  self
     */ 
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }
}