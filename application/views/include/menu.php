<?php ?>
<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var projections = <?php echo $projections; ?>;
</script>
<div class="col-md-3">    <!-- Colonne du Menu -->
    <nav id="menu_gauche">
        <ul id="nav">
            <li><a href="#" class=""><span class="glyphicon glyphicon-facetime-video" aria-hidden="true"></span>&nbsp;&nbsp;Report</a>
                <ul id="menu_gauche_ul" >

                </ul>
            </li>
            <li><a href="#" class=""><span class="glyphicon glyphicon-book" aria-hidden="true"></span>  Bibliothèque</a>
                <ul id="ul_bib">
                    <li id="bib_vega"><a href="<?php echo base_url(); ?>index.php/biblio">&nbsp;&nbsp;&nbsp;&nbsp;Suivi Vega</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Masteri</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Edd</a></li>
                    <li><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;Sage</a></li>
                </ul>
            </li>
            <?php if ($role != 2) { ?>
                <li><a href="<?php echo base_url(); ?>index.php/parametrage"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span>  Parametrage</a></li>
                <?php } ?>
        </ul>
    </nav>
</div>
<script src="<?php echo base_url(); ?>assets/js/home.js"></script>
<script src="<?php echo base_url(); ?>assets/js/nav.js"></script>



