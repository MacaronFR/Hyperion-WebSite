declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

// @ts-ignore
function retrieve_invoice(params){
	let url = prepare_url(params, "/invoice/all/" + token + "/")
	API_REQUEST(url, "GET").then( (res) => {
		if(res.status.code === 200) {
			let rows = [];
			let total = res['content'].total;
			let totalNotFiltered = res['content'].totalNotFiltered;
			delete res['content']['total'];
			delete res['content']['totalNotFiltered'];
			for (let i = 0; i < Object.keys(res.content).length; ++i) {
				rows.push(res.content[i])
				rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetailInvoice(this)\">Détail</button>"
			}
			params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
		}else{
			params.error();
		}
	})
}

// @ts-ignore
const iID = $("#Iid");
// @ts-ignore
const iTotal = $("#Itotal");
// @ts-ignore
const iDate = $("#Icreation");
// @ts-ignore
const iPdf = $("#Ipdf");

// @ts-ignore
function seeDetailInvoice(element){
	iID.val($(element).data("invoiceId"));
	iTotal.val($(element).data("invoiceTotal"));
	iDate.val($(element).data("invoiceDate"));
	iPdf.off().on("click", function(){
		window.open("/invoice/" + element.dataset["invoiceId"], "_blank")
	})
}

// @ts-ignore
function retrieve_credit(params){
	let url = prepare_url(params, "/credit/all/" + token + "/")
	API_REQUEST(url, "GET").then( (res) => {
		if(res.status.code === 200) {
			let rows = [];
			let total = res['content'].total;
			let totalNotFiltered = res['content'].totalNotFiltered;
			delete res['content']['total'];
			delete res['content']['totalNotFiltered'];
			for (let i = 0; i < Object.keys(res.content).length; ++i) {
				rows.push(res.content[i])
				rows[i]['detail'] = "<button type=\"button\" class=\"btn btn-primary\" data-invoice-id=\"" + rows[i]['id'] + "\" data-invoice-total=\"" + rows[i]['total'] + "\" data-invoice-date=\"" + rows[i]['creation'] + "\" onclick=\"seeDetailCredit(this)\">Détail</button>"
			}
			params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
		}else{
			params.error();
		}
	})
}

// @ts-ignore
const cID = $("#Cid");
// @ts-ignore
const cTotal = $("#Ctotal");
// @ts-ignore
const cDate = $("#Ccreation");
// @ts-ignore
const cPdf = $("#Cpdf");

function seeDetailCredit(element){
	cID.val($(element).data("invoiceId"));
	cTotal.val($(element).data("invoiceTotal"));
	cDate.val($(element).data("invoiceDate"));
	cPdf.off().on("click", function(){
		window.open("/credit/" + element.dataset["invoiceId"], "_blank")
	})
}