# ajouter de lignes dans notre table 

juste avec SQL 

INSERT INTO 

------------

sur Doctrine 

=> 1 Modifier notre Entite => setter / getter 
=> 2 Ajouter une nouvelle Route / methode dans un controller
    - créer une instance de notre entité
    - lui ajouter des valeurs
    - et utiliser EntityManager => Persister notre instance en base de données

symfony console make:migration
symfony console d:m:m

-------

## cas pratique

pour l'entité Etudiant 
1 ajouter les setter et getter pour chaque propriété
2 créer une nouvelle route ajouter_etudiant accessible depuis l'adresse suivante :
=> https://127.0.0.1:8001/ajouter-etudiant qui va permettre d

3 Insérer en base données le profil étudiant suivant  :

prenom => Alain
nom => DUPONT
age 1
dt_naissance le 1er Janvier 2025
is_admin VRAI
telephone 0606060660



symfony console make:migration
symfony console d:m:m
