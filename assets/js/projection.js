$(document).ready(function () {

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
                    $('#mainTables').dataTable().fnDestroy();
                    dataTable = dataFiltre;
                    refreshData();
                    $("#loader").hide();

                });
    });
    refreshData();
    $('#date_debut_filtre, #date_fin_filtre').datepicker({dateFormat: 'dd/mm/yy'});

    $("#panel-table h2").empty().append(projections[idPrj]);
    $("#exportExcel").click(function () {
        $("#mainTables").table2excel({
            exclude: ".noExl",
            name: projections[idPrj], //do not include extension
            filename: projections[idPrj] + date_string()
        });
    });



    function refreshData() {
        var tr = $('<tr>');
        $.each(dataNameColonne, function (id, val) {
            tr.append($('<th>').append(val));
        });
        var thead = $('<thead>').append(tr).addClass('table-success');
        $("#mainTables").empty().append(thead);
         var tbody = $('<tbody></tbody>').empty();
        $.each(dataTable, function (idObj, valData) {
            var trData = $('<tr></tr>');
            if ((idPrj == 1 && $.trim(valData["status"]).toUpperCase() != "OK") || (idPrj == 4 && $.trim(valData["statut"]).toUpperCase() != "OK")) {
                trData.addClass('bri');
            }
            $.each(dataNameColonne, function (id, val) {
                trData.append($('<td class="whiteSpace">' + valData[val] + '</td>'));
            });
            tbody.append(trData);
        });
        $("#mainTables").append(tbody);
        var rowCount = $('#mainTables >tbody >tr').length;
        if (rowCount > 50) {
            var perPage = 25;
        } else {
            var perPage = 15;
        }
        $("#mainTables").DataTable();

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
    

});

