$(document).ready(function () {
    
    $.each(projections, function (id, val) {
        var option = '<option value="' + id + '">' + val + '</option>';
        $("#main_select").append(option);
        
        var li = $("<li><a href='"+ base_url+"index.php/projection/" + id+"'> "+val+"</a></li>");
        if(id==idPrj){
            $("#menu_gauche_ul").addClass("active");
            li.addClass("active");
            
        }
        $("#menu_gauche_ul").append(li);
    });
     
    $("#menu_gauche .btn").last().addClass("glyphicon glyphicon-cog");
});