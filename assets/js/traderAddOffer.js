var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (_) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
var maxFile = 3;
var nFile = 1;
var b64File = [];
// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
var sCat = $("#selectCategory");
var sType = $("#selectType");
var sBrand = $("#selectBrand");
var sModel = $("#selectModel");
var sState = $("#selectState");
var emptySpecSelect = "<div class=\"form-group mt-1 mt-lg-4 mx-2 spec-select\">" +
    "<label>Storage</label>" +
    "<select class=\"form-select\">" +
    "<option selected class=\"keep\" disabled value=\"-1\">" + text['select']['choose'] + "</option>" +
    "</select>" +
    "</div>";
var fileTab = "<li class='nav-item'><a class='nav-link' data-bs-toggle='tab' data-bs-target=''>" + text['select']['file'] + "</a></li>";
sCat.on("change", function () {
    sType.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sBrand.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("undefined").attr("disabled", true);
    var url = "/type";
    if (sCat.val() !== "undefined") {
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
            $("#ToastWarning").children(".toast-body").text(text['warning']['type']);
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text(text['error']['type']);
        toastList[0].show();
    });
});
sType.on("change", function () {
    sBrand.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("undefined").attr("disabled", true);
    var url = "/brand";
    if (sType.val() !== "undefined") {
        url = "/type/" + sType.val() + "/brand";
    }
    API_REQUEST(url, "GET").then(function (res) {
        if (res.status.code === 200) {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            sBrand.removeAttr("disabled").find("option:not(.keep)").remove();
            for (var i = 0; i < n; ++i) {
                sBrand.append(new Option(res.content[i].value, res.content[i].value));
            }
            sBrand.val("-2");
        }
        else if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text(text['warning']['brand']);
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text(text['error']['brand']);
        toastList[0].show();
    });
});
sBrand.on("change", function () {
    sModel.val("-2").attr("disabled", true).find("option:not(.keep)").remove();
    sState.val("undefined").attr("disabled", true);
    var url = "/model";
    var type = false;
    if (sBrand.val() !== "undefined") {
        url = "/brand/" + sBrand.val() + "/model";
    }
    if (sType.val() !== "undefined") {
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
            $("#ToastWarning").children(".toast-body").text(text['warning']['model']);
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text(text['error']['model']);
        toastList[0].show();
    });
});
sModel.on("change", function () {
    $("#newOffer").find(".spec-select").remove();
    sState.removeAttr("disabled").val("undefined");
    if (sType.val() !== "undefined" && sBrand.val() !== "undefined" && sModel.val() !== "undefined") {
        API_REQUEST("/type/" + sType.val() + "/brand/" + sBrand.val() + "/model/" + sModel.val() + "/reference", "GET").then(function (res) {
            if (res.status.code === 200) {
                var keys = Object.keys(res.content.spec);
                for (var i = 0; i < keys.length; ++i) {
                    var select = $(emptySpecSelect);
                    select.find("label").text(text['specification']['name'][keys[i]]).attr("data-name", keys[i]);
                    if (Array.isArray(res.content.spec[keys[i]])) {
                        for (var j = 0; j < res.content.spec[keys[i]].length; ++j) {
                            select.find("select").append(new Option(res.content.spec[keys[i]][j], res.content.spec[keys[i]][j]));
                        }
                    }
                    else {
                        select.find("select").append(new Option(res.content.spec[keys[i]], res.content.spec[keys[i]]));
                        select.find("select").val(res.content.spec[keys[i]]);
                    }
                    $("#newOffer").append(select);
                }
            }
            else if (res.status.code === 204) {
                $("#ToastWarning").children(".toast-body").text(text['warning']['spec']);
                toastList[2].show();
            }
        }).catch(function (res) {
            console.log(res);
            $("#ToastError").children(".toast-body").text(text['error']['spec']);
            toastList[0].show();
        });
    }
});
$("#newOffer").on("submit", function (e) {
    e.preventDefault();
    var specOK = true;
    $(".spec-select").each(function () { if ($(this).find("select").val() === null)
        specOK = false; });
    if (sCat.val() === null || sType.val() === null || sBrand.val() === null || sModel.val() === null || sState.val() === null || !specOK) {
        $("#ToastWarning").children(".toast-body").text(text['warning']['not_full']);
        toastList[2].show();
        return;
    }
    if (sCat.val() === "undefined" || sType.val() === "undefined" || sBrand.val() === "undefined" || sModel.val() === "undefined" || sState.val() === "undefined") {
        $("#modalUndefined").modal("show");
        return;
    }
    sendOffer();
});
$("#sendUndefined").on("click", sendOffer);
function sendOffer() {
    return __awaiter(this, void 0, void 0, function () {
        var specOK, spec, post;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    specOK = true;
                    spec = {};
                    $(".spec-select").each(function () {
                        if ($(this).find("select").val() === null) {
                            specOK = false;
                            return false;
                        }
                        spec[$(this).find("label").data("name")] = $(this).find("select").val();
                    });
                    if (!(sCat.val() !== null && sType.val() !== null && sBrand.val() !== null && sModel.val() !== null && sState.val() !== null && specOK)) return [3 /*break*/, 2];
                    post = {
                        'cat': sCat.val(),
                        'type': sType.val(),
                        'brand': sBrand.val(),
                        'model': sModel.val(),
                        'state': sState.val(),
                        'spec': spec,
                        'files': []
                    };
                    return [4 /*yield*/, readFile()];
                case 1:
                    _a.sent();
                    post.files = b64File;
                    API_REQUEST("/offer/" + token, "POST", post).then(function (res) {
                        $("#ToastSuccess").children(".toast-body").text(text['success']['created']);
                        toastList[1].show();
                        console.log("Je redirige vers /trader/offer/{token}/" + res.content.offer);
                        //TODO redirection
                    }).catch(function (res) {
                        console.log(res);
                        $("#ToastError").children(".toast-body").text(text['error']);
                        toastList[0].show();
                    });
                    _a.label = 2;
                case 2: return [2 /*return*/];
            }
        });
    });
}
$("#newFile").on("click", function () {
    if (nFile < maxFile) {
        ++nFile;
        var tmp = $(fileTab);
        tmp.find("a").attr("data-bs-target", "#f" + nFile);
        $(this).before(tmp);
    }
    if (nFile >= maxFile) {
        $(this).find("a").addClass("disabled");
    }
});
function readFile() {
    return new Promise(function (resolve) {
        b64File = [];
        $(".offer-file").each(function (i) {
            var _this = this;
            if (this.files.length === 1) {
                var r = new FileReader();
                r.onload = function (ev) {
                    b64File.push({
                        'content': Base64.encode(ev.target.result),
                        'filename': _this.files[0].name,
                        'type': _this.files[0].type
                    });
                    if (i === maxFile - 1) {
                        resolve();
                    }
                };
                r.readAsText(this.files[0]);
            }
            else if (i === maxFile - 1) {
                resolve();
            }
        });
    });
}
//# sourceMappingURL=traderAddOffer.js.map