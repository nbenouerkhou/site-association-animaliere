<?php 
ob_start();
echo titreNiveau1("Association Petshelter <br/>Paris (75014)",COLOR_TITRE);
?>
   
     <!-- informations sur l'association -->
    <div class="row align-items-center">
        <div class="col-12 col-lg-3 text-center">
            <img class="img-fluid" src="public/sources/images/autres/logoAsso.png" alt="image logo de l'assosiation"/>
        </div>
        <div class="col-12 col-lg-9">
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi laboriosam beatae hic veritatis eos ducimus, illo unde debitis sit sapiente, 
                nam iste laudantium suscipit aperiam quae quasi totam. 
                Et molestias ea fuga aspernatur nihil odio maiores iure numquam quae laudantium.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel adipisci, dolore consequatur libero qui nesciunt illo eius nulla, 
                maiores necessitatibus magnam iste impedit asperiores accusamus voluptatum nam rerum! Veritatis, ullam.
            </p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi qui cupiditate repellat beatae soluta illum inventore, temporibus totam nulla eaque perferendis adipisci, corrupti 
                amet quia magni doloribus officia hic modi iusto facere accusamus. Enim vel praesentium natus, animi tempora ut
            </p>
            <p>
                <a href="?page=contact"><button type="button" class="btn btn-primary mr-2">Rejoignez nous ! &raquo;</button></a>  pour suivre nos actions et partager avec nous cette nouvelle aventure !!!!!
            </p>
        </div>
    </div>
    
    <hr/>
    
    <!-- l'équipe -->
    <?php
    echo titreNiveau2("L'équipe",COLOR_TITRE);

     ?>
    
    <div class="row align-items-center">
        <div class="col-12 col-lg-3 text-center mb-2">
            <img class="img-fluid" style="height:250px" src="public/sources/images/autres/educ.jpg" alt="image educateur et chien">
        </div>
        <div class="col-12 col-lg-9">
            <span class="badge bg-primary text-white"> Nicolas</span> : président</br>
            <span class="badge bg-primary text-white"> Karl</span> : trésorier</br>
            <span class="badge bg-primary text-white">Emilie </span> : secrétaire</br>
            <span class="badge bg-primary text-white"> Anna</span> : secrétaire adjointe</br>
            <span class="badge bg-primary text-white">Julie</span> : éducatrice canin</br>
            
        </div>
    </div>

<?php
$content = ob_get_clean();
require "views/commons/template.php";
?>