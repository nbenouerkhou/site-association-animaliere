<?php ob_start();?>

<div class="p-2 text-center">
  <?php

  $txt=" Attention aux plantes <span class='badge badge-danger'>toxiques</span> pour les chats !";
  echo titreNiveau1($txt,COLOR_TITRE);
  ?>
  
    <img src="public/sources/images/site/articles/plantestoxiques.png"  class="img-fluid img-tumbnail" alt="plantes toxiques"/>

  
</div>


<?php 
$content = ob_get_clean();
require "views/commons/template.php";
 ?>