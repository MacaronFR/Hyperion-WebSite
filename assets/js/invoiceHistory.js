// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_invoice(params) {
    var url = prepare_url(params, "/invoice/me/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetail(this)\">Détail</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
        }
        else {
            params.error();
        }
    });
}
var iID = $("#id");
var iTotal = $("#total");
var iDate = $("#creation");
var iPdf = $("#pdf");
function seeDetail(element) {
    iID.val($(element).data("invoiceId"));
    iTotal.val($(element).data("invoiceTotal"));
    iDate.val($(element).data("invoiceDate"));
    iPdf.off().on("click", function () {
        window.open("/invoice/" + element.dataset["invoiceId"], "_blank");
    });
}
//# sourceMappingURL=invoiceHistory.js.map