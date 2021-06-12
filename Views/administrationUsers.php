<div id="divAdminGeneral" class="d-flex flex-column container-fluid">
    <h3 class="align-self-center mb-4" >Gestion des utilisateurs</h3>
    <div class="d-flex flex-column flex-lg-row justify-content-around">
        <div id="divAdminUsers" class=" d-flex flex-column col-10 col-lg-5 mb-4 mb-lg-0 border border-primary border-2 rounded-2 px-2 py-3 align-self-center ">
            <h3 class="align-self-center">Utilisateurs</h3>
            <table
                class="table"
                data-toggle="table"
                data-search="true"
                data-pagination="true"
                data-height="500"
                data-row-attributes="rowAttributes"
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Identité</th>
                <th scope="col">email</th>
                <th scope="col">Niveau</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn btn-danger col-8">Supprimer</button>
                </td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <button type="button" class="btn btn-danger col-8">Supprimer</button>
                </td>
            </tr>
            </tbody>
            </table>
        </div>
        <div id="divAdminOneUser" class="d-flex flex-column col-10 col-lg-5 border border-primary border-2 rounded-2 px-2 py-3 align-self-center">
            <h3 class="align-self-center">Informations utilisateur:</h3>
            <div class="mb-3">
                <label for="userName" class="form-label">Identité:</label>
                <input type="text" class="form-control" id="userName" value="TALLA MICHAEL">
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Adresse:</label>
                <input type="text" class="form-control" id="address" value="1 rue de Strasbourg">
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Ville:</label>
                <input type="text" class="form-control" id="city" value="Maisons-Alfort">
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" value="mai_keul_@hotmail.com">
            </div>
            <div class="mb-3">
                <label for="userName" class="form-label">Niveau d'authenfication:</label>
                <select class="form-select">
                    <option selected>Niveau d'authentification</option>
                    <option value="1">Super Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Vendor</option>
                    <option value="3">Client</option>
                </select>
            </div>
            <div>
                <button type="button" class="btn btn-success col-12 my-2">valider les modification</button>
            </div>
        </div>
    </div>
</div>