<?php
/**
 * @var array $categories
 * @var array $traderAddOfferText
 * @var array $traderAddOfferSpecText
 */
?>
<div id="div_trader_add_offer_general" class="container-fluid d-flex flex-column">
	<h1 class="align-self-center mt-4"><?= $traderAddOfferText['offer']['select']['create']?></h1>
	<div class="d-flex flex-column flex-lg-row mt-11 mt-lg-4 justify-content-end pe-lg-5 mb-5">
		<div id="div_trader_add_offer"
			 class="row col-11 col-lg-5 border border-2 border-warning rounded-3 position me-lg-5 px-5 pt-3 pb-5 align-self-center">
			<form id="newOffer">
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectCategory">
							<option selected disabled class="keep"><?= $traderAddOfferText['offer']['select']['category']?></option>
							<option value="undefined" class="keep"><?= $traderAddOfferText['offer']['select']['unreferenced']?></option>
							<?php foreach($categories as $category): ?>
								<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectType" disabled>
							<option selected disabled class="keep" value="-2"><?= $traderAddOfferText['offer']['select']['type']?></option>
							<option value="undefined" class="keep"><?= $traderAddOfferText['offer']['select']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectBrand" disabled>
							<option selected disabled class="keep" value="-2"><?= $traderAddOfferText['offer']['select']['brand']?></option>
							<option value="undefined" class="keep"><?= $traderAddOfferText['offer']['select']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectModel" disabled>
							<option selected disabled class="keep" value="-2"><?= $traderAddOfferText['offer']['select']['model']?></option>
							<option value="undefined" class="keep"><?= $traderAddOfferText['offer']['select']['unreferenced']?></option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectState" disabled>
							<option selected class="keep" disabled value="undefined"><?= $traderAddOfferText['offer']['select']['state']['state_title']?></option>
							<option value="1"><?= $traderAddOfferText['offer']['select']['state']['state_jabba']?></option>
							<option value="2"><?= $traderAddOfferText['offer']['select']['state']['state_passable']?></option>
							<option value="3"><?= $traderAddOfferText['offer']['select']['state']['state_ok']?></option>
							<option value="4"><?= $traderAddOfferText['offer']['select']['state']['state_good']?></option>
							<option value="5"><?= $traderAddOfferText['offer']['select']['state']['state_new']?></option>
						</select>
					</div>
				</div>
				<div class="card mx-2 mt-lg-4 mt-2">
					<div class="card-header">
						<ul class="nav nav-tabs card-header-tabs">
							<li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" data-bs-target="#f1"><?= $traderAddOfferText['offer']['select']['file']?></a></li>
							<li class="nav-item" id="newFile"><a class="nav-link"><i class="bi bi-file-plus"></i></a></li>
						</ul>
					</div>
					<div class="card-body tab-content">
						<div class="mt-lg-2 mt-1 tab-pane fade show active" id="f1">
							<input class="form-control offer-file" type="file">
						</div>
						<div class="mt-lg-2 mt-1 tab-pane fade" id="f2">
							<input class="form-control offer-file" type="file">
						</div>
						<div class="mt-lg-2 mt-1 tab-pane fade" id="f3">
							<input class="form-control offer-file" type="file">
						</div>
					</div>
				</div>
				<div id="div_trader_add_offer_button" class="form-group mt-4 d-flex justify-content-center row mx-0">
					<input type="submit" name="" value="<?= $traderAddOfferText['offer']['continue']?>" class="btn btn-block btn-lg col-lg-8 col-6">
				</div>
			</form>
		</div>
		<div id="div_trader_add_offer_price_top" class="row col-11 col-lg-3 me-lg-5 ms-lg-5 px-4 my-auto align-self-center">
			<div id="div_trader_add_offer_price" class="justify-content-center d-flex flex-column h-50">
				<h3 class="align-self-center"><?= $traderAddOfferText['offer']['estimate']?></h3>
				<!-- ici met une condition avec le carrée qui devient vert si le prix est disponible
					et la police devient blanche :) <3
					 il manque aussi les photos  3 maximum si jamais tu le fais avant moi -->
				<div id="priceEstimationOk" class="d-flex justify-content-center py-3 mt-3 mb-4">
					<p class="my-auto"><?= $traderAddOfferText['offer']['unavailable']?></p>
				</div>
				<div id="infoEstimation">
					<p>Ce montant est calculé à partir des éléments déclarés, il s'agit d'une estimation du prix du
						produit
						en fonction des informations renseignés. Si les informations renseignées ne conviennent pas, une
						mise
						à jour de ces informations seront faites puis une contre offre vous sera envoyée.</p>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalUndefined" tabindex="-1" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title"><?= $traderAddOfferText['offer']['undefined']['title']?></h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
			</div>
			<div class="modal-body">
				<p><?= $traderAddOfferText['offer']['undefined']['content']['main']?></p>
				<p><?= $traderAddOfferText['offer']['undefined']['content']['secondary']?></p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?= $traderAddOfferText['offer']['undefined']['close']?></button>
				<button type="button" class="btn btn-danger delete" id="sendUndefined"><?= $traderAddOfferText['offer']['undefined']['validate']?></button>
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
	<div id="ToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
		 data-bs-delay="1700">
		<div class="toast-body bg-success">
			Hello, world! This is a toast message.
		</div>
	</div>
	<div id="ToastWarning" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true"
		 data-bs-delay="1700">
		<div class="toast-body bg-warning">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>
<script>
	let text = {
		'select':{
			'choose': "<?= $traderAddOfferText['offer']['select']['choose']?>",
			'file': "<?= $traderAddOfferText['offer']['select']['file']?>"
		},
		'warning':<?= json_encode($traderAddOfferText['offer']['warning'])?>,
		'success':{
			'created': "<?= $traderAddOfferText['offer']['success']['created']?>"
		},
		'error': <?= json_encode($traderAddOfferText['offer']['error'])?>,
		'specification': <?= json_encode($traderAddOfferSpecText['specification'])?>
	}
</script>
<script src="/assets/js/traderAddOffer.js"></script>