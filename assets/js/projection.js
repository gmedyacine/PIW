$(document).ready(function () {
    var tr = $('<tr>');
    $.each(dataNameColonne, function (id, val) {
        tr.append($('<th>').append(val));
    });

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
    $('#date_debut_filtre, #date_debut_filtre').datepicker( { dateFormat: 'dd/mm/yy' });

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
        var rowCount = $('#mainTables >tbody >tr').length;
        if (rowCount > 1000) {
            var perPage = 60;
        } else if (rowCount > 300) {
            var perPage = 35;
        } else {
            var perPage = 15;
        }
        paginate("#mainTables", 'tbody tr', perPage);

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

