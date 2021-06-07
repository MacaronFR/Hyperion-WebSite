<div class="container-fluid col-10 d-flex flex-column">
    <div id="AdministrationFacturesClients" class="d-flex flex-column">
        <h3 class="align-self-center mb-4 mt-3">Gestion des factures</h3>
        <div class="container-fluid d-flex flex-column border border-2 py-4 rounded-2 border-warning mb-4">
            <h3 class="align-self-center mb-3">Factures Générales</h3>
            <div class="mb-3">
                <label for="cible" class="form-label">Cible(s)</label>
                <select class="form-select" aria-label="Default select example" id="cible">
                    <option selected>Selection Cible(s)</option>
                    <option value="1">Clients</option>
                    <option value="2">Marchands</option>
                    <option value="3">Clients + Marchands</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="cible" class="form-label">Type de Transaction</label>
                <select class="form-select" aria-label="Default select example" id="cible">
                    <option selected>Selection transaction</option>
                    <option value="1">Achats</option>
                    <option value="2">Ventes</option>
                    <option value="3">Achats + Ventes</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="inputDate" class="form-label">Selection période</label>
                <input type="date" class="form-control" id="inputDate">
            </div>
            <div class="mb-3">
                <button type="button" class="btn btn-success col-12" id="billExportGlobal">Export CSV</button>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column border border-2 py-4 rounded-2 border-warning mb-4">
            <h3 class="align-self-center mb-3">Factures clients (détails)</h3>
            <div class="d-flex flex-column flex-lg-row">
                <div id="divexpertoffertable" class="container-fluid col-lg-7">
                    <table class="table"
                           id="table_spec"
                           data-toggle="table"
                           data-pagination="true"
                           data-height="600"
                           data-locale="<?= $_SESSION['lang']?>">
                        <thead>
                        <tr>
                            <th data-sortable data-field="id_facture">id Factures</th>
                            <th data-sortable data-field="id_client">id client</th>
                            <th data-sortable data-field="name_client">Nom client</th>
                            <th data-sortable data-field="state">date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>Maliwan Corporation</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>TALLA Michael</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>Jakobs industrie</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>Dahl</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>Poney diams</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>Le Beau Jack</td>
                            <td>17/05/2021</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divexpertofferinfo" class="container-fluid col-lg-3 d-flex flex-column justify-content-center my-auto p-4 border border-2 border-warning rounded-3">
                    <h4 class="align-self-center mb-3">informations Facture</h4>
                    <input type="text" class="form-control mb-1" value="TALLA Michael" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="1 rue de Strasbourg" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="Maisons-alfort" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="12 produits" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="Total 140€" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="12/01/2021" style="text-align: center">
                    <button type="button" class="btn btn-success col-12" id="billExportClient">Export CSV</button>
                </div>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column border border-2 py-4 rounded-2 border-warning mb-4">
            <h3 class="align-self-center mb-3">Factures Marchands (détails)</h3>
            <div class="d-flex flex-column flex-lg-row">
                <div id="divexpertoffertable" class="container-fluid col-lg-7">
                    <table class="table"
                           id="table_spec"
                           data-toggle="table"
                           data-pagination="true"
                           data-height="600"
                           data-locale="<?= $_SESSION['lang']?>">
                        <thead>
                        <tr>
                            <th data-sortable data-field="id_facture">id Factures</th>
                            <th data-sortable data-field="id_client">id client</th>
                            <th data-sortable data-field="name_client">Nom client</th>
                            <th data-sortable data-field="state">date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>TALLA Michael</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>ESGI</td>
                            <td>17/05/2021</td>
                        </tr>
                        <tr>
                            <th scope="row">2134214</th>
                            <td>6786787869</td>
                            <td>FrenchTech</td>
                            <td>17/05/2021</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div id="divexpertofferinfo" class="container-fluid col-lg-3 d-flex flex-column justify-content-center my-auto p-4 border border-2 border-warning rounded-3">
                    <h4 class="align-self-center mb-3">informations Facture</h4>
                    <input type="text" class="form-control mb-1" value="TALLA Michael" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="1 rue de Strasbourg" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="Maisons-alfort" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="12 produits" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="Total 140€" style="text-align: center">
                    <input type="text" class="form-control mb-1" value="12/01/2021" style="text-align: center">
                    <button type="button" class="btn btn-success col-12" id="billExportClient">Export CSV</button>
                </div>
            </div>
        </div>
    </div>
</div>