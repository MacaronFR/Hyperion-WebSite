<?php
/**
 * @var array $allProductText
 */
?>
<div id="div_main_manage_domains_caracteristiques" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
    <h1 style="text-align: center" class="mb-4"><?= $allProductText['product']['title']?></h1>
    <div class="row col-11 col-lg-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
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
						data-row-attributes="rowAttributes"
						data-locale="<?= $_SESSION['lang']?>">
					<thead>
					<tr>
						<th data-sortable="true" data-field="id"><?= $allProductText['product']['table']['header']['id']?></th>
						<th data-sortable="true" data-field="type"><?= $allProductText['product']['table']['header']['type']?></th>
						<th data-sortable="true" data-field="brand"><?= $allProductText['product']['table']['header']['brand']?></th>
						<th data-sortable="true" data-field="model"><?= $allProductText['product']['table']['header']['model']?></th>
						<th data-sortable="true" data-field="buy_p"><?= $allProductText['product']['table']['header']['buying']?></th>
						<th data-sortable="true" data-field="sell_p"><?= $allProductText['product']['table']['header']['selling']?></th>
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
				<h5 class="modal-title"></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $allProductText['product']['modal']['delete']['close']?></button>
				<button type="button" class="btn btn-danger delete"><?= $allProductText['product']['modal']['delete']['delete']?></button>
			</div>
		</div>
	</div>
</div>

<div class="position-fixed top-0 end-0 p-3" style="z-index: 1500">
	<div id="ToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-danger">
		</div>
	</div>
	<div id="ToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-success">
		</div>
	</div>
	<div id="ToastWarning" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-warning">
		</div>
	</div>
</div>
<script>
	const text = {
		"table":{
			"button": <?= json_encode($allProductText['product']['table']['button'])?>
		},
		"modal":{
			'delete': "<?= $allProductText['product']['modal']['delete']['title']?>"
		},
		"toast": <?= json_encode($allProductText['product']['toast'])?>
	}
</script>
<script src="/assets/js/manageProduct.js"></script>