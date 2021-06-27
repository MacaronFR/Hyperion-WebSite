declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

function retrieve_offer(params){
	let url = prepare_url(params, "/expert/offer/" + token + "/");
	API_REQUEST(url, "GET").then((res) => {
		if(res.status.code === 200) {
			let rows = [];
			let total = res['content'].total;
			let totalNotFiltered = res['content'].totalNotFiltered;
			delete res['content']['total'];
			delete res['content']['totalNotFiltered'];
			for (let i = 0; i < Object.keys(res.content).length; ++i) {
				rows.push(res.content[i]);
				rows[i]['select'] = "<button type=\"button\" class=\"btn btn-success select-offer\" data-offer-id=\"" + rows[i]['id'] + "\">Prendre en Charge</button>"
			}
			params.success({"total": total, "totalNotFiltered": totalNotFiltered, "rows": rows});
			$(".select-offer").on("click", selectOffer);
		}else{
			params.error()
		}
	})
}

function selectOffer(){
	API_REQUEST("/expert/offer/" + token + "/" + $(this).data("offerId"), "POST").then( (res) => {
		if(res.status.code === 200){
			$("#ToastSuccess").children(".toast-body").text("offre accepté");
			toastList[1].show();
			$(this).parents("table").bootstrapTable("refresh");
		}else{
			$("#ToastError").children(".toast-body").text("error")
			toastList[0].show()
		}
	})
}