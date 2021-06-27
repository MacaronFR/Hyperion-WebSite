// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_history(params) {
    var url = "/offer/terminated/";
    url += token + "/";
    url += params.data.offset / 10;
    API_REQUEST(url, "GET").then(function (res) {
        console.log(res);
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                var color = (res.content[i]['status'] == 6) ? "primary" : "secondary";
                var buttonText = (res.content[i]['status'] == 6) ? "ok" : "denied";
                rows[i]['status'] = text['status'][rows[i]['status']];
                rows[i]['state'] = text['state'][rows[i]['state']];
                rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-" + color + "\" data-offer-id=\"" + rows[i]['id'] + "\" data-offer-type=\"" + rows[i]['type'] + "\" data-offer-brand=\"" + rows[i]['brand'] + "\" data-offer-model=\"" + rows[i]['model'] + "\" data-offer-state=\"" + rows[i]['state'] + "\" data-offer=\"" + rows[i]['offer'] + "\" data-offer-counter=\"" + rows[i]['counter_offer'] + "\" onclick=\"seeDetail(this)\">" + text[buttonText] + "</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Vous n'avez pas d'offre ");
            toastList[2].show();
            params.error();
        }
    });
}
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