<?php 

/* require_once "src/Controller/Back/Dashboard.php";
require_once "src/Model/Bdd.php";
require_once "src/Etudiant.php";
require_once "src/Formation.php";
require_once "src/Cours.php"; */
// à la place de faire plusieurs require_once  1 SEUL SUFFISANT
require_once "vendor/autoload.php"; 


$dash = new App\Controller\Back\Dashboard();
$e = new App\Etudiant();
$c = new App\Cours();
$bdd = new App\Model\Bdd() ; 

// la manière que nous allons utiliser c'est via composer 
// cd jour02-tp
// composer init 
// générer une fichier composer.json ET dossier qui s'appelle vendor