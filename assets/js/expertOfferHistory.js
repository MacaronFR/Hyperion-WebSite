// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_offer_history(params) {
    var url = prepare_url(params, "/expert/offer/history/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
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
//# sourceMappingURL=expertOfferHistory.js.map