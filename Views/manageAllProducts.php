<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion de l'ensemble des produits</h1>
    <!-- gestion categories of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_manage_all_products" class="container mt-3">
            <h3 class="mb-3">Tous les produits et leurs specs</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom Du produit</th>
                        <th scope="col">Specs du produit</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="tabCat">
                    <?php foreach($categories as $category):?>
                        <tr id="cat<?= $category['id']?>" class="cat-line">
                            <td><?= $category['id']?></td>
                            <td><?= $category["name"] ?></td>
                            <td><?= $category["name"] ?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterCategory" data-category-id="<?= $category['id']?>" data-category-name="<?= $category['name']?>">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger delete-cat" data-category-id="<?= $category['id']?>">Supprimer</button></td>
                        </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>