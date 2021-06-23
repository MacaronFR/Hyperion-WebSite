// @ts-ignore
declare var token: any;
declare var $: any;
declare var bootstrap: any;
declare var stateVal: object;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

// @ts-ignore
let estimation = 0;
// @ts-ignore
let sCat = $("#selectCategory");
// @ts-ignore
let sType = $("#selectType");
// @ts-ignore
let sBrand = $("#selectBrand");
// @ts-ignore
let sModel = $("#selectModel");
// @ts-ignore
let sState = $("#selectState");
// @ts-ignore
let price = $("#priceEstimation");

// @ts-ignore
let emptySpecSelect =
	"<div class=\"form-group mt-1 mt-lg-4 mx-2 spec-select\">" +
	"<label>Storage</label>" +
	"<select class=\"form-select specSelect\">" +
	"<option selected class=\"keep\" disabled value=\"-1\">" + text['select']['choose'] + "</option>" +
	"</select>" +
	"</div>";

function retrieve_pending_offer(params){
	let url = prepare_url(params, "/expert/offer/pending/" + token + "/");
	API_REQUEST(url, "GET").then((res) => {
		let rows = [];
		let total = res['content'].total;
		let totalNotFiltered = res['content'].totalNotFiltered;
		delete res['content']['total'];
		delete res['content']['totalNotFiltered'];
		for(let i = 0; i < Object.keys(res.content).length; ++i){
			rows.push(res.content[i]);
			rows[i]['change'] = "<button type=\"button\" class=\"btn btn-warning\" data-offer-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalModify\">Modifier</button>"
			rows[i]['confirm'] = "<button type=\"button\" class=\"btn btn-success\" data-offer-id=\"" + rows[i]['id'] + "\" onclick=\"validateCounterOffer(this)\">Valider</button>"
		}
		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
	})
}

sCat.on("change", function () {
	estimation = 0;
	price.text(text['unavailable']);
	sType.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sBrand.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("undefined").attr("disabled", true);
	let url = "/type";
	if(sCat.val() !== "undefined"){
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
			$("#ToastWarning").children(".toast-body").text(text['warning']['type']);
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text(text['error']['type']);
		toastList[0].show();
	})
})

