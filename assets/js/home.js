$(document).ready( function()  {
   
    $.each(projections,function(id,val){
        var option = '<option value="'+id+'">'+val+'</option>'; 
        $("#main_select").append(option);
    });
   
});