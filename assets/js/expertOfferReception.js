// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_offer(params) {
    var url = prepare_url(params, "/expert/offer/reception/all/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                rows[i]['select'] = "<button type=\"button\" class=\"btn btn-success select-offer\" data-offer-id=\"" + rows[i]['id'] + "\">Reception</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
            $(".select-offer").on("click", selectOffer);
        }
        else {
            params.error();
        }
    });
}
function selectOffer() {
    var _this = this;
    API_REQUEST("/expert/offer/reception/" + token + "/" + $(this).data("offerId"), "PUT").then(function (res) {
        if (res.status.code === 200) {
            $("#ToastSuccess").children(".toast-body").text("offre accepté");
            toastList[1].show();
            $(_this).parents("table").bootstrapTable("refresh");
        }
        else {
            $("#ToastError").children(".toast-body").text("error");
            toastList[0].show();
        }
    });
}
//# sourceMappingURL=expertOfferReception.js.map