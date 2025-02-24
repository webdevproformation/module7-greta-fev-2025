<?php 

namespace App\Entity ;

use Doctrine\ORM\Mapping as ORM ;

#[ORM\Entity()]
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
}