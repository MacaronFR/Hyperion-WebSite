$(".product-picture").each(function () {
    var _this = this;
    API_REQUEST("/product/picture/" + $(this).data("productId") + "/1", "GET").then(function (res) {
        if (res.status.code === 200) {
            _this.src = "data:" + res.content[0].type + ";base64," + res.content[0].content;
        }
        else if (res.status.code === 204) {
            _this.src = "/assets/images/Hyperion-yellow-transparent.png";
        }
    });
});
//# sourceMappingURL=shop.js.map