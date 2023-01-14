<!-- Navbar-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark sizeNav20 ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- L'Association -->
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                L'association
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item colorMenu" href="?page=association">Qui sommes-nous ?</a>
                <a class="dropdown-item colorMenu" href="?page=partenaires">partenaires</a>
            </div>
      </li>
      <!-- Pensionnaire -->
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Pensionnaires
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item colorMenu" href="?page=pensionnaires&idstatut=<?=ID_STATUT_A_L_ADOPTION?>">Ils cherchent une famille</a>
                <a class="dropdown-item colorMenu" href="?page=pensionnaires&idstatut=<?=ID_STATUT_ADOPTE?>">Les anciens</a>
                <?php if(Securite::verifAccessSession()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item colorPagesAdmin" href="?page=gererPensionnaireAdmin">Gestion des pensionnaires</a>
                
                <?php } ?>
                
            </div>
      </li>
      <!-- Actus -->
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Actus
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item colorMenu" href="?page=actus&type=<?= TYPE_NEWS ?>">Nouvelles des adoptés</a>
                <a class="dropdown-item colorMenu" href="?page=actus&type=<?= TYPE_EVENTS ?>">Evénements</a>
                <a class="dropdown-item colorMenu" href="?page=actus&type=<?= TYPE_ACTIONS ?>">Nos actions au quotidien</a>
                <?php if(Securite::verifAccessSession()){ ?>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item colorPagesAdmin" href="?page=gererNewsAdmin">Gestion des news</a>
                <?php } ?>
            </div>   
      </li> 
      <!-- Conseils -->
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Conseils
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item colorMenu" href="?page=temperatures">Températures</a>
                <a class="dropdown-item colorMenu" href="?page=chocolat">Le chocolat</a>
                <a class="dropdown-item colorMenu" href="?page=plantestoxiques">Les plantes toxiques</a>
                <a class="dropdown-item colorMenu" href="?page=sterilisation">Stérilisation</a>
                <a class="dropdown-item colorMenu" href="?page=educateur">Educateur canin</a>
            </div>
       </li>
      <!-- Contacts -->
      <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle colorMenu" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Contacts
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item colorMenu" href="?page=contact">Contact</a>
                <a class="dropdown-item colorMenu" href="?page=don">Don</a>
                <a class="dropdown-item colorMenu" href="?page=mentions">Mentions légales</a>
            </div>
      </li>
    </ul>
  </div>
</nav>