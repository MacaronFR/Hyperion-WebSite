// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_pending(params) {
    var url = "/offer/pending/";
    url += token + "/";
    url += params.data.offset / 10;
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var rows = [];
            var total = res['content'].total;
            var totalNotFiltered = res['content'].totalNotFiltered;
            delete res['content']['total'];
            delete res['content']['totalNotFiltered'];
            for (var i = 0; i < Object.keys(res.content).length; ++i) {
                rows.push(res.content[i]);
                var color = (res.content[i]['status'] == 4) ? "primary" : "secondary";
                var buttonText = res.content[i]['status'] == 4 ? "counter" : "detail";
                rows[i]['status'] = text['status'][rows[i]['status']];
                rows[i]['state'] = text['state'][rows[i]['state']];
                rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-" + color + "\" data-offer-id=\"" + rows[i]['id'] + "\" data-offer-type=\"" + rows[i]['type'] + "\" data-offer-brand=\"" + rows[i]['brand'] + "\" data-offer-model=\"" + rows[i]['model'] + "\" data-offer-state=\"" + rows[i]['state'] + "\" data-offer=\"" + rows[i]['offer'] + "\" data-offer-counter=\"" + rows[i]['counter_offer'] + "\" onclick=\"seeDetail(this)\">" + text[buttonText] + "</button>";
            }
            params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Vous n'avez pas d'offre en attente");
            toastList[2].show();
            params.error();
        }
    });
}
var button = "<div class=\"d-flex justify-content-center mt-3 button-detail\">" +
    "<button type=\"button\" class=\"btn btn-success me-1 col-6 accept\">Accepter !</button>" +
    "<button type=\"button\" class=\"btn btn-danger ms-1 col-6 refuse\">Refuser !</button>" +
    "</div>";
function seeDetail(element) {
    var detail = $("#divtraderpendinginfo");
    detail.find(".button-detail").remove();
    detail.find("[name=type]").val(element.dataset['offerType']);
    detail.find("[name=brand]").val(element.dataset['offerBrand']);
    detail.find("[name=model]").val(element.dataset['offerModel']);
    detail.find("[name=state]").val(element.dataset['offerState']);
    detail.find("[name=offer]").val(element.dataset['offer'] + " €");
    if (element.dataset['offerCounter'] === "null") {
        detail.find("[name=counter]").val("").attr("disabled", true);
    }
    else {
        detail.find("[name=counter]").val(element.dataset['offerCounter'] + " €").removeAttr("disabled");
        detail.append(button);
        detail.find(".accept").off("click").on("click", function () {
            API_REQUEST("/offer/counter/accept/" + token + "/" + element.dataset['offerId'], "PUT").then(function (res) {
                if (res.status.code === 200) {
                    $(".table").bootstrapTable("refresh");
                    $("#ToastSuccess").children(".toast-body").text("Offre Acceptée");
                    toastList[1].show();
                }
                else {
                    $("#ToastWarning").children(".toast-body").text("Erreur");
                    toastList[1].show();
                }
            }).catch(function () {
                $("#ToastError").children(".toast-body").text("Erreur");
                toastList[0].show();
            });
        });
        detail.find(".refuse").off("click").on("click", function () {
            API_REQUEST("/offer/counter/refuse/" + token + "/" + element.dataset['offerId'], "PUT").then(function (res) {
                if (res.status.code === 200) {
                    $(".table").bootstrapTable("refresh");
                    $("#ToastWarning").children(".toast-body").text("Offre Refusée");
                    toastList[2].show();
                }
                else {
                    $("#ToastWarning").children(".toast-body").text("Erreur");
                    toastList[1].show();
                }
            }).catch(function () {
                $("#ToastError").children(".toast-body").text("Erreur");
                toastList[0].show();
            });
        });
    }
}
//# sourceMappingURL=pendingOffer.js.map