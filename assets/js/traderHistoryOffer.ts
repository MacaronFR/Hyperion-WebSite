declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE)
})

function retrieve_history(params){
    let url = prepare_url(params, "/offer/history/" + token + "/");
    API_REQUEST(url, "GET").then((res) => {
        console.log(res);
        let rows = [];
        let total = res['content'].total;
        let totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for(let i = 0; i < Object.keys(res.content).length; ++i){
            rows.push(res.content[i]);
        }
        params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
    })
}

const button = "<div class=\"d-flex justify-content-center mt-3 button-detail\">" +
    "<button type=\"button\" class=\"btn btn-success me-1 col-6 accept\">Accepter !</button>" +
    "<button type=\"button\" class=\"btn btn-danger ms-1 col-6 refuse\">Refuser !</button>" +
    "</div>"

function seeDetail(element) {
    const detail = $("#divtraderhistoryinfo");
    detail.find(".button-detail").remove();
    detail.find("[name=type]").val(element.dataset['offerType'])
    detail.find("[name=brand]").val(element.dataset['offerBrand'])
    detail.find("[name=model]").val(element.dataset['offerModel'])
    detail.find("[name=state]").val(element.dataset['offerState'])
    detail.find("[name=offer]").val(element.dataset['offer'] + " €")
}