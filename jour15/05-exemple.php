<?php 

require_once "04-exemple.php" ; 

$traitement = "App\Blabla\Controller\Toto" ; 

$objet = new $traitement();

var_dump($objet); 