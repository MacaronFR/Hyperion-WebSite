// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
// @ts-ignore
function retrieve_invoice(params) {
    var url = prepare_url(params, "/invoice/all/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetailInvoice(this)\">Détail</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
        }
        else {
            params.error();
        }
    });
}
// @ts-ignore
var iID = $("#Iid");
// @ts-ignore
var iTotal = $("#Itotal");
// @ts-ignore
var iDate = $("#Icreation");
// @ts-ignore
var iPdf = $("#Ipdf");
// @ts-ignore
function seeDetailInvoice(element) {
    iID.val($(element).data("invoiceId"));
    iTotal.val($(element).data("invoiceTotal"));
    iDate.val($(element).data("invoiceDate"));
    iPdf.off().on("click", function () {
        window.open("/invoice/" + element.dataset["invoiceId"], "_blank");
    });
}
// @ts-ignore
function retrieve_credit(params) {
    var url = prepare_url(params, "/credit/all/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetailCredit(this)\">Détail</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
        }
        else {
            params.error();
        }
    });
}
// @ts-ignore
var cID = $("#Cid");
// @ts-ignore
var cTotal = $("#Ctotal");
// @ts-ignore
var cDate = $("#Ccreation");
// @ts-ignore
var cPdf = $("#Cpdf");
function seeDetailCredit(element) {
    cID.val($(element).data("invoiceId"));
    cTotal.val($(element).data("invoiceTotal"));
    cDate.val($(element).data("invoiceDate"));
    cPdf.off().on("click", function () {
        window.open("/credit/" + element.dataset["invoiceId"], "_blank");
    });
}
//# sourceMappingURL=adminInvoice.js.map