<?php ob_start();?>

<div class="row  mt-5">
    <div class="col-12 col-lg-4 p-2" style="margin:auto ;">
        <img src="public/sources/images/site/articles/sterilisation.jpg" class="img-fluid img-tumbnail d-block mx-auto"
            alt="stérilisation"/>
    </div>
    <div calss="col-12 col-lg-8 p-2">
        <?php
        $txt="La stérilisation des chats !";
        echo titreNiveau1($txt,COLOR_TITRE);
        ?>
        <div class="mt-5">
            <h5 class="m-4">Pourquoi la stérilisation des chats est-elle un acte responsable?</h5>

            <p class="m-4">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque,<br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa doloremque.<br />

            </p>
        </div>

    </div>
</div>


<?php 
$content = ob_get_clean();
require "views/commons/template.php";
 ?>