<?php ob_start();?>

<div class="row align-items-center no-gutters">
    <div class="col-12 col-lg-5 p-2">
        <img class="img-fluid img-thumbnail" src="public/sources/images/site/articles/temperature.png"/>
    </div>


    <div class="col-12 col-lg-7 p-2">
        <?php
            $txt="Attention aux températures !";
            echo titreNiveau1($txt,COLOR_TITRE);
        ?>
        <div class="mt-5">
            <h5>Vu les températures que nous subissons actuellement je pense qu'il est bon de rappeler ceci :</h5>
            <ul class="pl-5">
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum dolor sit amet consectetur adipisicing Lorem ipsum dolor sit.</li>
                <li>Lorem, ipsum<span class="badge badge-danger"> dolor</span> sit amet consectetur adipisicing
                    Lorem ipsum dolor sit.</li>

            </ul>
        </div>

    </div>
</div>


<?php 
$content = ob_get_clean();
require "views/commons/template.php";
 ?>