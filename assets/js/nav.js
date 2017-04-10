$(document).ready(function () {
    $("#nav > li > a").on("click", function (e) {
        if ($(this).parent().has("ul")) {
            // e.preventDefault();
        }

        if (!$(this).hasClass("open")) {
            // hide any open menus and remove all other classes
            $("#nav li ul").slideUp(350);
            $("#nav li a").removeClass("open");

            // open our new menu and add the open class
            $(this).next("ul").slideDown(350);
            $(this).addClass("open");
        } else if ($(this).hasClass("open")) {
            $(this).removeClass("open");
            $(this).next("ul").slideUp(350);
        }
    });
    $("#ul_bib").empty();
    $.each(menu_bib, function (i, menu) {
        var ul_sm = $("<ul>");
        $.each(menu.sous_menu, function (i, s_mn) {
            var url_s = base_url + "index.php/biblio/" + menu.id_menu + "/" + s_mn.lib_sous_id;
            ul_sm.append(
                    $("<li>").attr("id", s_mn.lib_sous_id).append($("<a>").attr("href", url_s).html(s_mn["lib_sous_categ‏_nom"])));
        });
        var url = base_url + "index.php/biblio/" + menu.id_menu;
        var elem = $("<li>").attr("id", menu.id_menu).append($("<a>").attr("href", url).html(menu.lib_menu).append(ul_sm));
        $("#ul_bib").append(elem);
    });
    $.each($("#ul_bib li"), function (id, val) {
        var idElem = $(val).attr("id");
        if (idElem == idBib) {
            $("#ul_bib").addClass("active");
            $.each($("#ul_bib").find("li"), function (i, ele) {
                if ($(ele).attr("id") == id_categ) {
                    $(ele).addClass("active");
                    // ici sous categ
                    $.each($(ele).find("ul li"), function (id, eli) {
                        if ($(eli).attr("id") == id_sous_categ) {
                            $(eli).addClass("active");
                            $(eli).closest("ul").addClass("active");
                        }
                    });
                }
            });
            $(val).addClass("active");
        }
    });



    $.each($("#ul_param li"), function (id, val) {
        var idElem = $(val).attr("id");
        if (idElem == id_param) {
            $("#ul_param").addClass("active");
            $(val).addClass("active");
        }
    });

});