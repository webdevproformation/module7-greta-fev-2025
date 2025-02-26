# Enoncé

- par groupe de 2 ou 3 vous allez réaliser le projet suivant 

1. créer un nouveau projet Symfony intitulé jour07-tp

```sh
# pour tout le monde

symfony new jour07-tp --webapp
cd jour07-tp
symfony serve # le terminal ne doit plus être fermé
              # donc si tu dois faire des migrations ou autres commandes tu dois lancer un deuxième terminal 
              # je fais un cd jour07-tp (et c'est dans ce deuxieme terminal que je vais faire toutes les autres commandes )
# dans mon navigateur http://127.0.0.1:8000
```

```sh
# pour Kevin D

vagrant up # lancer la machine virtuelle
vagrant ssh # accéder à la machine virtuelle
sudo su
cd /var/www/html
symfony new jour07-tp
cd jour07-tp
composer require orm
composer require twig
composer require --dev symfony/maker-bundle

vim /etc/apache/site-enabled/000-site.conf # ??
# modification
/etc/init.d/apache2 restart
# dans mon navigateur http://192.168.11.52
```
 
1. vous devez réaliser une site internet de type blog avec les pages suivantes :
    1. page d'accueil => affiche tous les articles de la table articles
    2. page de présentation => qui présente le groupe qui crée ce site
    3. page mention légale => page contenant les conditions d'utilisation du site 
    4. page de connexion => page qui contient un formulaire avec deux champs : login / password (pour l'instant ce n'est que du HTML)

```php
<?php 
// créer un nouveau controller dans le dossier src/Controller
// FrontController.php => OBLIGATOIRE (norme de nommage PascalCase)
// pas d'espace / pas de tiret bas _ 
// mettre une Majuscule pour chaque mot qui compose le nom du controller

// pour le namespace 
namespace App\Controller ; # respecter ce nommage OBLIGATOIREMENT 
// app\controller => pas bon
// APP\Controller => pas bon

// Attention le nom de la class doit être identique au nom du fichier 

class FrontController
// pas comme ça => class frontcontroller 

// -------- autant de méthode que l'on a de pages à créer dans notre site 

```


2. ce site internet utilise une base de données Sqlite contenant 1 table "articles"

1. creer la base
```txt
- modifier le fichier .env
- activer le lien pour la base sqlite 
- DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"
``` 

```sh
cd jour07-tp
symfony console doctrine:database:create  # version longue de la commande
symfony console d:d:c # version courte de la commande 
```

```sh
# pour Kevin D
vagrant up # lancer la machine virtuelle
vagrant ssh # accéder à la machine virtuelle
sudo su
cd /var/www/html/jour07-tp
symfony console d:d:c
```

1. cette table contient les colonnes suivantes 
    1. id INT Primary Key Autoincrément
    2. titre texte avec un max de 255 caractères
    3. url_img texte avec un max de 255 caractères
    4. description texte de 65 000 caractères
    5. duree chiffre entier strictement supérieur à 0 et sa valeur par défaut est 1
    6. auteur texte avec un max de 255 caractères
    7. dt_creation DATETIME avec la date de maintenant par défaut 

2. créer la table 

```php 
<?php 

namespace App\Entity ;

class Article{

    private ...

}
```

```sh
symfony console make:migration
symfony console doctrine:migrations:migrate
symfony console d:m:m
```

```sh
# pour Kevin D
vagrant up # lancer la machine virtuelle si nécessaire
vagrant ssh # accéder à la machine virtuelle si nécessaire
sudo su
cd /var/www/html/jour07-tp
symfony console make:migration
symfony console doctrine:migrations:migrate
symfony console d:m:m
```


3. insérer des données  
(deux techniques possibles)

// solution 1 créer un script sql à la main
// dans var/remplir.sql

```sql
INSERT INTO article 
( titre , url_img , description , duree , auteur , dt_creation )
VALUES
( 'article 2' , 'https://picsum.photos/200/300' , 'lorem ipsum de description' , 20 , 'Alain' , '2025-02-26 10:00:00' ),
( 'article 3' , 'https://picsum.photos/200/300' , 'lorem ipsum de description' , 15 , 'Alain' , '2025-02-26 10:00:00' ),
( 'article 1' , 'https://picsum.photos/200/300' , 'lorem ipsum de description' , 10 , 'Alain' , '2025-02-26 10:00:00' ),
( 'article 4' , 'https://picsum.photos/200/300' , 'lorem ipsum de description' , 30 , 'Zorro' , '2025-02-26 10:00:00' ),
( 'article 5' , 'https://picsum.photos/200/300' , 'lorem ipsum de description' , 60 , 'Zorro' , '2025-02-26 10:00:00' )
```


// ajouter des setter et getter dans l'entité => OK
// créer le repository => OK
// associer le repository avec l'entité  => OK 
// créer une méthode dans un controller qui va avoir une méthode spéciale dont le rôle va être d'utiliser Doctrine pour INSERER des données dans la table !!

```sh
symfony console make:migration
php bin/console make:migration # ancienne manière de faire (qui fonctionne ENCORE) si tu n'as pas installé symfony-cli 
```


Pour la création des articles utiliser SQL et SQLite pour créer 10 articles avec le contenu de votre choix 

4. remplir la page d'accueil de mon site internet




Vous avez carte blanche pour la mise en page du site internet 

(Bonus)
4. mettre en place une page "admin" dans laquelle vous avez la possibilité de supprimer un article via son id  