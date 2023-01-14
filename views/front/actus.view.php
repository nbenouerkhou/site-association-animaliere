<?php ob_start();?>

<?php echo titreNiveau1("Actus",COLOR_TITRE);?>

<?php foreach($actualites as $actualite) : 
 if($_GET['type'] == $actualite['type_actualite']) {
    echo titrePost("<span class='".COLOR_TITRE."'>".$actualite['libelle_actualite']."</span> - Posté le : <span class='".COLOR_TITRE."'>". date("d/m/Y", strtotime($actualite['date_publication_actualite']))."</span>");?>

<div class="row no-gutters align-items-center" style="min-height:300px;">
    <div class="col-12 col-lg-3 text-center">
        <img src="public/sources/images/site/<?= $actualite['image']['url_image']?>"
            alt="<?= $actualite['image']['libelle_image']?>" style="max-height:250px;" class="img-fluid p-2" />
    </div>
    <div class="col-12 col-lg-9">
        <?= $actualite['contenu_actualite']?>
    </div>
</div>
 <?php } ?> 
<?php endforeach; ?>
<?php

$content = ob_get_clean();
require "views/commons/template.php";
?>