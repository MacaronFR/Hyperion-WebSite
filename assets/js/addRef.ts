declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

const typeSelect = $("#typeSelect");
const catSelect = $("#catSelect");
const brandSelect = $("#brandSelect");
const modelInput = $("#modelInput");
const newSpec = $("#newSpec");
const specDiv = $("#specDiv");
const specForm = $("#specForm");
const buyInput = $("#buyInput");
const sellInput = $("#sellInput");
var nSpec = 0;

const emptySpec = "<div class=\"row col-11 col-lg-10 col-xl-8 border border-2 border-primary rounded-3 py-4 px-4 align-self-center divs_manage mb-4 spec\">" +
	"<div class='container mb-3'>" +
	"<div class='d-flex justify-content-between'>" +
	"<h3>" + text['spec']['title'] + "</h3>" +
	"<button class='btn btn-outline-danger fs-3 del-spec' type='button'><i class=\"bi bi-x\"></i></button>" +
	"</div>" +
	"<div class='row mt-4'>" +
	"<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>" + text['spec']['name']['text'] + "</span>" +
	"<input type='text' placeholder='" + text['spec']['name']['placeholder'] + "' class='spec-name form-control' name='name'>" +
	"</div>" +
	"<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>" + text['spec']['value']['text'] + "</span>" +
	"<input type='text' placeholder='" + text['spec']['value']['placeholder'] + "' class='spec-value form-control' name='value'>" +
	"<input type='number' placeholder='Bonus' class='specbonus form-control' name='bonus'>" +
	"</div>" +
	"<div class='input-group px-3'>" +
	"<button type='button' class='btn btn-outline-secondary w-100 add-spec-value'>+</button>" +
	"</div>" +
	"</div>" +
	"</div>"

const emptySpecValue = "<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>" + text['spec']['value']['text'] + "</span>" +
	"<input type='text' placeholder='" + text['spec']['value']['placeholder'] + "' class='spec-value form-control'>" +
	"<input type='number' placeholder='Bonus' class='specbonus form-control' name='bonus'>" +
	"<button class='btn btn-outline-danger delete-val' tabindex='-1' type='button'><i class=\"bi bi-trash\"></i></button>" +
	"</div>"

catSelect.on("change", function(){
	API_REQUEST("/category/" + catSelect.val() + "/type", "GET").then((res) => {
		brandSelect.val("-1").attr("disabled", true).find("option:not([disabled])").remove();
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucun type dans cette cat??gories");
			toastList[2].show();
		}else{
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			typeSelect.val("-1").removeAttr("disabled").find("option:not([disabled])").remove();
			for(let i = 0; i < n; ++i){
				typeSelect.append(new Option(res.content[i].type, res.content[i].id));
			}
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la r??cup??ration des types");
		toastList[0].show();
	})
})

typeSelect.on("change", function (){
	API_REQUEST("/brand", "GET").then( (res) => {
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucune marque de ce type");
			toastList[2].show();
		}else{
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			brandSelect.removeAttr("disabled").find("option:not([disabled])").remove();
			for(let i = 0; i < n; ++i){
				brandSelect.append(new Option(res.content[i].value, res.content[i].id));
			}
			brandSelect.val("-1");
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la r??cup??ration des marques");
		toastList[0].show();
	})
})

brandSelect.on("change", function(){
	modelInput.removeAttr("disabled");
})

newSpec.on("click", function(){
	nSpec++;
	specDiv.append(emptySpec);
	const spec = $(".spec.divs_manage").last();
	spec.attr("id", "spec"+nSpec);
	spec.find(".spec-name").attr("name", "name"+nSpec);
	spec.find(".spec-value").attr("name", "value" + nSpec + "[]");
	spec.find(".add-spec-value").attr("data-n", nSpec);
	newSpecListener();
})

specForm.on("submit", function(){
	const type = specForm.find("[name=type]").val();
	const brand = parseInt(specForm.find("[name=brand]").val());
	const model = specForm.find("[name=model]").val();
	const specs = prepareSpec();
	const buying = parseFloat(buyInput.val());
	const selling = parseFloat(sellInput.val());
	let fields = {
		"type": type,
		"brand": brand,
		"model": model,
		"specs": specs,
		"buying": buying,
		"selling": selling,
	}
	if(type === null || brand === null || model === ""){
		$("#ToastWarning").children(".toast-body").text("Champs manquant");
		toastList[2].show();
		return false;
	}
	API_REQUEST("/reference/" + token, "POST", fields).then((res) => {
		if(res.status.code === 201){
			$("#ToastSuccess").children(".toast-body").text("R??f??rence Cr??er");
			toastList[1].show();
			reset();
		}else if(res.status.code === 209){
			$("#ToastWarning").children(".toast-body").text("La r??f??rence existe");
			toastList[2].show();
		}
	}).catch( () =>{
		$("#ToastError").children(".toast-body").text("Erreur lors de la cr??ation de la r??f??rence");
		toastList[0].show();
	})
	return false;
})

function prepareSpec(): object{
	let spec = [];
	for(let i = 1; i <= nSpec; ++i){
		let val = []
		$("[name='value" + i + "[]']").each(function(){
			if($(this).val() !== ""){
				val.push({"value": $(this).val(), "bonus": $(this).siblings("input.specbonus").val()});
			}
		})
		if($("[name=name" + i + "]").val() !== "") {
			spec.push({"name": $("[name=name" + i + "]").val(), "value": val});
		}
	}
	return spec;
}

function newSpecListener(){
	$(".add-spec-value").off("click").on("click", function (){
		$(emptySpecValue).insertBefore($(this).parent()).find("input.spec-value").attr("name", "value" + $(this).data("n") + "[]");
		$(".delete-val").off("click").on("click", function(){
			$(this).parents(".input-group").remove();
		})
	})
	$(".del-spec").on("click", function (){
		console.log($(this).parents(".divs_manage").remove());
	})
}

$("#reset").on("click", function(){
	reset();
})

// @ts-ignore
function reset(){
	typeSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
	catSelect.val(-1);
	brandSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
	modelInput.val("").attr("disabled", true);
	buyInput.val("");
	sellInput.val("");
	$(".divs_manage.spec").remove();
}