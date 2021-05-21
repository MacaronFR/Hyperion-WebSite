// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_prod(params) {
    var url = prepare_url(params, "/product/");
    API_REQUEST(url, "GET").then(function (res) {
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
            rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterCategory\" data-category-id=\"" + rows[i]['id'] + "\" data-category-name=\"" + rows[i]['name'] + "\">Modifier</button>";
            rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-prod-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\" data-prod-brand=\"" + rows[i]['brand'] + "\" data-prod-model=\"" + rows[i]['model'] + "\">Supprimer</button>";
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
$("#modalDelete").on("show.bs.modal", function (e) {
    var button = $(e.relatedTarget);
    var modal = $(this);
    $(modal).find(".modal-title").text("Supprimer produits : " + button.data("prodBrand") + " - " + button.data("prodModel"));
    $(modal).find(".delete").off("click").on("click", function () {
        API_REQUEST("/product/" + token + "/" + button.data("prodId"), "DELETE").then(function (res) {
            if (res.status.code === 204) {
                button.parents("table").bootstrapTable("refresh");
                $("#ToastSuccess").children(".toast-body").text("Produit supprimer avec succès");
                modal.modal("toggle");
                toastList[1].show();
            }
        }).catch(function (res) {
            if (res.status.code === 404) {
                $("#ToastWarning").children(".toast-body").text("Le produits n'existe pas");
                toastList[2].show();
            }
            else {
                $("#ToastError").children(".toast-body").text("Erreur lors de la suppression");
                toastList[0].show();
            }
        });
    });
});
//# sourceMappingURL=manageProduct.js.map