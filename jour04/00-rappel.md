# rappel

## installé et démarré notre premier projet Symfony 


1. lancer un terminal
2. saisit les commandes suivantes :

```sh
symfony new <nom_projet> --webapp 
# installer (télécharger) moi symfony version site internet 
# le coeur de symfony + plein de modules / composants pour faire un site internet
# commande elle prend 40 secondes - 1 minute
cd <nom_projet>
# se positionner dans le dossier racine du projet 
symfony serve
# lancer le serveur de développement interne de symfony
```

3. l'adresse internet du projet <http://127.0.0.1:8000> 

# quelques commandes à connaître sur Symfony 

```sh
symfony serve # démarre le serveur de développement
symfony serve:start # la même commande 
symfony serve -d # démarrer le serveur en mode détaché 

symfony serve:stop # stopper le serveur 

# si le serveur symfony ne fonctionne pas alors on utilise le serveur interne de PHP
 # démarre le serveur de développement PHP  
php -S localhost:8000  -t public
```

# commencer à travailler sur Symfony 

- ça doit vous rappeler le projet Recette de cuisine 
- index.php => public/index.php (le point d'entrée de notre application)
- Controller => src/Controller créer un fichier `QuelqueChoseController.php`
- Attention le nom du fichier des controller DOIT se finir par Controller 

```php 
<?php 
namespace App\Controller ; // ESSENTIEL pour que symfony TROUVE ce fichier et le charge correctement 

class QuelqueChoseController {

    // si j'appelle l'adresse http://127.0.0.1:8000/contact
    #[Route("/contact" , name:"page_contact")]
    public function contact(){
        // 1 méthode par page de votre site internet 
        // OBLIGATOIREMENT une méthode de Controller DOIT retourner une Response (HTTP)
        return new Response("un petit texte"); 
    }
}
```

## cas pratique 

- dans le controller HomeController ajouter une nouvelle méthode "contact"
- cette méthode est accessible via l'adresse http://127.0.0.1:8000/contact
- la méthode doit retourner le texte suivant : "je suis la page de contact !!!!"
- tester que tout fonctionne 
- ne pas hésiter à me partager sur le discord en message privé 