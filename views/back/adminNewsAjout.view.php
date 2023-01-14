<?php 
ob_start();
echo titreNiveau2("Ajout d'une news",COLOR_TITRE);?>
   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row">
       <div class="form-group col-6">
            <label for="titreActue">Titre de l'actualité : </label>   
            <input type="text" class="form-control" name="titreActu" id="titreActu" required />
       </div>  
       <div class="form-group col-6">
            <label for="typeActu">Type d'actualité : </label>   
            <select name="typeActu" id="typeActu" class="form-control">
                <?php $i=[]; ?>
                <?php foreach($typeActualites as $type) : ?>
                    <?php if(!in_array($type['type_actualite'], $i)){?>
                    <option value="<?= $type['type_actualite'] ?>"><?= $type['type_actualite'] ?></option>
                    <?php } ?>
                    <?php $i[] = $type['type_actualite'];?>
                <?php endforeach; ?>
            </select>
       </div> 
    </div>
    <div class="form-group">
        <label for="contenuActu">Contenu de l'actualité : </label>
        <textarea class="form-control" id="contenuActu" name="contenuActu" rows="5" required></textarea>
    </div>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu" />
    </div>
    <div class="row no-guters p-3">
        <input type="submit" value="Valider" class="btn btn-primary col"/>
    </div>
</form>



<?php 
$contentAdminAction = ob_get_clean();
?>