<?php

use Symfony\Component\Yaml\Yaml;

require_once "vendor/autoload.php";

$toto  = Yaml::parseFile("articles.yaml");

// var_dump($contenu); 

echo $toto["articles"][0]["title"]; 
echo "\n"; // saut de ligne dans un terminal 
echo $toto["articles"][2]["url_img"] ; 

// exécuter le fichier via
// php 01-page.php

// télécharger des librairies sur packagist => TRESOR 