$(document).ready(function () {
    var tr = $('<tr>');
    $.each(dataNameColonne, function (id, val) {
        tr.append($('<th>').append(val));
    });
    var d = new Date();
    $("#date_fin_filtre").val($.datepicker.formatDate('dd/mm/yy', d));
    d.setMonth(d.getMonth() - 1);
    $("#date_debut_filtre").val($.datepicker.formatDate('dd/mm/yy', d));
    $("#filtre_date").click(function () {
        var date_debut = format_date($("#date_debut_filtre").val());
        var date_fin = format_date($("#date_fin_filtre").val());
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
    $('#date_debut_filtre, #date_debut_filtre').datepicker({dateFormat: 'dd/mm/yy'});

    $("#panel-table h2").empty().append(projections[idPrj]);
    $("#exportExcel").click(function () {
        $("#mainTables").table2excel({
            exclude: ".noExl",
            name: projections[idPrj], //do not include extension
            filename: projections[idPrj] + date_string()
        });
    });
     $("#mainTables").DataTable();


    function refreshData() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(dataTable, function (idObj, valData) {
            var trData = $('<tr></tr>');
            if ((idPrj == 1 && $.trim(valData["status"]).toUpperCase()!="OK")||(idPrj == 4 && $.trim(valData["statut"]).toUpperCase()!="OK")) {
                trData.addClass('bri');
            }
            $.each(dataNameColonne, function (id, val) {
                trData.append($('<td class="whiteSpace">' + valData[val] + '</td>'));
            });
            tbody.append(trData);
        });
        $("#mainTables").find("tbody").remove();
        $("#mainTables").append(tbody);
        $('.pager').hide();
        var rowCount = $('#mainTables >tbody >tr').length;
        if (rowCount > 50) {
            var perPage = 25;
        } else {
            var perPage = 15;
        }
       // paginate("#mainTables", 'tbody tr', perPage);
       // checkViewPageNumber();

    }

    function date_string() {
        var d = new Date();
        var strDate = d.getFullYear() + "_" + (d.getMonth() + 1) + "_" + d.getDate();
        return strDate;
    }

    function format_date(s) {
        var b = s.split(/\D/);
        return b.reverse().join('-');

    }
    function checkViewPageNumber() {
        var action = $('.pager').find('.page-number').length > 25;
        if (action) {
            $.each($('.page-number'), function (index, elem) {
                if (index == 3)
                    $(elem).after('    ......');
                if (index > 3 && index < ($('.page-number').length - 3)) {
                    $(elem).hide();
                }
            });
        }
    }

});

