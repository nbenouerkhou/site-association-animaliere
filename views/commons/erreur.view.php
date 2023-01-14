<?php ob_start();?>

<?php echo titreNiveau1("Erreur",COLOR_TITRE);?> 
<!-- Alert message d'erreur -->
<div class="alert alert-danger" role="alert">
    <?= $errorMessage?>
</div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>