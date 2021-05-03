<?php
/** @var array $categories
 * @var array $types
 */
?>
<form id="specForm">
	<div id="manageAddProduct" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
		<h1 style="text-align: center" class="mb-4">Ajouter une nouvelle référence</h1>
		<div id="divAddProductGeneral"
			 class="row col-11 col-lg-10 col-xl-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
			<div class="container mb-3">
				<h3 class="mb-3">Général</h3>
				<div class="row">
					<div class="col-6">
						<select class="form-select" id="catSelect" name="category" required>
							<option value="-1" selected disabled>Saisie d'une catégorie</option>
							<?php foreach($categories as $cat): ?>
								<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-6">
						<select class="form-select" id="typeSelect" disabled name="type" required>
							<option selected disabled value="-1">Sélectionner un type</option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div id="divAddProductStockage"
			 class="row col-11 col-lg-10 col-xl-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
			<div class="container mb-3">
				<div class="row mb-2">
					<div class="col-lg-6 col-12">
						<h3 class="mb-3">Marque</h3>
						<select class="form-control" id="markSelect" disabled name="mark" required>
							<option value="-1" selected disabled>Sélectionner une marque</option>
						</select>
					</div>
					<div class="col-lg-6 col-12">
						<h3 class="mb-3">Modèle</h3>
						<input type="text" class="form-control" id="modelInput" disabled name="model" required>
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid d-flex flex-column p-0" id="specDiv">

		</div>
		<div class="col-11 col-lg-10 col-xl-8 align-self-center mb-5">
			<button class="btn btn-primary w-100" type="button" id="newSpec">Ajouter une spécification</button>
		</div>
		<div class="col-11 col-lg-10 col-xl-8 align-self-center mb-5 btn-group">
			<button class="btn btn-warning w-25" type="submit">Réinitialiser</button>
			<button class="btn btn-success w-75" type="submit">Ajouter ce produit</button>
		</div>
	</div>
</form>

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

<script src="/assets/js/addRef.js"></script>