$(document).ready(function () {

    refreshDataCat();
    refreshSC(0);
    $('#list-bib').change(function () {
        refreshSC($(this).val());
    });

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
             trData.append($('<td>').append('<button id="update_categ" data-toggle="modal" type="button" class="btn btn-success  btn-sm btn-round"><span class="glyphicon glyphicon-pencil"></span></button></td>').click(function () {
                 $('#renameCateg').modal('show');
                 $('#idBiblio').val(valData["lib_categ_id"]);
              $('#nom').val(valData["lib_categ"]);
              $('#description').val(valData["commentaire"]);
            }));


            tbody.append(trData);
        });
        $("#tabCat").find("tbody").remove();
        $("#tabCat").append(tbody);
        $('.pager').hide();
        paginate("#tabCat", 'tbody tr', 6);

    }
    

    function refreshSC(id) {
        if (id == 0) {
            id = $('#list-bib').val();
        }
        $.ajax({
            type: "post",
            url:  base_url + "index.php/list-sc",
            data: {id_cat: id},

        }).done(function (resp) {
            var tbody = $('<tbody></tbody>').empty();
            $.each(resp, function (idObj, valData) {
                var trData = $('<tr></tr>');
                trData.append($('<td>' + valData["lib_sous_categ‏_nom"] + '</td>'));
                trData.append($('<td>' + valData["lib_sous_categ‏_desc"] + '</td>'));
                trData.append($('<td>' + valData["username"] + '</td>'));
                trData.append($('<td>' + valData["added_at"] + '</td>'));
                
                trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function () {
                    if (confirm('Vous etes sur le point de supprimer ' + valData["lib_sous_categ‏_nom"])) {
                        document.location.href = "delete-sous-categ/" + valData["lib_sous_id"];
                    } else {
                        return;
                    }
                }));
                 trData.append($('<td>' + valData["added_at"] + '</td>'));


                tbody.append(trData);
            });
            $("#sou_bib").find("tbody").remove();
            $("#sou_bib").append(tbody);
            $('.pager').hide();
            paginate("#sou_bib", 'tbody tr', 6);
        });
    }
});
