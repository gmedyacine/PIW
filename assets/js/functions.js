function paginate(container, iteration, numPerPage) {
//Pagination
    var currentPage = 0;
    var $table = $(container);
    if ($table.find(iteration).length > numPerPage) {
        var repaginate = function () {
            $table.find(iteration).show().filter(':lt(' + currentPage * numPerPage + ')')
                    .hide()
                    .end()
                    .filter(':gt(' + ((currentPage + 1) * numPerPage - 1) + ')')
                    .hide()
                    .end();
            if (currentPage === 0) {
                $pager.find('.prev-page').css('visibility', 'hidden');
            } else {
                $pager.find('.prev-page').css('visibility', 'visible');
            }
            if (currentPage === (numPages - 1)) {
                $pager.find('.next-page').css('visibility', 'hidden');
            } else {
                $pager.find('.next-page').css('visibility', 'visible');
            }
        };
        var numRows = $table.find(iteration).length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            var pageHtml = $('<span class="page-number">' + (page + 1) + '</span>')
                    .data('page', page + 1)
                    .bind('click', {newPage: page}, function (event) {
                        currentPage = event.data['newPage'];
                        repaginate();
                        $(this).addClass('active').siblings().removeClass('active');
                        if (page > 0) {

                        }
                    });
            if (page === numPages - 1) {
                pageHtml.addClass('last');
            } else if (page === 0) {
                pageHtml.addClass('first');
            }
            $pager.append(pageHtml);
        }
        $pager
                .disableSelection()
                .prepend($('<span class="prev-page"></span>').click(function () {
                    $pager.find('.page-number').filter(function () {
                        var currentPage = $pager.find('.active').data('page');
                        return $(this).data('page') === (currentPage - 1);
                    })
                            .click();
                }))
                .append($('<span class="next-page"></span>').click(function () {
                    var currentPage = $pager.find('.active').data('page');
                    $pager.find('.page-number').filter(function () {
                        return $(this).data('page') === currentPage + 1;
                    })
                            .click();
                }))
                .find('span.page-number:first')
                .addClass('active');
        $pager.insertAfter($table.parent());
        repaginate();
    }
}

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
        trData.append($('<td>').append('<button id="update_categ" data-toggle="modal" type="button" class="btn btn-success data-toggle="modal" data-target="#renameCategModal" btn-sm btn-round"><span class="glyphicon glyphicon-pencil"></span></button></td>').click(function () {

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
        url: base_url + "index.php/list-sc",
        data: {id_cat: id},

    }).done(function (resp) {
        var tbody = $('<tbody></tbody>').empty();
        $.each(resp, function (idObj, valData) {
            var trData = $('<tr></tr>');
            trData.append($('<td>' + valData["lib_sous_categ_nom"] + '</td>'));
            trData.append($('<td>' + valData["lib_sous_categ‏_desc"] + '</td>'));
            trData.append($('<td>' + valData["username"] + '</td>'));
            trData.append($('<td>' + valData["added_at"] + '</td>'));

            trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function () {
                if (confirm('Vous etes sur le point de supprimer ' + valData["lib_sous_categ_nom"])) {
                    document.location.href = "delete-sous-categ/" + valData["lib_sous_id"];
                } else {
                    return;
                }
            }));
            //la partie update
//                 trData.append($('<td>').append('<button id="update_categ" data-toggle="modal" type="button" class="btn btn-success data-toggle="modal" data-target="#renameSubCategModal" btn-sm btn-round"><span class="glyphicon glyphicon-pencil"></span></button></td>').click(function () {
//                
//                 $('#idSubBiblio').val(valData["lib_sous_id"]);
//              $('#nomSubBoblio').val(valData["lib_sous_categ_nom"]);
//              $('#descSubBiblio').val(valData["lib_sous_categ‏_desc"]);
//            }));


            tbody.append(trData);
        });
        $("#sou_bib").find("tbody").remove();
        $("#sou_bib").append(tbody);
        $('.pager').hide();
        paginate("#sou_bib", 'tbody tr', 6);
    });
}

