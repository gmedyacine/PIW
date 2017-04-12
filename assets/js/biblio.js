$(document).ready(function () {
    $(".fancybox").fancybox({
        'width': 600, // or whatever
        'height': 320,
        'type': 'iframe'
    });
    $("#mainTablesBib").DataTable({
        searching: false,
    });

    $("#show-form").click(function () {
        $("#panel-table").toggle();
    });
    loadSC(0);
    $('#list-bib').change(function () {
        loadSC($(this).val());
    });
    masque_fields_bib();
    $("#cnt-mainTablesBib").before($("<div>").text("Search:  ").attr("id", "search_glob").append($("<input>").keyup(function () {
                if ($(this).val().length > 3) {
                    $.ajax({
                        type: "post",
                        url: base_url + "index.php/tab-bib",
                        data: {cnt_file: $(this).val()}
                    }).done(function (rest) {
                        $("#cnt-mainTablesBib").html(rest);
                        $("#mainTablesBib").DataTable({
                            searching: false,
                        });
                    })
                }
            })));
    //checkViewPageNumber();
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
function masque_fields_bib(){
    if(id_categ==33) return;
    $(".heur_lib").text("Dossier");
    $(".label_calender").text("Date insertion");
    
}

});

