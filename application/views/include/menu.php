<?php ?>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var projections = <?php echo $projections; ?>;
    var projectionsFull = <?php echo $projectionsFull; ?>;
    var id_param =<?php echo $id_param; ?>;
    var menu_bib =<?php echo $menu; ?>;
    var id_categ =<?php echo $id_categ; ?>;
    var idBib =<?php echo $idBib; ?>;
    var data_categs =<?php echo $data_categs; ?>;
    var data_sous_categs =<?php echo $data_sous_categs; ?>;
    var id_sous_categ =<?php echo $id_sous_categ; ?>;
    var menu_report = <?php echo $menu_report; ?>;

</script>

<div class="col-md-3">    <!-- Colonne du Menu -->

    <nav id="menu_gauche">
        <ul id="nav">
            <li><a href="#" class=""><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("rapport_libelle") ?>
                </a>

                <ul id="menu_gauche_ul">

                    <input  type="text" name="recherche" id="recherche" data-filter-list="#reports" class="form-control glyphicon" style="color: black; font-family: arial; font-size:70%;" placeholder="<?php echo $this->lang->line('search_by'); ?>" />
                    <div id="reports"  class="scroll_ul">
                    </div>

                </ul>
            </li>
            <li><a href="#" class=""><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line('biblio'); ?>
                </a>
                <ul id="ul_bib">
                    <li id="bib"><a href="<?php echo base_url(); ?>index.php/biblio">&nbsp;&nbsp;&nbsp;&nbsp;Suivi Vega</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Masteri</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Edd</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Sage</a></li>
                </ul>
            </li>
            <?php if ($role != 2) { ?>
                <li><a href="#"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line('parametrage'); ?>
                    </a>
                    <ul id="ul_param">

                        <li id="menu_users"><a href="<?php echo base_url(); ?>index.php/parametrage">
                                <span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("gestion_utilisateurs") ?></a></li>

                        <li id="categ"><a href="<?php echo base_url(); ?>index.php/add-biblio"><span
                                    class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("gestion_biblio") ?></a></li>
                    </ul>
                </li>
            <?php } ?>

            <li><a href="<?php echo base_url(); ?>index.php/demande"><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("demande_specifique"); ?></a>
            </li>
        </ul>
    </nav>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $.each(menu_report, function (i, menu) {
            var ul_sm = $("<ul id='reports-list'>");
            $.each(projectionsFull, function (index, val) {
                var classOpn = "";
                if (val.id_report_categ == menu.id_menu) {
                    var report = val.new_report_name;

                    if (val.new_report_name.length > 19)
                        report = val.new_report_name.substring(0, 19) + '...';
                    var linkToRpt = $("<li  id='" + val.old_report_name + "' class='report " + classOpn + "'>"
                            + "<a id='" + val.old_report_name + "' href='" + base_url + "index.php/projection/" + val.old_report_name + "' data-toggle='tooltip' data-placement='right' data-html='true' title='<?php echo $this->lang->line("categorie"); ?>: " + val.nom_report_categ + " <br> <?php echo $this->lang->line("sub_cat_rept"); ?>: " + val.nom_report_sous_categ + " <br> <?php echo $this->lang->line("report"); ?>: " + val.new_report_name + "'> " + '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;'
                            + report + '</a>'
                            + '<span class="hidden_cl"> "' + val.nom_report_categ + '" </span> <span class="hidden_cl"> "' + val.nom_report_sous_categ + '" </span>'  // pour detecter la recherche par categ et par group
                            + <?php if ($role != 2) { ?> '<span data-remove="' + val.old_report_name + '" class="remove-right glyphicon glyphicon-trash" style="font-size:10px;" aria-hidden="true"></span>'  <?php } ?>
                    + '</li>');
                    if (val.old_report_name == idPrj) {
                        classOpn = "open";
                        $('#menu_gauche_ul').css('display', 'block !important').addClass("open").show();
                        ul_sm.append(linkToRpt).show();
                        linkToRpt.addClass("active").addClass("open");
                    } else {
                        $('#menu_gauche_ul').css('display', 'block !important');
                        ul_sm.append(linkToRpt);
                    }
                }
            });

            var elem = $("<li>").attr("id", menu.id_menu).append(
                    $('<a>').addClass("categ_rept")
                    //.attr('href', '#')
                    .append('<div><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;' + menu.report_menu + '</div>')
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
            var li_rename = $("<li><a href='" + base_url + "index.php/rename-report' id='renameRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("rename_report"); ?></a></li>");
            var li_create = $("<li><a href='" + base_url + "index.php/create-report' id='createRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("create_report"); ?></a></li>");
            $("#menu_gauche_ul").append(li_rename).append(li_create);
<?php } ?>
        $('[data-toggle="tooltip"]').tooltip();
        $('#recherche').filterList();
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

    });

</script>
<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.filter-list.js"></script>


