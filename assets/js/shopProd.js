// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
API_REQUEST("/product/picture/" + id, "GET").then(function (res) {
    if (res.status.code === 200) {
        for (var i = 3; i > res.content.length; --i) {
            $("#img" + i).remove();
            $("#indicator" + i).remove();
        }
        for (var i = 1; i <= res.content.length; ++i) {
            document.querySelector("#img" + i + " img").src = "data:image/png;base64," + res.content[i - 1].content;
        }
    }
    else if (res.status.code === 204) { }
});
$("#addToCart").on("click", function () {
    if (token === "") {
        $("#ToastWarning").children(".toast-body").text(text['warning']['not_connected']);
        toastList[2].show();
    }
    else {
        API_REQUEST("/cart/product/" + token, "POST", { 'product': id }).then(function (res) {
            if (res.status.code === 200) {
                $("#ToastSuccess").children(".toast-body").text(text['success']['add']);
                toastList[1].show();
            }
        }).catch(function (res) {
            if (res === 400) {
                $("#ToastWarning").children(".toast-body").text(text['warning']['in_cart']);
                toastList[2].show();
            }
            else if (res === 404) {
                $("#ToastWarning").children(".toast-body").text(text['warning']['not_available']);
                toastList[2].show();
            }
            else if (res === 500) {
                $("#ToastError").children(".toast-body").text(text['error']['server']);
                toastList[0].show();
            }
        });
    }
});
//# sourceMappingURL=shopProd.js.map