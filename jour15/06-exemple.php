<?php 

require_once "04-exemple.php" ; 

use App\Blabla\Controller\Toto ; 


$traitement = Toto::class ;  // App\Blabla\Controller\Toto
                             //  FQCN (Fully Qualified Class Name) 

$objet = new $traitement();

var_dump($objet); 