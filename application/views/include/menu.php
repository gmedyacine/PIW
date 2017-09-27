<?php ?>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var projections = <?php echo $projections; ?>;
    var projectionsFull = <?php echo $projectionsFull; ?>;
    var id_param =<?php echo $id_param; ?>;
    var menu_bib =<?php echo $menu; ?>;
    var id_categ =<?php echo $id_categ; ?>;
    var id_sous_categ =<?php echo $id_sous_categ; ?>;
    var idBib =<?php echo $idBib; ?>;
    var data_categs =<?php echo $data_categs; ?>;
    var data_sous_categs =<?php echo $data_sous_categs; ?>;
    var menu_report = <?php echo $menu_report; ?>;
    var archived_menu_report = <?php echo $archived_menu_report; ?>;

</script>
<?php //echo $archived_menu_report; die; ?>
<div class="am-left-sidebar">
    <div class="content">
        <div class="am-logo"></div>    <!-- Colonne du Menu -->


        <ul id="nav" class="sidebar-elements">
            <li class="parent"><a href="<?php echo base_url(); ?>index.php/home" ><i class="icon s7-monitor"></i><span><?php echo $this->lang->line('dashboard'); ?></span>
                </a>

            </li>
            <li class="parent"><a href="#"><i class="icon s7-note2"></i><span><?php echo $this->lang->line("rapport_libelle") ?></span>
                </a>

                <ul id="menu_gauche_ul" class="sub-menu">
                    <li class="title"><?php echo $this->lang->line("rapport_libelle") ?></li>
                    <li>
<!--                        <span class="searchboxs"> <input  type="search" name="recherche" id="recherche" data-filter-list="#reports" class="form-control"  placeholder="<?php echo $this->lang->line('search_by'); ?>" />

                        </span>-->
                        <span class="searchboxs"> <input  type="search" name="recherche" id="recherche" data-filter-list="#reports" class="form-control"  placeholder="<?php echo $this->lang->line('search_by'); ?>" />
                        
                        </span>
                        <div id="reports"  class="scroll_ul">
                        </div>
                        <div id="archived" >
                        </div>

                    </li>
                </ul>
            </li>
            <li class="parent"><a href="#" ><i class="icon s7-ribbon"></i><span><?php echo $this->lang->line('biblio'); ?></span>
                </a>
                <ul id="ul_bib" class="sub-menu">
                    <li class="title"><?php echo $this->lang->line('biblio'); ?></li>
                    <li id="bib"><a href="<?php echo base_url(); ?>index.php/biblio">&nbsp;&nbsp;&nbsp;&nbsp;Suivi Vega</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Masteri</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Edd</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Sage</a></li>
                </ul>
            </li>
            <?php if ($role != 2) { ?>
                <li class="parent"><a href="#"><span class="icon s7-config"></span><?php echo $this->lang->line('parametrage'); ?></span>
                    </a>
                    <ul id="ul_param" class="sub-menu">
                        <li class="title"><?php echo $this->lang->line('parametrage'); ?></li>

                        <li id="menu_users">
                            <a href="<?php echo base_url(); ?>index.php/parametrage">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("gestion_utilisateurs") ?>
                            </a>
                        </li>

                        <li id="categ">
                            <a href="<?php echo base_url(); ?>index.php/add-biblio">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("gestion_biblio") ?>
                            </a>
                        </li>
                    </ul>
                </li>
            <?php } ?>

            <li><a href="<?php echo base_url(); ?>index.php/demande"> <i class="icon s7-diamond"></i><span><?php echo $this->lang->line("demande_specifique"); ?></span></a>
            </li>
        </ul>

    </div></div>
<script src="<?php echo base_url(); ?>assets/js/jquery.sticky.js"></script>
<script>
  $(document).ready(function(){
    $("#nav").sticky({topSpacing:80, zIndex:9990});
  //  $("#menu_gauche_ul").offset().top;
  });
