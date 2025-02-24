<?php 

namespace App\Entity ;

use Doctrine\ORM\Mapping as ORM ; // le coeur de Doctrine => Mapper 
// 

#[ORM\Entity()]
class Pays{

    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null ;

    #[ORM\Column(length:255)]
    private ?string $nom = null ;

    #[ORM\Column(options:["default" => 1000])]
    private ?int $population = null ;

    #[ORM\Column(length:255)]
    private ?string $capitale = null ;

    #[ORM\Column()]
    private ?\DateTime $dt_creation = null ; 


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
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
     * Get the value of population
     */ 
    public function getPopulation()
    {
        return $this->population;
    }

    /**
     * Set the value of population
     *
     * @return  self
     */ 
    public function setPopulation($population)
    {
        $this->population = $population;

        return $this;
    }

    /**
     * Get the value of capitale
     */ 
    public function getCapitale()
    {
        return $this->capitale;
    }

    /**
     * Set the value of capitale
     *
     * @return  self
     */ 
    public function setCapitale($capitale)
    {
        $this->capitale = $capitale;

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
}