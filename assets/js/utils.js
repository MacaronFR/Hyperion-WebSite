function API_REQUEST(path, method, param) {
    if (param === void 0) { param = []; }
    var url = "https://api.hyperion.dev.macaron-dev.fr" + path;
    return new Promise(function (resolve, reject) {
        var xhr = new XMLHttpRequest();
        xhr.open(method, url, true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === xhr.DONE) {
                try {
                    var res = JSON.parse(xhr.responseText);
                    resolve(res);
                }
                catch (e) {
                    reject(e);
                }
            }
        };
        if (method === "POST" || method === "PUT") {
            xhr.send(JSON.stringify(param));
        }
        else {
            xhr.send();
        }
    });
}
//# sourceMappingURL=utils.js.map