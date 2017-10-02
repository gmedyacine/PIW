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
    
 // Construction des elements du bibilio dans le menu gauche
    $.each(menu_bib, function (i, menu) {
        var ul_sm = $("<ul>");
        $.each(menu.sous_menu, function (i, s_mn) {
            var url_s = base_url + "index.php/biblio/" + menu.id_menu + "/" + s_mn.lib_sous_id;
            ul_sm.append(
                    $("<li>").attr("id", s_mn.lib_sous_id).addClass("sub_lib").append($("<a>").attr("href", url_s).css('color', 'rgb(255, 190, 87)').html('<span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;' + s_mn["lib_sous_categ_nom"])));
        });
        var url = base_url + "index.php/biblio/" + menu.id_menu;
        var elem = $("<li>").attr("id", menu.id_menu).append($("<a>").attr("href", url).html('<div><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;' + menu.lib_menu + "</div>").append(ul_sm));
        $("#ul_bib").append(elem);
    });
    $.each($("#ul_bib li"), function (id, val) {
        var idElem = $(val).attr("id");
        if (idElem == idBib) {
            $("#ul_bib").addClass("active");
            $.each($("#ul_bib").find("li"), function (i, ele) {
                if ($(ele).attr("id") == id_categ) {
                    $(ele).find("ul").addClass("subLib active display");
                    $(ele).find("div").addClass("active"); // ici tous les li active

                    $.each($(ele).find("ul").find("li"), function (i, li) {

                        if (id_sous_categ != 0 && $(li).attr("id") == id_sous_categ) {

                            $(li).addClass("active");
                            $(li).find("a").css('color', 'rgba(239, 98, 98, 0.94)');

                        }
                    });
                    //$(ele).find("li").hasClass("active").find("a").css('color','red');

                }
            });
            //$(val).addClass("active");
        }
    });
    $.each($("#ul_param li"), function (id, val) {
        var idElem = $(val).attr("id");
        if (idElem == id_param) {
            $("#ul_param").addClass("active");
            $(val).addClass("active");
        }
    });

    // supprimer un report déjà creer ou renomer 

    /*$('.am-toggle-left-sidebar').click(function(e) {
     e.preventDefault();
     $('body').toggleClass('open-left-sidebar am-animate');
     });*/


// menu pour mobile		
    $('.am-toggle-left-sidebar').click(function (e) {
        e.stopPropagation();
        $('.am-left-sidebar').toggleClass('show-menu');
    });
    $('.am-left-sidebar').click(function (e) {
        e.stopPropagation();
    });
    $('body,html').click(function (e) {
        $('.am-left-sidebar').removeClass('show-menu');
    });


// menu slideUp/slideDown	
    $('.am-left-sidebar .sidebar-elements > li > a').click(function (e) {
        e.stopPropagation();
        $(this).parent().find('.am-left-sidebar .sidebar-elements > li > ul').slideDown();
    });
    $('.am-left-sidebar .sidebar-elements > li > ul').click(function (e) {
        e.stopPropagation();
    });
    $('body,html').click(function (e) {
        $('.am-left-sidebar .sidebar-elements > li > ul').slideUp();
    });






});