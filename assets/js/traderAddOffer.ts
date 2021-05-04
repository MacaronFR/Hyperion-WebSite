declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

let sCat = $("#selectCategory");
let sType = $("#selectType");
let sMark = $("#selectMark");
let sModel = $("#selectModel");
let sState = $("#selectState");

sCat.on("change", function () {
	sType.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sMark.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	let url = "/type";
	if(sCat.val() !== "-1"){
		url = "/category/" + sCat.val() + "/type";
	}
	API_REQUEST(url, "GET").then( (res) =>{
		if(res.status.code === 200){
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			sType.removeAttr("disabled").find("option:not(.keep)").remove();
			for(let i = 0; i < n; ++i){
				sType.append(new Option(res.content[i].type, res.content[i].id));
			}
			sType.val("-2");
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucun type dans cette catégorie");
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la récupération des types");
		toastList[0].show();
	})
})

sType.on("change", function () {
	sMark.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	let url = "/mark";
	if(sType.val() !== "-1"){
		url = "/type/" + sType.val() + "/mark";
	}
	API_REQUEST(url, "GET").then( (res) =>{
		if(res.status.code === 200){
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			sMark.removeAttr("disabled").find("option:not(.keep)").remove();
			for(let i = 0; i < n; ++i){
				sMark.append(new Option(res.content[i].value, res.content[i].value));
			}
			sMark.val("-2");
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucune marque de ce type");
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la récupération des marques");
		toastList[0].show();
	})
})

sMark.on("change", function () {
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	let url = "/model";
	if(sMark.val() !== "-1"){
		url = "";
		if(sType !== "-1"){
			url = "/type/" + sType.val();
		}
		url += "/mark/" + sMark.val() + "/model"
	}
	API_REQUEST(url, "GET").then( (res) =>{
		if(res.status.code === 200){
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			sModel.removeAttr("disabled").find("option:not(.keep)").remove();
			for(let i = 0; i < n; ++i){
				sModel.append(new Option(res.content[i].value, res.content[i].value));
			}
			sModel.val("-2");
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucun model de cette marque pour ce type");
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la récupération des modèles");
		toastList[0].show();
	})
})