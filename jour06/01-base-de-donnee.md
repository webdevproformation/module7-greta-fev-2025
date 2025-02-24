# Doctrine 

- projet PHP open source 
- support de cours => regarder le chapitre Entité / Manipuler des Entités

- site officiel du projet <https://www.doctrine-project.org/>
- Doctrine est un GROS PROJET nous allons utiliser des sous projets 
- Migration 
- Persistance
- DAL => Database Abstraction Layer 
- ... 

- Doctrine est un projet livré dans Symfony par défaut 
- Symfony contribue à ce projet 
- Symfony et Doctrine sont deux projets qui peuvent vivre en parallèles ou ensemble 
- si vous allez regarder le fichier `composer.json` vous devez voir des mentions à la librairie 

# si je veux discuter avec une base de données 

1. il faut se connecter !!! 
2. il faut aller dans le fichier `.env`
    1. décommente `DATABASE_URL="sqlite:///%kernel.project_dir%/var/data.db"`
    2. mettre en # devant DATABASE_URL="postgresql://app:!ChangeMe!@127.0.0.1:5432/app?serverVersion=16&charset=utf8"
    3. je veux que mon projet fonctionne que une base de données SQLITE 
    4. ET notre future base de donnée s'appelera "data.db" et elle se situera dans le dossier `var`

2. créer la base de donnée 
    1. il est possible d'utiliser des lignes de commande pour créer la base de données
    2. ATTENTION la commande doit être exécuter DANS le dossier jour03-premier
    1. cd jour03-premier-tp
    1. sudo apt install php-sqlite3 (uniquement pour les étudiants sur Linux)
    1. symfony console doctrine:database:create 
    1. symfony console d:d:c

3. créer un table qui s'appelle Pays
    1. id PK INT AUTOINCREMENT
    1. nom VARCHAR(255)
    1. population INT 
    1. capitale VARCHAR(255)
    1. dt_creation DATE (annee mois jour)

- lors du module 5 de la formation :

CREATE TABLE IF NOT EXISTS pays (
    
)

- lors du module 7 de la formation (via Doctrine) 

=> Entité (class)
=> Migration (class)
=> Vraiment créer la table

## créer l'entité

=> src/Entity => créer un fichier Pays.php

## créer ma migration 

ATTENTION la commande doit être exécuter DANS le dossier jour03-premier
`symfony console make:migration`


 created: migrations/Version20250224104713.php
  Success! 
 Review the new migration then run it with symfony.exe console doctrine:migrations:migrate  
 See https://symfony.com/doc/current/bundles/DoctrineMigrationsBundle/index.html

si vous avez oublié une colonne / si vous voulez préciser des caractéristiques supplémentaires sur une colonne 
=> modifier l'Entité
=> supprimer la migration
=> regénérer la migration via la commande `symfony console make:migration`


## Maintenant il ne reste plus qu'à exécuter la migration 

ATTENTION la commande doit être exécuter DANS le dossier jour03-premier
symfony console doctrine:migrations:migrate
symfony console d:m:m


[notice] Migrating up to DoctrineMigrations\Version20250224105748
[notice] finished in 475.8ms, used 24M memory, 1 migrations executed, 5 sql queries     
                                                                                        
 [OK] Successfully migrated to version: DoctrineMigrations\Version20250224105748  