declare var token: any;
declare var $: any;
declare var bootstrap: any;

let toastEL = [].slice.call(document.querySelectorAll(".toast"));
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

function rowAttributes(row, index){
	return {"class": "cat-row"};
}
// ---------- callModalDomain  ----------
//var domainModal = document.getElementById('modalAlterCategory')
$("#modalAlterCategory").on('show.bs.modal' ,function (e) {
	let button = $(e.relatedTarget);
	let domain_actual_name = button.data("categoryName")
	let id_domain = button.data("categoryId")
	$('#titleModalCategory').text('Renommer la catégorie : ' + domain_actual_name)
	$('#actualCategoryName').val(id_domain)
	$("#newCategoryName").attr("placeholder", domain_actual_name)
	$('#changeCategory').off("click").on("click", function (){
		let value = $("#newCategoryName").val();
		API_REQUEST("/category/" + token + "/" + id_domain, "PUT", {"name": value}).then((res) => {
			if(res['status']['code'] === 200){
				button.parents("tr").children()[1].innerText = value;
				button.data("categoryName", value);
				$("#modalAlterCategory").modal("toggle")
				$("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès")
				toastList[1].show()
				$("#newCategoryName").val("")
			}else if(res['status']['code'] === 202){
				$("#ToastWarning").children(".toast-body").text("Cette catégorie existe déjà")
				toastList[2].show()
			}
		}).catch((res) => {
			console.log(res);
			$("#ToastError").children(".toast-body").text("Erreur lors de la modification")
			toastList[0].show()
		});
	});
})

$("#modalDelete").on("show.bs.modal", function (e){
	let button = $(e.relatedTarget);
	if(button.data("categoryId") !== undefined){
		$(this).find(".modal-title").text("Supprimer catégorie : " + button.data("categoryName"));
		$(this).find(".delete").off("click").on("click", function () {
			deleteCat(button.data("categoryId"), $(this).parents(".modal"), button.parents("tr"));
		})
	}else if(button.data("typeId") !== undefined){
		deleteType(button, $(this));
	}
})

function deleteType(button, modal){
	$(modal).find(".modal-title").text("Supprimer type : " + button.data("typeName"));
	$(modal).find(".delete").off("click").on("click", function () {
		API_REQUEST("/type/" + token + "/" + button.data("typeId"), "DELETE").then((res) => {
			console.log(res)
			if(res.status.code === 204) {
				button.parents("table").bootstrapTable("refresh");
				$("#ToastSuccess").children(".toast-body").text("Type supprimer avec succès");
				modal.modal("toggle");
				toastList[1].show();
			}else if(res.status.code === 209){
				$("#ToastWarning").children(".toast-body").text("Des produits ou des références dépende de ce type");
				toastList[2].show();
			}
		}).catch((res) => {
			if(res.status.code === 404) {
				$("#ToastWarning").children(".toast-body").text("Le type n'existe plus");
				toastList[2].show();
			}else {
				$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
				toastList[0].show()
			}
		})
	})
}

function deleteCat(id, modal, line){
	API_REQUEST("/category/" + token + "/" + id, "DELETE").then(() => {
		$(line).remove()
		$("#ToastSuccess").children(".toast-body").text("Catégorie supprimer avec succès")
		modal.modal("toggle");
		toastList[1].show()
	}).catch(() => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la suppression")
		toastList[0].show()
	})
}

$("#addCategory").on("click", function(){
	let name = $("#addCategoryInput").val()
	API_REQUEST("/category/" + token, "POST", {"name": name}).then((res) =>{
		if(res['status']['code'] === 201){
			let new_line = $($(".cat-row")[0]).clone(true, true);
			new_line.children()[0].textContent = res['content'][0];
			new_line.children()[1].textContent = name;
			new_line.children()[2].children[0].dataset["categoryId"] = res['content'][0];
			new_line.children()[2].children[0].dataset["categoryName"] = name;
			new_line.children()[3].children[0].dataset["categoryId"] = res['content'][0];
			$(new_line.children()[3].children[0]).off("click");
			$(new_line.children()[3].children[0]).on("click", deleteCat);
			new_line.prependTo($("#tabCat"));
			$("#ToastSuccess").children(".toast-body").text("Catégorie ajouter avec succès");
			toastList[1].show();
			$("#addCategoryInput").val("");
		}else if(res['status']['code'] === 202){
			$("#ToastWarning").children(".toast-body").text("La catégorie existe déjà")
			toastList[2].show()
		}
	}).catch(() => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la création")
		toastList[0].show()
	})
})

