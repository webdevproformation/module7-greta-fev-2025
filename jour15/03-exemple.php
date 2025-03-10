<?php 

// tableau indexé
$etudiants = ["Alain", "Céline", "Zorro"];
//             0          1         2

echo "exemple 1\n";

foreach($etudiants as $etudiant){
    echo $etudiant . "\n"; 
}

echo "exemple 2\n";

foreach($etudiants as $key => $etudiant){
    echo $key . " - " .$etudiant . "\n"; 
}

// tableau associatif 

$produit = [
    "nom" => "PS4",
    "prix" => 500,
    "marque" => "Sony"
];

echo "exemple 3\n";

foreach($produit as $info){
    echo $info . "\n"; 
}


echo "exemple 4\n";

foreach($produit as $key => $info){
    echo $key . " - " . $info . "\n"; 
}