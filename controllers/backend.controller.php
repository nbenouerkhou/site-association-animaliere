<?php 
 require_once "public/utile/formatage.php";
 require_once "public/utile/gestionImage.php";
 require_once "models/animal.dao.php";
 require_once "models/actualite.dao.php";
 require_once "models/image.dao.php";
 require_once "models/admin.dao.php";
 require_once "config/config.php";


function getPageLogin(){
    $title = "Page de login";
    $description = "Page de login";
    
    if(Securite::verificationAccess()){
        
             header ("Location: ?page=admin");

           
    }
        
    $alert ="";
    if(isset($_POST['login']) && !empty($_POST['login']) &&
    isset($_POST['password']) && !empty($_POST['password'])){
        $login = Securite::secureHTML($_POST['login']);
        $password = Securite::secureHTML($_POST['password']);
        if(isConnexionValid($login,$password)){
            $_SESSION['acces'] = "admin";
            Securite::genereCookiePassword();
            header ("Location: ?page=admin");
        } else {
            $alert = "Mot de passe invalide";
        }
            
    }
    
    require_once "views/back/login.view.php";
}

function getPageAdmin(){
    if(isset($_POST['deconnexion']) && $_POST['deconnexion'] === "true"){
        session_destroy();
        header("Location: ?page=accueil");
    }
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page d'administration du site";
        $description = "Page d'administration du site";

       require_once "views/back/adminAccueil.view.php";
     
        
    } else {
       throw new Exception("Vous n'avez pas le droit d'accéder à cette page"); 
    }
}




////// Page Admin Gestion News //////
function getPageNewsAdmin($require ="", $alert="", $alertType="", $data=""){

    
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page de gestion des news";
        $description = "Page de gestion des news";
        
        $typeActualites = getTypeActualite();

        $contentAdminAction ="";
        if($require !=="") require_once $require;
        require_once "views/back/adminNews.view.php";
    } else {
       throw new Exception("Vous n'avez pas le droit d'accéder à cette page"); 
    }
}

////// Ajout News //////////

