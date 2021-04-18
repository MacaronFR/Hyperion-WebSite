<?php
?>

<nav id="header_2" class="navbar navbar-expand-lg py-4 py-lg-0">
    <a class="navbar-brand" href="/shop">
        <img src="/assets/images/Hyperion-yellow-transparent.png" alt="logo_Hyperion" class="img-fluid">
    </a>
     <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader2" aria-controls="navbarHeader2" aria-expanded="false">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- deuxieme partie -->
    <div class="collapse navbar-collapse" id="navbarHeader2">
        <div class="navbar-collapse">
            <div class="d-flex flex-column flex-lg-row">
                <?php if (isset($_SESSION['mail'])){ ?>
                    <a class="nav-item nav-link" href="#">Mon compte</a>
                    <a class="nav-item nav-link" href="#">Mes commandes</a>
                    <a class="nav-item nav-link" href="/disconnect">Déconnexion</a>
                    <?php }else { ?>
                    <a class="nav-item nav-link" href="/inscription">Inscription</a>
                    <a class="nav-item nav-link" href="/connect">Connexion</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>

