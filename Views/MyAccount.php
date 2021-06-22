<?php
/**
 * @var array $me
 */
?>
<div class="container-fluid d-flex flex-column">
    <button type="button" class="btn btn-primary btn-lg col-lg-2 mb-lg-5 mt-lg-5 mb-5 mt-5" onclick="window.location.href='/shop'">Retour à l'accueil</button>
    <div class="container-fluid d-flex flex-column flex-lg-row justify-content-lg-evenly">
        <div id="divActualInformations" class="border border-2 border-primary rounded-3 col-lg-4 px-lg-5 py-lg-5 me-lg-5 p-4 mb-5">
            <h3 class="mb-4">Mes informations actuelles</h3>
            <div class="mb-2">
                <label for="name" class="form-label">Votre Nom:</label>
                <input type="text" class="form-control" id="name" value="<?= $me['name']?>" style="background-color: white">
            </div>
            <div class="mb-2">
                <label for="fname" class="form-label">Votre Prenom:</label>
                <input type="text" class="form-control" id="fname" value="<?= $me['fname']?>" style="background-color: white">
            </div>
            <div class="mb-2">
                <label for="mail" class="form-label">Votre adresse email:</label>
                <input type="text" class="form-control" id="mail" value="<?= $me['mail']?>" style="background-color: white" disabled>
            </div>
            <div class="mb-2">
                <label for="address" class="form-label">Votre adresse:</label>
                <input type="text" class="form-control" id="address" value="<?= $me['addr']['address'] ?? ""?>" style="background-color: white">
            </div>
            <div class="mb-2">
                <label for="city" class="form-label">Votre ville:</label>
                <input type="text" class="form-control" id="city" value="<?= $me['addr']['city'] ?? ""?>" style="background-color: white">
            </div>
            <div class="mb-3">
                <label for="zip" class="form-label">Zip</label>
                <input type="text" class="form-control" id="zip" value="<?= $me['addr']['zip'] ?? ""?>" style="background-color: white">
            </div>
			<div class="mb-3">
				<label for="region" class="form-label">Region</label>
				<input type="text" class="form-control" id="region" value="<?= $me['addr']['region'] ?? ""?>" style="background-color: white">
			</div>
			<div class="mb-3">
				<label for="country" class="form-label">Country</label>
				<input type="text" class="form-control" id="country" value="<?= $me['addr']['country'] ?? ""?>" style="background-color: white">
			</div>
			<div class="mb-3">
				<label for="ac_creation" class="form-label">Account Creation</label>
				<input type="text" class="form-control" id="ac_creation" value="<?= DateTime::createFromFormat('Y-m-d', $me['ac_creation'])->format("d/m/Y")?>" style="background-color: white" disabled>
			</div>
			<?php if((int)$_SESSION['level'] === 3): ?>
            <div class="mb-3 d-grid">
                <button class="btn btn-danger"> Je ne suis pas un marchand</button>
            </div>
			<?php elseif((int)$_SESSION['level'] === 4): ?>
			<div class="mb-3 d-grid">
				<button class="btn btn-primary">Devenir marchand</button>
			</div>
			<?php elseif((int)$_SESSION['level'] < 3): ?>
			<div class="mb-3 d-grid">
				<button class="btn btn-success" disabled>Staff</button>
			</div>
			<?php endif;?>
			<div class="mb-3 d-grid">
				<button class="btn btn-warning" id="save">Enregistrer les modifications</button>
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
	let info = <?= json_encode($me) ?>;
</script>
<script src="/assets/js/me.js"></script>
