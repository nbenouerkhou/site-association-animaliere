<?php 
ob_start();
echo titreNiveau1("Ils ont besoin de vous !",COLOR_TITRE);
?>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
   
  <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($animaux); $i++ ) : ?>
      <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i ?>" class="<?php echo ($i===0) ? "active" : ""?>  bg-dark"></li>
    <?php endfor; ?>
  </ol>

  <div class="carousel-inner">
    <?php foreach ($animaux as $key => $animal) : ?>
    <!-- Début d'un item -->
    <div class="carousel-item <?php echo ($key===0) ? "active" : ""?>">
      <div class="row no-gutters border rounded overflow-hidden mb-4 bgColor">
        <div class="col-12 col-md-auto text-center mt-1 ml-1">
          <img src='public/sources/images/site/<?= $animal["image"]["url_image"]?>' style='height:250px;'
            alt='<?= $animal["image"]["libelle_image"]?>' />

        </div> 
        <div class="col p-4 d-flex flex-column position-static">
          <h3 class="policeTitre titreTextShadow mx-auto"><?= $animal["nom_animal"] ?></h3>
          <div class="text-muted mb-1"><?= date("d/m/Y", strtotime($animal['date_naissance_animal']))?></div>
          <p class="mb-auto">
            <?= $animal['description_animal']?>
          </p>
          <a href="?page=animal&idAnimal=<?= $animal['id_animal']?>" class="btn btn-primary mt-2">Visiter ma page</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
    <!-- Fin d'un item -->
   
   
  </div>
</div>

<div class="row">
  <!-- nouvelles des adoptés -->
  <div class="col-md-6 mt-3">
    <h2 class="text-center mt-3 colorMenu policeTitre titreTextShadow"><img
        src="public/sources/images/autres/icones/journal.png" alt="Logo News" />Nouvelles des adoptés</h2>

    <div class="row no-gutters border rounded m-2 align-items-center mb-4 bgColor">
      <div class="col-auto d-none d-lg-block mx-2">
        <img src="public/sources/images/site/animaux/chien/nova/nova.jpg" style="height:250px;" alt="photo de nova" />
      </div>
      <div class="col p-3 d-flex flex-column position-static">
        <h3 class="mb-0 policeTitre titreTextShadow">Nouvelle famille pour Nova</h3>
        <p class="mt-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Nisi aperiam vitae corrupti adipisci fugit voluptatum dicta iusto dolores voluptatem vel.
        </p>
        <a href="?page=actus&type=<?= TYPE_NEWS ?>" class="btn btn-primary">Voir les nouvelles des adoptés</a>
      </div>
    </div>
  </div>
  <!-- evenements & actions -->
  <div class="col-md-6 mt-3">
    <h2 class="text-center mt-3 colorMenu policeTitre titreTextShadow"><img
        src="public/sources/images/autres/icones/action.png" alt="Logo News" />Evènements & Actions</h2>

   <div class="row no-gutters border rounded m-2 align-items-center bgColor">
      <div class="col-auto d-none d-lg-block mx-2 ">
        <img src="public/sources/images/site/animaux/chien/pixie/pixie.jpg" style="height:250px;"
          alt="photo de pixie" />
      </div>
      <div class="col p-3 d-flex flex-column position-static">
        <h3 class="mb-0 policeTitre titreTextShadow">Voici les nouveaux arrivés</h3>
        <p class="mt-2">
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Nisi aperiam vitae corrupti adipisci fugit voluptatum dicta iusto dolores voluptatem vel.
        </p>
        <a href="?page=actus&type=<?= TYPE_EVENTS ?>" class="btn btn-primary">Les Evenements et actions</a>
      </div>
    </div>
  </div>
</div>
</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>