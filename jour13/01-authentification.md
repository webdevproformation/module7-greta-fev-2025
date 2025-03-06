# authentification

supprimer l'entité Auteur.php / AuteurRepository.php

cd fils_rouge
symfony console make:user
Auteur


 created: src/Entity/Auteur.php
 created: src/Repository/AuteurRepository.php
 updated: src/Entity/Auteur.php
 updated: config/packages/security.yaml

# créer le formulaire de connexion

symfony console make:security:form-login

 created: src/Controller/SecurityController.php
    login (formulaire de connexion)
    logout (déconnexion)
 created: templates/security/login.html.twig
    template de la page de connexion
    directement un formulaire en html

 updated: config/packages/security.yaml
    liaison entre le formulaire et la base de données 

symfony console make:migration

symfony console doctrine:query:sql  "DELETE FROM commentaire"
symfony console doctrine:query:sql  "DELETE FROM recette"
symfony console doctrine:query:sql  "DELETE FROM auteur"

symfony console d:m:m