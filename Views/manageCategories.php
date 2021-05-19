<?php
/**
 * @var array $categories
 * @var array $types
 */
?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion des caractéristiques & catégories</h1>
    <!-- gestion categories of product -->
    <div id="div_manage_domain" class="row col-11 col-lg-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
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
                <table
						class="table"
						id="table_categories"
						data-toggle="table"
						data-search="true"
						data-pagination="true"
						data-height="600"
						data-ajax="retrieve_cat"
						data-side-pagination="server"
						data-row-attributes="rowAttributes">
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
    <div id="div_manage_types" class="row col-11 col-lg-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_type" class="container mb-3">
            <h3 class="mb-3">Ajouter un Type de produits associés à son domaine</h3>
            <div class="row">
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="Saisie d'un type de produit" id="typeName">
                </div>
                <div class="col-5">
                    <select class="form-select" id="typeCategory">
                        <option selected disabled>Choisir une catégorie de produit</option>
						<?php foreach($categories as $cat): ?>
							<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
						<?php endforeach; ?>
                    </select>
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit" id="addType">Ajouter</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_type" class="container mt-3">
            <h3 class="mb-3">Tous les types de produits associés à leur domaine</h3>
            <div class="table-responsive">
				<table
						class="table"
						id="table_type"
						data-toggle="table"
						data-search="true"
						data-pagination="true"
						data-height="600"
						data-ajax="retrieve_type"
						data-side-pagination="server"
						data-row-attributes="rowAttributes">
                    <thead>
                    <tr>
                        <th data-field="id" data-sortable="true">id</th>
						<th data-field="type" data-sortable="true">Type de produit</th>
                        <th data-field="category" data-sortable="true">Nom de la catégorie</th>
                        <th data-field="modif"></th>
                        <th data-field="suppr"></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- gestion specification of product -->
    <div id="div_manage_specification" class="row col-11 col-lg-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div id="div_create_type" class="container mb-3">
            <h3 class="mb-3">Ajouter une specification</h3>
            <div class="row">
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="Nommer une specification" id="newSpecName">
                </div>
                <div class="col-5">
                    <input class="form-control" type="text" placeholder="attribuer une valeur à cette specification" id="newSpecId">
                </div>
                <div class="col-2">
                    <button class="btn btn-primary" type="submit" id="addSpec">Créer</button>
                </div>
            </div>
        </div>
        <div id="div_manage_all_spec" class="container mt-3">
            <h3 class="mb-3">Toutes les spécifications de produits</h3>
            <div class="table-responsive">
                <table
						class="table"
						id="table_spec"
						data-toggle="table"
						data-search="true"
						data-pagination="true"
						data-height="600"
						data-ajax="retrieve_spec"
						data-side-pagination="server"
						data-row-attributes="rowAttributes">
                    <thead>
                    <tr>
                        <th data-field="id">id</th>
                        <th data-field="name">Nom De la specification</th>
                        <th data-field="value">valeur de la spécification</th>
						<th data-field="modif"></th>
						<th data-field="suppr"></th>
                    </tr>
                    </thead>
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
                        <label for="newTypeName" class="col-form-label">Nouveau nom du Type : </label>
                        <input class="form-control" id="newTypeName">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouvelle catégories du type : </label>
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
                <button type="button" class="btn btn-primary" id="changeType">Modifier</button>
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
                        <input type="text" class="form-control" id="actualSpecId" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouveau nom de la spec:</label>
                        <input class="form-control" id="specNewName">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Nouvelle valeur de la spec:</label>
                        <input class="form-control" id="newSpecValue">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="changeSpec">Modifier</button>
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

<script src="/assets/js/manageCat.js"></script>
