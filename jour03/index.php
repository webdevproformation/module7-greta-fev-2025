<?php
// utiliser la librairie que l'on vient de télécharger !! 

// la librairie que l'on vient de télécharger est dans le namespace suivant:
use Symfony\Component\Yaml\Yaml;

require_once "vendor/autoload.php";

// perdre le contenu du fichier
// parcourir
// transformer en tableau 
// rappel parseFile() méthode static de la class Yaml
$data = Yaml::parseFile("exo.yaml");

var_dump($data); 

// php index.php


// cas pratique 
// je vous donne un fichier .yaml

/** 
title: "Decouverte Yml"
articles:
    -
        title: titre 1
        url_img: https://via.placeholder.com/350x150?text=miniature article1
        contenu: >
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
          Ipsa amet sunt debitis adipisci, obcaecati aliquam officiis 
          itaque necessitatibus mollitia, quaerat porro! Deleniti fugit 
          sit veniam nisi quas. Dicta, itaque, iure.
    -
        title: titre 2
        url_img: https://via.placeholder.com/350x150?text=miniature article2
        contenu: >
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
          Ipsa amet sunt debitis adipisci,  Deleniti fugit sit 
          veniam nisi quas. Dicta, itaque, iure.
    -
        title: titre 3
        url_img: https://via.placeholder.com/350x150?text=miniature article3
        contenu: >
          consectetur adipisicing elit. Ipsa amet sunt debitis adipisci, 
          obcaecati aliquam officiis itaque necessitatibus mollitia, 
          quaerat porro! Deleniti fugit sit veniam nisi quas. Dicta, itaque, iure.

*/

// vous devez l'importer dans un fichier 01-page.php
// vous devez afficher dans la console de votre éditeur de texte les valeurs suivantes 
// titre 1
// https://via.placeholder.com/350x150?text=miniature article3
