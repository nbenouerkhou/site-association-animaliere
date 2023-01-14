<?php 
ob_start();
echo titreNiveau2("Modification d'un animal",COLOR_TITRE);?>
   <?php echo titreNiveau3("Choix : ",COLOR_TITRE);?>

<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="2">
    <label for="statutAnimal">Statut : </label>
    <select name="statutAnimal" id="statutAnimal" class="form-control" onchange="submit()">
        <option></option>
      
        <?php foreach($statuts as $statut) : ?>
            <option value="<?php echo $statut['id_statut']; ?>"
                <?php if(array_key_exists('statutAnimal', $_POST) && (int)$_POST['statutAnimal'] == (int)$statut['id_statut']) { echo "selected"; } ?>>
                <?= $statut['libelle_statut'] ?>
             </option>
        <?php endforeach; ?>
    </select>
</form> 

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=2){?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="3">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <label for="typeAnimal">Type : </label>
    <select name="typeAnimal" id="typeAnimal" class="form-control" onchange="submit()">
        <option></option>
        <option value="chat" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === "chat") echo "selected" ?>>Chats</option>
        <option value="chien" <?php if(isset($_POST['typeAnimal']) && $_POST['typeAnimal'] === "chien") echo "selected" ?>>Chiens</option>
            
    </select>
</form>

<?php } ?>

<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=3){?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="4">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">
    <label for="animal">Nom de l'animal : </label>
    <select name="animal" id="animal" class="form-control" onchange="submit()">
        <option></option>
      
      <?php foreach($data['animaux'] as $animal) : ?>
          <option value="<?php echo $animal['id_animal']; ?>" <?php if(array_key_exists('animal', $_POST) && $_POST['animal'] == $animal['id_animal']) { echo "selected"; } ?>>
              <?php echo $animal['id_animal'] . " - " . $animal['nom_animal']; ?> 
           </option>
      <?php endforeach; ?>
    </select>
</form>

<?php } ?>


<?php if(isset($_POST['etape']) && (int) $_POST['etape'] >=4){?>
    <?php echo titreNiveau3("Modification de l'animal : ",COLOR_TITRE);?>
<form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="etape" value="5">
    <input type="hidden" name="statutAnimal" value="<?= $_POST['statutAnimal'] ?>">
    <input type="hidden" name="typeAnimal" value="<?= $_POST['typeAnimal'] ?>">
    <input type="hidden" name="animal" value="<?= $_POST['animal'] ?>" id="idAnimal">
    
    <div class="row">
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="nom" class="col-12 col-md-auto pr-2"> Nom : </label>
            <input type="text" class="col form-control" id="nom" name="nom" value="<?= $data['animal']['nom_animal'] ?>" required>
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="dateN" class="col-12 col-md-auto pr-2"> Né : </label>
            <input type="date" class="col form-control" id="dateN" name="dateN"  value="<?= $data['animal']['date_naissance_animal'] ?>" required>
        </div>
        
    </div>
    <table class="table">
       <thead class="thead-dark">
            <tr class="text-center">
                <th>Type </th>
                <th>Sexe </th>
                <th>Statut </th>
            </tr>
       </thead> 
       <tbody>
            <tr class="text-center">
                <td>
                    <select name="type">
                        <option value="chat" <?php if($data['animal']['type_animal'] === "chat") echo "selected" ?>>Chat</option>
                        <option value="chien" <?php if($data['animal']['type_animal'] === "chien") echo "selected" ?>>Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="M" <?php if($data['animal']['sexe'] === "M") echo "selected" ?>>Mâle</option>
                        <option value="F" <?php if($data['animal']['sexe'] === "F") echo "selected" ?>>Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                        <?php foreach($statuts as $statut) : ?>
                            <option value="<?= $statut['id_statut'] ?>"
                            <?php if((int) $data['animal']['id_statut'] === (int) $statut["id_statut"]) echo "selected"?>> 
                                 <?= $statut['libelle_statut'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
       </tbody>
    </table>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rowq="5"><?= $data['animal']['description_animal'] ?></textarea>
    </div>

    <div class="row no-gutters">
        <button type="submit" class="col btn btn-primary">Valider</button>
        <button id="btnSup" class="btn btn-danger col">Supprimer</button>
    </div>
</form>
<script src="public/js/verifSupressionAnimal.js"></script>
<?php }?>


<?php 
$contentAdminAction = ob_get_clean();
?>