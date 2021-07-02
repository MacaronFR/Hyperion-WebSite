<div id="experthistoryoffergeneral" class="container-fluid d-flex flex-column">
    <h3 class="align-self-center mb-4 mt-3"> Historique des offres</h3>
    <div class="container-fluid d-flex flex-column flex-lg-row">
        <div id="divexperthistoryoffertable" class="container-fluid col-lg-7">
			<table
					class="table"
					id="table_offer"
					data-toggle="table"
					data-pagination="true"
					data-height="600"
					data-ajax="retrieve_offer_history"
					data-side-pagination="server"
					data-row-attributes="rowAttributes"
					data-locale="<?= $_SESSION['lang']?>">
				<thead>
				<tr>
					<th data-sortable data-field="id">ID</th>
					<th data-field="type">Type</th>
					<th data-sortable data-field="date">Date</th>
					<th data-field="brand">Brand</th>
					<th data-field="model">Model</th>
				</tr>
				</thead>
            </table>
        </div>
    </div>
</div>
<script src="/assets/js/expertOfferHistory.js"></script>