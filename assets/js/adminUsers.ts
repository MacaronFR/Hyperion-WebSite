declare var token: any;
declare var $: any;
declare var bootstrap: any;
declare var level: object;

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
			rows.push(res.content[i])
			rows[i]['type'] = level[rows[i]['type']];
			rows[i]['change'] = "<button type=\"button\" class=\"btn btn-primary\" data-user-id=\"" + rows[i]['id'] + "\" onclick=\"changeUser(this)\">Modifier</button>"
			rows[i]['delete'] = "<button type=\"button\" class=\"btn btn-danger\" data-user-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\">Supprimer</button>"
		}
		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
	})
}

const uName = $("#name");
const uFName = $("#fname");
const uMail = $("#mail");
const uAddress = $("#address");
const uCity = $("#city");
const uZip = $("#zip");
const uRegion = $("#region");
const uCountry = $("#country");
const uAcCreation = $("#ac_creation");
const uLLogin = $("#l_login");
const uType = $("#level");
const save = $("#save");

function changeUser(button){
	const user_id = button.dataset['userId'];
	API_REQUEST("/profile/" + token + "/" + user_id, "GET").then( (res) => {
		if(res.status.code === 200){
			uName.val(res.content.name).removeAttr("disabled");
			uFName.val(res.content.fname).removeAttr("disabled");
			uMail.val(res.content.mail).removeAttr("disabled");
			if(res.content.addr !== null) {
				uAddress.val(res.content.addr.city).removeAttr("disabled");
				uCity.val(res.content.addr.city).removeAttr("disabled");
				uZip.val(res.content.addr.zip).removeAttr("disabled");
				uRegion.val(res.content.addr.region).removeAttr("disabled");
				uCountry.val(res.content.addr.country).removeAttr("disabled");
			}else{
				uAddress.val("").removeAttr("disabled");
				uCity.val("").removeAttr("disabled");
				uZip.val("").removeAttr("disabled");
				uRegion.val("").removeAttr("disabled");
				uCountry.val("").removeAttr("disabled");
			}
			uAcCreation.val(res.content.ac_creation).removeAttr("disabled");
			uLLogin.val(res.content.llog).removeAttr("disabled");
			uType.val(res.content.type).removeAttr("disabled");
			save.data("userId", res.content.id);
		}
	})
}


save.on("click", function (){
	let userNewInfo = {
		"name": uName.val(),
		"fname": uFName.val(),
		'mail': uMail.val(),
		"type": uType.val(),
		'addr': {
			'address': uAddress.val(),
			'city': uCity.val(),
			'zip': uZip.val(),
			'region': uRegion.val(),
			'country': uCountry.val()
		}
	}
	API_REQUEST("/profile/" + token + "/" + save.data("userId"), "PUT", userNewInfo).then( (res) => {
		if(res.status.code === 200){
			$("#ToastSuccess").children(".toast-body").text("Modifications enregistr??es");
			toastList[1].show()
		}else{
			$("#ToastError").children(".toast-body").text("Erreur lors de l'enregistrement des modifications")
			toastList[0].show()
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de l'enregistrement des modifications")
		toastList[0].show()
	})
})

$("#modalDelete").on("show.bs.modal", function(e) {
	let button = $(e.relatedTarget);
	let modal = $(this);
	modal.find(".modal-title").text("Supprimer Utilisateur " + button.data("userId"));
	modal.find(".delete").off("click").on("click", function () {
		API_REQUEST("/profile/" + token + "/" + button.data("userId"), "DELETE").then((res) => {
			if (res.status.code === 204) {
				$("#ToastSuccess").children(".toast-body").text("Utilisateurs supprim??");
				toastList[1].show()
				modal.modal("toggle");
				$(".table").bootstrapTable("refresh")
			} else {
				$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
				toastList[0].show()
			}
		}).catch(() => {
			$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
			toastList[0].show()
		})
	})
})