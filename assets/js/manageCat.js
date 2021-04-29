var toastEL = [].slice.call(document.querySelectorAll(".toast"));
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function rowAttributes(row, index) {
    return { "class": "cat-row" };
}
// ---------- callModalDomain  ----------
//var domainModal = document.getElementById('modalAlterCategory')
$("#modalAlterCategory").on('show.bs.modal', function (e) {
    var button = $(e.relatedTarget);
    var domain_actual_name = button.data("categoryName");
    var id_domain = button.data("categoryId");
    $('#titleModalCategory').text('Renommer le Domaine : ' + domain_actual_name);
    $('#actualCategoryName').val(id_domain);
    $("#newCategoryName").attr("placeholder", domain_actual_name);
    $('#changeCategory').off("click").on("click", function () {
        var value = $("#newCategoryName").val();
        API_REQUEST("/category/" + token + "/" + id_domain, "PUT", { "name": value }).then(function (res) {
            if (res['status']['code'] === 200) {
                button.parents("tr").children()[1].innerText = value;
                button.data("categoryName", value);
                $("#modalAlterCategory").modal("toggle");
                $("#ToastSuccess").children(".toast-body").text("Catégorie modifiée avec succès");
                toastList[1].show();
                $("#newCategoryName").val("");
            }
            else if (res['status']['code'] === 202) {
                $("#ToastWarning").children(".toast-body").text("Cette catégorie existe déjà");
                toastList[2].show();
            }
        }).catch(function (res) {
            console.log(res);
            $("#ToastError").children(".toast-body").text("Erreur lors de la modification");
            toastList[0].show();
        });
    });
});
$("#modalDelete").on("show.bs.modal", function (e) {
    var button = $(e.relatedTarget);
    $(this).find(".modal-title").text("Supprimer catégorie : " + button.data("categoryName"));
    $(this).find(".delete").off("click").on("click", function () {
        deleteCat(button.data("categoryId"), $(this).parents(".modal"), button.parents("tr"));
    });
});
function deleteCat(id, modal, line) {
    API_REQUEST("/category/" + token + "/" + id, "DELETE").then(function () {
        $(line).remove();
        $("#ToastSuccess").children(".toast-body").text("Catégorie supprimer avec succès");
        modal.modal("toggle");
        toastList[1].show();
    }).catch(function (res) {
        console.log(res);
        $("#ToastError").children(".toast-body").text("Erreur lors de la suppression");
        toastList[0].show();
    });
}
$("#addCategory").on("click", function () {
    var name = $("#addCategoryInput").val();
    API_REQUEST("/category/" + token, "POST", { "name": name }).then(function (res) {
        if (res['status']['code'] === 201) {
            var new_line = $($(".cat-row")[0]).clone(true, true);
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
        }
        else if (res['status']['code'] === 202) {
            $("#ToastWarning").children(".toast-body").text("La catégorie existe déjà");
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la création");
        toastList[0].show();
    });
});
// ---------- callModalType  ----------
$("#modalAlterType").on("show.bs.modal", function (e) {
    var button = $(e.relatedTarget);
    $("#titleModalType").textContent = "Modifier le type : " + button.data("typeName");
    $("#actualTypeName").val(button.data("typeId"));
    $("#newTypeName").attr("placeholder", button.data("typeName"));
    $("#selectTypeCat").val(button.data("typeCategoryId")).change();
});
// ---------- callModalSpec  ----------
$("#modalAlterSpec").on("click", function (e) {
    var button = e.relatedTarget;
    var Spec_actual_name = button.getAttribute('data-spec-name');
    var Spec_actual_value = button.getAttribute('data-spec-value');
    var id_spec = button.getAttribute('data-spec-id');
    var modalTitle = document.getElementById('titleModalSpec');
    var modalBodyInput = $('#actualSpecName');
    modalTitle.textContent = 'Alterer la spec: ' + Spec_actual_name;
    modalBodyInput.val(id_spec);
});
function retrieve_cat(params) {
    var page = params.data.offset / 10;
    var url = "/category/" + page;
    if (params.data.order !== undefined && params.data.sort !== undefined) {
        url += "/search/" + params.data.search;
        url += "/order/" + params.data.order;
        url += "/sort/" + params.data.sort;
    }
    else if (params.data.search !== "") {
        url += "/search/" + params.data.search;
    }
    API_REQUEST(url, "GET").then(function (res) {
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
            rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterCategory\" data-category-id=\"" + rows[i]['id'] + "\" data-category-name=\"" + rows[i]['name'] + "\">Modifier</button>";
            rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-category-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-category-name=\"" + rows[i]['name'] + "\">Supprimer</button>";
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
function retrieve_type(params) {
    var page = params.data.offset / 10;
    var url = "/type_cat/" + page;
    if (params.data.order !== undefined && params.data.sort !== undefined) {
        url += "/search/" + params.data.search;
        url += "/order/" + params.data.order;
        url += "/sort/" + params.data.sort;
    }
    else if (params.data.search !== "") {
        url += "/search/" + params.data.search;
    }
    API_REQUEST(url, "GET").then(function (res) {
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
            rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterCategory\" data-category-id=\"" + rows[i]['id'] + "\" data-category-name=\"" + rows[i]['name'] + "\">Modifier</button>";
            rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-category-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-category-name=\"" + rows[i]['name'] + "\">Supprimer</button>";
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
//# sourceMappingURL=manageCat.js.map