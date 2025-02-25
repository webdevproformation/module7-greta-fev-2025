## CRUD avec Symfony (Doctrine)

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapper as ORM ;

#[ORM\Entity()]
class Fleur{
    
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null ;

    #[ORM\Column()]
    private ?string $nom = null ;

}
```

1. ajouter des getter et setter sur l'entité

```php
<?php

namespace App\Entity;

use Doctrine\ORM\Mapper as ORM ;

#[ORM\Entity()]
class Fleur{
    
    #[ORM\Id]
    #[ORM\GeneratedValue()]
    #[ORM\Column()]
    private ?int $id = null ;

    #[ORM\Column()]
    private ?string $nom = null ;

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom ;
    }
    public function setNom($valeur){
        $this->nom = $valeur ;
        return $this ; 
    }

}
```
 
1. Créer une autre class Repository 

```php
<?php 

namespace App\Repository ;

use App\Entity\Fleur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class FleurRepository extends ServiceEntityRepository{

    public function __construct( ManagerRegistery $managerRegistery ){
        parent::__construct($managerRegistery , Fleur::class);
    }

}

```

1. Associer Repository à notre entité

```php
<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\ORM\Mapper as ORM ;

#[ORM\Entity(repositoryClass:FleurRepository::class)]
class Fleur{
    // ....
}

```


1. effectuer le CRUD dans des méthodes de nos controlleurs (en utilisant en + EntityManager )


- READ

```php
<?php 

namespace App\Controller ;

class GestionController extends AbstractController{

    #[Route("/" , name:"page_accueil")]
    public function read(
        FleurRepository $fleurRepo
    ){
        $fleurRepo->findAll() ; // SELECT * FROM fleurs 
    }
}

```


- 
- 