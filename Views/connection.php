<?php
/**@var $error */
?>
<div id="div_form_connexion" class="container-fluid d-flex flex-column mt-11 mt-lg-5 mb-4">
    <div id="div_connexion" class="row col-11 col-lg-4 border border-2 rounded-3 py-4 px-4 align-self-center">
        <h1>S'identifier</h1>
        <form action="/check/connect" method="post">
            <div class="form-group mt-1 mt-lg-4">
                <label for="id" class="form-label">Adresse e-mail ou numéro de téléphone portable</label>
                <input type="text" class="form-control" name="id">
            </div>
			<div class="text-danger">
				<?php if($error === "bad-mail"): ?>
				Mauvais mail
				<?php endif; ?>
			</div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="password" class="form-label">Votre mot de passe</label>
                <input type="password" class="form-control" name="password">
            </div>
			<div class="text-danger">
				<?php if($error === "error"): ?>
					Erreur
				<?php elseif($error === "bad-request"): ?>
					Requête de connexion invalide
				<?php elseif($error === "bad-password"): ?>
					Mauvais mot de passe
				<?php endif; ?>
			</div>
            <div class="form-group mt-4 mt-lg-4">
                <input type="submit" name="form_connexion" value="Continuer" class="btn btn-block col-12">
            </div>
        </form>
        <div class="mt-3 mt-lg-4">
            <p>En passant votre commande, vous acceptez les <a href="#">Conditions générales</a> de vente d'Hyperion.</p>
        </div>
    </div>

    <div id="div_connexion_2" class="row col-11 col-lg-4 py-4 px-4 align-self-center">
        <div class="mt-3 mt-lg-4">
            <h5>Nouveau chez Hyperion ?</h5>
        </div>
        <div class="form-group mt-4 mt-lg-4">
            <button class="btn btn-primary" type="button" onclick="window.location.href='/inscription'">Créer votre compte Hyperion</button>
        </div>
    </div>
</div>