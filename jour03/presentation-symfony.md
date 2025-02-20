symfony new jour03-premier --webapp 

dans le dossier jour03-premier

Symfony => Framework = code + Manière de travailler 

plusieurs dossiers :
assets/ => tous les fichiers .js / .css / .scss qui sont compilés avec webpack (bundle)
bin/ => script que l'on peut exécuter en ligne de commande dans le terminal
    - console
    - phpunit 

config/ => dossier qui contient des fichiers de configurations 
        => fichier qui décrivent COMMENT les modules / composants de symfony doivent fonctionner 
        => plein de fichiers .yaml 

migrations/ => dossier qui contient des scripts qui vont décrire la structure des 
            => tables dans notre base de données 

public/ => tous les fichiers .js / .css / image / pdf ... SANS compilation 

src/ => LE DOSSIER DANS LEQUEL VOUS ALLEZ PASSER 95% DE VOTRE TEMPS DANS UN PROJET 
        SYMFONY  
        Controller
        Model
        Formulaire
        Service 
        DataFixtures ...

templates/ => fichiers de vue => fichier dans lesquelles vous avez twig + html
        fichier l'extension .html.twig  

tests/ => stocker des fichiers de test => code qui permet de tester votre code 
        => qui utiliser notamment une librairie PHP qui s'appelle PHPUnit 
        => avec lequel on peut faire des tests unitaires / test intégration ...


translations/ => dossier qui contient les fichiers de traductions 

var/ => dossier qui contient les fichiers "variables" / notamment le cache 

vendor/ => dossier qui vient avec composer qui est énorme (beaucoup beaucoup de code)
        => ici que vous avez le code source de Symfony et de tous les librairies dont le framework dépend 

plusieurs fichiers :
.env en 3 versions => .env (fichier d'environnement mettre les informations propres à l'environnement d'exécution du projet => adresse de la base de données / information sur l'environnement ...)
.gitignore => vient avec git tous les fichiers / dossier que l'on ne veut pas partager
compose.yaml (Docker) => créer une base de données via docker (postgres)
composer.json => vient avec composer (lui contient la liste complète de tous les modules installés dans votre projet Symfony)
importmap.php => fichier qui permet d'importer des fichiers js / css ... assets => public
phpunit => fichier de configuration de PHPUnit
symfony.lock => informations sur l'installation de votre projet Symfony 

# pause rdv 15h50 => commencer à utiliser Symfony 


=> il faut regarder le contenu du fichier package.json pour connaitre la version que vous avez 
=> attention la version dépendre de la version de PHP 
=> c'est normal de ne pas voir la dernière version pour chaque module 
=> IL FAUT QUE LES MODULES SOIENT COMPATIBLES avec votre version de PHP 

=> lancer une serveur local pour faire fonctionner notre Symfony
=> `symfony serve`
=> http://127.0.0.1:8000

attrib -r var\*.* /s
attrib -s -h -r "var\*.*" /s /d


// Recette de cuisine =>  index.php 
// dans le projet Symfony/public/index.php (point d'entrée)
// pas besoin de le toucher !!!! 

// etape 2 => Recette de cuisine =>  Controller 
=> src/Controller => 