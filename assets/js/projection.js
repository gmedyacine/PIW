$(document).ready(function () {

    var d = getLastDate();
    refreshData();
    $("#date_fin_filtre").val($.datepicker.formatDate('dd/mm/yy', d));
    d.setMonth(d.getMonth() - 1);
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
                    refreshData("filtre_date");
                    $("#loader").hide();
                });
        $("#mainTables").DataTable();
    });
    $('#date_debut_filtre, #date_fin_filtre').datepicker({dateFormat: 'dd/mm/yy'});
    $("#panel-table h2").empty().append(projections[idPrj]);

////////////  Export Excel (dropdown-menu)//////////////

    $(".dropdown-menu #exportExcelFiltre").click(function () {
       $('#mainTables').dataTable().fnDestroy();
        refreshData("export");
    });

	    $(".dropdown-menu #exportExcelAll").click(function () {
        $('#mainTables').dataTable().fnDestroy();
        refreshData("exportAll");
    });
	
	 $(".dropdown-menu #exportExcelToDay").click(function () {
        $('#mainTables').dataTable().fnDestroy();
        refreshData("exportToDay");
    });
	
///////////////////// refreshData() ///////////////
	
    function refreshData(texport) {

        var tr = $('<tr>');
        $.each(dataNameColonne, function (id, val) {
            tr.append($('<th>').append(val));
        });
        var thead = $('<thead>').append(tr).addClass('table-success');
        $("#mainTables").empty().append(thead);
        if (typeof texport == "undefined") { // chargement par défaut "sans paramètres"
            $("#mainTables").DataTable({
                "order": [],
                "bProcessing": true,
                "serverSide": true,
                "ajax": {
                    "data": {idPrj: idPrj},
                    "url": base_url + "index.php/filtre",
                    "type": "post",
                }

            });
            
            
			
			
			//////////////////export all///////////////
			} else if ( texport == "exportAll") { 
		
           var date_debut = "";
           var date_fin = getLastDate();

		 $.ajax({
                dataType: 'json',
                type: "POST",
                url: base_url + "index.php/filtre",
                data: {date_debut: date_debut, date_fin: date_fin, idPrj: idPrj}})
                    .done(function (dataFiltre) {
                        dataTable = dataFiltre;

                        var tbody = $('<tbody></tbody>').empty();  //vider la table
                        $.each(dataTable.data, function (idObj, valData) { //reconstruire la table
                            var trData = $('<tr></tr>');
                            $.each(valData, function (id, val) {
                                trData.append($('<td class="whiteSpace">' + val + '</td>'));
                            });
                            tbody.append(trData);
                        });
                        $("#mainTables").append(tbody);
                        if (texport == "exportAll") {
                            $("#mainTables").table2excel({
                                exclude: ".noExl",
                                name: projections[idPrj], //do not include extension
                                filename: projections[idPrj] + date_string()
                            });
                        }
                        $("#mainTables").DataTable();
                    });
                            

		//////////////////exportToDay//////////
					} else if ( texport == "exportToDay") { 
			
          var date_debut = date_now();
         var date_fin = date_now();
		   			  
         
		   $.ajax({
                dataType: 'json',
                type: "POST",
                url: base_url + "index.php/filtre",
                data: {date_debut: date_debut, date_fin: date_fin, idPrj: idPrj}})
				
                    .done(function (dataFiltre) {
                          
						   alert(dataFiltre.recordsFiltered);
						  dataTable = dataFiltre;
															
					    var tbody = $('<tbody></tbody>').empty();
						
                        $.each(dataTable.data, function (idObj, valData) {
                            var trData = $('<tr></tr>');
                            $.each(valData, function (id, val) {
                                trData.append($('<td class="whiteSpace">' + val + '</td>'));
                            });
                            tbody.append(trData);
                        });
                        $("#mainTables").append(tbody);
						
				
										
                        if (texport == "exportToDay") {
                            $("#mainTables").table2excel({
                                exclude: ".noExl",
                                name: projections[idPrj], //do not include extension
                                filename: projections[idPrj] + date_string()
                            });
                        }
                        $("#mainTables").DataTable();
                    });
	
		//////////////// export filtre ///////////////

        } else {
           var date_debut = format_date($("#date_debut_filtre").val());
           var date_fin = format_date($("#date_fin_filtre").val());
  
		 $.ajax({
                dataType: 'json',
                type: "POST",
                url: base_url + "index.php/filtre",
                data: {date_debut: date_debut, date_fin: date_fin, idPrj: idPrj}})
                    .done(function (dataFiltre) {
                        dataTable = dataFiltre;
				
                        var tbody = $('<tbody></tbody>').empty();
                        $.each(dataTable.data, function (idObj, valData) {
                            var trData = $('<tr></tr>');
                            $.each(valData, function (id, val) {
                                trData.append($('<td class="whiteSpace">' + val + '</td>'));
                            });
                            tbody.append(trData);
                        });
                        $("#mainTables").append(tbody);
                        if (texport == "export") {
                            $("#mainTables").table2excel({
                                exclude: ".noExl",
                                name: projections[idPrj], //do not include extension
                                filename: projections[idPrj] + date_string()
                            });
                        }
                        $("#mainTables").DataTable();
                    });



        }
    }
    function date_string() {
        var d = new Date();
        var strDate = d.getFullYear() + "_" + (d.getMonth() + 1) + "_" + d.getDate();
        return strDate;
    }
	
	   function date_now() {
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
        return strDate;
    }

    function format_date(s) {
        var b = s.split(/\D/);
        return b.reverse().join('-');
    }

    function getLastDate() {
        if (lastDate.length == 0) {
            return new Date();
        }
        var dateStr = lastDate.split(" ");
        var dateJr = dateStr[0].split("-");
        return  new Date(dateJr[0], dateJr[1] - 1, dateJr[2]);
    }
    $( document ).ajaxComplete(function( event, request, settings ) {
        $("#mainTables td").addClass("whiteSpace");
        if(idPrj==1||idPrj==4){
            $.each($("#mainTables tr"),function(id,tr){
                $.each($(tr).find("td"),function(i,td){
                    if(i==7&&idPrj==4&&($(td).text().indexOf("OK")==-1&&$(td).text().indexOf("ok")==-1)){
                        $(tr).addClass("bri");
                    }
                    if(i==3&&idPrj==1&&($(td).text().indexOf("OK")==-1&&$(td).text().indexOf("ok")==-1)){
                        $(tr).addClass("bri");
                    }
                })
            });
         }
     });


})
        ;

