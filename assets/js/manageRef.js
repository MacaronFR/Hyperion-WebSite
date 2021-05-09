// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_ref(params) {
    var url = prepare_url(params, "/reference/detail/");
    API_REQUEST(url, "GET").then(function (res) {
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
            rows[i]['modif'] = "<button type=\"button\" class=\"btn btn-primary\" data-bs-toggle=\"modal\" data-bs-target=\"#modalAlterRef\" data-ref-id=\"" + rows[i]['id'] + "\">Modifier</button>";
            rows[i]['suppr'] = "<button type=\"button\" class=\"btn btn-danger\" data-ref-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\">Supprimer</button>";
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
$("#modalDelete").on("show.bs.modal", function (e) {
    var button = $(e.relatedTarget);
    var modal = $(this);
    modal.find(".modal-title").text("Supprimer Référence : " + button.data("refId"));
    modal.find(".delete").off("click").on("click", function () {
        API_REQUEST("/reference/" + token + "/" + button.data("refId"), "DELETE").then(function (res) {
            if (res.status.code === 204) {
                button.parents("table").bootstrapTable("refresh");
                $("#ToastSuccess").children(".toast-body").text("Référence supprimer avec succès");
                modal.modal("toggle");
                toastList[1].show();
            }
        }).catch(function (res) {
            if (res === 404) {
                $("#ToastWarning").children(".toast-body").text("La référence n'existe plus");
                toastList[2].show();
            }
            else {
                $("#ToastError").children(".toast-body").text("Erreur lors de la suppression");
                toastList[0].show();
            }
        });
    });
});
//# sourceMappingURL=manageRef.js.map