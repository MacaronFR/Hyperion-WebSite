<?php
/**
 * @var array $categories
 */
?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion des caractéristiques & catégories</h1>
    <!-- gestion categories of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_category" class="container mb-4">
            <h3 class="mb-3">Ajouter une catégorie de produit</h3>
            <div class="row">
                <div class="col-7">
                    <input class="form-control" type="text" placeholder="Saisie d'une catégorie de produit" id="addCategoryInput">
                </div>
                <div class="col-3">
                    <button class="btn btn-primary" type="submit" id="addCategory">Ajouter</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_category" class="container mt-3">
            <h3 class="mb-3">Toutes les catégories de produit</h3>
            <div class="table-responsive">
                <table class="table" id="table_categories" data-toggle="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom Du domaine</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody id="tabCat">
					<?php foreach($categories as $category):?>
                       <tr id="cat<?= $category['id']?>" class="cat-line">
                            <td><?= $category['id']?></td>
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
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterType" data-type-id="25" data-type-domain-app="Objet connecté" data-type-name="Smartphone">Modifier</button></td>
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
                            <th scope="row">4</th>
                            <td>Tv</td>
                            <td>écran plat</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">5</th>
                            <td>Objets connectés</td>
                            <td>montre</td>
                            <td><button type="button" class="btn btn-primary">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
                        <tr>
                            <th scope="row">6</th>
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

    <!-- gestion specification of product -->
    <div id="div_manage_specification" class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_type" class="container mb-3">
            <h3 class="mb-3">Ajouter une specification</h3>
            <div class="row">
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="Nommer une specification">
                </div>
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="attribuer une valeur à cette specification">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit">Créer</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_spec" class="container mt-3">
            <h3 class="mb-3">Toutes les spécifications de produits</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom De la specification</th>
                        <th scope="col">valeur de la spécification</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>RAM</td>
                        <td>8 GB</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterSpec" data-spec-id="1" data-spec-name="RAM" data-spec-value="8 Gb">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">2</th>
                        <td>RAM</td>
                        <td>16 Gb</td>
                        <td><button type="button" class="btn btn-primary">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">3</th>
                        <td>Stockage</td>
                        <td>120 Mb</td>
                        <td><button type="button" class="btn btn-primary">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">4</th>
                        <td>Stockage</td>
                        <td>4 Gb</td>
                        <td><button type="button" class="btn btn-primary">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">5</th>
                        <td>Stockage</td>
                        <td>120 GB</td>
                        <td><button type="button" class="btn btn-primary">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    <tr>
                        <th scope="row">6</th>
                        <td>Couleur</td>
                        <td>rouge</td>
                        <td><button type="button" class="btn btn-primary">Modifier</button></td>
                        <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Modal AlterDomain -->
<div class="modal fade" id="modalAlterCategory" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalCategory">Modifier la catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">id de la catégorie:</label>
                        <input type="text" class="form-control" id="actualCategoryName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom de la catégorie:</label>
                        <input class="form-control" id="newCategoryName" placeholder="Nom">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="changeCategory">Modifier</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Alter Spec -->
<div class="modal fade" id="modalAlterType" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalType"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="col-form-label">id du type:</label>
                        <input type="text" class="form-control" id="actualTypeName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom du Type:</label>
                        <input class="form-control" id="newTypeName">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom domaine du type:</label>
                        <select class="form-select">
                            <option selected>Choisir un Domaine de produit</option>
                            <option value="1">Téléphonie</option>
                            <option value="2">Vidéo</option>
                            <option value="3">Electro-ménager</option>
                        </select>
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

<!-- Modal Alter Spec -->
<div class="modal fade" id="modalAlterSpec" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModalSpec"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="col-form-label">id de la spec:</label>
                        <input type="text" class="form-control" id="actualSpecName" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom de la spec:</label>
                        <input class="form-control" id="newSpecName">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouvelle valeur de la spec:</label>
                        <input class="form-control" id="newSpecValue">
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

<!-- TOAST -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1500">
	<div id="ToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-danger">
			Hello, world! This is a toast message.
		</div>
	</div>
	<div id="ToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-success">
			Hello, world! This is a toast message.
		</div>
	</div>
	<div id="ToastWarning" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-warning">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>

