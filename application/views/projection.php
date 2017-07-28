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

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-12"> <!-- Début partie du tableau -->
                        <fieldset class="group-border">

                            <div id="panel-table" class="panel panel-default">
                                <div class="panel-body project-filters">

                                    <div class="row">
                                        <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> <?php echo $this->lang->line("date_debut"); ?> </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" class="datepicker filtre_ligne form-control input-sm" id="date_debut_filtre"/>


                                                <span id="msg_error"><?php echo $this->lang->line("date_not_valide"); ?></span>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> <?php echo $this->lang->line("date_end"); ?> </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" class="datepicker filtre_ligne form-control input-sm" id="date_fin_filtre"/>


                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 col-sm-6 col-xs-12" style="margin-top: 0px">
                                            <a id="filtre_date" href="#"  class="btn  btn-primary pull-left" style="width: 125.03;"><?php echo $this->lang->line("excute_filtre"); ?></a>
                                        </div>
                                    </div> <!--end row filter date-->
                                    <div class="row">
                                        <div class="form-group col-md-5 col-sm-6 col-xs-12" >
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> Search  </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" id="search"  class="form-control input-sm">

                                            </div>
                                        </div>

                                        <div  class="form-group col-md-5 col-sm-6 col-xs-12" >
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label " > Show </label>
                                            <div id="showData" class="col-md-9 col-sm-8 col-xs-12">

                                            </div>
                                        </div>
                                        <div id="colVis" class="form-group col-md-2 col-sm-6 col-xs-12">

                                        </div>
                                        <!--end row filtres dataTables-->

                                    </div>
                                    <div class="row">
                                        <!-- Debut btn export excel -->  


                                        <div class="btn-group col-md-12 col-sm-12 col-xs-12">

                                            <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenu1"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%">
                                                <i class="icon icon-left s7-cloud-download"></i>
                                                <?php echo $this->lang->line("export_excel"); ?>
                                                <span class="caret"></span>
                                            </button>


                                            <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1"  role="menu" >
                                                <li><a id="exportExcelFiltre"
                                                       href="#"><?php echo $this->lang->line("export_excute_filtre"); ?></a></li>
                                                <li><a id="exportExcelToDay"
                                                       href="#"><?php echo $this->lang->line("export_last_day"); ?></a></li>
                                                <li><a id="exportExcelAll" href="#"><?php echo $this->lang->line("export_all"); ?></a>
                                                </li>

                                            </ul>
                                        </div>

                                        <!--fin btn export excel -->
                                    </div>
                                </div>
                            </div>


                        </fieldset>


                        <!-- Début titre du tableau et lien export excel-->
                        <div id="panel-table" class="widget widget-fullwidth widget-small">
                            <div class="widget-head">
                                <div class=" pull-left ">
                                    <div class="title"><h2>Titre du tableau</h2></div>
                                </div> 

                                <div class="clear"></div>

                            </div>  <!-- Fin titre du tableau et lien export excel-->

                            <table id="mainTables" class="table table-striped table-hover table-fw-widget dataTable no-footer dt-responsive nowrap" > 
                                <thead class="" > 

                                </thead>
                                <tbody> 


                                </tbody> 
                            </table>

                        </div>


                    </div> <!-- fin pagination  -->

                    <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>			 

                    <script>$('.dropdown-toggle').dropdown();
                    </script>

                    <script type="text/javascript">

                        $(document).ready(function () {
                            window.setTimeout(function () {
                                $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                                    $(this).remove();
                                });
                            }, 1000);

                        });
                    </script>

                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->

            </div>
        </div></div>
    <?php include('include/footer.php'); ?>
