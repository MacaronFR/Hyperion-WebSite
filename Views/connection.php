<?php
?>
<div id="div_form_connexion" class="container-fluid d-flex flex-column mt-16 mt-lg-5">
    <div id="div_connexion" class="row col-6 col-lg-4 border border-2 rounded-3 py-4 px-4 align-self-center">
        <h1>S'identifier</h1>
        <form action="#" method="post">
            <div class="form-group mt-1 mt-lg-4">
                <label for="id" class="form-label">Adresse e-mail ou numéro de téléphone portable</label>
                <input type="text" class="form-control" name="id">
            </div>
            <div class="form-group mt-1 mt-lg-4">
                <label for="password" class="form-label">Votre mot de passe</label>
                <input type="password" class="form-control" name="password">
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
            <h5>Nouveau chez Hyperion ?</h5>
        </div>
        <div class="form-group mt-4 mt-lg-4">
            <button class="btn btn-primary" type="submit" value="Créer votre compte Hyperion"></button>
        </div>
    </div>
</div>