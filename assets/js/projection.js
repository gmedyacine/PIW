$(document).ready(function () {
    var tr = $('<tr>');
    var tbody = $('<tbody>');
    
    $.each(dataNameColonne, function (id, val) {
        tr.append($('<th>').append(val));
    });
    
    $.each(dataTable, function (idObj, valData) {
         var trData=$('<tr>');
        $.each(dataNameColonne, function (id, val) {
            trData.append($('<td>').append(valData[val]));
        });
        tbody.append(trData);
    });
    
    var thead = $('<thead>').append(tr).addClass('table-success');
    $("#mainTables").empty().append(thead);
    $("#mainTables").append(tbody);
    datepicker('.datepicker');

});