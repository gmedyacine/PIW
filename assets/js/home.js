$(document).ready(function () {
    loadCateg();
    loadRpt();

    function loadRpt() {
        $.each(projections, function (i, item) {
            $('#main_select').append($('<option>', {
                value: i,
                text: item
            }));
        });
    }


    $("#valid_select").click(function () {
        var val = $("#main_select").val();
        if (val > 0) {
            document.location.href = base_url + "index.php/projection/" + val;
        }

    });
    $("#menu_gauche .btn").last().addClass("glyphicon glyphicon-cog");

    function loadCateg() {
        $.each(data_categs, function (i, item) {
            $('#list-bib').append($('<option>', {
                value: item.lib_categ_id,
                text: item.lib_categ
            }));
        });

    }

    function loadSC(id) {
        if (id == 0) {
            id = $('#list-bib').val();
        }
        $.ajax({
            type: "post",
            url: base_url + "index.php/list-sc",
            data: {id_cat: id},

        }).done(function (resp) {
            $.each(resp, function (idObj, valData) {
                $('#lib-sous-cat').append($('<option>', {
                    value: valData['lib_sous_id'],
                    text: valData['lib_sous_categ_nom']
                }));
            });


        });
    }
    
});



