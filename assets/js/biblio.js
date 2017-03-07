$(document).ready(function () {
    $(".fancybox").fancybox({
        'width': 600, // or whatever
        'height': 320,
        'type': 'iframe'
    });
     paginate("#mainTablesBib", 'tbody tr', 15);
    checkViewPageNumber();
   function checkViewPageNumber() {
        var action = $('.pager').find('.page-number').length > 25;
        if (action) {
            $.each($('.page-number'), function (index, elem) {
                if (index == 3)
                    $(elem).after('    ......');
                if (index > 3 && index < ($('.page-number').length - 3)) {
                    $(elem).hide();
                }
            });
        }
    }  
});

