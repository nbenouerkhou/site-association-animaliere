<?php 
ob_start();
echo titreNiveau1("Page de gestion de pensionnaires",COLOR_TITRE);?>

<a href="?page=gererPensionnaireAdminAjout" class="btn btn-primary">Ajouter</a>
<a href="?page=gererPensionnaireAdminModif" class="btn btn-primary">Modifier</a>

 <?= $contentAdminAction ?>

<?php if($alert !== ""){ 
    echo afficherAlert($alert,$alertType);
 } ?>


<?php
$content = ob_get_clean();
require "views/commons/template.php";
    ?>