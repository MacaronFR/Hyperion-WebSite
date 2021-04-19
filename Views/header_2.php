<?php
?>

<nav id="header_2" class="navbar navbar-expand-lg py-4 py-lg-0">
    <div class="container-fluid ju">
        <a class="navbar-brand" href="/shop">
            <img src="/assets/images/Hyperion-yellow-transparent.png" alt="logo_Hyperion" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader2" aria-controls="navbarHeader2" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarHeader2" class="collapse navbar-collapse">
            <div class="d-flex flex-column flex-lg-row container-lg">
                <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Toutes nos catégories</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">aaaaaaaa</a></li>
                        <li><a class="dropdown-item" href="#">bbbbbbbb</a></li>
                        <li><a class="dropdown-item" href="#">cccccccc</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>
                <div class="d-grid gap-2 mt-1 mt-lg-0">
                    <button id="search_barre_bouton" class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
            <div class="navbar-nav me-lg-5" id="header_1_link">
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
<div id="header_2_line"></div>
