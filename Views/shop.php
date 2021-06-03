<div id="divShopPrincipal" class="container-fluid d-flex flex-row">
    <div id="divShopCategories" class="col-2 d-none d-lg-flex flex-column mt-4">
        <!-- ============== Price ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Prix</h4>
            <p class="ms-4 mb-1">De 0 à 200 euros</p>
            <p class="ms-4 mb-1">Plus de 200 euros</p>
            <p class="ms-4 mb-1">Plus de 400 euros</p>
        </div>
        <!-- ============== Brand ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Marques</h4>
            <p class="ms-4 mb-1">Acer</p>
            <p class="ms-4 mb-1">Alcatel</p>
            <p class="ms-4 mb-1">Asus</p>
            <p class="ms-4 mb-1">Honor</p>
            <p class="ms-4 mb-1">Huawei</p>
            <p class="ms-4 mb-1">LG</p>
            <p class="ms-4 mb-1">Microsoft</p>
            <p class="ms-4 mb-1">Motorola</p>
            <p class="ms-4 mb-1">Nokia</p>
            <p class="ms-4 mb-1">Samsung</p>
            <p class="ms-4 mb-1">Sony</p>
            <p class="ms-4 mb-1">Wiko</p>
            <p class="ms-4 mb-1">Wileyfox</p>
        </div>

        <!-- ============== Exploitation system ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Systéme d'exploitation</h4>
            <p class="ms-4 mb-1">Android</p>
            <p class="ms-4 mb-1">IOS</p>
            <p class="ms-4 mb-1">Windows Phone</p>
        </div>

        <!-- ============== Accessories ============== -->
        <div class="mb-2">
            <h4 class="mb-2">Accessoires</h4>
            <p class="ms-4 mb-1">Chargeur</p>
            <p class="ms-4 mb-1">Batteries externes</p>
            <p class="ms-4 mb-1">Supports et stations d'accueil</p>
            <p class="ms-4 mb-1">Accessoires Auto</p>
            <p class="ms-4 mb-1">Casques et Ecouteurs</p>
            <p class="ms-4 mb-1">Cartes Mémoires microSD</p>
            <p class="ms-4 mb-1">Cables et Connectiques</p>
            <p class="ms-4 mb-1">Clé micro-USB</p>
            <p class="ms-4 mb-1">Accessoires en Pagaille</p>
        </div>
    </div>
    <div id="divShopLine" style="background-color: #D8D8D8" class="border border-2 d-none d-lg-flex mt-4 rounded"></div>
    <div id="divShopMain" class="d-flex flex-row flex-wrap">
        <?php
        for($i=0; $i<=12; $i++){?>
            <div class="card mx-4 my-5 col-10 col-lg-2" onClick="window.location='/shop/one/product'">
                <img src="/assets/images/cl4p-tp_center.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Samsung Galaxy A51 Smartphone 128GB 4GB Prism Crush Black</h6>
                    <p class="card-text" style="color: green">Trés bonne etat</p>
                    <p href="/shop/one/product" class="btn btn-primary" style="width: 100%; color: black">255,00 €</p>
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