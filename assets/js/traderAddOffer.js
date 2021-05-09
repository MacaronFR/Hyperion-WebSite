// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
var sCat = $("#selectCategory");
var sType = $("#selectType");
var sMark = $("#selectMark");
var sModel = $("#selectModel");
var sState = $("#selectState");
var emptySpecSelect = "<div class=\"form-group mt-1 mt-lg-4 mx-2\">" +
    "<label>Storage</label>" +
    "<select class=\"form-select\">" +
    "<option selected class=\"keep\" disabled value=\"-1\">Vueillez selectionnez une valeur</option>" +
    "</select>" +
    "</div>";
sCat.on("change", function () {
    sType.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sMark.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("-1").attr("disabled", true);
    var url = "/type";
    if (sCat.val() !== "-1") {
        url = "/category/" + sCat.val() + "/type";
    }
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            sType.removeAttr("disabled").find("option:not(.keep)").remove();
            for (var i = 0; i < n; ++i) {
                sType.append(new Option(res.content[i].type, res.content[i].id));
            }
            sType.val("-2");
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Aucun type dans cette catégorie");
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la récupération des types");
        toastList[0].show();
    });
});
sType.on("change", function () {
    sMark.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("-1").attr("disabled", true);
    var url = "/mark";
    if (sType.val() !== "-1") {
        url = "/type/" + sType.val() + "/mark";
    }
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            sMark.removeAttr("disabled").find("option:not(.keep)").remove();
            for (var i = 0; i < n; ++i) {
                sMark.append(new Option(res.content[i].value, res.content[i].value));
            }
            sMark.val("-2");
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Aucune marque de ce type");
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la récupération des marques");
        toastList[0].show();
    });
});
sMark.on("change", function () {
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("-1").attr("disabled", true);
    var url = "/model";
    var type = false;
    if (sMark.val() !== "-1") {
        url = "/mark/" + sMark.val() + "/model";
    }
    if (sType.val() !== "-1") {
        type = true;
        url = "/type/" + sType.val() + url;
    }
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            sModel.removeAttr("disabled").find("option:not(.keep)").remove();
            if (type) {
                for (var i = 0; i < n; ++i) {
                    sModel.append(new Option(res.content[i].value, res.content[i].value));
                }
            }
            else {
                var keys = Object.keys(res.content);
                for (var i = 0; i < keys.length; ++i) {
                    sModel.append($(new Option(keys[i])).attr("disabled", true));
                    for (var j = 0; j < res.content[keys[i]].length; ++j) {
                        sModel.append(new Option(res.content[keys[i]][j], res.content[keys[i]][j]));
                    }
                }
            }
            sModel.val("-2");
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Aucun model de cette marque pour ce type");
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la récupération des modèles");
        toastList[0].show();
    });
});
sModel.on("change", function () {
    sState.removeAttr("disabled").val("-1");
    if (sType.val() !== "-1" && sMark !== "-1" && sModel !== -1) {
        API_REQUEST("/type/" + sType.val() + "/mark/" + sMark.val() + "/model/" + sModel.val() + "/reference", "GET").then(function (res) {
            console.log(res, Object.keys(res.content.spec));
            var keys = Object.keys(res.content.spec);
            for (var i = 0; i < keys.length; ++i) {
                var select = $(emptySpecSelect);
                select.find("label").text(keys[i]);
                // if(res.content.spec[keys[i]])
                $("#newOffer").append(select);
            }
        }).catch(function (res) {
            console.log(res);
        });
    }
});
//# sourceMappingURL=traderAddOffer.js.map