# Créer l'entité Etudiant

```sh
# attention il faut être dans le dossier racine du projet
vagrant up
vagrant ssh
sudo su 
cd /var/www/html/jour07-tp
symfony console make:entity

=> nom du l'entité => Etudiant
=> turbo => no 

=> boucle 
=> nom du champ => prenom
=> type du champ => string 
=> 255
=> nullable => yes / no 

=> nom du champ => nom
=> type du champ => string 
=> 255
=> nullable => yes / no 

=> nom du champ => age
=> type du champ => string / integer / ?
=> nullable => yes / no 

=> nom du champ => age
=> type du champ => text
=> nullable => yes / no 

```
- générer deux fichiers => src/Entity/Etudiant.php (propriété + getter et setter)
                        => src/Repository/EtudiantRepository.php (le code de base)


```sh
symfony console make:migration
```

```sh
symfony console doctrine:migration:migrate
```