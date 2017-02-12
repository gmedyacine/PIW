<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.table2excel.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery-ui-1.10.4.custom.min.js"></script>

<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var dataTable = <?php   echo $dataTable; ?>;
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
                                        <p>Date de début<input type="text" class="datepicker filtre_ligne" id="date_debut_filtre" /></p>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <p>Date de fin<input type="text" class="datepicker filtre_ligne" id="date_fin_filtre" /></p>
                                    </div>
                                </div>
                                <a id="filtre_date" href="#" class="btn-bleu-filtre btn btn-info">Excuter le filtre </a>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row ">       <!-- Début titre du tableau et lien export excel-->
                    <div id="panel-table" class="panel panel-default">
                        <div class="panel-body">
                            <div class="col-6 pull-left">
                                <H2>Titre du tableau</H2>
                            </div>
                            <div class="col-6 pull-right">
                                <a id="exportExcel" class="btn icon-btn btn-success" href="#">
                                    <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>
                                    Export Excel
                                </a>
                            </div>

                        </div> <!-- Fin titre du tableau et lien export excel-->

                        <div class="row "> <!-- Début tableau  -->

                            <table id="mainTables" class="table table-bordered table-reduit-<?php echo $id_projection; ?>"> 
                                <thead class="table-success" > 
                                    
                                </thead> 
                                <tbody> 
                                   

                                </tbody> 
                            </table>


                        </div> <!-- Fin tableau -->
                    </div>
                </div>
                

            </div> <!-- fin pagination  -->
            <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>
        </div> <!-- Fin partie du tableau -->
        <!-- ROW END -->

    </div>
    <?php include('include/footer.php'); ?>