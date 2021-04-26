<?php
/**
 * @var array $categories
 * @var array $types
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
                <table class="table" id="table_categories" data-toggle="table" data-search="true" data-pagination="true" data-height="600" data-ajax="retrieve_cat" data-side-pagination="server" data-row-attributes="rowAttributes">
                    <thead>
                    <tr>
                        <th data-sortable="true" data-field="id">id</th>
                        <th data-sortable="true" data-field="name">Nom Du domaine</th>
						<th data-field="modif"></th>
						<th data-field="suppr"></th>
                    </tr>
                    </thead>

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
                        <option selected disabled>Choisir un Domaine de produit</option>
                        <?php foreach($categories as $cat): ?>
							<option value="<?= $cat['id']?>"><?= $cat['name']?></option>
						<?php endforeach;?>
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
						<th scope="col">Type de produit</th>
                        <th scope="col">Nom Du domaine</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
					<?php foreach($types as $type): ?>
                        <tr>
                            <td><?= $type['id'] ?></td>
                            <td><?= $type['type'] ?></td>
                            <td><?= $type['category_name']?></td>
                            <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAlterType" data-type-id="<?= $type["id"]?>" data-type-category-id="<?= $type["category"]?>" data-type-name="<?= $type["type"]?>">Modifier</button></td>
                            <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                        </tr>
					<?php endforeach; ?>
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
                        <label for="newTypeName" class="col-form-label">Nouveau nom du Type:</label>
                        <input class="form-control" id="newTypeName">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom domaine du type:</label>
                        <select class="form-select" id="selectTypeCat">
							<?php foreach($categories as $cat): ?>
								<option value="<?= $cat['id']?>"><?= $cat['name']?></option>
							<?php endforeach;?>
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

<div class="modal fade" id="modalDelete" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Supprimer</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-danger delete">Supprimer</button>
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

	function rowAttributes(row, index){
		return {"class": "cat-row"};
	}
    // ---------- callModalDomain  ----------
    //var domainModal = document.getElementById('modalAlterCategory')
	$("#modalAlterCategory").on('show.bs.modal' ,function (e) {
        let button = $(e.relatedTarget);
        let domain_actual_name = button.data("categoryName")
        let id_domain = button.data("categoryId")
        $('#titleModalCategory').text('Renommer le Domaine : ' + domain_actual_name)
        $('#actualCategoryName').val(id_domain)
		$("#newCategoryName").attr("placeholder", domain_actual_name)
		$('#changeCategory').off("click").on("click", function (){
			let value = $("#newCategoryName").val();
			API_REQUEST("/category/" + token + "/" + id_domain, "PUT", {"name": value}).then((res) => {
				if(res['status']['code'] === 200){
					button.parents("tr").children()[1].innerText = value;
					button.data("categoryName", value);
					$("#modalAlterCategory").modal("toggle")
					$("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès")
					toastList[1].show()
					$("#newCategoryName").val("")
				}else if(res['status']['code'] === 202){
					$("#ToastWarning").children(".toast-body").text("Cette catégorie existe déjà")
					toastList[2].show()
				}
			}).catch((res) => {
				console.log(res);
				$("#ToastError").children(".toast-body").text("Erreur lors de la modification")
				toastList[0].show()
			});
		})
    })

	$("#modalDelete").on("show.bs.modal", function (e){
		let button = $(e.relatedTarget);
		$(this).find(".modal-title").text("Supprimer catégorie : " + button.data("categoryName"));
		$(this).find(".delete").off("click").on("click", function () {
			deleteCat(button.data("categoryId"), $(this).parents(".modal"), button.parents("tr"));
		})
	})

	function deleteCat(id, modal, line){
		API_REQUEST("/category/" + token + "/" + id, "DELETE").then(() => {
			$(line).remove()
			$("#ToastSuccess").children(".toast-body").text("Catégorie supprimer avec succès")
			modal.modal("toggle");
			toastList[1].show()
		}).catch((res) => {
			console.log(res);
			$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
			toastList[0].show()
		})
	}

	$("#addCategory").on("click", function(){
		let name = $("#addCategoryInput").val()
		API_REQUEST("/category/" + token, "POST", {"name": name}).then((res) =>{
			if(res['status']['code'] === 201){
				let new_line = $($(".cat-row")[0]).clone(true, true);
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
    $("#modalAlterType").on("show.bs.modal", function (e){
		const button = $(e.relatedTarget);
		$("#titleModalType").textContent = "Modifier le type : " + button.data("typeName");
		$("#actualTypeName").val(button.data("typeId"));
		$("#newTypeName").attr("placeholder", button.data("typeName"));
		$("#selectTypeCat").val(button.data("typeCategoryId")).change();
	});


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
	var test;
	function retrieve_cat(params){
		let page = params.data.offset / 10
		let url = "/category/" + page;
		if(params.data.order !== undefined && params.data.sort !== undefined) {
			url += "/search/" + params.data.search;
			url += "/order/" + params.data.order;
			url += "/sort/" + params.data.sort;
		}else if (params.data.search !== "") {
			url += "/search/" + params.data.search;
		}
    	API_REQUEST(url, "GET").then((res) => {
    		let rows = [];
    		let total = res['content'].total;
    		let totalNotFiltered = res['content'].totalNotFiltered;
    		delete res['content']['total'];
    		delete res['content']['totalNotFiltered'];
    		for(let i = 0; i < Object.keys(res.content).length; ++i){
				rows.push(res.content[i]);
				rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterCategory\" data-category-id=\"" + rows[i]['id'] + "\" data-category-name=\"" + rows[i]['name'] + "\">Modifier</button>"
				rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-category-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-category-name=\"" + rows[i]['name'] + "\">Supprimer</button>"
			}
    		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
		})
	}
</script>
