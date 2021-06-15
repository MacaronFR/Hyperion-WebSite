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
			console.log(res.content[i])
			rows[i]['change'] = "<button type=\"button\" class=\"btn btn-warning\" data-offer-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalModify\" data-cat=\"" + rows[i]['category'] + "\">Modifier</button>"
			rows[i]['confirm'] = "<button type=\"button\" class=\"btn btn-success\" data-offer-id=\"" + rows[i]['id'] + "\">Valider</button>"
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
		API_REQUEST("/type/" + sType.val() + "/brand/" + sBrand.val() + "/model/" + sModel.val() + "/reference", "GET").then( (res)=> {
			if(res.status.code === 200) {
				estimation = parseInt(res.content.buying_price);
				const keys = Object.keys(res.content.spec)
				for (let i = 0; i < keys.length; ++i) {
					const select = $(emptySpecSelect);
					select.find("label").text(text['specification']['name'][keys[i]]).attr("data-name", keys[i]);
					if (Array.isArray(res.content.spec[keys[i]])) {
						select.find("select").on("change", updateEstimation);
						for (let j = 0; j < res.content.spec[keys[i]].length; ++j) {
							let option = $(new Option(res.content.spec[keys[i]][j][0], res.content.spec[keys[i]][j][0]))
							option.data("bonus", res.content.spec[keys[i]][j][1])
							select.find("select").append(option);
						}
					} else {
						estimation += parseInt(res.content.spec[keys[i]][0][1]);
						select.find("select").append(new Option(res.content.spec[keys[i]][0][0], res.content.spec[keys[i]][0][0]));
						select.find("select").val(res.content.spec[keys[i]]);
					}
					$("#modalModifyOffer").append(select);
				}
				price.text(estimation.toString() + " €")
			}else if(res.status.code === 204){
				$("#ToastWarning").children(".toast-body").text(text['warning']['spec']);
				toastList[2].show();
			}
		}).catch( (res) => {
			$("#ToastError").children(".toast-body").text(text['error']['spec']);
			toastList[0].show();
		});
	}
})

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
	console.log("NIKK")
	price.text((tmpEstimation * ((100 - stateVal[state]) / 100)).toFixed(2).toString() + " €");
}

function reset(){
	sState.val("undefined")
}

$("#modalModify").on("show.bs.modal", function (e){
	console.log(e.relatedTarget)
})