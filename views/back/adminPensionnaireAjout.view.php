<?php 
ob_start();
echo titreNiveau2("Ajout d'un animal",COLOR_TITRE);?>
   
<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="nom" class="col-12 col-md-auto pr-2"> Nom : </label>
            <input type="text" class="col form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group row no-gutters align-items-center col-4">
            <label for="dateN" class="col-12 col-md-auto pr-2"> Né : </label>
            <input type="date" class="col form-control" id="dateN" name="dateN" required>
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
                        <option value="chat">Chat</option>
                        <option value="chien">Chien</option>
                    </select>
                </td>
                <td>
                    <select name="sexe">
                        <option value="M">Mâle</option>
                        <option value="F">Femelle</option>
                    </select>
                </td>
                <td>
                    <select name="statut">
                        <?php foreach($statuts as $statut) : ?>
                            <option value="<?= $statut['id_statut'] ?>"> <?= $statut['libelle_statut'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
       </tbody>
    </table>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rowq="5"></textarea>
    </div>
    <div class="form-group">
        <label for="imageActu">Image : </label>
        <input type="file" class="form-control-file" name="imageActu" id="imageActu" />
    </div> 
    <div class="row no-gutters">
        <button type="submit" class="col btn btn-primary">Valider</button>
    </div>
</form>



<?php 
$contentAdminAction = ob_get_clean();
?>