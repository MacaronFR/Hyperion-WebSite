<?php ?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion des caractéristiques & catégories</h1>
    <!-- gestion categories of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_domain mb-4" class="container">
            <h3 class="mb-3">Ajouter un domaine de produit</h3>
            <div class="row">
                <div class="col-7">
                    <input class="form-control" type="text" placeholder="Saisie d'un domaine de produit">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_domain" class="container mt-3">
            <h3 class="mb-3">Tous les domaines de produit</h3>
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
    <div id="div_manage_types" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_type" class="container mb-3">
            <h3 class="mb-3">Ajouter un Type de produits associés à son domaine</h3>
            <div class="row">
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="Saisie d'un type de produit">
                </div>
                <div class="col-5">
                    <select class="form-select">
                        <option selected>Choisir un Domaine de produit</option>
                        <option value="1">Téléphonie</option>
                        <option value="2">Vidéo</option>
                        <option value="3">Electro-ménager</option>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Ajouter</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_type" class="container mt-3">
            <h3 class="mb-3">Tous les types de produits associés à leur domaine</h3>
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
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterDomain" data-domain-id="23" data-domain-name="HomePod">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal AlterDomain -->
<div class="modal fade" id="modalAlterDomain" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalDomain">Modifier le Domaine</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">id du domaine:</label>
                        <input type="text" class="form-control" id="actualDomaineName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom du domaine:</label>
                        <input class="form-control" id="newDomainName">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Modifier</button>
            </div>
        </div>
    </div>
</div>

<!-- script callModalDomain -->
<script>
var domainModal = document.getElementById('modalAlterDomain')
modalAlterDomain.addEventListener('show.bs.modal', function (event) {
    // Button that triggered the modal
    var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var domain_actual_name = button.getAttribute('data-domain-name')
  var id_domain = button.getAttribute('data-domain-id')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modalTitle = document.getElementById('titleModalDomain')
  var modalBodyInput = document.getElementById('actualDomaineName')

  modalTitle.textContent = 'Renommer le Domaine : ' + domain_actual_name
  modalBodyInput.value = id_domain
})
</script>
