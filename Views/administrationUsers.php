<div id="divAdminGeneral" class="d-flex flex-column container-fluid">
    <h3 class="align-self-center mb-4" >Gestion des utilisateurs</h3>
    <div class="d-flex flex-column flex-lg-row justify-content-around">
        <div id="divAdminUsers" class=" d-flex flex-column col-10 col-lg-5 mb-4 mb-lg-0 border border-primary border-2 rounded-2 px-2 py-3 align-self-center ">
            <h3 class="align-self-center">Utilisateurs</h3>
            <table
					class="table"
					id="table_categories"
					data-toggle="table"
					data-search="true"
					data-pagination="true"
					data-height="600"
					data-ajax="retrieve_users"
					data-side-pagination="server"
					data-row-attributes="rowAttributes"
					data-locale="<?= $_SESSION['lang']?>">
                <thead>
                <tr>
                    <th data-sortable="true" data-field="id">id</th>
                    <th data-sortable="true" data-field="name">Nom</th>
                    <th data-sortable="true" data-field="fname">Prénom</th>
                    <th data-sortable="true" data-field="mail">Email</th>
                    <th data-sortable="true" data-field="type">Status</th>
                    <th data-field="change"></th>
                    <th data-field="delete"></th>
                </tr>
                </thead>
            </table>
        </div>
        <div class="d-flex flex-column col-10 col-lg-5 border border-primary border-2 rounded-2 px-2 py-3 align-self-center mb-3">
            <h3 class="align-self-center">Informations utilisateur :</h3>
            <div class="mb-3">
                <label for="name" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="name" disabled>
            </div>
            <div class="mb-3">
                <label for="fname" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="fname" disabled>
            </div>
			<div class="mb-3">
				<label for="mail" class="form-label">Email :</label>
				<input type="text" class="form-control" id="mail" disabled>
			</div>
			<div class="mb-3">
				<label for="address" class="form-label">Adresse :</label>
				<input type="text" class="form-control" id="address" disabled>
			</div>
			<div class="mb-3">
				<label for="city" class="form-label">Ville :</label>
				<input type="text" class="form-control" id="city" disabled>
			</div>
			<div class="mb-3">
				<label for="zip" class="form-label">Code Postal :</label>
				<input type="text" class="form-control" id="zip" disabled>
			</div>
			<div class="mb-3">
				<label for="region" class="form-label">Region :</label>
				<input type="text" class="form-control" id="region" disabled>
			</div>
			<div class="mb-3">
				<label for="country" class="form-label">Pays :</label>
				<input type="text" class="form-control" id="country" disabled>
			</div>
			<div class="mb-3">
				<label for="ac_creation" class="form-label">Création du compte :</label>
				<input type="text" class="form-control" id="ac_creation" disabled readonly>
			</div>
			<div class="mb-3">
				<label for="l_login" class="form-label">Dernière connexion :</label>
				<input type="text" class="form-control" id="l_login" disabled>
			</div>
            <div class="mb-3">
                <label for="userName" class="form-label">Niveau d'authenfication :</label>
                <select class="form-select" disabled id="level">
                    <option selected>Niveau d'authentification</option>
                    <option value="0">Super Administrateur</option>
                    <option value="1">Administrateur</option>
                    <option value="2">Employé</option>
                    <option value="3">Vendeur</option>
                    <option value="4">Client</option>
                </select>
            </div>
            <div>
                <button type="button" class="btn btn-success col-12 my-2" id="save">Enregistrer</button>
            </div>
        </div>
    </div>
</div>
<!-- TOAST -->
<div class="position-fixed top-0 end-0 p-3" style="z-index: 1500">
	<div id="ToastError" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-danger">
			Hello, world! This is a toast message.
		</div>
	</div>
	<div id="ToastSuccess" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-success">
			Hello, world! This is a toast message.
		</div>
	</div>
	<div id="ToastWarning" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="1700">
		<div class="toast-body bg-warning">
			Hello, world! This is a toast message.
		</div>
	</div>
</div>
<script>
	let level = {
		0: "Super Administrateur",
		1: "Administrateur",
		2: "Employé",
		3: "Vendeur",
		4: "Utilisateurs"
	}
</script>
<script src="/assets/js/adminUsers.js"></script>