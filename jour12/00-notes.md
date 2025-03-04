# créer un controller Spécial pour la page d'accueil

1. création du controller en ligne de commande

```sh
symfony console make:controller 
=> FrontController
```

2. créer un dossier "Front" dans Controller 
3. déplacer le fichier FrontController => ce dossier
4. modifier le namespace du controller => `namespace App\Controller\Front;`
5. 