
function creatColonne(name_col, table_id) {
    var tr = $('<tr>');
    $.each(name_col, function (id, val) {
        tr.append($('<th data-field="' + val + '" data-sortable="true">').append(val));
    });
    var thead = $('<thead>').append(tr);

    $("#" + table_id).empty().append(thead);

}

function createData(data, table_id) {
    var tbody = $('<tbody></tbody>').empty();  //vider la table
    $.each(data, function (idObj, valData) { //reconstruire la table
        var trData = $('<tr></tr>');
        $.each(valData, function (id, val) {
            trData.append($('<td class="whiteSpace">' + val + '</td>'));
        });
        tbody.append(trData);
    });
    $("#" + table_id).append(tbody);
}