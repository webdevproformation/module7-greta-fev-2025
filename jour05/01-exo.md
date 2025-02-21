# cas pratique 

- créer nouveau controller BackController
- ajouter un nouvelle méthode dans le controller BackController qui s'appelle "dashboard"
- cette méthode appelée via l'adresse internet http://127.0.0.1:8000/dashboard
- cette méthode exécute le fichier de vue back/dashboard.html.twig
- ET elle envoie les données suivantes 

```php 
$data = [
    "user" => [
        "nom" => "Alain",
        "role" => "admin",
        "dt_connexion" => "21 Février 2025"
    ],
    "session" => [
        [ "id" => 1 , "nom" => "PS4" , "prix" => 200    ],
        [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
    ]
];
```

- le fichier de vue  dashboard.html.twig contient une structure de page html et dans la balise body :


```html
<h1>Bienvenue Alain</h1>

<p>vous êtes admin et vous vous êtes connecté le 21 Février 2025</p>    

<h2>liste des produits en session</h2>
<ul>
    <li>produit : PS4 - id : 1 - prixTTC : 200</li>
    <li>produit : NintendoDS - id : 3 - prixTTC : 300</li>
</ul>
```
 - cette page utiliser le modèle 'front.html.twig' pour importer bootstrap
 - ajouter dans la barre de menu le lien vers la page "dashboard"
 - tester cette page  
 - 


## cas pratique

- ajouter un nouvelle méthode dans le controller BackController qui s'appelle "gestionUsers"
- cette méthode appelée via l'adresse internet http://127.0.0.1:8000/gestion-users/{id}
- cette méthode exécute le fichier de vue back/user.html.twig (si l'utilisateur existe)
- ou cette méthode exécute le fichier de vue back/404.html.twig (si l'utilisateur n'existe pas )
- ET elle envoie les données suivantes 

```php 
$data = [
    "users" => [
       [ id => 1 , nom => "ALain" , age => 22 , role => admin ],
       [ id => 2 , nom => "Céline" , age => 45 , role => rédacteur ],
       [ id => 3 , nom => "Zorro" , age => 18 , role => rédacteur ],
    ]
];
```

- le fichier de vue  user.html.twig contient une structure de page html et dans la balise body :


```html
<h1>Fiche de ALain</h1>

<p>il est admin et il est agé de 22 ans</p>    
```
 - cette page utiliser le modèle 'front.html.twig' pour importer bootstrap
 - ajouter dans la barre de menu le lien vers la page qui permet d'afficher chaque fiche 
 - tester ces pages