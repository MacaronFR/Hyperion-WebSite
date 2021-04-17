<?php
?>
<div id="div_form_inscription" class="container-fluid d-flex flex-column mt-16 mt-lg-5">
    <div id="div_inscription" class="row col-6 col-lg-4 border border-2 rounded-3 py-4 px-4 align-self-center">
        <h1>Créer votre compte</h1>
        <form action="#" method="post">
            <div class="form-group mt-1 mt-lg-4">
                <label for="family_name" class="form-label">Votre nom</label>
                <input type="text" class="form-control" name="family_name">
            </div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="first_name" class="form-label">Votre prénom</label>
                <input type="text" class="form-control" name="first_name">
            </div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="email" class="form-label">Votre adresse email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="password_1" class="form-label">Votre mot de passe</label>
                <input type="text" class="form-control" name="password_1">
            </div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="password_2" class="form-label">Confirmez vtore mot de passe</label>
                <input type="text" class="form-control" name="password_2">
            </div>
            <div class="form-group mt-4 mt-lg-4">
                <input type="submit" name="form_connexion" value="Continuer" class="btn btn-block">
            </div>
        </form>
        <div class="mt-3 mt-lg-4">
            <p>En passant votre commande, vous acceptez les <a href="#">Conditions générales</a> de vente d'Hyperion.</p>
        </div>
    </div>

    <div id="div_connexion_2" class="row col-6 col-lg-4 py-4 px-4 align-self-center">
        <div class="mt-3 mt-lg-4">
            <h5>Déjà chez Hyperion ?</h5>
        </div>
        <div class="form-group mt-4 mt-lg-4">
            <button class="btn btn-primary" type="submit">Connectez-vous à votre compte Hyperion</button>
        </div>
    </div>
</div>