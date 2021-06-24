declare var token: any;
declare var $: any;
declare var bootstrap: any;

// @ts-ignore
let toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
let toastList = toastEL.map(function (toastE) {
	return new bootstrap.Toast(toastE)
})

$(".productImage").each(function (){
	API_REQUEST("/product/picture/" + $(this).data("prodId") + "/1", "GET").then( (res) => {
		this.src = "data:" + res.content[0].type + ";base64," + res.content[0].content
	})
})

$(".del-cart-prod").on("click", function(){
	API_REQUEST("/cart/product/" + token + "/" + $(this).data("prodId"), "DELETE").then( (res) => {
		if(res.status.code === 204){
			$("#ToastSuccess").children(".toast-body").text("OK")
			toastList[1].show()
			setTimeout(() => {window.location.reload()}, 2700);
		}
	})
})