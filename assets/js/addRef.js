// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
var typeSelect = $("#typeSelect");
var catSelect = $("#catSelect");
var brandSelect = $("#brandSelect");
var modelInput = $("#modelInput");
var newSpec = $("#newSpec");
var specDiv = $("#specDiv");
var specForm = $("#specForm");
var buyInput = $("#buyInput");
var sellInput = $("#sellInput");
var nSpec = 0;
var emptySpec = "<div class=\"row col-11 col-lg-10 col-xl-8 border border-2 border-warning rounded-3 py-4 px-4 align-self-center divs_manage mb-4 spec\">" +
    "<div class='container mb-3'>" +
    "<div class='d-flex justify-content-between'>" +
    "<h3>Spécification</h3>" +
    "<button class='btn btn-outline-danger fs-3 del-spec' type='button'><i class=\"bi bi-x\"></i></button>" +
    "</div>" +
    "<div class='row mt-4'>" +
    "<div class='input-group mb-3 px-3'>" +
    "<span class='input-group-text'>Nom</span>" +
    "<input type='text' placeholder='Nom' class='spec-name form-control' name='name'>" +
    "</div>" +
    "<div class='input-group mb-3 px-3'>" +
    "<span class='input-group-text'>Valeur</span>" +
    "<input type='text' placeholder='Valeur' class='spec-value form-control' name='value'>" +
    "</div>" +
    "<div class='input-group px-3'>" +
    "<button type='button' class='btn btn-outline-secondary w-100 add-spec-value'>+</button>" +
    "</div>" +
    "</div>" +
    "</div>";
var emptySpecValue = "<div class='input-group mb-3 px-3'>" +
    "<span class='input-group-text'>Valeur</span>" +
    "<input type='text' placeholder='Valeur' class='spec-value form-control'>" +
    "<button class='btn btn-outline-danger delete-val' tabindex='-1' type='button'><i class=\"bi bi-trash\"></i></button>" +
    "</div>";
catSelect.on("change", function () {
    API_REQUEST("/category/" + catSelect.val() + "/type", "GET").then(function (res) {
        brandSelect.val("-1").attr("disabled", true).find("option:not([disabled])").remove();
        modelInput.attr("disabled", true);
        if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Aucun type dans cette catégories");
            toastList[2].show();
        }
        else {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            typeSelect.val("-1").removeAttr("disabled").find("option:not([disabled])").remove();
            for (var i = 0; i < n; ++i) {
                typeSelect.append(new Option(res.content[i].type, res.content[i].id));
            }
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la récupération des types");
        toastList[0].show();
    });
});
typeSelect.on("change", function () {
    API_REQUEST("/type/" + typeSelect.val() + "/brand", "GET").then(function (res) {
        modelInput.attr("disabled", true);
        if (res.status.code === 204) {
            $("#ToastWarning").children(".toast-body").text("Aucune marque de ce type");
            toastList[2].show();
        }
        else {
            var n = res.content.total;
            delete res.content.total;
            delete res.content.totalNotFiltered;
            brandSelect.removeAttr("disabled").find("option:not([disabled])").remove();
            for (var i = 0; i < n; ++i) {
                brandSelect.append(new Option(res.content[i].value, res.content[i].id));
            }
            brandSelect.val("-1");
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la récupération des marques");
        toastList[0].show();
    });
});
brandSelect.on("change", function () {
    modelInput.removeAttr("disabled");
});
newSpec.on("click", function () {
    nSpec++;
    specDiv.append(emptySpec);
    var spec = $(".spec.divs_manage").last();
    spec.attr("id", "spec" + nSpec);
    spec.find(".spec-name").attr("name", "name" + nSpec);
    spec.find(".spec-value").attr("name", "value" + nSpec + "[]");
    spec.find(".add-spec-value").attr("data-n", nSpec);
    newSpecListener();
});
specForm.on("submit", function () {
    var type = specForm.find("[name=type]").val();
    var brand = parseInt(specForm.find("[name=brand]").val());
    var model = specForm.find("[name=model]").val();
    var specs = prepareSpec();
    var buying = parseFloat(buyInput.val());
    var selling = parseFloat(sellInput.val());
    var fields = {
        "type": type,
        "brand": brand,
        "model": model,
        "specs": specs,
        "buying": buying,
        "selling": selling,
    };
    if (type === null || brand === null || model === "") {
        $("#ToastWarning").children(".toast-body").text("Champs manquant");
        toastList[2].show();
        return false;
    }
    API_REQUEST("/reference/" + token, "POST", fields).then(function (res) {
        if (res.status.code === 201) {
            $("#ToastSuccess").children(".toast-body").text("Référence Créer");
            toastList[1].show();
            reset();
        }
        else if (res.status.code === 209) {
            $("#ToastWarning").children(".toast-body").text("La référence existe");
            toastList[2].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de la création de la référence");
        toastList[0].show();
    });
    return false;
});
function prepareSpec() {
    var spec = [];
    var _loop_1 = function (i) {
        var val = [];
        $("[name='value" + i + "[]']").each(function () {
            if ($(this).val() !== "") {
                val.push($(this).val());
            }
        });
        if ($("[name=name" + i + "]").val() !== "") {
            spec.push({ "name": $("[name=name" + i + "]").val(), "value": val });
        }
    };
    for (var i = 1; i <= nSpec; ++i) {
        _loop_1(i);
    }
    return spec;
}
function newSpecListener() {
    $(".add-spec-value").off("click").on("click", function () {
        $(emptySpecValue).insertBefore($(this).parent()).find("input").attr("name", "value" + $(this).data("n") + "[]");
        $(".delete-val").off("click").on("click", function () {
            $(this).parents(".input-group").remove();
        });
    });
    $(".del-spec").on("click", function () {
        console.log($(this).parents(".divs_manage").remove());
    });
}
$("#reset").on("click", function () {
    reset();
});
function reset() {
    typeSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
    catSelect.val(-1);
    brandSelect.val(-1).attr("disabled", true).find("option:not([disabled])").remove();
    modelInput.val("").attr("disabled", true);
    buyInput.val("");
    sellInput.val("");
    $(".divs_manage.spec").remove();
}
//# sourceMappingURL=addRef.js.map