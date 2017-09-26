$(document).ready(function () {

    refreshDataCat();
    refreshSC(0);
    $('#list-bib').change(function () {
        refreshSC($(this).val());
    });

$(function() {
    var timeCookie = $.cookie( "timeCookie" ),
        selElem = $('select[name=id_cat]');
    selElem.on('change', function() {
        $.cookie( "timeCookie", this.value );
        refreshSC(this.value);
    });
    
        
    if( timeCookie != undefined ) {
        $('#list-bib').val(timeCookie);
        refreshSC(timeCookie);
    } else {
        $.cookie( "timeCookie", selElem.val() );
    }
});
});
