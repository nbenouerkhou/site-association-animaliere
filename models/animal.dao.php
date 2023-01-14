<?php
require_once "pdo.php";

function getAnimalFromStatut($idStatut){
    $bdd = connexionPDO();
    $req ='SELECT * 
    FROM animal 
    WHERE id_statut= :idStatut';
    
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(':idStatut',$idStatut,PDO::PARAM_INT);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function getFirstImageAnimal($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT i.id_image,libelle_image,url_image,description_image
    FROM image i
    INNER JOIN contient c ON i.id_image = c.id_image
    INNER JOIN animal a ON a.id_animal = c.id_animal
    WHERE a.id_animal = :idAnimal
    LIMIT 1');
    $stmt->bindValue(':idAnimal',$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $image;
}

function getAnimalFromAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $req ="SELECT * 
    FROM animal 
    WHERE id_animal = :idAnimal";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animal;
}

function getImagesFromAnimalBD($idAnimal){
    $bdd = connexionPDO();
    $stmt = $bdd->prepare('SELECT i.id_image,libelle_image,url_image,description_image
    FROM image i
    INNER JOIN contient c ON i.id_image = c.id_image
    INNER JOIN animal a on a.id_animal = c.id_animal
    WHERE a.id_animal = :idAnimal
    ');
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $images;
}

function getStatutsAnimal(){
    $bdd = connexionPDO();
    $req ="
    SELECT * 
    FROM statut ";
    $stmt = $bdd->prepare($req);
    $stmt->execute();
    $statuts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $statuts;
}


function insertAnimalIntoBD($nom,$dateN,$type,$sexe,$statut,$description){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO animal (nom_animal, date_naissance_animal, type_animal, sexe, id_statut, description_animal)
    values (:nom, :dateN, :type, :sexe, :statut, :description)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
    $stmt->bindValue(":dateN",$dateN,PDO::PARAM_INT);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
    $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
    $stmt->bindValue(":description",$description,PDO::PARAM_STR);
    $stmt->execute();
    $resultat = $bdd->lastInsertId();
    $stmt->closeCursor();
    return $resultat;
}


function insertIntoContient($idImage,$idAnimal){
    $bdd = connexionPDO();
    $req = '
    INSERT INTO contient (id_image, id_animal)
    values(:idImage, :idAnimal)
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idImage",$idImage,PDO::PARAM_INT);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->execute();
    $stmt->closeCursor();
}


function getAnimauxFromTypeAndStatut($idStatut,$type){
    $bdd = connexionPDO();
    $req ="
    SELECT * 
    FROM animal
    where id_statut = :idStatut and type_animal = :type ";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idStatut",$idStatut,PDO::PARAM_INT);
    $stmt->bindValue(":type",$type,PDO::PARAM_STR);
    $stmt->execute();
    $animaux = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    return $animaux;
}

function updateAnimalIntoBD($idAnimal,$nom,$dateN,$typeSaisie,$sexe,$statut,$description){
    $bdd = connexionPDO();
    $req = '
    update animal 
    set nom_animal = :nom, date_naissance_animal = :dateN, type_animal = :type, sexe = :sexe, id_statut = :statut, description_animal = :description
    where id_animal = :idAnimal 
    ';
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $stmt->bindValue(":nom",$nom,PDO::PARAM_STR);
    $stmt->bindValue(":dateN",$dateN,PDO::PARAM_INT);
    $stmt->bindValue(":type",$typeSaisie,PDO::PARAM_STR);
    $stmt->bindValue(":sexe",$sexe,PDO::PARAM_STR);
    $stmt->bindValue(":statut",$statut,PDO::PARAM_INT);
    $stmt->bindValue(":description",$description,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    if($resultat > 0) return true;
    return false;
}

function  deleteAnimalFromBD($idAnimal){
    $bdd = connexionPDO();
    $req ="
    delete FROM animal 
    where id_animal = :idAnimal";
    $stmt = $bdd->prepare($req);
    $stmt->bindValue(":idAnimal",$idAnimal,PDO::PARAM_INT);
    $resultat = $stmt->execute();
    $stmt->closeCursor();
    return $resultat;
    
}