<script>
	let toastEL = [].slice.call(document.querySelectorAll(".toast"));
	let toastList = toastEL.map(function (toastE) {
		return new bootstrap.Toast(toastE)
	})
    // ---------- callModalDomain  ----------
    //var domainModal = document.getElementById('modalAlterCategory')
	$("#modalAlterCategory").on('show.bs.modal' ,function (event) {
        let button = event.relatedTarget
        let domain_actual_name = button.getAttribute('data-category-name')
        let id_domain = button.getAttribute('data-category-id')
        let modalTitle = document.getElementById('titleModalCategory')
        let modalBodyInput = document.getElementById('actualCategoryName')
		$("#newCategoryName").attr("placeholder", domain_actual_name)
		$('#changeCategory').off("click")
		$('#changeCategory').on("click", function (){
			let value = $("#newCategoryName").val();
			API_REQUEST("/category/" + token + "/" + id_domain, "PUT", {"name": value}).then((res) => {
				if(res['status']['code'] === 200){
					$("#cat" + id_domain).children()[1].innerText = value;
					button.dataset["categoryName"] = value
					$("#modalAlterCategory").modal("toggle")
					$("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès")
					toastList[1].show()
					$("#newCategoryName").val("")
				}else if(res['status']['code'] === 202){
					$("#ToastWarning").children(".toast-body").text("Cette catégorie existe déjà")
					toastList[2].show()
				}
			}).catch((res) => {
				$("#ToastError").children(".toast-body").text("Erreur lors de la modification")
				toastList[0].show()
			});
		})
        modalTitle.textContent = 'Renommer le Domaine : ' + domain_actual_name
        modalBodyInput.value = id_domain
    })

	$(".delete-cat").on('click', deleteCat)
	function deleteCat(){
		let id = $(this).data("category-id")
		API_REQUEST("/category/" + token + "/" + id, "DELETE").then(() => {
			let catid = "cat" + id
			$("#"+catid).remove()
			$("#ToastSuccess").children(".toast-body").text("Catégorie supprimer avec succès")
			toastList[1].show()
		}).catch((res) => {
			$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
			toastList[0].show()
		})
	}

	$("#addCategory").on("click", function(){
		let name = $("#addCategoryInput").val()
		API_REQUEST("/category/" + token, "POST", {"name": name}).then((res) =>{
			if(res['status']['code'] === 201){
				let new_line = $($(".cat-line")[0]).clone(true, true);
				new_line.attr("id", "cat" + res['content'][0]);
				new_line.children()[0].textContent = res['content'][0];
				new_line.children()[1].textContent = name;
				new_line.children()[2].children[0].dataset["categoryId"] = res['content'][0];
				new_line.children()[2].children[0].dataset["categoryName"] = name;
				new_line.children()[3].children[0].dataset["categoryId"] = res['content'][0];
				$(new_line.children()[3].children[0]).off("click");
				$(new_line.children()[3].children[0]).on("click", deleteCat);
				new_line.prependTo($("#tabCat"));
				$("#ToastSuccess").children(".toast-body").text("Catégorie ajouter avec succès");
				toastList[1].show();
				$("#addCategoryInput").val("");
			}else if(res['status']['code'] === 202){
				$("#ToastWarning").children(".toast-body").text("La catégorie existe déjà")
				toastList[2].show()
			}
		}).catch((res) => {
			$("#ToastError").children(".toast-body").text("Erreur lors de la création")
			toastList[0].show()
		})
	})

    // ---------- callModalType  ----------
    var typeModal = document.getElementById('modalAlterType')
    modalAlterType.addEventListener('show.bs.modal', function (event)
    {
        var button = event.relatedTarget
        var Type_actual_name = button.getAttribute('data-type-name')
        var id_type = button.getAttribute('data-type-id')
        var modalTitle = document.getElementById('titleModalType')
        var modalBodyInput = document.getElementById('actualTypeName')
        modalTitle.textContent = 'Alterer le type : ' + Type_actual_name
        modalBodyInput.value = id_type
    })

    // ---------- callModalSpec  ----------
    var specModal = document.getElementById('modalAlterSpec')
    modalAlterSpec.addEventListener('show.bs.modal', function (event)
    {
        var button = event.relatedTarget
        var Spec_actual_name = button.getAttribute('data-spec-name')
        var Spec_actual_value = button.getAttribute('data-spec-value')
        var id_spec = button.getAttribute('data-spec-id')
        var modalTitle = document.getElementById('titleModalSpec')
        var modalBodyInput = document.getElementById('actualSpecName')
        modalTitle.textContent = 'Alterer la spec: ' + Spec_actual_name
        modalBodyInput.value = id_spec
    })
</script>
