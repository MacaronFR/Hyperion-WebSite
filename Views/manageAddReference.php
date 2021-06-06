<?php
/**
 * @var array $categories
 * @var array $types
 * @var array $addReferenceText
 */
?>
<form id="specForm">
	<div id="manageAddProduct" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
		<h1 style="text-align: center" class="mb-4"><?= $addReferenceText['reference']['title']?></h1>
		<div id="divAddProductGeneral"
			 class="row col-11 col-lg-10 col-xl-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
			<div class="container mb-3">
				<h3 class="mb-3"><?= $addReferenceText['reference']['main']['title']?></h3>
				<div class="row">
					<div class="col-6">
						<select class="form-select" id="catSelect" name="category" required>
							<option value="-1" selected disabled><?= $addReferenceText['reference']['main']['category']?></option>
							<?php foreach($categories as $cat): ?>
								<option value="<?= $cat['id'] ?>"><?= $cat['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="col-6">
						<select class="form-select" id="typeSelect" disabled name="type" required>
							<option selected disabled value="-1"><?= $addReferenceText['reference']['main']['type']?></option>
						</select>
					</div>
				</div>
			</div>
		</div>
		<div class="row col-11 col-lg-10 col-xl-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
			<div class="container mb-3">
				<div class="row mb-2">
					<div class="col-lg-6 col-12">
						<h3 class="mb-3"><?= $addReferenceText['reference']['second']['brand']['title']?></h3>
						<select class="form-control" id="brandSelect" disabled name="brand" required>
							<option value="-1" selected disabled><?= $addReferenceText['reference']['second']['brand']['select']?></option>
						</select>
					</div>
					<div class="col-lg-6 col-12">
						<h3 class="mb-3"><?= $addReferenceText['reference']['second']['model']['title']?></h3>
						<input type="text" class="form-control" id="modelInput" disabled name="model" required placeholder="<?= $addReferenceText['reference']['second']['model']['placeholder']?>">
					</div>
				</div>
			</div>
		</div>
		<div class="row col-11 col-lg-10 col-xl-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
			<div class="container mb-3">
				<h3 class="mb-3"><?= $addReferenceText['reference']['price']['title']?></h3>
				<div class="row mb-2">
					<div class="col-lg-6 col-12">
						<h3 class="mb-3"><?= $addReferenceText['reference']['price']['buying']['title']?></h3>
						<input type="number" class="form-control" id="buyInput" required placeholder="<?= $addReferenceText['reference']['price']['buying']['placeholder']?>">
					</div>
					<div class="col-lg-6 col-12">
						<h3 class="mb-3"><?= $addReferenceText['reference']['price']['selling']['title']?></h3>
						<input type="number" class="form-control" id="sellInput" required placeholder="<?= $addReferenceText['reference']['price']['selling']['placeholder']?>">
					</div>
				</div>
			</div>
		</div>
		<div class="container-fluid d-flex flex-column p-0" id="specDiv">

		</div>
		<div class="col-11 col-lg-10 col-xl-8 align-self-center mb-5">
			<button class="btn btn-primary w-100" type="button" id="newSpec"><?= $addReferenceText['reference']['button']['spec']?></button>
		</div>
		<div class="col-11 col-lg-10 col-xl-8 align-self-center mb-5 btn-group">
			<button class="btn btn-warning w-25" type="reset" id="reset"><?= $addReferenceText['reference']['button']['reset']?></button>
			<button class="btn btn-success w-75" type="submit"><?= $addReferenceText['reference']['button']['validate']?></button>
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
<script>
	const text = {
		"spec": <?= json_encode($addReferenceText['reference']['specification'])?>
	}
</script>
<script src="/assets/js/addRef.js"></script>