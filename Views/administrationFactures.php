<div class="container-fluid col-10 d-flex flex-column">
    <div id="AdministrationFacturesClients" class="d-flex flex-column">
        <h3 class="align-self-center mb-4 mt-3">Gestion des factures</h3>
        <div class="container-fluid d-flex flex-column border border-2 py-4 rounded-2 border-primary mb-4">
            <h3 class="align-self-center mb-3">Factures clients (détails)</h3>
            <div class="d-flex flex-column flex-lg-row">
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
					<input type="text" id="Iid" class="form-control mb-1" style="text-align: center" readonly>
					<input type="text" id="Itotal" class="form-control mb-1" style="text-align: center" readonly>
					<input type="text" id="Icreation" class="form-control mb-1" style="text-align: center" readonly>
					<button class="btn btn-success" id="Ipdf">Voir Pdf</button>
				</div>
            </div>
        </div>
        <div class="container-fluid d-flex flex-column border border-2 py-4 rounded-2 border-primary mb-4">
            <h3 class="align-self-center mb-3">Factures Marchands (détails)</h3>
            <div class="d-flex flex-column flex-lg-row">
				<div id="divexpertoffertable" class="container-fluid col-lg-7">
					<table class="table"
						   id="table_spec"
						   data-toggle="table"
						   data-pagination="true"
						   data-height="600"
						   data-ajax="retrieve_credit"
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
					<h4 class="align-self-center mb-3">Détails Avoirs</h4>
					<input type="text" id="Cid" class="form-control mb-1" style="text-align: center" readonly>
					<input type="text" id="Ctotal" class="form-control mb-1" style="text-align: center" readonly>
					<input type="text" id="Ccreation" class="form-control mb-1" style="text-align: center" readonly>
					<button class="btn btn-success" id="Cpdf">Voir Pdf</button>
				</div>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/adminInvoice.js"></script>