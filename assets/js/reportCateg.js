$(document).ready(function () {
    
    $("#addReportCat").hide();
    $("#add_categ").click(function(){
     $("#addReportCat").show();
    });
    
    loadReportCateg();
     
    function loadReportCateg() {
        $.each(report_categ_json, function (i, item) {
            $('#select_report_categ').append($('<option>', {
                value: item.nom_report_categ,
                text: item.nom_report_categ
            }));
        });
    }
});    


