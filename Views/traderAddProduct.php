<?php
/**
 * @var array $categories
 */
?>
<div id="div_trader_add_offer_general" class="container-fluid d-flex flex-column">
	<h1 class="align-self-center mt-4">Créer une offre</h1>
	<div class="d-flex flex-column flex-lg-row mt-11 mt-lg-4 justify-content-end pe-lg-5 mb-5">
		<div id="div_trader_add_offer"
			 class="row col-11 col-lg-5 border border-2 border-warning rounded-3 position me-lg-5 px-5 pt-3 pb-5">
			<form>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" id="selectCategory">
							<option selected>Catégorie de votre produit</option>
							<option value="-1">Non repertoriée</option>
							<?php foreach($categories as $category): ?>
								<option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" disabled>
							<option selected>Type de produit</option>
							<option value="1">Non repertorié</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" disabled>
							<option selected>Marque du produit</option>
							<option value="1">Non repertoriée</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" disabled>
							<option selected>Modéle</option>
							<option value="1">Non repertoriée</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<select class="form-select" disabled>
							<option selected>Etat du produit</option>
							<option value="1">Non repertoriée</option>
							<option value="2">Two</option>
							<option value="3">Three</option>
						</select>
					</div>
				</div>
				<div class="form-group mt-1 mt-lg-4">
					<div class="mx-2">
						<textarea name="" placeholder="Description (facultatif)" class="form-control"></textarea>
					</div>
				</div>
				<div id="div_trader_add_offer_button" class="form-group mt-4 d-flex justify-content-center row mx-0">
					<input type="submit" name="" value="Continuer" class="btn btn-block btn-lg col-lg-8 col-6">
				</div>
			</form>
		</div>
		<div id="div_trader_add_offer_price_top" class="row col-11 col-lg-3 me-lg-5 ms-lg-5 px-4 my-auto">
			<div id="div_trader_add_offer_price" class="justify-content-center d-flex flex-column h-50">
				<h3 class="align-self-center">Estimation du prix d'achat</h3>
				<!-- ici met une condition avec le carrée qui devient vert si le prix est disponible
					et la police devient blanche :) <3
					 il manque aussi les photos  3 maximum si jamais tu le fais avant moi -->
				<div id="priceEstimationOk" class="d-flex justify-content-center py-3 mt-3 mb-4">
					<p class="my-auto">Indisponible</p>
				</div>
				<div id="infoEstimation">
					<p>Ce montant est calculé à partir des éléments déclarés, il s'agit d'une estimation du prix du
						produit
						en fonction des informations renséignés. Si les informations renseignées ne conviennent pas, une
						mise
						à jour de ces informations seront faites puis une contre offre vous sera envoyée.</p>
				</div>
			</div>
		</div>
	</div>
</div>
<script></script>