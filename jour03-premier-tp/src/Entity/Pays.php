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

}