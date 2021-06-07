<div id="divMainCart" style="background-color:ghostwhite" class="p-4 d-flex flex-column flex-lg-row">
    <div id="divArticlesCart" class="border-bottom border-2 mb-4 p-3 rounded-2 col-lg-8 ms-lg-5" style="background-color: lightgray">
        <h2 class="mb-3">Votre panier</h2>
        <?php
        for($i=0; $i<=1; $i++){ ?>
            <div class="d-flex flex-row border-top py-3 border-2">
                <div class="ms-2 col-auto">
                    <img src="/assets/images/cl4p-tp_center.png">
                </div>
                <div class="col-8 ms-2">
                    <h6 class="mb-0">Samsung Galaxy A51 Smartphone 128GB 4GB Prism Crush Black</h6>
                    <p class="mb-0">Trés bonne etat</p>
                    <a href="#">Supprimer</a>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="divArticlesPay" class="d-flex flex-column p-3 rounded-2 col-lg-3 ms-lg-5 h-25" style="background-color: lightgray;">
        <h3 class="mb-3" style="text-align: center">Information de livraison</h3>
        <div class="d-flex flex-column">
            <div class="mb-2">
                <label for="address" class="form-label">Adresse de livraison actuelle:</label>
                <input type="text" class="form-control " id="address" value="1 rue de Strasbourg, Maisons-alfort" DISABLED style="background-color: white">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Destinataire:</label>
                <input type="text" class="form-control " id="name" value="TALLA Michael" disabled style="background-color: white">
            </div>
            <div class="mb-2">
                <button type="button" class="btn btn-info col-12" style="color: black">Modifier vos informations</button>
            </div>
            <div>
                <p class="" id="div_stripe">Sous-total (2 articles): 865€</p>
                <!--<button type="button" class="btn btn-primary col-12" style="color: black">Passer la commande</button> -->
                <form action="/strip" method="POST" target="_blank">
                    <script
                            src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                            data-key="pk_test_51IyypYGc9T6D4Xa9gQX722Yl0Km8pX2NzxMXGaovV0I1SXefG4LyT0Gtr1RBjB6CO0HWLyMW9bNGLQkKy4GyeVFV00Bs9RVSq1"
                            data-amount="469"
                            data-name="Hyperion"
                            data-description="Smartphone"
                            data-image="/assets/images/cl4p-tp_center.png"
                            data-locale="auto"
                            data-currency="eur"
                            data-label="Payer avec Stripe" >
                    </script>
                </form>
            </div>
        </div>
    </div>
</div>