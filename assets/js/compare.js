
function creatColonne(name_col, table_id) {
    var tr = $('<tr>');
    $.each(name_col, function (id, val) {
        tr.append($('<th data-field="' + val + '" data-sortable="true">').append(val));
    });
    var thead = $('<thead>').append(tr);

    $("#" + table_id).empty().append(thead);

}