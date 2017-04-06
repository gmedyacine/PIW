$(document).ready(function () {

    refreshDataCat();
    loadCateg();
   // loadSousCategorie();
    function refreshDataCat() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(data_categs, function (idObj, valData) {
            var trData = $('<tr></tr>');
            trData.append($('<td>' + valData["lib_categ"] + '</td>'));
            trData.append($('<td>' + valData["commentaire"] + '</td>'));
            trData.append($('<td>' + valData["username"] + '</td>'));
            trData.append($('<td>' + valData["added_at"] + '</td>'));

            trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function () {
                if (confirm('Vous etes sur le point de supprimer ' + valData["lib_categ"])) {
                    document.location.href = "delete-categ/" + valData["lib_categ_id"];
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
    function loadCateg() {
        $.each(data_categs, function (i, item) {
            $('#list-bib').append($('<option>', {
                value: item.lib_categ_id,
                text: item.lib_categ
            }));
        });

    }
    function loadSousCategorie() {
        $('#list-bib').change(function () {
            refreshSC($(this).val());
        });
    }
    function refreshSC(id){
        $.ajax({
           url: "/list-sc",
           data: {"id_cat":id},
           
        }).done(function(resp){
              var tbody = $('<tbody></tbody>').empty();
        $.each(data_categs, function (idObj, valData) {
            var trData = $('<tr></tr>');
            trData.append($('<td>' + valData["lib_categ"] + '</td>'));
            trData.append($('<td>' + valData["commentaire"] + '</td>'));
            trData.append($('<td>' + valData["username"] + '</td>'));
            trData.append($('<td>' + valData["added_at"] + '</td>'));

            trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function () {
                if (confirm('Vous etes sur le point de supprimer ' + valData["lib_categ"])) {
                    document.location.href = "delete-categ/" + valData["lib_categ_id"];
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
        });
    }
});