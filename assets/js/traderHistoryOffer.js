// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_history(params) {
    var url = prepare_url(params, "/offer/history/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        console.log(res);
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
var button_history = "<div class=\"d-flex justify-content-center mt-3 button-detail\">" +
    "<button type=\"button\" class=\"btn btn-success me-1 col-6 accept\">Accepter</button>" +
    "<button type=\"button\" class=\"btn btn-danger ms-1 col-6 refuse\">Refuser</button>" +
    "</div>";
function seeDetail(element) {
    var detail = $("#divtraderhistoryinfo");
    detail.find(".button-detail").remove();
    detail.find("[name=type]").val(element.dataset['offerType']);
    detail.find("[name=brand]").val(element.dataset['offerBrand']);
    detail.find("[name=model]").val(element.dataset['offerModel']);
    detail.find("[name=state]").val(element.dataset['offerState']);
    detail.find("[name=offer]").val(element.dataset['offer'] + " €");
}
//# sourceMappingURL=traderHistoryOffer.js.map