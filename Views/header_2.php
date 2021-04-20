<?php
/**
 * @var array $text Contain all root text in the desired language
 */
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
                <div class="d-grid gap-2 mt-3 mt-lg-0">
                    <button id="search_barre_bouton" class="btn btn-outline-success" type="submit">Search</button>
                </div>
            </div>
            <div class="navbar-nav me-lg-5" id="header_1_link">
                <?php if(isset($_SESSION['mail'])): ?>
                    <a class="nav-item nav-link" href="#"><?= $text['account']['my_account'] ?></a>
                    <a class="nav-item nav-link" href="#"><?= $text['account']['my_command'] ?></a>
                    <a class="nav-item nav-link" href="/disconnect"><?= $text['account']['disconnect'] ?></a>
                <?php else: ?>
                    <a class="nav-item nav-link" href="/inscription"><?= $text['account']['inscription'] ?></a>
                    <a class="nav-item nav-link" href="/connect"><?= $text['account']['connection'] ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<!-- line header yellow -->
<div id="header_2_line"></div>

<!-- sub header 1 -->
<nav class="navbar navbar-expand-lg navbar-light bg-light" id="SubHeaderCategories">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Explorer</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarCategories" aria-controls="navBarCategories" aria-expanded="false" aria-label="Toggle navigation sub_header">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBarCategories">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="#">Nos Produits</a>
                <a class="nav-link" href="#">Service Client</a>
                <a class="nav-link" href="#">Projets Humanitaires</a>
                <a class="nav-link disabled" href="#" >Projets Ecologiques</a>
            </div>
        </div>
    </div>
</nav>
