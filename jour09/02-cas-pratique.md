# vous devez créer 

0. dans le projet jour07-tp

1. une nouvelle table qui s'appelle user
 
```sh
# dans le dossier racine du projet
symfony console make:entity

symfony console make:migration

symfony console d:m:m
``` 
 
- cette table contient 5 colonnes 
    - prenom texte maximum de 255 non null
    - nom   texte maximum de 255  non null
    - age   chiffre entier avec un maximum de 255 et par défaut 1
    - cv   text maximum de 65000
    - role  texte maximum de 255 non null

une fois que la table est créé 

2.  vous devez créer un formulaire qui permet d'ajouter des informations dans cette table


=> lorsque vous créer un formulaire en utilisant Symfony

{{ form() }} automatique symfony va ajouter un champ en + dans tous les formulaires 

token CSRF => Cross Site Request Forgery 
champ qui contient une valeur aleatoire qui évite que les scripts de types robots puissent soumettre le formulaire 

