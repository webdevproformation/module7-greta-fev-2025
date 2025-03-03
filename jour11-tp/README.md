# installer Symfony 

```sh
symfony new jour11-tp --webapp
```

## lancer le serveur de développement

```sh
cd jour11-tp
symfony serve
```

## créer la base de données 

-  modifier le fichier .env
- commande

```sh
cd jour11-tp
symfony console doctrine:database:create
```

## créer les tables 

- il faut créer des entités SANS relation 

Auteur 
- id PK
- email 
- prenom
- nom

```sh
symfony console make:entity 
```

Recette 
- id PK
- titre 
- description
- prix (int au début puis enfait je vais faire chiffre à virgule)
- dt_creation (...._at)


Email
- id PK
- email
- sujet
- message
- dt_creation


- il faut modifier les entités existantes en leur ajoutant les relations 


entre les Recettes et Auteurs 

Auteur peut rédiger PLUSIEURS recettes
UNE recette est rédigée par 1 et 1 SEUL AUTEUR

=> la table recette qui doit contenir la clé étrangère (Owner de la relation)
=> ManyToOne

## créer les tables

```sh
symfony console make:migration
symfony console doctrine:migrations:migrate
```

## CRUD 

```sh
symfony console make:crud
```