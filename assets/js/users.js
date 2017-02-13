$(document).ready(function () {
    
   refreshData();
    
   function refreshData() {
        var tbody = $('<tbody></tbody>').empty();
        $.each(dataUsers, function (idObj, valData) {
            var trData = $('<tr></tr>');
                trData.append($('<td>' + valData["username"] + '</td>'));
                trData.append($('<td>' + valData["mail"] + '</td>'));
                trData.append($('<td>' + valData["num_tel"] + '</td>'));
                trData.append($('<td>' + ((valData["notif_mail"]>0) ? "OUI" : "NON")+ '</td>'));
                trData.append($('<td>' +((valData["notif_sms"]>0) ? "OUI" : "NON")  + '</td>'));
                trData.append($('<td>' +((valData["sup_user"]>0) ? "OUI" : "NON")  + '</td>'));
                trData.append($('<td>').append('<button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>').click(function(){
                    if(confirm('Vous etes sur le point de supprimer '+valData["username"])){
                        document.location.href="delete-user/"+valData["id"];
                    }else{
                        return;
                    }
                }));
                
            
            tbody.append(trData);
        });
        $("#tabUsers").find("tbody").remove();
        $("#tabUsers").append(tbody);
        $('.pager').hide();
         paginate("#tabUsers", 'tbody tr', 6);

    }

});

