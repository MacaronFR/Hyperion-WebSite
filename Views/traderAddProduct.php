<?php
?>
<div id="div_trader_add_offer_general" class="container-fluid d-flex flex-column">
    <h1 class="align-self-center mt-4">Créer une offre</h1>
    <div class="d-flex flex-column flex-lg-row mt-11 mt-lg-4 justify-content-end pe-lg-5 mb-5">
        <div id="div_trader_add_offer" class="row col-11 col-lg-5 border border-2 border-warning rounded-3 position me-lg-5 px-5 pt-3 pb-5">
            <form action="#" method="post">
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Catégorie de votre produit</option>
                            <option value="1">Non repertoriée</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Type de produit</option>
                            <option value="1">Non repertorié</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Marque du produit</option>
                            <option value="1">Non repertoriée</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Modéle</option>
                            <option value="1">Non repertoriée</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Espace de stockage</option>
                            <option value="1">Non repertoriée</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div class="form-group mt-1 mt-lg-4">
                    <div class="mx-2">
                        <select class="form-select" aria-label="Default select example">
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
                <div id="div_trader_add_offer_button" class="form-group mt-4 d-flex justify-content-center row">
                    <input type="submit" name="" value="Continuer" class="btn btn-block btn-lg col-lg-8 col-6">
                </div>
            </form>
        </div>
        <div id="div_trader_add_offer_price" class="row col-11 col-lg-3 me-lg-5 ms-lg-5 px-4">
            <h3>Estimation du prix d'achat</h3>
            <div id="priceEstimationOk">
                <p>Indisponible</p>
            </div>
            <div id="infoEstimation">
                <p>Ce montant est calculé à partir des éléments déclarés, il s'agit d'une estimation du prix du produit
                    en fonction des informations renséignés. Si les informatiions renseignées ne conviennent pas, une mise
                    à jour de ces informations seront faites puis une contre offre vous sera envoyée.</p>
            </div>
        </div>
    </div>
</div>