# cet après midi

1. faire des pages avec un peu de css 
2. bootstrap / tailwind / foundation / Bulma / milligram (https://milligram.io/)
3. ajouter des images (logo)
4. barre de menu / liens cliquables
5. ajouter du javascript (utiliser des composants bootstrap qui utilisent js) 
6. page variable (paramètre d'url)

---------------------

=> base de données => (demain)

------------------

Créer un nouveau controller 

BoutiqueController.php

------------------

# cas pratique 

- ajouter un nouvelle méthode dans le controller BoutiqueController qui s'appelle "panier"
- cette méthode appelée via l'adresse internet http://127.0.0.1:8000/panier
- cette méthode exécute le fichier de vue boutique/panier.html.twig
- ET elle envoie les données suivantes 

```php 
$data = [
    "panier" => [
        [ "id" => 2 , "nom" => "PS5" , "prix" => 500    ],
        [ "id" => 3 , "nom" => "NintendoDS" , "prix" => 300 ]
    ]
];
```

- le fichier de vue  panier.html.twig contient une structure de page html et dans la balise body :


```html
<h1>votre Panier</h1>

<table class="table table-striped">
    <thead>
        <tr>
            <th>#id</th>
            <th>nom</th>
            <th>prix</th>
            <th>action</th>
        </tr>    
    </thead>
    <tbody>
        <tr>
            <td>2</td>
            <td>PS5</td>
            <td>500 €</td>
            <td>modifier</td>
        </tr> 
        <tr>
            <td>3</td>
            <td>NintendoDS</td>
            <td>300 €</td>
            <td>modifier</td>
        </tr>
    </tbody>
<table>
```
 - cette page utiliser le modèle 'front.html.twig' pour importer bootstrap
 - ajouter dans la barre de menu le lien vers la page "panier" 