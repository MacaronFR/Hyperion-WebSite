<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4">Gestion de l'ensemble des produits</h1>
    <div class="row col-11 col-lg-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
        <div class="container mt-3">
            <div class="table-responsive">
				<table
						class="table"
						id="table_prod"
						data-toggle="table"
						data-search="true"
						data-pagination="true"
						data-height="600"
						data-ajax="retrieve_prod"
						data-side-pagination="server"
						data-row-attributes="rowAttributes">
					<thead>
					<tr>
						<th data-sortable="true" data-field="id">id</th>
						<th data-sortable="true" data-field="type">Type</th>
						<th data-sortable="true" data-field="brand">Marque</th>
						<th data-sortable="true" data-field="model">Modèle</th>
						<th data-sortable="true" data-field="buy_p">Prix d'achat</th>
						<th data-sortable="true" data-field="sell_p">Prix de vente</th>
						<th data-field="modif"></th>
						<th data-field="suppr"></th>
					</tr>
					</thead>
				</table>
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
<script src="/assets/js/manageProduct.js"></script>