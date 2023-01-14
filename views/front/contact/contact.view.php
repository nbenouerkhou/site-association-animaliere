
<?php ob_start();?>

<?php echo titreNiveau1("Contact",COLOR_TITRE);?>
<!-- Réseaux sociaux -->
<?php echo titreNiveau3("Suivez-nous :",COLOR_TITRE);?>
<p class="pl-5 go">
    <!-- Icone facebook -->
    <a href="https://www.facebook.com" target=_blank><img src="public/sources/images/autres/icones/facebook.png" width="40px" alt="facebook"/></a>
    Suivez-nous sur facebook et participez à l'aventure de notre association.
</p>

<?php echo titreNiveau3("Contactez-nous :",COLOR_TITRE);?>
<div class="pl-5">
    <!-- Icone courrier -->
    <p>
        <img src="public/sources/images/autres/icones/courrier.png" width="30px" alt="courrier"/>
        Par courrier : 14 Rue Jules Ferry, 75014 Paris, France
    </p>
    <!-- Icone mail -->
    <p>
        <img src="public/sources/images/autres/icones/mail.png" width="30px" alt="mail"/>
        Par mail : <a href="mailto:associationpetshelter@gmail.com">associationpetshelter@gmail.com</a>
    </p>
    <!-- Icone telephone -->
    <p>
        <img src="public/sources/images/autres/icones/tel.png" width="30px" alt="tel"/>
        Par téléphone : <a href="tel:0164052239">01 64 05 22 39</a>
    </p>
    <p>
        Ou bien envoyez nous un message via notre formulaire de contact.
</div>

<!-- Formulaire de contact -->
<?php echo titreNiveau3("Formulaire de contact :",COLOR_TITRE);?>
<form method="POST" action="#" class="pl-5">
    <!-- Input nom -->
    <div class="form-group row no-gutters align-items-center">
        <label for="nom" class="col-auto pr-3">Nom :</label>
        <input type="text" name="nom" id="nom" class="form-control col"
         placeholder="Votre nom" required>
    </div>
    <!-- Input email -->
    <div class="form-group row no-gutters align-items-center">
        <label for="mail" class="col-auto pr-3">Email :</label>
        <input type="email" name="mail" id="mail" class="form-control col" 
        placeholder="nom@exemple.com" required>
    </div>
    <!-- Objet -->
    <div class="form-group row no-gutters align-items-center">
        <label for="objet" class="col-auto pr-3">Objet :</label>
        <select name="objet" id="objet" class="form-control col">
            <option value="question">Question</option>
            <option value="adoption">Adoption</option>
            <option value="donnation">Donnation</option>
            <option value="autre">Autre</option>
        </select>
    </div>
    <!-- Message -->
    <div class="form-group">
        <label for="message">Message :</label>
        <textarea class="form-control col" id="message" name="message" 
        row="3" required></textarea>
    </div>
    <!-- Captcha -->
    <div class="form-group row no-gutters align-items-center">
        <label for="captcha" class="col-auto pr-3">Combien font 2+4 :</label>
        <input type="number" name="captcha" id="captcha" class="form-control col" required>
    </div> 
    
    
</div>
    <!-- button submit -->
    <input type="submit" class="btn btn-primary d-block mx-auto go mt-2" value="Valider"/>
</form>

<!-- Vérification champs de formulaire -->
<?php
if(isset($_POST["nom"]) && !empty($_POST["nom"]) &&
isset($_POST["mail"]) && !empty($_POST["mail"]) &&
isset($_POST["objet"]) && !empty($_POST["objet"]) &&
isset($_POST["message"]) && !empty($_POST["message"]) &&
isset($_POST["captcha"]) && !empty($_POST["captcha"])
){
    $captcha= (int) $_POST["captcha"];
    if($captcha === 6){
        $nom = htmlentities($_POST["nom"]);
        $mail = htmlentities($_POST["mail"]);
        $objet = htmlentities($_POST["objet"]);
        $message = htmlentities($_POST["message"]); 
        $destinataire = "nasreddine.benouerkhou@gmail.com";
        mail($destinataire,$objet. " - ".$nom, "Mail : ".$mail. " Message : ".$message);
        echo "<div class='alert alert-success m-2 text-center' role='alert'>";
        echo "Message envoyé";
        echo "</div>";
    }else {
       echo  "<div class='alert alert-danger m-2 text-center' role='alert'>";
       echo   "Erreur de Captcha, recommencer";
       echo "</div>";
    }
}
?>

<?php 
$content = ob_get_clean();
require "views/commons/template.php";
 ?>