$(document).ready(function () {

    $.each(projections, function (id, val) {
        var option = '<option value="' + id + '">' + val + '</option>';
        $("#main_select").append(option);
        
        var button = $("<button type='button' class='btn btn-info' id='" + id + "'>   " + val + "</button>").click(function () {
            window.location.href = base_url+"index.php/projection/" + id;
        });
        
        $("#menu_gauche").append(button);
    });
     
    $("#menu_gauche .btn").last().addClass("glyphicon glyphicon-cog");
});