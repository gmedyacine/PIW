$(document).ready(function () {
    loadCateg();
    $.each(projections, function (id, val) {
        var option = '<option value="' + id + '">' + val + '</option>';
        $("#main_select").append(option);

        var li = $("<li><a href='" + base_url + "index.php/projection/" + id + "'> " + '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;'+ val + "</a></li>");
        if (id == idPrj) {
            $("#menu_gauche_ul").addClass("active");
            li.addClass("active");

        }
        $("#menu_gauche_ul").append(li);
    });

    $("#valid_select").click(function () {
        var val = $("#main_select").val();
        if (val > 0) {
            document.location.href = base_url + "index.php/projection/" + val;
        }

    });
    $("#menu_gauche .btn").last().addClass("glyphicon glyphicon-cog");

    function loadCateg() {
        $.each(data_categs, function (i, item) {
            $('#list-bib').append($('<option>', {
                value: item.lib_categ_id,
                text: item.lib_categ
            }));
        });

    }

    
});
function loadSC(id) {
        if (id == 0) {
            id = $('#list-bib').val();
        }
        $.ajax({
            type: "post",
            url: base_url + "index.php/list-sc",
            data: {id_cat: id},

        }).done(function (resp) {
            $.each(resp, function (idObj, valData) {
                $('#lib-sous-cat').append($('<option>', {
                    value: valData['lib_sous_id'],
                    text: valData['lib_sous_categ‏_nom']
                }));
            });


        });
    }
function paginate(container, iteration, numPerPage) {
//Pagination
    var currentPage = 0;
    var $table = $(container);
    if ($table.find(iteration).length > numPerPage) {
        var repaginate = function () {
            $table.find(iteration).show().filter(':lt(' + currentPage * numPerPage + ')')
                    .hide()
                    .end()
                    .filter(':gt(' + ((currentPage + 1) * numPerPage - 1) + ')')
                    .hide()
                    .end();
            if (currentPage === 0) {
                $pager.find('.prev-page').css('visibility', 'hidden');
            } else {
                $pager.find('.prev-page').css('visibility', 'visible');
            }
            if (currentPage === (numPages - 1)) {
                $pager.find('.next-page').css('visibility', 'hidden');
            } else {
                $pager.find('.next-page').css('visibility', 'visible');
            }
        };
        var numRows = $table.find(iteration).length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $pager = $('<div class="pager"></div>');
        for (var page = 0; page < numPages; page++) {
            var pageHtml = $('<span class="page-number">' + (page + 1) + '</span>')
                    .data('page', page + 1)
                    .bind('click', {newPage: page}, function (event) {
                        currentPage = event.data['newPage'];
                        repaginate();
                        $(this).addClass('active').siblings().removeClass('active');
                        if (page > 0) {

                        }
                    });
            if (page === numPages - 1) {
                pageHtml.addClass('last');
            } else if (page === 0) {
                pageHtml.addClass('first');
            }
            $pager.append(pageHtml);
        }
        $pager
                .disableSelection()
                .prepend($('<span class="prev-page"></span>').click(function () {
                    $pager.find('.page-number').filter(function () {
                        var currentPage = $pager.find('.active').data('page');
                        return $(this).data('page') === (currentPage - 1);
                    })
                            .click();
                }))
                .append($('<span class="next-page"></span>').click(function () {
                    var currentPage = $pager.find('.active').data('page');
                    $pager.find('.page-number').filter(function () {
                        return $(this).data('page') === currentPage + 1;
                    })
                            .click();
                }))
                .find('span.page-number:first')
                .addClass('active');
        $pager.insertAfter($table.parent());
        repaginate();
    }
}