function getPageNewsAdminAjout(){
    $alert ="";
    $alertType ="";
    if(isset($_POST['titreActu']) && !empty($_POST['titreActu']) &&
    isset($_POST['typeActu']) && !empty($_POST['typeActu']) &&
    isset($_POST['contenuActu']) && !empty($_POST['contenuActu'])
    ) {
        
        $alertType = 0;
        $titreActu = Securite ::secureHtml($_POST['titreActu']);
        $typeActu = Securite ::secureHtml($_POST['typeActu']);
        $contenuActu = Securite ::secureHtml($_POST['contenuActu']);
        $date = date("Y-m-d H:i:s", time());
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/site/news/";
        try{
            $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
            $idImage=insertImageIntoBD($nomImage, "news/" .$nomImage);

            if(insertActualiteIntoBD($titreActu,$typeActu,$contenuActu,$date,$idImage)){
                $alert = "La création de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La création de l'actualité n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        
    } 

    getPageNewsAdmin("views/back/adminNewsAjout.view.php",$alert,$alertType);
    
}


////// Modification News //////////
function getPageNewsAdminModif(){
    $alert ="";
    $alertType ="";
    $data = [];
    if(isset($_post['etape']) && (int) $_POST['etape']>=2){
        $typeActu = Securite::secureHTML($_post['typeActu']);
        $data['actualites'] = getActualiteFromBD($typeActu);
    }
    if(isset($_post['etape']) && (int) $_POST['etape']>=3){
        $actualite = Securite::secureHTML($_post['actualites']);
        $data['actualite'] = getActuFromBD($actualite);
       
       
    }

    if(isset($_post['etape']) && (int) $_POST['etape']>=4){
        $titreActu = Securite ::secureHtml($_POST['titreActu']);
        $typeActu = Securite ::secureHtml($_POST['typeActu']);
        $contenuActu = Securite ::secureHtml($_POST['contenuActu']);
        $idImage = $data['actualite']['id_image'];
        $idActualite = $data['actualite']['id_actualite'];

        try{
            if($_FILES['imageActu']['size'] > 0){
                $fileImage = $_FILES['imageActu'];
                $repertoire = "public/sources/images/site/news/";
                $nomImage = ajoutImage($fileImage, $repertoire, $titreActu);
                $idImage=insertImageIntoBD($nomImage, "news/" .$nomImage);
            }
            

            if(updateActualiteIntoBD($idActualite,$titreActu,$typeActu,$contenuActu,$idImage)){
                $alert = "La modification de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modification de l'actualité n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        $data['actualites'] = getActualiteFromBD($typeActu);
        $data['actualite'] = getActuFromBD($actualite);
       
    }
    getPageNewsAdmin("views/back/adminNewsModif.view.php",$alert,$alertType,$data);
}
////// Supression News //////////
function getPageNewsAdminSup(){
    $alert ="";
    $alertType="";
    if(isset($_GET['sup'])){
        try{
            deleteActuFromBD(Securite::secureHTML($_GET['sup']));
            $alert ="La supression de l'actualité a fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_SUCCESS;
        } catch(Exception $e){
            $alert ="La supression de l'actualité n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
    getPageNewsAdmin("",$alert,$alertType);
    
}


function getPagePensionnaireAdmin($require ="", $alert="",$alertType="",$data=""){
    if(Securite::verificationAccess()){
        Securite::genereCookiePassword();
        $title = "Page de gestion des pensionnaires";
        $description = "Page de gestion des pensionnaires";

        $statuts = getStatutsAnimal();
        $contentAdminAction ="";
        if($require !=="") require_once $require;
        require_once "views/back/adminPensionnaire.view.php";
    } else {
       throw new Exception("Vous n'avez pas le droit d'accéder à cette page"); 
    }
}


//////// Ajout Pensionnaires /////////
function getPagePensionnaireAdminAjout(){
    $alert ="";
    $alertType = 0;

    if(isset($_POST['nom']) && !empty($_POST['nom']) &&
    isset($_POST['dateN']) && !empty($_POST['dateN'])
    
    ) {
        
       
        $nom = Securite ::secureHtml($_POST['nom']);
        $dateN = Securite ::secureHtml($_POST['dateN']);
        $type = Securite ::secureHtml($_POST['type']);
        $sexe = Securite ::secureHtml($_POST['sexe']);
        $statut = Securite ::secureHtml($_POST['statut']);
        $description = Securite ::secureHtml($_POST['description']);

        
        $fileImage = $_FILES['imageActu'];
        $repertoire = "public/sources/images/site/animaux/".$type."/".strtolower($nom)."/";
        try{
            $nomImage = ajoutImage($fileImage, $repertoire, $nom);
            $idImage= insertImageIntoBD($nomImage,"animaux/".$type."/".strtolower($nom)."/".$nomImage);
            $idAnimal = insertAnimalIntoBD($nom,$dateN,$type,$sexe,$statut,$description);
            if($idAnimal >0){
                insertIntoContient($idImage,$idAnimal);
                $alert = "La création de l'animal est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                throw new Exception("L'insertion en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La création de l'animal n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        
    } 
    
    getPagePensionnaireAdmin("views/back/adminPensionnaireAjout.view.php",$alert,$alertType);
    
}


////// Modification Pensionnaires //////////
function getPagePensionnaireAdminModif(){
    $alert ="";
    $alertType ="";
    $data = [];
   
    if(isset($_POST['etape']) && (int)$_POST['etape']>=3){
        $idStatut = Securite::secureHTML($_POST['statutAnimal']);
        $type = Securite::secureHTML($_POST['typeAnimal']);
        $data['animaux'] = getAnimauxFromTypeAndStatut($idStatut,$type);    
    }

    if(isset($_POST['etape']) && (int)$_POST['etape']>=4){
        $idAnimal = Securite::secureHTML($_POST['animal']);
        $data['animal'] = getAnimalFromAnimalBD($idAnimal);    
    }

    if(isset($_POST['etape']) && (int)$_POST['etape']>=5){
        $idAnimal = $data['animal']['id_animal'];
        $nom = Securite ::secureHtml($_POST['nom']);
        $dateN = Securite ::secureHtml($_POST['dateN']);
        $typeSaisie = Securite ::secureHtml($_POST['type']);
        $sexe = Securite ::secureHtml($_POST['sexe']);
        $statut = Securite ::secureHtml($_POST['statut']);
        $description = Securite ::secureHtml($_POST['description']);

        try{
            
            if(updateAnimalIntoBD($idAnimal,$nom,$dateN,$typeSaisie,$sexe,$statut,$description)){
                $alert = "La modification de l'actualité est effectuée";
                $alertType = ALERT_SUCCESS;
            } else {
                throw new Exception("La modification en BD n'a pas fonctionné");
            }
        } catch(Exception $e){
            $alert = "La modification de l'actualité n'a pas fonctionnée <br />" . $e->getMessage();
            $alertType = ALERT_DANGER;
        }
        $data['animal'] = getAnimalFromAnimalBD($idAnimal); 
    }
    
    getPagePensionnaireAdmin("views/back/adminPensionnaireModif.view.php",$alert,$alertType,$data);
}
////// Supression Pensionnaires //////////
function getPagePensionnaireAdminSup(){
    $alert ="";
    $alertType="";
    if(isset($_GET['sup'])){
        try{
            if(deleteAnimalFromBD(Securite::secureHTML($_GET['sup']))< 1){
                throw new Exception ("la supression n'a pas fonctionné en BD");
            }
            $alert ="La supression de l'animal a fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_SUCCESS;
        } catch(Exception $e){
            $alert ="La supression de l'animal n'a pas fonctionnée <br />". $e->getMessage();
            $alertType = ALERT_DANGER;
        }
    }
    getPagePensionnaireAdmin("",$alert,$alertType);
    
}

 ?>