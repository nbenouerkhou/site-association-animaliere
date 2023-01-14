<?php ob_start();?>

<?= titreNiveau1($animal['nom_animal'],COLOR_TITRE)?>

<div class="row border border-dark rounded-lg m-2 align-items-center bgColor">
    <div class="col-4 p-2 text-center">
        <img src="public/sources/images/site/<?= $images[0]['url_image']?>" class="img-thumbnail"
            style="max-height:180px" alt="<?= $images[0]['libelle_image']?>" />
    </div>
    <div class="col-4 text-center sizeNav mb-3">
        <div class="mb-2">Né : <?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
    </div>
    <div class="col-12 col-md-4">
        Lorem ipsum dolor sit amet consectetur adipisicing elit.
        Debitis temporibus officiis molestias laboriosam.

    </div>
</div>

<div class="row align-items-center">
    <div class="col-12 col-lg-6">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php foreach($images as $key => $image) : ?>
                <li data-target="#carouselExampleIndicators" data-slide-to=" <?= $key?>"
                    class="<?= ($key === 0) ? "active" : "" ?>"></li>
                <?php endforeach; ?>
            </ol>
            <div class="carousel-inner text-center">
                <?php foreach($images as $key => $image) : ?>
                <div class="carousel-item <?php echo ($key === 0) ? "active" : "" ?>">
                    <img src="public/sources/images/site/<?=$image['url_image']?>" class="img-thumbnail"
                        style="height:500px" alt="<?=$image['libelle_image']?>">
                </div>
                <?php endforeach; ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="col-12 col-lg-6">
        <div>
            <?= titreNiveau2("Qui suis-je ?",COLOR_TITRE)?>
            <hr />
            <?= $animal['description_animal']?>
        </div>
    </div>

   
</div>

<?php
    $content = ob_get_clean();
    require "views/commons/template.php"
?>