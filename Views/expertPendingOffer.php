<?php
/**
* @var array $categories
 * @var array $expertPendingOfferText
 * @var $states
 */
?>
<div class="container-fluid d-flex flex-column">
	<h3 class="align-self-center mb-4 mt-3"><?= $expertPendingOfferText['expert']['title']?></h3>
	<div class="container-fluid d-flex flex-column flex-lg-row">
		<div class="container-fluid col-lg-7">
			<table
					class="table"
					id="table_offer"
					data-toggle="table"
					data-pagination="true"
					data-height="600"
					data-ajax="retrieve_pending_offer"
					data-side-pagination="server"
					data-row-attributes="rowAttributes"
					data-locale="<?= $_SESSION['lang']?>">
				<thead>
				<tr>
					<th data-sortable data-field="id">ID</th>
					<th data-field="type">Type</th>
					<th data-sortable data-field="date">Date</th>
					<th data-field="brand">Brand</th>
					<th data-field="model">Model</th>
					<th data-field="change"></th>
					<th data-field="confirm"></th>
				</tr>
				</thead>
			</table>
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

<div class="modal fade" id="modalModify" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header d-flex flex-column">
				<h5 class="modal-title"><?= $expertPendingOfferText['expert']['modal']['title']?></h5>

				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body" id="modalModifyOffer">
                <div class="mt-1 mt-lg-4">
                    <label for="aaa" class="form-label">Prix (Estimation):</label>
                    <input type="text" class="form-control" id="priceEstimation" value="<?= $expertPendingOfferText['expert']['unavailable']?>">
                </div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectCategory">
							<option selected disabled class="keep"><?= $expertPendingOfferText['expert']['modal']['category']?></option>
							<option value="undefined" class="keep"><?= $expertPendingOfferText['expert']['modal']['unreferenced']?></option>
							<?php foreach($categories as $category): ?>
								<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectType" disabled>
							<option selected disabled class="keep" value="-2"><?= $expertPendingOfferText['expert']['modal']['type']?></option>
							<option value="undefined" class="keep"><?= $expertPendingOfferText['expert']['modal']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectBrand" disabled>
							<option selected disabled class="keep" value="-2"><?= $expertPendingOfferText['expert']['modal']['brand']?></option>
							<option value="undefined" class="keep"><?= $expertPendingOfferText['expert']['modal']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectModel" disabled>
							<option selected disabled class="keep" value="-2"><?= $expertPendingOfferText['expert']['modal']['model']?></option>
							<option value="undefined" class="keep"><?= $expertPendingOfferText['expert']['modal']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectState" disabled>
							<option selected class="keep" disabled value="undefined"><?= $expertPendingOfferText['expert']['modal']['state']['state_title']?></option>
							<option value="1"><?= $expertPendingOfferText['expert']['modal']['state']['state_jabba']?></option>
							<option value="2"><?= $expertPendingOfferText['expert']['modal']['state']['state_passable']?></option>
							<option value="3"><?= $expertPendingOfferText['expert']['modal']['state']['state_ok']?></option>
							<option value="4"><?= $expertPendingOfferText['expert']['modal']['state']['state_good']?></option>
							<option value="5"><?= $expertPendingOfferText['expert']['modal']['state']['state_new']?></option>
						</select>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?= $expertPendingOfferText['expert']['modal']['close']?></button>
				<button type="button" class="btn btn-primary" id="changeOffer"><?= $expertPendingOfferText['expert']['modal']['ok']?></button>
			</div>
		</div>
	</div>
</div>
<script>
	let text = {
		'select': {
			'choose': "<?= $expertPendingOfferText['expert']['modal']['choose']?>"
		},
		'warning': <?= json_encode($expertPendingOfferText['expert']['warning'])?>,
		'success': {
			'created': "<?= $expertPendingOfferText['expert']['success']['created']?>"
		},
		'error': <?= json_encode($expertPendingOfferText['expert']['error'])?>,
		'specification': <?= json_encode($expertPendingOfferText['specification'])?>,
		'unavailable': "<?= $expertPendingOfferText['expert']['unavailable'] ?>"
	}
	let stateVal = {
		<?php foreach($states as $k => $s): ?>
		"<?= $s['id'] ?>": <?= $s['penality']?><?= ($states[count($states) - 1]['id'] === $s['id']?"":",")?>
		<?php endforeach;?>
	}
</script>
<script src="/assets/js/expertOfferPending.js"></script>