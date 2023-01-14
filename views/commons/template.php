<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $description?>">
    <title><?= $title?></title>
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/main.css">
    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel=" shortcut icon" type="image/png" href="public/sources/images/autres/logoAsso.png" />

</head>

<body>
    <div>

        <!-- HEADER DU SITE -->
        <header class="bg-dark text-white rounded-top policeTitre ">
            <div class="row align-items-center m-0">
                <div class="col-2 p-2 text-center">
                    <a href="?page=accueil">
                        <img src="public/sources/images/autres/logoAsso.png" alt="logo du site"
                            class="rounded-circle img-fluid logoSize " />
                    </a>
                </div>
                <div class="col-8 m-0 p-0">
                    <?php include("views/commons/menu.php") ?>
                </div>
                <div class="col-2 text-right pt-1 pr-4 d-none d-lg-block">
                    <a href="?page=login" class="nav-link text-white text-center"> Petshelter<br />Paris (75014)</a>
                </div>
            </div>
        </header>

        <!-- CONTENU DU SITE -->
        <div class="container container_style">
            <?= $content?>



        </div>
        <!-- FOOTER DU SITE -->
        <footer class="bg-dark text-white rounded-bottom mt-2 ">
            
            
            <div class="row no-gutters d-flex justify-content-around ">
                <div class="col-md-1"></div>
                <div class="col-md-2 p-2 text-center">
                    <?php echo titreNiveau5("L'Association",COLOR_TITRE);?>
                    <ul class="list-unstyled footerListSize">
                        <li><a class="text-white text-decoration-none" href="?page=association">Qui sommes-nous</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=partenaires">Partenaires</a></li>
                    </ul>
                </div>

                <div class="col-md-2  p-2 text-center">
                    <?php echo titreNiveau5("Pensionnaires",COLOR_TITRE);?>
                    <ul class="list-unstyled footerListSize">
                        <li><a class="text-white text-decoration-none"
                                href="?page=pensionnaires&idstatut=<?=ID_STATUT_A_L_ADOPTION?>">Ils cherchent une
                                famille</a></li>
                        <li><a class="text-white text-decoration-none"
                                href="?page=pensionnaires&idstatut=<?=ID_STATUT_ADOPTE?>">Les anciens</a></li>
                    </ul>
                </div>

                <div class="col-md-2  p-2 text-center">
                    <?php echo titreNiveau5("Actus",COLOR_TITRE);?>
                    <ul class="list-unstyled footerListSize">
                        <li><a  class="text-white text-decoration-none"
                        href="?page=actus&type=<?= TYPE_NEWS ?>">Nouvelles des adoptés</a> </li>
                        <li><a  class="text-white text-decoration-none"
                        href="?page=actus&type=<?= TYPE_EVENTS ?>">Evénements</a> </li>
                        <li><a  class="text-white text-decoration-none"
                        href="?page=actus&type=<?= TYPE_ACTIONS ?>">Nos actions au quotidien</a></li>
                    </ul>
                </div>
               
                <div class="col-md-2  p-2 text-center">
                    <?php echo titreNiveau5("Conseils",COLOR_TITRE);?>
                    <ul class="list-unstyled footerListSize">
                        <li><a class="text-white text-decoration-none" href="?page=temperatures">Températures</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=chocolat">Le chocolat</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=plantestoxiques">Les plantes
                                toxiques</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=sterilisation">Stérilisation</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=educateur">Educateur canin</a></li>
                    </ul>
                </div>
                <div class="col-md-2  p-2 text-center">
                    <?php echo titreNiveau5("Contacts",COLOR_TITRE);?>
                    <ul class="list-unstyled footerListSize ">
                        <li><a class="text-white text-decoration-none" href="?page=contact">Contact</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=don">Don</a></li>
                        <li><a class="text-white text-decoration-none" href="?page=mentions">Mentions Légales</a></li>
                    </ul>
                </div>
                <div class="col-md-1"></div>
            </div>


        </footer>
    </div>
    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>