// ---------- callModalType  ----------
$("#modalAlterType").on("show.bs.modal", function (e){
	const button = $(e.relatedTarget);
	$("#titleModalType").textContent = "Modifier le type : " + button.data("typeName");
	$("#actualTypeName").val(button.data("typeId"));
	$("#newTypeName").attr("placeholder", button.data("typeName"));
	$("#selectTypeCat").val(button.data("categoryId")).change();
	$('#changeType').off("click").on("click", function (){
		let new_name = $("#newTypeName").val();
		let new_cat = $("#selectTypeCat").val();
		API_REQUEST("/type/" + token + "/" + button.data("typeId"), "PUT", {"type": new_name, "category": new_cat}).then((res) => {
			if(res['status']['code'] === 200){
				button.parents("table").bootstrapTable("refresh");
				$("#modalAlterType").modal("toggle")
				$("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès")
				toastList[1].show()
				$("#newTypeName").val("")
			}else if(res['status']['code'] === 202){
				$("#ToastWarning").children(".toast-body").text("Cette catégorie existe déjà")
				toastList[2].show()
			}
		}).catch((res) => {
			console.log(res);
			$("#ToastError").children(".toast-body").text("Erreur lors de la modification")
			toastList[0].show()
		});
	})
});

$("#addType").on("click", function(){
	let name = $("#typeName").val();
	let cat = $("#typeCategory").val();
	console.log(cat);
	API_REQUEST("/type/" + token, "POST", {"type": name, "category": cat}).then((res) =>{
		if(res['status']['code'] === 201){
			$("#table_type").bootstrapTable("refresh");
			$("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès")
			toastList[1].show()
			$("#typeName").val("")
			$("#typeCategory").val("")
		}else if(res['status']['code'] === 209){
			$("#ToastWarning").children(".toast-body").text("Conflit, le nom existe déjà");
			toastList[2].show();
		}
	}).catch((res) => {
		$("#ToastError").children(".toast-body").text("Erreur lors de la création")
		toastList[0].show()
	})
})

// ---------- callModalSpec  ----------
$("#modalAlterSpec").on("click", function (e) {
	var button = e.relatedTarget
	var Spec_actual_name = button.getAttribute('data-spec-name')
	var Spec_actual_value = button.getAttribute('data-spec-value')
	var id_spec = button.getAttribute('data-spec-id')
	var modalTitle = document.getElementById('titleModalSpec')
	var modalBodyInput = $('#actualSpecName');
	modalTitle.textContent = 'Alterer la spec: ' + Spec_actual_name
	modalBodyInput.val(id_spec)
})

function retrieve_cat(params){
	let url = prepare_url(params, "/category/");
	API_REQUEST(url, "GET").then((res) => {
		let rows = [];
		let total = res['content'].total;
		let totalNotFiltered = res['content'].totalNotFiltered;
		delete res['content']['total'];
		delete res['content']['totalNotFiltered'];
		for(let i = 0; i < Object.keys(res.content).length; ++i){
			rows.push(res.content[i]);
			rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterCategory\" data-category-id=\"" + rows[i]['id'] + "\" data-category-name=\"" + rows[i]['name'] + "\">Modifier</button>"
			rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-category-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-category-name=\"" + rows[i]['name'] + "\">Supprimer</button>"
		}
		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
	})
}

function retrieve_type(params){
	let url = prepare_url(params, "/type_cat/");
	API_REQUEST(url, "GET").then((res) => {
		let rows = [];
		let total = res['content'].total;
		let totalNotFiltered = res['content'].totalNotFiltered;
		delete res['content']['total'];
		delete res['content']['totalNotFiltered'];
		for(let i = 0; i < Object.keys(res.content).length; ++i){
			rows.push(res.content[i]);
			rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterType\" data-type-id=\"" + rows[i]['id'] + "\" data-type-name=\"" + rows[i]['type'] + "\" data-category-id=\"" + rows[i]['category_id'] + "\">Modifier</button>"
			rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-type-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-type-name=\"" + rows[i]['type'] + "\">Supprimer</button>"
		}
		params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
	})
}

function prepare_url(params, url: string):string {
	url += params.data.offset / 10;
	if(params.data.order !== undefined && params.data.sort !== undefined) {
		url += "/search/" + params.data.search;
		url += "/order/" + params.data.order;
		url += "/sort/" + params.data.sort;
	}else if (params.data.search !== "") {
		url += "/search/" + params.data.search;
	}
	return url;
}