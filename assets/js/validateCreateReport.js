/**
 * Created by dell on 15/06/2017.
 */
$(document).ready(function () {
                $.validator.setDefaults({
        errorClass:'help-block',
        highlight: function(element){
            $(element)
                .closest('.form-control')
                .addClass('has-error')
        },
        unhighlight: function(element){
            $(element)
                .closest('.form-control')
                .removeClass('has-error')
        }

    });
	$("#createReport").validate({
   rules: {
     old_name: "required",
     new_name: {
	      required: true
	      }
	 },
   messages: {
    old_name: msg_required,
     new_name: {
	      required: msg_required
	      	 } 
   }
});
 });