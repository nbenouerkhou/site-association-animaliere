<?php ob_start();?>

<div class="p-2 text-center">
  <?php
  $txt=" Attention le chocolat est extrêmement <span class='badge badge-danger'> dangereux </span> pour les chiens et les chats";
  echo titreNiveau1($txt,COLOR_TITRE);
  ?>
  
    <img class="img-fluid img-tumbnail " src="public/sources/images/site/articles/chocolat.png"  alt="chocolat"/>
  
</div>

<?php 
$content = ob_get_clean();
require "views/commons/template.php"
 ?>