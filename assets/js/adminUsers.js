// @ts-ignore
var toastEL = [].slice.call(document.querySelectorAll(".toast"));
// @ts-ignore
var toastList = toastEL.map(function (toastE) {
    return new bootstrap.Toast(toastE);
});
function retrieve_users(params) {
    var url = prepare_url(params, "/users/" + token + "/");
    API_REQUEST(url, "GET").then(function (res) {
        var rows = [];
        var total = res['content'].total;
        var totalNotFiltered = res['content'].totalNotFiltered;
        delete res['content']['total'];
        delete res['content']['totalNotFiltered'];
        for (var i = 0; i < Object.keys(res.content).length; ++i) {
            rows.push(res.content[i]);
            rows[i]['type'] = level[rows[i]['type']];
            rows[i]['change'] = "<button type=\"button\" class=\"btn btn-primary\" data-user-id=\"" + rows[i]['id'] + "\" onclick=\"changeUser(this)\">Modifier</button>";
            rows[i]['delete'] = "<button type=\"button\" class=\"btn btn-danger\" data-user-id=\"" + rows[i]['id'] + "\" data-bs-toggle=\"modal\" data-bs-target=\"#modalDelete\">Supprimer</button>";
        }
        params.success({ "total": total, "totalNotFiltered": totalNotFiltered, "rows": rows });
    });
}
var uName = $("#name");
var uFName = $("#fname");
var uMail = $("#mail");
var uAddress = $("#address");
var uCity = $("#city");
var uZip = $("#zip");
var uRegion = $("#region");
var uCountry = $("#country");
var uAcCreation = $("#ac_creation");
var uLLogin = $("#l_login");
var uType = $("#level");
var save = $("#save");
function changeUser(button) {
    var user_id = button.dataset['userId'];
    API_REQUEST("/profile/" + token + "/" + user_id, "GET").then(function (res) {
        if (res.status.code === 200) {
            uName.val(res.content.name).removeAttr("disabled");
            uFName.val(res.content.fname).removeAttr("disabled");
            uMail.val(res.content.mail).removeAttr("disabled");
            if (res.content.addr !== null) {
                uAddress.val(res.content.addr.city).removeAttr("disabled");
                uCity.val(res.content.addr.city).removeAttr("disabled");
                uZip.val(res.content.addr.zip).removeAttr("disabled");
                uRegion.val(res.content.addr.region).removeAttr("disabled");
                uCountry.val(res.content.addr.country).removeAttr("disabled");
            }
            else {
                uAddress.val("").removeAttr("disabled");
                uCity.val("").removeAttr("disabled");
                uZip.val("").removeAttr("disabled");
                uRegion.val("").removeAttr("disabled");
                uCountry.val("").removeAttr("disabled");
            }
            uAcCreation.val(res.content.ac_creation).removeAttr("disabled");
            uLLogin.val(res.content.llog).removeAttr("disabled");
            uType.val(res.content.type).removeAttr("disabled");
            save.data("userId", res.content.id);
        }
    });
}
save.on("click", function () {
    var userNewInfo = {
        "name": uName.val(),
        "fname": uFName.val(),
        'mail': uMail.val(),
        "type": uType.val(),
        'addr': {
            'address': uAddress.val(),
            'city': uCity.val(),
            'zip': uZip.val(),
            'region': uRegion.val(),
            'country': uCountry.val()
        }
    };
    API_REQUEST("/profile/" + token + "/" + save.data("userId"), "PUT", userNewInfo).then(function (res) {
        if (res.status.code === 200) {
            $("#ToastSuccess").children(".toast-body").text("Modifications enregistrées");
            toastList[1].show();
        }
        else {
            $("#ToastError").children(".toast-body").text("Erreur lors de l'enregistrement des modifications");
            toastList[0].show();
        }
    }).catch(function () {
        $("#ToastError").children(".toast-body").text("Erreur lors de l'enregistrement des modifications");
        toastList[0].show();
    });
});
$("#modalDelete").on("show.bs.modal", function (e) {
    var button = $(e.relatedTarget);
    var modal = $(this);
    modal.find(".modal-title").text("Supprimer Utilisateur " + button.data("userId"));
    modal.find(".delete").off("click").on("click", function () {
        API_REQUEST("/profile/" + token + "/" + button.data("userId"), "DELETE").then(function (res) {
            if (res.status.code === 204) {
                $("#ToastSuccess").children(".toast-body").text("Utilisateurs supprimé");
                toastList[1].show();
                modal.modal("toggle");
                $(".table").bootstrapTable("refresh");
            }
            else {
                $("#ToastError").children(".toast-body").text("Erreur lors de la suppression");
                toastList[0].show();
            }
        }).catch(function () {
            $("#ToastError").children(".toast-body").text("Erreur lors de la suppression");
            toastList[0].show();
        });
    });
});
//# sourceMappingURL=adminUsers.js.map