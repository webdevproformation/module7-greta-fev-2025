<?php 

require_once "02-Etudiant.php";
require_once "03-Etudiant.php" ; 
require_once "04-Etudiant.php" ; 

use App\Model\Lib\Factory\Etudiant As Etudiant1; 
use B\Etudiant As Etudiant2;  // renommer à la volé ( dans le fichier les class )

$e = new A\Etudiant() ; // la class Etudiant de l'espace de nommage A 
$e2 = new Etudiant2() ; // la class Etudiant de l'espace de nommage B
$e3 = new App\Model\Lib\Factory\Etudiant() ;  // Fully Qualified Class Name FQCN 
$e4 = new Etudiant1() ;  

// cd jour02
// php 02-index.php

//PHP Fatal error:  Cannot declare class Etudiant, because the name is already in use in C:\Users\harri\Desktop\module7\jour02\03-Etudiant.php on line 3

//Fatal error: Cannot declare class Etudiant, because the name is already in use in C:\Users\harri\Desktop\module7\jour02\03-Etudiant.php on line 3

// solution avec namespace !! juste après la pause => 14h00 bon appétit