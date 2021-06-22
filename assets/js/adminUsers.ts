declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

function retrieve_users(params){
	let url = prepare_url(params, "/users/" + token + "/")
	API_REQUEST(url, "GET").then( (res) => {
		let rows = [];
		let total = res['content'].total;
		let totalNotFiltered = res['content'].totalNotFiltered;
		delete res['content']['total'];
		delete res['content']['totalNotFiltered'];
		for(let i = 0; i < Object.keys(res.content).length; ++i){
			rows.push(res.content[i]);
			rows[i]['change'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterRef\" data-ref-id=\"" + rows[i]['id'] + "\">Modifier</button>"
			rows[i]['delete'] = "<button type=\"button\" class=\"btn btn-danger\" data-ref-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\">Supprimer</button>"
		}
		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
	})
}