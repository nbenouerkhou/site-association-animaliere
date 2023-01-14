<?php 
 require_once "public/utile/formatage.php";
 require_once "models/animal.dao.php";
 require_once "models/actualite.dao.php";
 require_once "config/config.php";
function getPagePensionnaires(){
    $title = "Page des pensionnaires";
    $description = "C'est la page des pensionnaires";
    $animaux = getAnimalFromStatut($_GET['idstatut']);

    $titreH1="";
    if((int)$_GET['idstatut'] === ID_STATUT_A_L_ADOPTION)
            $titreH1='Ils cherchent une famille';
    else if((int)$_GET['idstatut'] === ID_STATUT_ADOPTE)
            $titreH1='Les anciens';
    
    foreach($animaux as $key => $animal){
            $image = getFirstImageAnimal($animal['id_animal']);
            $animaux[$key]['image'] = $image;
    }
    require_once "views/front/pensionnaires.view.php";
    
}

 


function getPageAccueil(){
    $title = "Page d'accueil";
    $description = "Association animalière Petshelter";

    $animaux = getAnimalFromStatut(ID_STATUT_A_L_ADOPTION);
    foreach($animaux as $key => $animal){
        $image = getFirstImageAnimal($animal['id_animal']);
        $animaux[$key]['image'] = $image;
    }
    //  $news = getlastNews();
    //  $action = getLastActionsOrEvents();
    require_once "views/front/accueil.view.php";
}

function getPageAssociation(){
    $title = "L'association";
    $description = "Page décrivant l'association";
    require_once "views/front/association/association.view.php";
}

function getPagePartenaires(){
    $title = "Les partenaires";
    $description = "Les partenaires de l'association";
    require_once "views/front/association/partenaires.view.php";
}

function getPageTemperatures(){
    $title = "Article Temperatures";
    $description = "la page donne des conseils aux gens pour proteger leurs animaux de fortes chaleur";
    require_once "views/front/articles/temperatures.view.php";
}

function getPageChocolat(){
    $title = "Article chocolat";
    $description = "La page avertit les gens de la dangerosité du chocolat pour les animaux";
    require_once "views/front/articles/chocolat.view.php";
}

function getPagePlantesToxiques(){
    $title = "Article plantes toxiques";
    $description = "La page donne une liste des plantes toxique pour les chats";
    require_once "views/front/articles/plantestoxiques.view.php";
}

function getPageSterilisation(){
    $title = "Article stérilisation";
    $description = "La page explique l'importance du stérilisation des chats";
    require_once "views/front/articles/sterilisation.view.php";
}

function getPageEducateur(){
    $title = "Article educateur";
    $description = "La page traitant des éducateurs canin";
    require_once "views/front/articles/educateur.view.php";
}

function getPageContact(){
    $title = "La page de contact";
    $description = "la page de contact";
    require_once "views/front/contact/contact.view.php";
}

function getPageDon(){
    $title = "Donation";
    $description = "La page pour faire des donnations";
    require_once "views/front/contact/don.view.php";
}

function getPageMentions(){
    $title = "Les mentions légales";
    $description = "Les mentions-légales";
    require_once "views/front/contact/mentions.view.php";
}

function getPageActus(){
    $title = "Les Actualités";
    $description = "La page d'actualité du site";
    
    $actualites = getActualiteFromBD(); 
    
    foreach($actualites as $key => $actualite){
        $image = getImageActualiteFromBD($actualite['id_image']);
        $actualites[$key]['image'] = $image;
    }  
    require_once "views/front/actus.view.php";
        
}

    
    
    
   

function getPageAnimal(){
    
        $animal = getAnimalFromAnimalBD($_GET['idAnimal']);
        $images = getImagesFromAnimalBD($_GET['idAnimal']);
        
        $title = "La page de ". $animal['nom_animal'];
        $description = "La page de ". $animal['nom_animal'];
       
        require_once "views/front/animal.view.php";
}
    
    
  