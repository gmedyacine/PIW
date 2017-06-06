<?php ?>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var projections = <?php echo $projections; ?>;
    var id_param =<?php echo $id_param; ?>;
    var menu_bib =<?php echo $menu; ?>;
    var id_categ =<?php echo $id_categ; ?>;
    var idBib =<?php echo $idBib; ?>;
    var data_categs =<?php echo $data_categs; ?>;
    var data_sous_categs =<?php echo $data_sous_categs; ?>;
    var id_sous_categ =<?php echo $id_sous_categ; ?>;
</script>

<div class="col-md-3">    <!-- Colonne du Menu -->
    <nav id="menu_gauche">
        <ul id="nav">
            <li><a href="#" class=""><span class="glyphicon glyphicon-folder-open" aria-hidden="true"></span>&nbsp;&nbsp;<?php echo $this->lang->line("rapport_libelle") ?>
                </a>

                <ul id="menu_gauche_ul">
                    <input  type="text" name="recherche" id="recherche" class="form-control glyphicon" style="color: black" placeholder="&#57347;" />
                    <div id="reports">
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
<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nav.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.quicksearch.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.easyPaginate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $.each(projections, function (id, val) {
            var option = '<option value="' + id + '">' + val + '</option>';
            $("#main_select").append(option);

            var li = $("<li>"
                    + "<a href='" + base_url + "index.php/projection/" + id + "'> " + '<span class="glyphicon glyphicon-file" aria-hidden="true"></span>&nbsp;&nbsp;'
                    + val + '</a>'
                    + <?php if ($role != 2) { ?> '<span data-remove="' + id + '" class="remove-right glyphicon glyphicon-remove" style="font-size:10px;" aria-hidden="true"></span>'  <?php } ?>
            + '</li>');
            if (id == idPrj) {
                $("#menu_gauche_ul").addClass("active");
                li.addClass("active");
            }
            var reports = $("#reports").append(li);
            $("#menu_gauche_ul").append(reports);
        });
        //// la partie recherche du rapport
        var qs = $('input#recherche').quicksearch('ul#menu_gauche_ul div#reports li');

        $.ajax({
            'url': '<?php echo base_url(); ?>assets/js/example.json',
            'type': 'GET',
            'dataType': 'json',
            'success': function (data) {
                for (i in data['list_items']) {
                    $('ul#menu_gauche_ul div#reports ').append('<li>' + data['list_items'][i] + '</li>');
                }
                qs.cache();
            }
        });
//// Fin de la partie recherche du rapport
        //add "Create your report" at the end of list projections
        var li_rename = $("<li><a href='" + base_url + "index.php/home/rename_form' id='renameRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("rename_report"); ?></a></li>");
        var li_create = $("<li><a href='" + base_url + "index.php/home/create_form' id='createRpt'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span>&nbsp;&nbsp;<?php echo $this->lang->line("create_report"); ?></a></li>");
<?php if ($role != 2) { ?>
            $("#menu_gauche_ul").append(li_rename).append(li_create);
<?php } ?>
    });
</script>

<script type="text/javascript">
    ///Pagination menu gauche
    $(document).ready(function () {
        $('#reports').easyPaginate({
            paginateElement: 'li',
            elementsPerPage: 5,
            effect: 'default'
        });

        $(".remove-right").click(function () {
            var id_remove = $(this).attr("data-remove");
            if (confirm('delete report')) {
                $.ajax({
                    url: base_url + "index.php/delete-report/" + id_remove,
                    type: "GET",
                }).done(function (data) {
                    location.reload();

                });
            }
        });

    });
</script>


