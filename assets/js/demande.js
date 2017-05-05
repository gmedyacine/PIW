$(document).ready(function () {

    refreshDemande();

    function refreshDemande() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(allDemandes_json, function (idObj, valData) {
            var trData = $('<tr></tr>');
            trData.append($('<td>' + valData["objet"] + '</td>'));
            trData.append($('<td>' + valData["message"] + '</td>'));
            trData.append($('<td>' + valData["username"] + '</td>'));
            trData.append($('<td>' + valData["added_at"] + '</td>'));

            tbody.append(trData);
        });
        $("#tabDemande").find("tbody").remove();
        $("#tabDemande").append(tbody);

    }
    

});
