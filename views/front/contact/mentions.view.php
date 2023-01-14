<?php ob_start();?>

<?php echo titreNiveau1("Mentions légales",COLOR_TITRE);?>

    <?php echo titreNiveau3("À propos",COLOR_TITRE);?>
    <p class="pl-5">
        <span>Lorem</span> ipsum dolor sit amet consectetur adipisicing elit. Fuga qui nihil vel tempore!
        Culpa, quasi Lorem ipsum dolor sit amet.
    </p>
    <?php echo titreNiveau3("Mention légales",COLOR_TITRE);?>
        <p class="pl-5">
            Lorem ipsum dolor sit amet consectetur<br/>
            Lorem ipsum dolor sit amet<br/>
            Lorem ipsum dolor sit<br/>
            Lorem ipsum dolor sit amet
        </p>
    <?php echo titreNiveau3("Présentation du site",COLOR_TITRE);?> 
        <div class="pl-5">
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.<br/>
             Vel, deserunt. Asperiores illum tempora veniam qui nisi, dolores expedita dicta impedit.<br/>
             Repellendus facere nemo placeat error!
            </p>
        </div>
        <?php echo titreNiveau3("Propriétaire",COLOR_TITRE);?>
        <div class="pl-5">
            <p><strong>Lorem ipsum dolor sit</strong></p>
            <p>Lorem ipsum dolor sit</p>
        </div>
    <?php echo titreNiveau3("Responsable de publication",COLOR_TITRE);?>
        <div class="pl-5">
            <p>Lorem ipsum dolor sit</p>
        </div> 
    <?php echo titreNiveau3("Hébergeur",COLOR_TITRE);?>
        <div class="pl-5">
            <p>Lorem ipsum dolor sit</p>
        </div> 
    <?php echo titreNiveau3("WebMaster",COLOR_TITRE);?>
        <div class="pl-5">
            <p>Lorem ipsum dolor sit</p>
        </div> 
    <?php echo titreNiveau3("Conditions générales d'utlisation du site",COLOR_TITRE);?>
        <div class="pl-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>
               Lorem ipsum dolor sit amet consectetur adipisicing elit. Nulla, libero<br/>

            </p>
        </div> 

        <?php 
$content = ob_get_clean();
require "views/commons/template.php";
 ?>