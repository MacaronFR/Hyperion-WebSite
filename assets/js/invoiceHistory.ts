declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

function retrieve_invoice(params){
	let url = prepare_url(params, "/invoice/me/" + token + "/")
	API_REQUEST(url, "GET").then( (res) => {
		if(res.status.code === 200) {
			let rows = [];
			let total = res['content'].total;
			let totalNotFiltered = res['content'].totalNotFiltered;
			delete res['content']['total'];
			delete res['content']['totalNotFiltered'];
			for (let i = 0; i < Object.keys(res.content).length; ++i) {
				rows.push(res.content[i])
				rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetail(this)\">Détail</button>"
			}
			params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
		}else{
			params.error();
		}
	})
}

const iID = $("#id");
const iTotal = $("#total");
const iDate = $("#creation");
const iPdf = $("#pdf");

function seeDetail(element){
	iID.val($(element).data("invoiceId"));
	iTotal.val($(element).data("invoiceTotal"));
	iDate.val($(element).data("invoiceDate"));
	iPdf.off().on("click", function(){
		window.open("/invoice/" + element.dataset["invoiceId"], "_blank")
	})
}
