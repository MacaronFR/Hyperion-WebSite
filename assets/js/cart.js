// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
$(".productImage").each(function () {
    var _this = this;
    API_REQUEST("/product/picture/" + $(this).data("prodId") + "/1", "GET").then(function (res) {
        _this.src = "data:" + res.content[0].type + ";base64," + res.content[0].content;
    });
});
$(".del-cart-prod").on("click", function () {
    API_REQUEST("/cart/product/" + token + "/" + $(this).data("prodId"), "DELETE").then(function (res) {
        if (res.status.code === 204) {
            $("#ToastSuccess").children(".toast-body").text("OK");
            toastList[1].show();
            setTimeout(function () { window.location.reload(); }, 2700);
        }
    });
});
//# sourceMappingURL=cart.js.map