sType.on("change", function () {
	estimation = 0;
	price.text(text['unavailable']);
	sBrand.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("undefined").attr("disabled", true);
	let url = "/brand";
	if(sType.val() !== "undefined"){
		url = "/type/" + sType.val() + "/brand";
	}
	API_REQUEST(url, "GET").then( (res) =>{
		if(res.status.code === 200){
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			sBrand.removeAttr("disabled").find("option:not(.keep)").remove();
			for(let i = 0; i < n; ++i){
				sBrand.append(new Option(res.content[i].value, res.content[i].value));
			}
			sBrand.val("-2");
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text(text['warning']['brand']);
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text(text['error']['brand']);
		toastList[0].show();
	})
})

sBrand.on("change", function () {
	estimation = 0;
	price.text(text['unavailable']);
	sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
	sState.val("undefined").attr("disabled", true);
	let url = "/model";
	let type = false;
	if(sBrand.val() !== "undefined"){
		url = "/brand/" + sBrand.val() + "/model"
	}
	if(sType.val() !== "undefined"){
		type = true;
		url = "/type/" + sType.val() + url;
	}
	API_REQUEST(url, "GET").then( (res) =>{
		if(res.status.code === 200){
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			sModel.removeAttr("disabled").find("option:not(.keep)").remove();
			if(type) {
				for (let i = 0; i < n; ++i) {
					sModel.append(new Option(res.content[i].value, res.content[i].value));
				}
			}else{
				let keys = Object.keys(res.content);
				for(let i = 0; i < keys.length; ++i){
					sModel.append($(new Option(keys[i])).attr("disabled", true));
					for(let j = 0; j < res.content[keys[i]].length; ++j){
						sModel.append( new Option(res.content[keys[i]][j], res.content[keys[i]][j]))
					}
				}
			}
			sModel.val("-2");
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text(text['warning']['model']);
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text(text['error']['model']);
		toastList[0].show();
	})
})

sModel.on("change", function(){
	estimation = 0;
	price.text(text['unavailable']);
	$("#newOffer").find(".spec-select").remove();
	sState.removeAttr("disabled").val("undefined");
	if(sType.val() !== "undefined" && sBrand.val() !== "undefined" && sModel.val() !== "undefined"){
		updateSpec(sType.val(), sBrand.val(), sModel.val(), null);
	}
})

function updateSpec(type, brand, model, specValue){
	API_REQUEST("/type/" + type + "/brand/" + brand + "/model/" + model + "/reference", "GET").then( (res)=> {
		if(res.status.code === 200) {
			$(".spec-select").remove()
			estimation = parseInt(res.content.buying_price);
			const keys = Object.keys(res.content.spec)
			for (let i = 0; i < keys.length; ++i) {
				const select = $(emptySpecSelect);
				select.find("label").text(text['specification']['name'][keys[i]]).attr("data-name", keys[i]);
				if (res.content.spec[keys[i]].length !== 1){
					select.find("select").on("change", updateEstimation);
					for (let j = 0; j < res.content.spec[keys[i]].length; ++j) {
						let option = $(new Option(res.content.spec[keys[i]][j][0], res.content.spec[keys[i]][j][0]))
						option.data("bonus", res.content.spec[keys[i]][j][1])
						select.find("select").append(option);
					}
					if(specValue !== null && specValue[keys[i]]){
						select.find("select").val(specValue[keys[i]])
					}
				} else {
					estimation += parseInt(res.content.spec[keys[i]][0][1]);
					select.find("select").append(new Option(res.content.spec[keys[i]][0][0], res.content.spec[keys[i]][0][0]));
					select.find("select").val(res.content.spec[keys[i]][0][0]);
				}
				$("#modalModifyOffer").append(select);
			}
			price.text(estimation.toString() + " €")
		}else if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text(text['warning']['spec']);
			toastList[2].show();
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text(text['error']['spec']);
		toastList[0].show();
	});
}

sState.on("change", updateEstimation)

// @ts-ignore
function updateEstimation(){
	let tmpEstimation = estimation;
	$(".specSelect").each(function (){
		if($(this).find("option:selected").data("bonus") !== undefined){
			tmpEstimation += parseInt($(this).find("option:selected").data("bonus"))
		}
	})
	let state = sState.val();
	if(state === null){
		state = 5
	}
	price.text((tmpEstimation * ((100 - stateVal[state]) / 100)).toFixed(2).toString() + " €");
}

function reset(){
	sState.val("undefined")
}

$("#modalModify").on("show.bs.modal", function (e){
	const button = e.relatedTarget
	API_REQUEST("/offer/" + token + "/" + button.dataset['offerId'], "GET").then( (res) => {
		if(res.status.code === 200) {
			console.log(res)
			sCat.val(res.content.category)
			API_REQUEST("/category/" + res.content.category + "/type", "GET").then( (resT) => {
				if(resT.status.code === 200){
					let total = resT.content.total;
					delete resT.content.total;
					delete resT.content.totalNotFiltered;
					for(let i = 0; i < total; ++i){
						sType.append(new Option(resT.content[i].type, resT.content[i].id));
						if(res.content.type === resT.content[i].type){
							sType.val(resT.content[i].id);
						}
					}
					sType.removeAttr("disabled");
				}
			})
			API_REQUEST("/type/" + res.content.type_id + "/brand", "GET").then( (resB) => {
				if(resB.status.code === 200){
					let total = resB.content.total;
					delete resB.content.total;
					delete resB.content.totalNotFiltered;
					for(let i = 0; i < total; ++i){
						sBrand.append(new Option(resB.content[i].value));
					}
					sBrand.removeAttr("disabled");
					sBrand.val(res.content.spec.brand);
				}
			})
			API_REQUEST("/type/" + res.content.type_id + "/brand/" + res.content.spec.brand + "/model", "GET").then( (resM) => {
				if(resM.status.code === 200){
					let total = resM.content.total;
					delete resM.content.total;
					delete resM.content.totalNotFiltered;
					for(let i = 0; i < total; ++i){
						sModel.append(new Option(resM.content[i].value));
					}
					sModel.removeAttr("disabled");
					sModel.val(res.content.spec.model);
				}
			})
			sState.val(res.content.state);
			sState.removeAttr("disabled");
			updateSpec(res.content.type_id, res.content.spec.brand, res.content.spec.model, res.content.spec);
		}
		$("#changeOffer").off("click").on("click", () => {
			const info = {
				"type": sType.val(),
				"brand": sBrand.val(),
				"model": sModel.val(),
				"state": sState.val(),
				"spec": {}
			}
			$(".specSelect").each(function(i, e){
				info.spec[$(e).siblings("label").attr("data-name")] = $(e).val()
			})
			API_REQUEST("/offer/set/" + token + "/" + res.content.id_offer, "PUT", info).then( (resO) => {
				$(".table").bootstrapTable("refresh");
				$("#ToastSuccess").children(".toast-body").text("Offre Modifié");
				toastList[1].show();
				$(this).modal("toggle");
			}).catch( () => {
				$("#ToastError").children(".toast-body").text("Erreur lors de la modifaction de l'offre");
				toastList[0].show();
			})
		})
	})
})

function validateCounterOffer(element){
	API_REQUEST("/offer/counter/send/" + token + "/" + element.dataset['offerId'], "PUT").then((res) => {
		if(res.status.code === 200){
			$(".table").bootstrapTable("refresh");
			$("#ToastSuccess").children(".toast-body").text("Contre Offre envoyé");
			toastList[1].show();
		}
	}).catch( (res) => {
		console.log(res)
		$("#ToastError").children(".toast-body").text("Erreur lors de l'envoie de la contre-offre");
		toastList[0].show();
	})
}