</script>
<script type="text/javascript">
    $(document).ready(function () {
    $.each(menu_report, function (i, menu) {
    var ul_sm = $("<ul>");
            $.each(projectionsFull, function (index, val) {
            var classOpn = "";
                    if (val.id_report_categ == menu.id_menu) {
            var report = val.new_report_name;
                    if (val.old_report_name == idPrj)
                    classOpn = "open";
                    if (val.new_report_name.length > 19)
                    report = val.new_report_name.substring(0, 19) + '...';
                    var linkToRpt = $("<li  id='" + val.old_report_name + "' class='report " + classOpn + "'>"
                            + "<a id='" + val.old_report_name + "' href='" + base_url + "index.php/projection/" + val.old_report_name + "' data-toggle='tooltip' data-placement='right' data-html='true' data-container='body' title='<?php echo $this->lang->line("categorie"); ?>: " + val.nom_report_categ + " <br> <?php echo $this->lang->line("sub_cat_rept"); ?>: " + val.nom_report_sous_categ + " <br> <?php echo $this->lang->line("report"); ?>: " + val.new_report_name + "'> " + '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;'
                            + report
                            + '<span class="hidden_cl"> "' + val.nom_report_categ + '" </span> <span class="hidden_cl"> "' + val.nom_report_sous_categ + '" </span>'  // pour detecter la recherche par categ et par group
                            + '</a>'

                            + <?php if ($role != 2) { ?> '<span data-remove="' + val.old_report_name + '" class="remove-right glyphicon glyphicon-remove" style="font-size:10px;" aria-hidden="true"></span>'  <?php } ?>
                    + '</li>');
                    /*$('#menu_gauche_ul').css('display','block !important').addClass("show").show();*/
                    ul_sm.addClass("open").append(linkToRpt).show();
            }
            });
            var elem = $("<li>").attr("id", menu.id_menu).append(
            $('<a>').addClass("categ_rept")
            .attr('href', '#')
            .append('<div><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;' + menu.report_menu + '\
                <span data-remove="' + menu.id_menu + '" class="remove-categ glyphicon glyphicon-remove" aria-hidden="true"></span></div>')
            .click(function () {
            if (!$(this).hasClass("open")) {
            // hide any open menus and remove all other classes
            $(".categ_rept ul").slideUp(350);
                    $(".categ_rept").removeClass("open");
                    $(this).next("ul").show();
                    $(this).addClass("open");
            } else if ($(this).hasClass("open")) {
            $(this).removeClass("open");
                    $(this).next("ul").slideUp(350);
            }
            })
            )
            .append(ul_sm);
            $("#reports").append(elem);
    });
            //add "Create your report" at the end of list projections
<?php if ($role != 2) { ?>

        var archive = $("<li><a href'#' class='archived'><span class='glyphicon glyphicon-folder-open ' aria-hidden='true'></span>&nbsp;&nbsp; Archive </a></li>")
                .click(function () {
                if (!$(this).hasClass("open")) {
                // hide any open menus and remove all other classes
                $("#archived").slideDown();
                        $(this).addClass("open");
                } else if ($(this).hasClass("open")) {
                $(this).removeClass("open");
                        $(this).next("#archived").slideUp();
                }
                });
                var ul_sm = $("<ul>");
                $.each(archived_menu_report, function (i, menu) {
                var ul_sm = $("<ul>");
                        $.each(projectionsFull, function (index, val) {
                        var classOpn = "";
                                if (val.id_report_categ == menu.id_menu) {
                        var report = val.new_report_name;
                                if (val.old_report_name == idPrj)
                                classOpn = "open";
                                if (val.new_report_name.length > 15)
                                report = val.new_report_name.substring(0, 15) + '...';
                                var linkToRpt = $("<li  id='" + val.old_report_name + "' class='report " + classOpn + "'>"
                                        + "<a id='" + val.old_report_name + "' href='" + base_url + "index.php/projection/" + val.old_report_name + "' data-toggle='tooltip' data-placement='right' data-html='true' data-container='body' title='<?php echo $this->lang->line("categorie"); ?>: " + val.nom_report_categ + " <br> <?php echo $this->lang->line("sub_cat_rept"); ?>: " + val.nom_report_sous_categ + " <br> <?php echo $this->lang->line("report"); ?>: " + val.new_report_name + "'> " + '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;'
                                        + report
                                        + '<span class="hidden_cl"> "' + val.nom_report_categ + '" </span> <span class="hidden_cl"> "' + val.nom_report_sous_categ + '" </span>'  // pour detecter la recherche par categ et par group
                                        + '</a>'

                                        + <?php if ($role != 2) { ?> '<span data-remove="' + val.old_report_name + '" class="remove-right glyphicon glyphicon-remove" style="font-size:10px;" aria-hidden="true"></span>'  <?php } ?>
                                + '</li>');
                                /*$('#menu_gauche_ul').css('display','block !important').addClass("show").show();*/
                                ul_sm.addClass("open").append(linkToRpt).show();
                        }
                        });
                        var elem = $("<li>").attr("id", menu.id_menu).append(
                        $('<a>').addClass("categ_rept")
                        .attr('href', '#')
                        .append('<div><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;' + menu.report_menu + '\
                        <span data-remove="' + menu.id_menu + '" class="remove-categ glyphicon glyphicon-remove" aria-hidden="true"></span></div>')
                        .click(function () {
                        if (!$(this).hasClass("open")) {
                        // hide any open menus and remove all other classes
                        $(".categ_rept ul").slideUp(350);
                                $(".categ_rept").removeClass("open");
                                $(this).next("ul").show();
                                $(this).addClass("open");
                        } else if ($(this).hasClass("open")) {
                        $(this).removeClass("open");
                                $(this).next("ul").slideUp(350);
                        }
                        })
                        )
                        .append(ul_sm);
                        $("#archived").before(archive);
                        $("#archived").append(elem);
                        $("#archived").slideUp();
                });
                var li_rename_categ = $("<li><a href='" + base_url + "index.php/rename-category' id='renameCateg'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("rename_category"); ?></a></li>");
                var li_rename = $("<li><a href='" + base_url + "index.php/rename-report' id='renameRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("rename_report"); ?></a></li>");
                var li_create = $("<li><a href='" + base_url + "index.php/create-report' id='createRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("create_report"); ?></a></li>");
                $("#menu_gauche_ul").append(li_rename_categ).append(li_rename).append(li_create);
<?php } ?>
    $('[data-toggle="tooltip"]').tooltip();
            $(document).on("click", '.remove-right', function () {
    var id_remove = $(this).attr("data-remove");
            if (confirm('delete report')) {
    $.ajax({
    url: base_url + "index.php/delete-report/" + id_remove,
            type: "GET"
    }).done(function (data) {
    location.replace(base_url + "index.php/home");
    });
    }
    });
            $(document).on("click", '.remove-categ', function () {
    var id_remove = $(this).attr("data-remove");
            if (confirm('Do you want do delete this folder and all it reports ?')) {
    $.ajax({
    url: base_url + "index.php/delete-category/" + id_remove,
            type: "GET"
    }).done(function (data) {
    location.replace(base_url + "index.php/home");
    });
    }
    });
$('#recherche').filterList();    
});</script>

<script>
var boxArray = ['menu_gauche_ul','ul_bib','ul_param'];
window.addEventListener('mouseup', function(event){
	for(var i=0; i < boxArray.length; i++){
	    var box = document.getElementById(boxArray[i]);
	    if(event.target != box && event.target.parentNode != box){
		   box.style.display = 'none';
	    }
	}
});
</script>
    
<script src="<?php echo base_url(); ?>assets/js/jquery.filter-list.js"></script>
<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/functions.js"></script>


