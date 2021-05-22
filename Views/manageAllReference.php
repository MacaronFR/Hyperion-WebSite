<?php
/**
 * @var array $manageAllReferenceText
 */
?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
	<h1 style="text-align: center" class="mb-4"><?= $manageAllReferenceText['reference']['title']?></h1>
	<div id="div_manage_domain"
		 class="row col-11 col-lg-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
		<div id="div_manage_all_products" class="container mt-3">
			<div class="table-responsive">
				<table
						class="table"
						id="table_categories"
						data-toggle="table"
						data-search="true"
						data-pagination="true"
						data-height="600"
						data-ajax="retrieve_ref"
						data-side-pagination="server"
						data-row-attributes="rowAttributes"
						data-locale="<?= $_SESSION['lang']?>">
					<thead>
					<tr>
						<th data-sortable="true" data-field="id"><?= $manageAllReferenceText['reference']['table']['header']['id']?></th>
						<th data-sortable="true" data-field="type"><?= $manageAllReferenceText['reference']['table']['header']['type']?></th>
						<th data-sortable="true" data-field="brand"><?= $manageAllReferenceText['reference']['table']['header']['brand']?></th>
						<th data-sortable="true" data-field="model"><?= $manageAllReferenceText['reference']['table']['header']['model']?></th>
						<th data-sortable="true" data-field="buying"><?= $manageAllReferenceText['reference']['table']['header']['buying']?></th>
						<th data-sortable="true" data-field="selling"><?= $manageAllReferenceText['reference']['table']['header']['selling']?></th>
						<th data-field="modif"></th>
						<th data-field="suppr"></th>
					</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalAlterRef" tabindex="-1" aria-hidden="true">
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
				<h5 class="modal-title">Supprimer Référence : </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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

<script src="/assets/js/manageRef.js"></script>