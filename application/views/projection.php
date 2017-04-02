<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>

<script type="text/javascript">
    var dataTable = <?php echo $dataTable; ?>;
    var lastDate = <?php echo (string) $lastDate; ?>;
    var dataNameColonne = <?php echo $dataNameColonne; ?>;
</script>
<body>

    <div class="container-fluid">
<?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
<?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie du tableau -->
                <fieldset class="group-border">
                    <div class="row">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <p>Date de début<input type="text"  class="datepicker filtre_ligne" id="date_debut_filtre" /></p>
                                        <span id="msg_error"> Date non valide</span>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <p>Date de fin<input type="text"  class="datepicker filtre_ligne" id="date_fin_filtre" /></p>
                                    </div>
                                </div>
                                <a id="filtre_date" href="#" class="btn-bleu-filtre btn btn-info">Excuter le filtre </a>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row ">       <!-- Début titre du tableau et lien export excel-->
                    <div id="panel-table" class="panel panel-default panel-reduit-5">
                        <div class="panel-body">
                            <div class="col-6 pull-left ">
                                <H2>Titre du tableau</H2>
                            </div>
                            <div class="col-6 pull-right dropdown">
                                <button class="btn icon-btn btn-success dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                    <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>
                                    Export Excel 
                                    <span class="caret"></span>
                                </button>


                                <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                    <li><a id="exportExcelFiltre" href="#">Exporter le filtre execut&eacute;</a></li>
                                    <li><a id="exportExcelToDay" href="#">Exporter les donn&eacute;es de jour</a></li>
                                    <li><a  id="exportExcelAll" href="#">Exporter toute la table</a></li>

                                </ul>



                            </div>

                        </div> <!-- Fin titre du tableau et lien export excel-->

                        <table id="mainTables" class="table cell-border" cellspacing="0" width="100%"> 
                            <thead class="" > 

                            </thead> 
                            <tbody> 


                            </tbody> 
                        </table>

                    </div>
                </div>


            </div> <!-- fin pagination  -->
            <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>
            <script>$('.dropdown-toggle').dropdown()</script>

        </div> <!-- Fin partie du tableau -->
        <!-- ROW END -->

    </div>
<?php include('include/footer.php'); ?>