<?php
 session_start();
 require_once "controllers/frontend.controller.php";
 require_once "controllers/backend.controller.php";
 require_once "config/securite.class.php";
 

 try{
    if(isset($_GET['page']) && !empty($_GET['page'])){
        switch ($_GET['page']){
            case "accueil": getPageAccueil();
            break;
            case "pensionnaires": getPagePensionnaires();
            break;
            case "partenaires": getPagePartenaires();
            break;
            case "association": getPageAssociation();
            break;
            case "temperatures": getPageTemperatures();
            break;
            case "chocolat": getPageChocolat();
            break;
            case "plantestoxiques":getPagePlantesToxiques();
            break;
            case "sterilisation": getPageSterilisation();
            break;
            case "educateur": getPageEducateur();
            break;
            case "contact": getPageContact();
            break;
            case "don": getPageDon();
            break;
            case "mentions": getPageMentions();
            break;
            case "actus": getPageActus();
            break;
            case "animal": getPageAnimal();
            break;
            case "login": getPageLogin();
            break;
            case "admin": getPageAdmin();
            break;
            case "gererPensionnaireAdmin": getPagePensionnaireAdmin();
            break;
            case "gererPensionnaireAdminAjout": getPagePensionnaireAdminAjout();
            break;
            case "gererPensionnaireAdminModif": getPagePensionnaireAdminModif();
            break;
            case "gererPensionnaireAdminSup": getPagePensionnaireAdminSup();
            break;
            case "gererNewsAdmin": getPageNewsAdmin();
            break;
            case "gererNewsAdminAjout": getPageNewsAdminAjout();
            break;
            case "gererNewsAdminModif": getPageNewsAdminModif();
            break;
            case "gererNewsAdminSup": getPageNewsAdminSup();
            break;
            case "error404";
            default: throw new Exception("La page n'existe pas");
        }
         
     } else {
         getPageAccueil();
     }
 } catch(Exception $e){
    $title= "Error";
    $description="Page de gestion des erreurs";
    $errorMessage = $e->getMessage();
    require "views/commons/erreur.view.php";
 }
 
 

