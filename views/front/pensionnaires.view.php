<?php 
ob_start();
titreNiveau1($titreH1, COLOR_TITRE);
?>

<div class="row no-gutters">
    <?php foreach($animaux as $animal) :?>
    <div class="col-12 col-lg-6">
        <div class="row border border-dark rounded-lg m-2 align-items-center bgColor" style="height:200px;">
            <div class="col-6 p-2 text-center">
                <img src="public/sources/images/site/<?= $animal['image']['url_image']?>" class="img-thumbnail" style="max-height:180px;" alt="<?= $animal['image']['libelle_image']?>"/> 
            </div>
            <div class="col-6 text-center sizeNav mb-3">
                <div class="policeTitre titreTextShadow"><?= $animal['nom_animal']?></div>
                <div class="mb-2"><?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
                <a href="?page=animal&idAnimal=<?= $animal['id_animal']?>" class="btn btn-primary">Visiter ma page</a>
            </div>
        </div>  
    </div>
    <?php endforeach;?>
</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>