$(document).ready(function () {
    var tr = $('<tr>');
    $.each(dataNameColonne, function (id, val) {
        tr.append($('<th>').append(val));
    });

    $("#filtre_date").click(function () {
        var date_debut = $("#date_debut_filtre").val();
        var date_fin = $("#date_fin_filtre").val();
        $("#loader").show();
        $.ajax({
            type: "POST",
            url: base_url + "index.php/filtre",
            data: {date_debut: date_debut, date_fin: date_fin, idPrj: idPrj}})
                .done(function (dataFiltre) {
                    dataTable = dataFiltre;
                    refreshData();
                    $("#loader").hide();

                });
    });
    var thead = $('<thead>').append(tr).addClass('table-success');
    $("#mainTables").empty().append(thead);
    refreshData();
    datepicker('.datepicker');

    $("#panel-table h2").empty().append(projections[idPrj]);
    $("#exportExcel").click(function () {
        $("#mainTables").table2excel({
            exclude: ".noExl",
            name: projections[idPrj], //do not include extension
            filename: projections[idPrj] + date_string()
        });
    });

   

    function refreshData() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(dataTable, function (idObj, valData) {
            var trData = $('<tr></tr>');
            $.each(dataNameColonne, function (id, val) {
                trData.append($('<td>' + valData[val] + '</td>'));
            });
            tbody.append(trData);
        });
        $("#mainTables").find("tbody").remove();
        $("#mainTables").append(tbody);
        $('.pager').hide();
         paginate("#mainTables", 'tbody tr', 6);

    }

    function date_string() {
        var d = new Date();
        var strDate = d.getFullYear() + "_" + (d.getMonth() + 1) + "_" + d.getDate();
        return strDate;
    }

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

});

