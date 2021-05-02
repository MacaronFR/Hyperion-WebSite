<?php
/** @var array $categories
 *  @var array $types
 */
?>
<form action="##">
    <div id="manageAddProduct" class="container-fluid d-flex flex-column mt-11 mt-lg-2">
        <h1 style="text-align: center" class="mb-4">Ajouter une nouvelle référence</h1>
        <div id="divAddProductGeneral" class="row col-11 col-lg-6 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
            <div class="container mb-3">
                <h3 class="mb-3">Général</h3>
                <div class="row">
                    <div class="col-6">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Saisie d'une catégorie</option>
							<?php foreach($categories as $cat): ?>
							<option value="<?= $cat['id'] ?>"><?= $cat['name']?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-6">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Saisie d'un type</option>
                            <?php foreach($types as $t): ?>
							<option value="<?= $t['id'] ?>"><?= $t['type']?></option>
							<?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div id="divAddProductStockage" class="row col-11 col-lg-6 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
            <div class="container mb-3">
                <h3 class="mb-3">Stockage</h3>
                <div class="row mb-2">
                    <div class="col-6">
                        <input class="form-control" type="text" placeholder="Nombres de stockages disponibles">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary buttonmax" type="submit">Actualiser nombres de champs</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputStockage">Value 1:</span>
                    <input type="text" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputStockage">
                </div>
            </div>
        </div>
        <div id="divAddProductColorie" class="row col-11 col-lg-6 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
            <div class="container mb-3">
                <h3 class="mb-3">Colorie</h3>
                <div class="row mb-2">
                    <div class="col-6">
                        <input class="form-control" type="text" placeholder="Nombres de Colories disponibles">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary  buttonmax" type="submit">Actualiser nombres de champs</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputColories">Value 1:</span>
                    <input type="text" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputColories">
                </div>
            </div>
        </div>
        <div id="divAddProductSpecs" class="row col-11 col-lg-6 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4">
            <div class="container mb-3">
                <h3 class="mb-3">Autres specs</h3>
                <div class="row mb-2">
                    <div class="col-6">
                        <input class="form-control" type="text" placeholder="Nombres d'autres specs disponibles">
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary buttonmax" type="submit">Actualiser nombres de champs</button>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputOtherSpec">Value 1:</span>
                    <input type="text" class="form-control form-control-sm" aria-label="Sizing example input" aria-describedby="inputOtherSpec">
                </div>
            </div>
        </div>
        <div class="col-11 col-lg-6 align-self-center mb-5">
            <button class="btn btn-primary buttonmax" type="submit">Ajouter ce produit</button>
        </div>
    </div>
</form>




