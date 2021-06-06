declare var token: any;
declare var $: any;
declare var bootstrap: any;
declare var text: object;
declare var lang: string;
declare var Base64: any;

const maxFile = 3;
let nFile = 1;
let b64File = [];

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

let sCat = $("#selectCategory");
let sType = $("#selectType");
let sBrand = $("#selectBrand");
let sModel = $("#selectModel");
let sState = $("#selectState");

let emptySpecSelect =
	"<div class=\"form-group mt-1 mt-lg-4 mx-2 spec-select\">" +
		"<label>Storage</label>" +
		"<select class=\"form-select\">" +
			"<option selected class=\"keep\" disabled value=\"-1\">" + text['select']['choose'] + "</option>" +
		"</select>" +
	"</div>";

let fileTab = "<li class='nav-item'><a class='nav-link' data-bs-toggle='tab' data-bs-target=''>" + text['select']['file'] + "</a></li>"

sCat.on("change", function () {
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
	$("#newOffer").find(".spec-select").remove();
	sState.removeAttr("disabled").val("undefined");
	if(sType.val() !== "undefined" && sBrand.val() !== "undefined" && sModel.val() !== "undefined"){
		API_REQUEST("/type/" + sType.val() + "/brand/" + sBrand.val() + "/model/" + sModel.val() + "/reference", "GET").then( (res)=> {
			if(res.status.code === 200) {
				const keys = Object.keys(res.content.spec)
				for (let i = 0; i < keys.length; ++i) {
					const select = $(emptySpecSelect);
					select.find("label").text(text['specification']['name'][keys[i]]).attr("data-name", keys[i]);
					if (Array.isArray(res.content.spec[keys[i]])) {
						for (let j = 0; j < res.content.spec[keys[i]].length; ++j) {
							select.find("select").append(new Option(res.content.spec[keys[i]][j], res.content.spec[keys[i]][j]));
						}
					} else {
						select.find("select").append(new Option(res.content.spec[keys[i]], res.content.spec[keys[i]]));
						select.find("select").val(res.content.spec[keys[i]]);
					}
					$("#newOffer").append(select);
				}
			}else if(res.status.code === 204){
				$("#ToastWarning").children(".toast-body").text(text['warning']['spec']);
				toastList[2].show();
			}
		}).catch( (res) => {
			console.log(res);
			$("#ToastError").children(".toast-body").text(text['error']['spec']);
			toastList[0].show();
		});
	}
})

$("#newOffer").on("submit", function (e){
	e.preventDefault();
	let specOK = true;
	$(".spec-select").each(function(){if($(this).find("select").val() === null) specOK = false;})
	if(sCat.val() === null || sType.val() === null || sBrand.val() === null || sModel.val() === null || sState.val() === null || !specOK){
		$("#ToastWarning").children(".toast-body").text(text['warning']['not_full']);
		toastList[2].show()
		return;
	}
	if(sCat.val() === "undefined" || sType.val() === "undefined" || sBrand.val() === "undefined" || sModel.val() === "undefined" || sState.val() === "undefined"){
		$("#modalUndefined").modal("show");
		return;
	}
	sendOffer();
})

$("#sendUndefined").on("click", sendOffer);

async function sendOffer(){
	let specOK = true;
	let spec = {};
	$(".spec-select").each(function(){
		if($(this).find("select").val() === null){
			specOK = false;
			return false;
		}
		spec[$(this).find("label").data("name")] = $(this).find("select").val();
	});
	if(sCat.val() !== null && sType.val() !== null && sBrand.val() !== null && sModel.val() !== null && sState.val() !== null && specOK){
		let post = {
			'cat': sCat.val(),
			'type': sType.val(),
			'brand': sBrand.val(),
			'model': sModel.val(),
			'state': sState.val(),
			'spec': spec,
			'files': []
		}
		await readFile();
		post.files = b64File;
		API_REQUEST("/offer/" + token, "POST", post).then( (res) => {
			$("#ToastSuccess").children(".toast-body").text(text['success']['created']);
			toastList[1].show()
			console.log("Je redirige vers /trader/offer/{token}/" + res.content.offer);
			//TODO redirection
		}).catch( (res) => {
			console.log(res)
			$("#ToastError").children(".toast-body").text(text['error']);
			toastList[0].show()
		})
	}
	return
}

$("#newFile").on("click", function(){
	if(nFile < maxFile){
		++nFile;
		let tmp = $(fileTab);
		tmp.find("a").attr("data-bs-target", "#f" + nFile);
		$(this).before(tmp);
	}
	if(nFile >= maxFile){
		$(this).find("a").addClass("disabled")
	}
})

function readFile(): Promise<void>{
	return new Promise(function (resolve) {
		b64File = [];
		$(".offer-file").each(function (i) {
			if (this.files.length === 1) {
				const r = new FileReader();
				r.onload = (ev) => {
					b64File.push({
						'content': Base64.encode(ev.target.result),
						'filename': this.files[0].name,
						'type': this.files[0].type
					});
					if (i === maxFile - 1) {
						resolve();
					}
				}
				r.readAsText(this.files[0]);
			} else if (i === maxFile - 1) {
				resolve();
			}
		});
	});
}