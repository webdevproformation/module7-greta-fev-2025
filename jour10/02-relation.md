# Relation 

=> relier des tables => découper les informations d'un projet en plusieurs tables au lieu d'en avoir 1 seule énorme 


=> Article
id PK 
titre
description

entre ces deux tables => NN      => ManyToMany 
                                 => 1 article rédigé par plusieurs étudiants
                                 => 1 étudiant peut rédiger plusieurs articles 
                                 (table intermédiaire entre les 2 tables)

                         1N - N1 => OneToMany ManyToOne
                                 => 1 article ne peut avoir qu'un 1 seul etudiant comme auteur
                                 => 1 etudiant peut rédiger plusieurs articles
                                (clé étrangère sur la table du côté N)

                         11      => OneToOne 
                                 => 1 etudiant ne peut rédiger 1 seul article
                                 => 1 article ne peut être rédigé que par 1 seul étudiant
                                (fusion des tables en 1 seule )
                      

=> Etudiant 
id PK
prenom
nom 


Entity 

#[ORM\ManyToMany]
#[ORM\OneToMany]
#[ORM\ManyToOne]
#[ORM\OneToOne]

symfony console make:migration => MPD (Model Physique des Données)
symfony console d:m:m 



------------------------


# enoncé 

je souhaite créer un site internet de type blog => journal de bord

je veux pouvoir gérer 3 concepts :

- article 
- catégorie
- auteur 

## article => table 

id PK
titre 
url_img 
dt_creation 

## catégorie

id PK
nom 

## auteur 

id PK
email 
nom 

### relations entre les tables 

article <=> catégorie (relation OneToMany ManyToOne )
        => une catégorie peut être associée à PLUSIEURS articles
        => article ne peut être associé que à 1 seule catégorie

article <=> auteur  (relation OneToMany ManyToOne )
        => un auteur peut rédiger plusieurs articles 
        => un article ne peut être rédigé que par 1 seul auteur 

## objectifs 

=> créer un projet symfony
=> créer une base de données qui répond à ce besoin
=> créer un espace qui permet à une personne que ne sait pas coder de gérer ces concepts (CRUD)

=> cas pratique 

=> créer le nouveau projet jour10-tp avec Symfony
=> créer une base de données SQLITE 
=> créer la table auteur et la table catégorie

## catégorie

id PK
nom 

## auteur 

id PK
email 
nom 


```sh
# pour Kevin D
vagrant up # lancer la machine virtuelle si nécessaire
vagrant ssh # accéder à la machine virtuelle si nécessaire
sudo su
cd /var/www/html
symfony new jour10-tp
cd jour10-tp
composer require orm
composer require twig
composer require --dev symfony/maker-bundle
```

## table Article


```php
<?php 

namespace App\Entity ;

class Article {

    #[ORM\Column()]
    private ?string $nom = null ;

    #[ORM\ManyToOne()]
    // Many (Plusieurs) Article sont associés à One (1) Categorie
    private ?Categorie $categorie = null ;


    #[ORM\ManyToOne()]
    // Many (Plusieurs) Article sont rédigés par One (1) Auteur 
    private ?Auteur $auteur = null ;
}

```

```php
<?php 

namespace App\Entity ;

class Auteur {

    #[ORM\OneToMany()]
    private Collection $articles  ;

    public function __construct(){
        $this->articles = new ArrayCollection(); 
    }
}

```