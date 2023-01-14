<?php 
ob_start();
echo titreNiveau1("Page de gestion des news",COLOR_TITRE);?>
 
<a href="?page=gererNewsAdminAjout" class="btn btn-primary">Ajouter</a>
<a href="?page=gererNewsAdminModif" class="btn btn-primary">Modifier</a>

 <?= $contentAdminAction ?>

<?php if($alert !== ""){ 
    echo afficherAlert($alert,$alertType);
 } ?>

<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>