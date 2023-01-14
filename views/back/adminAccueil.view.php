<?php 
ob_start();
echo titreNiveau1("Page d'administration",COLOR_TITRE);

?>
   
<div class="row">
    <div class="col text-center mt-3">
        <a href="?page=gererPensionnaireAdmin" class="btn btn-primary">Gestion des pensionnaires </a>
    </div>
    <div class="col text-center mt-3">
        <a href="?page=gererNewsAdmin" class="btn btn-primary">Gestion des news </a>
    </div>
    <div class="col text-center mt-3">
        <form method="POST" action="">
            <input type="hidden" name="deconnexion" value="true"/>
            <input type="submit" class="btn btn-primary" value="se déconnecter"/>
        </form>
    </div>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>