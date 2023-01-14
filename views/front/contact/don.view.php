<?php ob_start();?>

<?php echo titreNiveau1("Donnations",COLOR_TITRE);?>


    <?php echo titreNiveau3("Pourquoi faire un don",COLOR_TITRE);?>
    <p class="pl-5">Les dons nous permettent de réaliser de nombreuses actions :
        <div>
            <ul>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>
                <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Iusto, commodi.</li>

            </ul>
        </div>

    </p>
    <?php echo titreNiveau3("Faire un don à l'aossociation",COLOR_TITRE);?>
    <p class="pl-5">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            Les donations directement via le site internet ne sont pas encore disponible.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </p>

    <p class="pl-5">
        Pour faire une donation de bien vous pouvez utiliser le
        <a hre="contact.php">
            <span class="badge badge-primary">formulaire de contact</span>
        </a>
        pour nous contacter <br/><br/>
    </p>
    <p class="pl-5">
        Pour une donation financière vous pouvez nous adresser un chèque à
        l'association:
        <p class="text-center">
            Association Petshelter</br>
            14 Rue Jules Ferry </br> 75014,Paris,France.
        </p>
    </p>
    <p class="pl-5">
        Vous avez une question contactez nous par mail</br>
        <p class="text-center">
            <a href="mailto:associationpetshelter@gmail.com">associationpetshelter@gmail.com</a>
        </p>
    </p>


<?php 
$content = ob_get_clean();
require "views/commons/template.php";
?>