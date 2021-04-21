<?php ?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion des caractéristiques & catégories</h1>
    <!-- gestion categories of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_domain" class="container">
            <h3>Ajouter un domaine de produit</h3>
            <input class="form-control" type="text" placeholder="Saisie d'un domaine de produit">
        </div>
        <div id="div_manage_all_domain" class="container mt-3">
            <h3>Tous les domaines de produit</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom Du domaine</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                       <tr>
                            <th scope="row">1</th>
                            <td>Téléphonie</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                       <tr>
                            <th scope="row">2</th>
                            <td>Vidéo</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                       <tr>
                            <th scope="row">3</th>
                            <td>Electro-ménager</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                       <tr>
                            <th scope="row">1</th>
                            <td>Tv</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                       <tr>
                            <th scope="row">2</th>
                            <td>Objets connectés</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                       <tr>
                            <th scope="row">3</th>
                            <td>Audio & HIFI</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                       </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- gestion types of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_domain" class="container">
            <h3>Ajouter un Type de produits</h3>
            <input class="form-control" type="text" placeholder="Saisie d'un domaine de produit">
        </div>
        <div id="div_manage_all_domain" class="container mt-3">
            <h3>Tous les types de produits associés à leur domaine</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom Du domaine</th>
                        <th scope="col">Type de produit</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Téléphonie</td>
                            <td>Smarthphone</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Téléphonie</td>
                            <td>Téléphone fix</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Téléphonie</td>
                            <td>Baby-phone</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Tv</td>
                            <td>écran plat</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">2</th>
                            <td>Objets connectés</td>
                            <td>montre</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">3</th>
                            <td>Objets connectés</td>
                            <td>HomePod</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
