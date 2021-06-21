declare var token: any;
declare var $: any;
declare var bootstrap: any;

$(".product-picture").each(function () {
	API_REQUEST("/product/picture/" + $(this).data("productId") + "/1", "GET").then( (res) => {
		if(res.status.code === 200){
			this.src = "data:" + res.content[0].type + ";base64," + res.content[0].content
		}else if(res.status.code === 204){
			this.src = "/assets/images/Hyperion-yellow-transparent.png"
		}
	})
})