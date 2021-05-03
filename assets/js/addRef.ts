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
const markSelect = $("#markSelect");
const modelInput = $("#modelInput");
const newSpec = $("#newSpec");
const specDiv = $("#specDiv");
const specForm = $("#specForm");
var nSpec = 0;

const emptySpec = "<div class=\"row col-11 col-lg-10 col-xl-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4 spec\">" +
	"<div class='container mb-3'>" +
	"<div class='d-flex justify-content-between'>" +
	"<h3>Spécification</h3>" +
	"<button class='btn btn-outline-danger fs-3 del-spec' type='button'><i class=\"bi bi-x\"></i></button>" +
	"</div>" +
	"<div class='row mt-4'>" +
	"<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>Nom</span>" +
	"<input type='text' placeholder='Nom' class='spec-name form-control' name='name'>" +
	"</div>" +
	"<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>Valeur</span>" +
	"<input type='text' placeholder='Valeur' class='spec-value form-control' name='value'>" +
	"</div>" +
	"<div class='input-group px-3'>" +
	"<button type='button' class='btn btn-outline-secondary w-100 add-spec-value'>+</button>" +
	"</div>" +
	"</div>" +
	"</div>"

const emptySpecValue = "<div class='input-group mb-3 px-3'>" +
	"<span class='input-group-text'>Valeur</span>" +
	"<input type='text' placeholder='Valeur' class='spec-value form-control'>" +
	"<button class='btn btn-outline-danger delete-val' tabindex='-1' type='button'><i class=\"bi bi-trash\"></i></button>" +
	"</div>"

catSelect.on("change", function(){
	API_REQUEST("/category/" + catSelect.val() + "/type", "GET").then((res) => {
		markSelect.val("-1").attr("disabled", true).find("option:not([disabled])").remove();
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucun type dans cette catégories");
			toastList[2].show();
		}else{
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			typeSelect.val("-1").removeAttr("disabled").find("option:not([disabled])").remove();
			for(let i = 0; i < n; ++i){
				typeSelect.append(new Option(res.content[i].type, res.content[i].category));
			}
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la récupération des types");
		toastList[0].show();
	})
})

typeSelect.on("change", function (){
	API_REQUEST("/type/" + typeSelect.val() + "/mark", "GET").then( (res) => {
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			$("#ToastWarning").children(".toast-body").text("Aucune marque de ce type");
			toastList[2].show();
		}else{
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			markSelect.removeAttr("disabled").find("option:not([disabled])").remove();
			for(let i = 0; i < n; ++i){
				markSelect.append(new Option(res.content[i].value, res.content[i].id));
			}
			markSelect.val("-1");
		}
	}).catch( () => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la récupération des marques");
		toastList[0].show();
	})
})

markSelect.on("change", function(){
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
	const mark = parseInt(specForm.find("[name=mark]").val());
	const model = specForm.find("[name=model]").val();
	const specs = prepareSpec();
	let fields = {
		"type": type,
		"mark": mark,
		"model": model,
		"specs": specs,
		"buying": 1,
		"selling": 1
	}
	if(type === null || mark === null || model === ""){
		$("#ToastWarning").children(".toast-body").text("Champs manquant");
		toastList[2].show();
		return false;
	}
	API_REQUEST("/reference/" + token, "POST", fields).then((res) => {
		if(res.status.code === 201){
			$("#ToastSuccess").text("Référence Créer");
			toastList[1].show();
			typeSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
			catSelect.val(-1);
			markSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
			modelInput.val("").attr("disabled", true);
			$(".divs_manage.spec").remove();
		}else if(res.status.code === 209){
			$("#ToastWarning").children(".toast-body").text("La référence existe");
			toastList[2].show();
		}
	}).catch( () =>{
		$("#ToastError").children(".toast-body").text("Erreur lors de la création de la référence");
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
				val.push($(this).val());
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
		$(emptySpecValue).insertBefore($(this).parent()).find("input").attr("name", "value" + $(this).data("n") + "[]");
		$(".delete-val").off("click").on("click", function(){
			$(this).parents(".input-group").remove();
		})
	})
	$(".del-spec").on("click", function (){
		console.log($(this).parents(".divs_manage").remove());
	})
}