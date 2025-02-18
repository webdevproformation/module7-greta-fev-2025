<?php 

$etudiant = [
    "nom" => "Alain",
    "prenom" => "John DOE",
    "description" => "Formation \n DWWM",
    "cv" => "texte \n avec saut de ligne",
    "age" => 20 ,
    "prix" => 12.5 ,
    "competences"=>  ["PHP","JS","HTML"] ,
    "centre_interets" => ["Jogging" , "Natation" , "Design"],
    "security" => [
        "provider" => "App\Controller\Security.php",
        "env" => [
            "login" => "root",
            "password" => "pa33word",
            "host" => "localhost"
        ]
    ]
];