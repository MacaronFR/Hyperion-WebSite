declare var token: any;
declare var $: any;
declare var info: object;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

let me_name = $("#name");
let me_fname = $("#fname");
let me_address = $("#address");
let me_city = $("#city");
let me_zip = $("#zip");
let me_region = $("#region");
let me_country = $("#country");

$("#save").on("click", function(){
	let new_info = {};
	if(me_name.val() !== info['name']){
		new_info['name'] = me_name.val();
	}
	if(me_fname.val() !== info['fname']){
		new_info['fname'] = me_fname.val();
	}
	if(me_address.val() !== info['addr']['address']){
		if(new_info['addr'] === undefined){
			new_info['addr'] = {};
		}
		new_info['addr']['address'] = me_address.val();
	}
	if(me_city.val() !== info['addr']['city']){
		if(new_info['addr'] === undefined){
			new_info['addr'] = {};
		}
		new_info['addr']['city'] = me_city.val();
	}
	if(me_zip.val() !== info['addr']['zip']){
		if(new_info['addr'] === undefined){
			new_info['addr'] = {};
		}
		new_info['addr']['zip'] = me_zip.val();
	}
	if(me_region.val() !== info['addr']['region']){
		if(new_info['addr'] === undefined){
			new_info['addr'] = {};
		}
		new_info['addr']['region'] = me_region.val();
	}
	if(me_country.val() !== info['addr']['country']){
		if(new_info['addr'] === undefined){
			new_info['addr'] = {};
		}
		new_info['addr']['country'] = me_country.val();
	}
	if(Object.entries(new_info).length !== 0) {
		API_REQUEST("/me/" + token, "PUT", new_info).then((res) => {
			if(res.status.code === 200){
				API_REQUEST("/me/" + token, "GET").then( (res) => {
					if(res.status.code === 200){
						info = res.content;
					}
				})
				$("#ToastSuccess").children(".toast-body").text("Profil mis à jour");
				toastList[1].show();
			}
		}).catch( (res) => {
			if(res.status.code === 403){
				location.replace("/connect");
			}else{
				$("#ToastError").children(".toast-body").text("Erreur");
				toastList[0].show();
			}
		})
	}else{
		$("#ToastWarning").children(".toast-body").text("Aucun champs modifié");
		toastList[2].show();
	}
})