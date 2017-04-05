$(document).ready(function () {

    refreshData();


    function refreshData() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(dataCateg, function (idObj, valData) {
            var trData = $('<tr></tr>');
            trData.append($('<td>' + valData["lib_categ"] + '</td>'));
            trData.append($('<td>' + valData["commentaire"] + '</td>'));
            trData.append($('<td>' + valData["added_by"] + '</td>'));
            trData.append($('<td>' + ((valData["added_at"]  + '</td>'));
   
            trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function () {
                if (confirm('Vous etes sur le point de supprimer ' + valData["lib_categ"])) {
                    document.location.href = "delete-categ/" + valData["idCat"];
                } else {
                    return;
                }
            }));


            tbody.append(trData);
        });
        $("#tabCat").find("tbody").remove();
        $("#tabCat").append(tbody);
        $('.pager').hide();
        paginate("#tabCat", 'tbody tr', 6);

    }

});