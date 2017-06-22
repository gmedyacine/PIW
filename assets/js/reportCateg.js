$(document).ready(function () {
        
    loadReportCateg();
	loadReportSubCateg();
     
    function loadReportCateg() {
        $.each(report_categ_json, function (i, item) {
            $('#select_report_categ').append($('<option>', { 
                value: item.id_report_categ,
                text: item.nom_report_categ
            }));
			$('#reportCat').append($('<option>', { 
                value: item.id_report_categ,
                text: item.nom_report_categ
            }));
        });
    }
	function loadReportSubCateg() {
        $.each(report_sous_categ_json, function (i, item) {
            $('#select_report_sous_categ').append($('<option>', {
			    class: item.report_categ,
                value: item.id_report_sous_categ,
                text: item.nom_report_sous_categ
            }));
        });
    }
	
	$(function(){
    $("#select_report_sous_categ").chainedTo("#select_report_categ");
    });
	
});    


