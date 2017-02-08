$(document).ready(function () {
    var tr = $('<tr>');
    var tbody = $('<tbody>');

    $.each(dataNameColonne, function (id, val) {
        tr.append($('<th>').append(val));
    });

    $.each(dataTable, function (idObj, valData) {
        var trData = $('<tr>');
        $.each(dataNameColonne, function (id, val) {
            trData.append($('<td>').append(valData[val]));
        });
        tbody.append(trData);
    });
    $("#filtre_date").click(function () {
        var date_debut = $("#date_debut_filtre");
        var date_fin = $("#date_fin_filtre");
        $.ajax({url: base_url+"filtre",
               data:{date_debut}});
    });

    var thead = $('<thead>').append(tr).addClass('table-success');
    $("#mainTables").empty().append(thead);
    $("#mainTables").append(tbody);
    datepicker('.datepicker');

});