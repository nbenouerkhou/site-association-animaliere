<?php 
ob_start();
echo titreNiveau2("Modification d'une news",COLOR_TITRE);?>
<?php echo titreNiveau3("Choix : ",COLOR_TITRE);?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2">
    <label for="typeActu">Type d'actualité : </label>
    <select name="typeActu" id="typeActu" class="form-control" onchange="submit()">
        <option>Choisir le type d'actualité</option>

        <?php $a = []; ?>        
        <?php foreach($typeActualites as $type) : ?>
            <?php if(!in_array($type['type_actualite'], $a)){ ?>
            <option value="<?php echo $type['type_actualite']; ?>" <?php if(array_key_exists('typeActu', $_POST) && $_POST['typeActu'] == $type['type_actualite']) { echo "selected"; } ?>>
                <?= $type['type_actualite']?>
             </option>

             <?php
                $a [] = $type['type_actualite'];
            } ?>
        <?php endforeach; ?>
    </select>
</form> 




<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2){?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">
    <label for="actualites">Actualités : </label>
    <select name="actualites" id="actualites" class="form-control" onchange="submit()">
        <option>Choisir l'actualité</option>
        <?php foreach($typeActualites as $key => $actualite) : ?>
            <?php if($actualite['type_actualite'] == $_POST['typeActu']) { ?> 
            <option value="<?php echo $key; ?>" <?php if(array_key_exists("actualites", $_POST) && $_POST['actualites'] == $actualite['id_actualite']) { echo "selected"; } ?>>
                    <?php echo $actualite['id_actualite']. " - " . $actualite['libelle_actualite'] ?>
            </option>

            <?php } ?>
        <?php endforeach; ?>
    </select>
</form>

<?php } ?>



<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=3) { ?>
    <?php $actualite = $typeActualites[$_POST['actualites']]; ?>
    <?php echo titreNiveau3("Les informations de l'actualité : ",COLOR_TITRE);?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="typeActu" value="<?= $_POST['typeActu'] ?>">
    <input type="hidden" name="actualites" value="<?= $_POST['actualites'] ?>">
    <div class="form-row">
       <div class="form-group col-6">
            <label for="titreActue">Titre de l'actualité : </label>   
            <input type="text" class="form-control" name="titreActu" id="titreActu" value="<?= $actualite['libelle_actualite'] ?>" required />
       </div>  
       <div class="form-group col-6">
            <label for="typeActu">Type d'actualité : </label>   
            <select name="typeActu" id="typeActu" class="form-control">
                
                <?php $a = []; ?>        
                <?php foreach($typeActualites as $type) : ?>
                <?php if(!in_array($type['type_actualite'], $a)){ ?>
                    
                    <option value="<?= $type['type_actualite'] ?>"  
                        <?php= if($actualite['type_actualite'] === $type['type_actualite']) echo "selected"?>>
                        <?php echo $type['type_actualite']; ?>
                    </option>
                    <?php $a [] = $type['type_actualite']; 
                    } ?>
                <?php endforeach; ?>
            </select>
       </div> 
    </div>

    <div class="form-group">
        <label for="contenuActu">Contenu de l'actualité : </label>
        <textarea class="form-control" id="contenuActu" name="contenuActu" rows="5" required><?= $data['actualite']['contenu_actualite'] ?></textarea>
    </div>
    <img src="public/sources/images/site/<?= $data['actualite']['url_image'] ?>" alt="" style="max-width:200px;"/>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu" />
    </div>
    <div class="row no-guters p-3">
        <input type="submit" value="Valider" class="btn btn-primary col"/>
        <button id="btnSup" class="btn btn-danger col">Supprimer</button>
    </div>
    
</form>
<script src="public/js/verifSupressionActu.js"></script>
<?php } ?>



<?php 
$contentAdminAction = ob_get_clean();
?>