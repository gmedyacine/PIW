$(document).ready(function () {

    refreshDataCat();
    refreshSC(0);
    $('#list-bib').change(function () {
        refreshSC($(this).val());
    });

});
