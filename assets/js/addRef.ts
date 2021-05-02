declare var token: any;
declare var $: any;
declare var bootstrap: any;

const typeSelect = $("#typeSelect");
const catSelect = $("#catSelect");
const markSelect = $("#markSelect");
const modelInput = $("#modelInput");
const newSpec = $("#newSpec");
const specDiv = $("#specDiv");
const specForm = $("#specForm");
var nSpec = 0;

const emptySpec = "<div class=\"row col-11 col-lg-10 col-xl-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4\">" +
	"<div class='container mb-3'>" +
	"<h3>Spécification</h3>" +
	"<div class='row mt-4'>" +
	"<div class='input-group mb-3'>" +
	"<span class='input-group-text'>Nom</span>" +
	"<input type='text' placeholder='Nom' class='spec-name form-control' name='name'>" +
	"</div>" +
	"<div class='input-group'>" +
	"<span class='input-group-text'>Valeur</span>" +
	"<input type='text' placeholder='Valeur' class='spec-value form-control' name='value'>" +
	"</div>" +
	"</div>" +
	"</div>"

catSelect.on("change", function(){
	API_REQUEST("/category/" + catSelect.val() + "/type", "GET").then((res) => {
		markSelect.val("-1").attr("disabled", true).find("option:not([disabled])").remove();
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			console.log("Nothing");
		}else{
			const n = res.content.total;
			delete res.content.total;
			delete res.content.totalNotFiltered;
			typeSelect.val("-1").removeAttr("disabled").find("option:not([disabled])").remove();
			for(let i = 0; i < n; ++i){
				typeSelect.append(new Option(res.content[i].type, res.content[i].category));
			}
		}
	})
})

typeSelect.on("change", function (){
	API_REQUEST("/type/" + typeSelect.val() + "/mark", "GET").then( (res) => {
		modelInput.attr("disabled", true);
		if(res.status.code === 204){
			console.log("Nothing");
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
	})
})

markSelect.on("change", function(){
	modelInput.removeAttr("disabled");
})

newSpec.on("click", function(){
	nSpec++;
	specDiv.append(emptySpec);
})

specForm.on("submit", function(){
	const cat = specForm.find("[name=category]");
	const type = specForm.find("[name=type]");
	const mark = specForm.find("[name=mark]");
	const model = specForm.find("[name=model]");
	const specName = specForm.find("[name=name]");
	const specValue = specForm.find("[name=value]");
	console.log(cat);
	console.log(type);
	console.log(mark);
	console.log(model);
	console.log(specName);
	console.log(specValue);
	return false;
})