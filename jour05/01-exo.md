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