<?php
/**
 * @var string $error
 */
?>
<div id="div_form_inscription" class="container-fluid d-flex flex-column mt-11 mt-lg-5">
    <div id="div_inscription" class="row col-11 col-lg-4 border border-2 rounded-3 py-4 px-4 align-self-center">
        <h1>Créer votre compte</h1>
        <form action="/check/inscription" method="post">
            <div class="form-row d-flex mt-1 mt-lg-4">
                <div class="form-group col mx-2">
                    <label for="family_name" class="form-label">Votre nom</label>
                    <input type="text" class="form-control" name="family_name">
                </div>
                <div class="form-group col mx-2">
                    <label for="first_name" class="form-label">Votre prénom</label>
                    <input type="text" class="form-control" name="first_name">
                </div>
            </div>
            <div class="form-group mt-1 mt-lg-4">
				<div class="mx-2">
					<label for="email" class="form-label">Votre adresse email</label>
					<input type="email" class="form-control" name="email">
				</div>
				<div class="text-danger">
					<?php if($error === "mail/notvalid"): ?>
						Mail invalid
					<?php elseif($error === "mail/exist"): ?>
						Mail exist
					<?php endif; ?>
				</div>
            </div>
            <div class="form-group mt-1 mt-lg-4">
				<div class="mx-2">
					<label for="password_1" class="form-label">Votre mot de passe</label>
					<input type="password" class="form-control" name="password_1">
				</div>
				<div class="text-danger">
					<?php if($error === "password/notsame"): ?>
						Les mot de passe ne sont pas identique
					<?php elseif($error === "password/policy"): ?>
						Le mot de passe doit contenir une minuscule, une majuscule et un chiffre
					<?php endif; ?>
				</div>
            </div>
            <div class="form-group mt-1 mt-lg-4">
				<div class="mx-2">
                	<label for="password_2" class="form-label">Confirmez votre mot de passe</label>
                	<input type="password" class="form-control" name="password_2">
				</div>
            </div>
            <div class="form-group mt-4 d-flex justify-content-center row">
				<input type="submit" name="form_inscription" value="Continuer" class="btn btn-block col-lg-8 col-6">
            </div>
        </form>
        <div class="mt-3 mt-lg-4">
            <p>En passant votre commande, vous acceptez les <a href="#">Conditions générales</a> de vente d'Hyperion.</p>
        </div>
    </div>

    <div id="div_inscription_2" class="row col-11 col-lg-4 py-4 px-4 align-self-center">
        <div class="mt-3 mt-lg-4">
            <h5>Déjà membre de Hyperion ?</h5>
        </div>
        <div class="form-group mt-4 mt-lg-4">
            <button class="btn btn-primary" type="button" onclick="window.location.href='/connect'">Connectez-vous à votre compte Hyperion</button>
        </div>
    </div>
</div>