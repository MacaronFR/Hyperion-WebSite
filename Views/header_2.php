<?php
/**
 * @var array $text Contain all root text in the desired language
 * @var string $title Contain the title of the page
 * @var array $subHeader
 * @var mixed $active
 */

?>
<nav id="header_2" class="navbar navbar-expand-lg py-4 py-lg-0 navbar-light bg-light">
    <div class="container-fluid ju">
        <a class="navbar-brand" href="/shop">
            <img src="/assets/images/Hyperion-yellow-transparent.png" alt="logo_Hyperion" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader2" aria-controls="navbarHeader2" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div id="navbarHeader2" class="collapse navbar-collapse">
            <div class="d-flex flex-column flex-lg-row container-lg">
                <div class="input-group">
                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false"><?=$text['search']['all_cat']?></button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">aaaaaaaa</a></li>
                        <li><a class="dropdown-item" href="#">bbbbbbbb</a></li>
                        <li><a class="dropdown-item" href="#">cccccccc</a></li>
                    </ul>
                    <input type="text" class="form-control" aria-label="Text input with dropdown button">
                </div>
                <div class="d-grid gap-2 mt-3 mt-lg-0">
                    <button id="search_barre_bouton" class="btn btn-outline-success" type="submit"><?=$text['search']['search']?></button>
                </div>
            </div>
            <div class="navbar-nav me-lg-5" id="header_1_link">
                <?php if(isset($_SESSION['mail'])): ?>
                    <a class="nav-item nav-link" href="/myAccount"><?= $text['account']['my_account'] ?></a>
                    <a class="nav-item nav-link" href="/order/pending"><?= $text['account']['my_command'] ?></a>
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
        <a class="navbar-brand" href="#"><?=$text['header']['explore']?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navBarCategories" aria-controls="navBarCategories" aria-expanded="false" aria-label="Toggle navigation sub_header">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navBarCategories">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/shop"><?=$text['header']['products']?></a>
                <?php if(isset($_SESSION['level']) AND $_SESSION['level']==='3'): ?>
                    <a class="nav-item nav-link" href="/trader/add/offer"><?=$text['header']['trader']['offer']?></a>
                <?php endif; ?>
                <?php if(isset($_SESSION['level']) AND $_SESSION['level']<'3'): ?>
                    <a class="nav-item nav-link" href="/manage/add/reference"><?=$text['header']['staff']['product']?></a>
                    <a class="nav-item nav-link" href="/expert/offers"><?=$text['header']['staff']['offer']?></a>
                <?php endif; ?>
                <?php if(isset($_SESSION['level']) AND $_SESSION['level']<'2'): ?>
                    <a class="nav-item nav-link" href="/administration/users"><?=$text['header']['admin']['admin']?></a>
                <?php endif; ?>
                <?php if(isset($_SESSION['level'])): ?>
                    <a class="nav-item nav-link" href="/cart">Mon panier</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>
<?php if ($title === "Shop"): ?>
<nav class="navbar navbar-expand-lg navbar-dark subHeader3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Catégories</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse overflow-scroll" id="navbarNavAltBrandup">
            <div class="navbar-nav">
				<?php foreach($subHeader as $cat):?>
                <a class="nav-link <?= $active === $cat['id']?"active":"" ?>" href="/shop/cat/<?=$cat['id']?>/0"><?=$cat['name']?></a>
				<?php endforeach;?>
            </div>
        </div>
    </div>
</nav>
<?php elseif ($title === "manage"): ?>
<nav class="navbar navbar-expand-lg navbar-dark subHeader3">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><?= $text['sub_header']['admin']['categories']['title']?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltBrandup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="/manage/add/reference"><?= $text['sub_header']['admin']['categories']['add']?></a>
                <a class="nav-link" href="/manage/all/references"><?= $text['sub_header']['admin']['categories']['see_ref']?></a>
                <a class="nav-link" href="/manage/all/products"><?= $text['sub_header']['admin']['categories']['see_prod']?></a>
                <a class="nav-link" href="/manage/all/categories"><?= $text['sub_header']['admin']['categories']['manage']?></a>
            </div>
        </div>
    </div>
</nav>
<?php elseif ($title === "Administration"): ?>
    <nav class="navbar navbar-expand-lg navbar-dark subHeader3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?= $text['sub_header']['admin']['categories']['title']?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltBrandup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/administration/users">Gestion des utilisateurs</a>
                    <a class="nav-link" href="/administration/factures">Gestion des Factures</a>
                </div>
            </div>
        </div>
    </nav>
<?php elseif ($title === "expert"): ?>
    <nav class="navbar navbar-expand-lg navbar-dark subHeader3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Offres</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltBrandup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/expert/offers">Consulter offres</a>
                    <a class="nav-link" href="/expert/pending/offer">Consulter offres en attentes</a>
                    <a class="nav-link" href="/expert/history/offer">Consulter historique des offres traités</a>
                </div>
            </div>
        </div>
    </nav>
<?php elseif ($title === "Mes commandes"): ?>
    <nav class="navbar navbar-expand-lg navbar-dark subHeader3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Commandes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltBrandup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/order/pending">Commandes en préparations</a>
                    <a class="nav-link" href="/order/history">Historique des commandes</a>
                </div>
            </div>
        </div>
    </nav>
<?php elseif ($title === "trader"): ?>
    <nav class="navbar navbar-expand-lg navbar-dark subHeader3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><?= $text['sub_header']['trader']['offer']['title']?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltBrandup" aria-controls="navbarNavAltBrandup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltBrandup">
                <div class="navbar-nav">
                    <a class="nav-link active" aria-current="page" href="/trader/add/offer"><?= $text['sub_header']['trader']['offer']['add']?></a>
                    <a class="nav-link" href="/trader/pending/offer"><?= $text['sub_header']['trader']['offer']['pending']?></a>
                    <a class="nav-link" href="/trader/history/offer"><?= $text['sub_header']['trader']['offer']['history']?></a>
                </div>
            </div>
        </div>
    </nav>
<?php endif; ?>