<div id="divShopPrincipal" class="container-fluid d-flex flex-row">
    <div id="divShopCategories" class="col-2">
        <!-- ============== Price ============== -->
        <h4 class="mb-2">Prix</h4>
        <p class="ms-4 mb-1" style="color: gray">De 0 à 200 euros</p>
        <p>Plus de 200 euros</p>
        <p>Plus de 400 euros</p>

        <!-- ============== Brand ============== -->
        <h4>Marques</h4>
        <p>Acer</p>
        <p>Alcatel</p>
        <p>Asus</p>
        <p>Honor</p>
        <p>Huawei</p>
        <p>LG</p>
        <p>Microsoft</p>
        <p>Motorola</p>
        <p>Nokia</p>
        <p>Samsung</p>
        <p>Sony</p>
        <p>Wiko</p>
        <p>Wileyfox</p>

        <!-- ============== Exploitation system ============== -->
        <h4>Systéme d'exploitation</h4>
        <p>Android</p>
        <p>IOS</p>
        <p>Windows Phone</p>

        <!-- ============== Accessories ============== -->
        <h4>Accessoires</h4>
        <p>Chargeur</p>
        <p>Batteries externes</p>
        <p>Supports et stations d'accueil</p>
        <p>Accessoires Auto</p>
        <p>Casques et Ecouteurs</p>
        <p>Cartes Mémoires microSD</p>
        <p>Cables et Connectiques</p>
        <p>Clé micro-USB</p>
        <p>Accessoires en Pagaille</p>
    </div>
    <div id="divShopLine" style="background-color: yellow" class="border border-2
"></div>
    <div id="divShopMain" class="d-flex flex-row flex-wrap">
        <?php
        for($i=0; $i<=12; $i++){?>
            <div class="card mx-4 my-5" style="width: 14rem;">
                <img src="cl4p-tp_center.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Samsung Galaxy A51 Smartphone 128GB 4GB Prism Crush Black</h6>
                    <p class="card-text" style="color: green">Trés bonne etat</p>
                    <p href="#" class="btn btn-warning" style="width: 100%; color: black">255,00 €</p>
                </div>
            </div>
        <?php }
        ?>
    </div>
</div>
<nav aria-label="Page navigation example" class="d-flex justify-content-center mb-1">
    <ul class="pagination">
        <li class="page-item"><a class="page-link" href="#">Précedent</a></li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item"><a class="page-link" href="#">Suivant</a></li>
    </ul>
</nav>