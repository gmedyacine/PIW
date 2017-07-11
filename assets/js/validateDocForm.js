/**
 * Created by dell on 07/06/2017.
 */
$(document).ready(function(){
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
$("#addDocForm").validate({
    rules: {
        calender: "required",
        libCat: "required",
        libSousCat: "required",
        job: "required",
        vega: "required",
        heureLib: "required",
        "newFiles[]": "required"
        
    },
    messages: {
        calender: msg,
        libCat: msg,
        libSousCat: msg,
        job: msg,
        vega:msg,
        heureLib: msg,
        "newFiles[]": msg 

    }
});
});