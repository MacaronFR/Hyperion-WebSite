<?php
/**
 * @var array $cart
 * @var array $state
 * @var string $address
 * @var string $adid
 * @var Stripe\Checkout\Session $session
 * @var int $total
 */
?>
<div id="divMainCart" style="background-color:ghostwhite" class="p-4 d-flex flex-column flex-lg-row">
    <div id="divArticlesCart" class="border-bottom border-2 mb-4 p-3 rounded-2 col-lg-8 ms-lg-5" style="background-color: lightgray">
        <h2 class="mb-3">Votre panier</h2>
		<?php if(empty($cart)){echo "<h2>Empty Cart</h2>";}?>
        <?php foreach($cart as $product):?>
            <div class="d-flex flex-row border-top py-3 border-2 cart-item">
                <div class="ms-2 col-auto">
                    <img class="productImage" data-prod-id="<?= $product['id']?>">
                </div>
                <div class="col-8 ms-2">
                    <h6 class="mb-0"><?= $product['brand']?> <?= $product['model']?></h6>
                    <p class="mb-0"><?=
						match ((int)$product['state']){
							1 => $state['state_jabba'],
							2 => $state['state_passable'],
							3 => $state['state_ok'],
							4 => $state['state_good'],
							5 => $state['state_new']
						}
                    ?></p>
					<h6 class="mb-0"><?= $product['sell_p'] ?? 0?> €</h6>
                    <button class="btn btn-danger del-cart-prod" data-prod-id="<?= $product['id']?>">Supprimer</button>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="divArticlesPay" class="d-flex flex-column p-3 rounded-2 col-lg-3 ms-lg-5 h-25" style="background-color: lightgray;">
        <h3 class="mb-3" style="text-align: center">Information de livraison</h3>
        <div class="d-flex flex-column">
            <div class="mb-2">
                <label for="address" class="form-label">Adresse de livraison actuelle:</label>
                <input type="text" class="form-control " id="address" value="<?= $address?>" data-addr-id="<?= $adid ?>" disabled style="background-color: white">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Destinataire:</label>
                <input type="text" class="form-control " id="name" value="<?= $_SESSION['name']?>" disabled style="background-color: white">
            </div>
            <div class="mb-2">
                <a type="button" class="btn btn-info col-12" style="color: black" href="/me">Modifier vos informations</a>
            </div>
            <div>
                <p class="" id="div_stripe" >Total : <?= $total ?> €</p>
                <a class="btn btn-primary col-12" style="color: black" href="game.php" target="_blank">Patienter ?</a>
				<button id="checkout-button" class="btn btn-success col-12 mt-2" <?= $total<= 0?"disabled":""?>>Payer</button>
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
<script>
	var stripe = Stripe('pk_test_51IyypYGc9T6D4Xa9gQX722Yl0Km8pX2NzxMXGaovV0I1SXefG4LyT0Gtr1RBjB6CO0HWLyMW9bNGLQkKy4GyeVFV00Bs9RVSq1');
	var checkoutButton = document.getElementById('checkout-button');
	checkoutButton.addEventListener('click', function() {
		API_REQUEST("/cart/command/" + token, "PUT").then( (res) => {
			console.log(res);
			stripe.redirectToCheckout({
				sessionId: '<?= $session->id?>',
			}).then(function (result) {
				console.log(result.error.message)
			});
		});
	});
</script>
<script src="/assets/js/cart.js"></script>