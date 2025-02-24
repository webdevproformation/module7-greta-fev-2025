# CRUD

C => INSERT 

UPDATE => modifier une ou plusieurs lignes existantes en base de données

## Repository 

je souhaite modifier un profil etudiant insérer en base de données 

UPDATE etudiant SET .... WHERE id = 1 

1 créer un EtudiantRepository 
2 liaison entre Entity Etudiant ET EtudiantRepository
3 dans le controller vous devez 
    // recherche via $etudiantRepository->findOneBy(["id" => 2]);
    // setter pour modifier la valeur
    // $em->persist() 
    // $em->flush()

------------------

DELETE

DELETE FROM etudiant WHERE id = 1


1 créer un EtudiantRepository 
2 liaison entre Entity Etudiant ET EtudiantRepository
3 dans le controller vous devez 
    // recherche via $etudiantRepository->findOneBy(["id" => 2]);
    // $em->remove() 
    // $em->flush()



READ  

