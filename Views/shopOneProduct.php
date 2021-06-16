<?php
/**
 * @var array $prod
 * @var array $spec
 * @var array $productText
 */
?>
<div class="container-fluid d-flex flex-column">
    <h3 class="align-self-center mb-4 mt-3"><?= $prod['brand'] . " " . $prod['model']?></h3>
    <div class="container-fluid d-flex flex-column flex-lg-row mb-lg-5 mb-3">
        <div class="container-fluid d-flex flex-column col-lg-5 p-0 mb-3">
            <div class="container-fluid d-flex flex-column justify-content-center my-auto p-4 border border-2 border-warning rounded-3 mb-3 carousel-bg">
                <div class="carousel slide" data-bs-ride="carousel" id="productPicture">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#productPicture" data-bs-slide-to="0" class="active" id="indicator1"></button>
                        <button type="button" data-bs-target="#productPicture" data-bs-slide-to="1" id="indicator2"></button>
                        <button type="button" data-bs-target="#productPicture" data-bs-slide-to="2" id="indicator3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active" id="img1">
                            <div class="w-100 d-flex justify-content-center">
                                <img class="align-self-center">
                            </div>
                        </div>
                        <div class="carousel-item" id="img2">
                            <div class="w-100 d-flex justify-content-center">
                                <img class="align-self-center">
                            </div>
                        </div>
                        <div class="carousel-item" id="img3">
                            <div class="w-100 d-flex justify-content-center">
                                <img class="align-self-center">
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#productPicture" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productPicture" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <div id="divexperthistoryofferinfo" class="container-fluid col-lg-4 d-flex flex-column justify-content-center my-auto p-4 border border-2 border-warning rounded-3">
            <h4 class="align-self-center mb-3">informations du produit</h4>
            <input type="text" class="form-control mb-1" value="<?= $prod['brand']?>" style="text-align: center" readonly>
            <input type="text" class="form-control mb-1" value="<?= $prod['model']?>" style="text-align: center" readonly>
			<?php foreach($spec as $n => $s):?>
				<div class="input-group">
					<span class="input-group-text mb-1"><?= $n ?></span>
					<input type="text" class="form-control mb-1" value="<?= htmlspecialchars($s)?>" style="text-align: center" readonly>
				</div>
			<?php endforeach;?>
            <input type="text" class="form-control mb-1" value="<?= $prod['state']?>" style="text-align: center" readonly>
            <input type="text" class="form-control mb-1" value="<?= $prod['sell_p'] ?? 0?> €" style="text-align: center" readonly>

            <div class="d-grid mt-3">
                <button type="button" class="btn btn-success me-1" id="addToCart">Ajouter au panier</button>
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
	let id = <?= $prod['id']?>;
	let text = {
		"error": <?= json_encode($productText['product']['error'])?>,
		"warning": <?= json_encode($productText['product']['warning'])?>,
		"success": <?= json_encode($productText['product']['success'])?>
	}
</script>
<script src="/assets/js/shopProd.js"></script>