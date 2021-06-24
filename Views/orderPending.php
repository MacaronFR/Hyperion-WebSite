<div id="expertoffergeneral" class="container-fluid d-flex flex-column">
    <h3 class="align-self-center mb-4 mt-3">Historique facture</h3>
    <div class="container-fluid d-flex flex-column flex-lg-row">
        <div id="divexpertoffertable" class="container-fluid col-lg-7">
            <table class="table"
                   id="table_spec"
                   data-toggle="table"
                   data-pagination="true"
                   data-height="600"
				   data-ajax="retrieve_invoice"
				   data-side-pagination="server"
				   data-row-attributes="rowAttributes"
                   data-locale="<?= $_SESSION['lang']?>">
                <thead>
                <tr>
                    <th data-field="id">ID</th>
                    <th data-field="total">Montant</th>
                    <th data-field="creation">Date</th>
                    <th data-field="detail"></th>
                </tr>
                </thead>
            </table>
        </div>
        <div id="divexpertofferinfo" class="container-fluid col-lg-3 d-flex flex-column justify-content-center my-auto p-4 border border-2 border-warning rounded-3">
            <h4 class="align-self-center mb-3">Détails Facture</h4>
            <input type="text" id="id" class="form-control mb-1" style="text-align: center" readonly>
            <input type="text" id="total" class="form-control mb-1" style="text-align: center" readonly>
            <input type="text" id="creation" class="form-control mb-1" style="text-align: center" readonly>
			<button class="btn btn-success" id="pdf">Voir Pdf</button>
        </div>
    </div>
</div>
<script src="/assets/js/invoiceHistory.js"></script>