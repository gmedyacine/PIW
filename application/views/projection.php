<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>

<script type="text/javascript">
    var dataTable = <?php echo $dataTable; ?>;
    var lastDate = <?php echo (string)$lastDate; ?>;
    var dataNameColonne = <?php echo $dataNameColonne; ?>;
	var report_categ_json = <?php echo $report_categ_json; ?>;
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
                                    <p><?php echo $this->lang->line("date_debut"); ?><input type="text"
                                                                                            class="datepicker filtre_ligne"
                                                                                            id="date_debut_filtre"/></p>
                                    <span id="msg_error"><?php echo $this->lang->line("date_not_valide"); ?></span>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <p><?php echo $this->lang->line("date_end"); ?><input type="text"
                                                                                          class="datepicker filtre_ligne"
                                                                                          id="date_fin_filtre"/></p>
                                </div>
                            </div>
                            <a id="filtre_date" href="#"
                               class="btn-bleu-filtre btn btn-info"><?php echo $this->lang->line("excute_filtre"); ?></a>
                        </div>
                    </div>
                </div>
            </fieldset>
			<div class="row">
                                                            <div class="panel panel-default panel-set">
                        <div class="panel-heading">
                           <?php echo $this->lang->line("assigner_categ"); ?>
                        </div>
                    
                        <div class="panel-body"> 

                            <div class="form-group">    
                             
                                <?php echo form_open('home/assign_categ'); ?>
                                <div class="col-sm-10">
                                    <select id="select_report_categ" name="report_categ" class="form-control" >
                                           <option value="0">-- <?php echo $this->lang->line('select_categ'); ?> --</option>
                                       </select>
                                    <input type="hidden" name="report_id" value="<?php echo $id_projection; ?>">
                                    <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('categ_not_found'); ?></p><a href="#" id="add_categ" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_categ'); ?></a>
                                    <br>
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" id="btn_select_report_categ" class="btn btn-info pull-right" value="<?php echo $this->lang->line('valider'); ?>" >
                                </div>
                                </form>    
                               
                            </div>
                           
                            <div id="addReportCat" class="form-group">  
                                <?php echo form_open('home/add_report_categ'); ?>
                                  <form action="" method="post">  
                                <div class="col-sm-10">
                               <br>
                               <input type="text" name="nom_report_categ" required="required" class="form-control">
                                     <br>
                                    <input type="hidden" name="id_projection" value="<?php echo $id_projection; ?> "> 
                                </div>
                                <div class="col-sm-2">
                                 <br>
                                   <input type="submit" id="btn_add_categ" class="btn btn-info pull-right" value="<?php echo $this->lang->line('add_categ'); ?> ">
                                    
                                </div>
                                 </form> 
                            </div>
                          
                        </div>
                    </div>
                  
                    </div>
            <div class="row ">       <!-- Début titre du tableau et lien export excel-->
                <div id="panel-table" class="panel panel-default panel-reduit-5">
                    <div class="panel-body">
                        <div class="col-6 pull-left ">
                            <H2>Titre du tableau</H2>
                        </div>
                        <div class="col-6 pull-right dropdown">
                            <button class="btn icon-btn btn-success dropdown-toggle" type="button" id="dropdownMenu1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>
                                <?php echo $this->lang->line("export_excel"); ?>
                                <span class="caret"></span>
                            </button>


                            <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                                <li><a id="exportExcelFiltre"
                                       href="#"><?php echo $this->lang->line("export_excute_filtre"); ?></a></li>
                                <li><a id="exportExcelToDay"
                                       href="#"><?php echo $this->lang->line("export_last_day"); ?></a></li>
                                <li><a id="exportExcelAll" href="#"><?php echo $this->lang->line("export_all"); ?></a>
                                </li>

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
             <script src="<?php echo base_url(); ?>assets/js/reportCateg.js"></script>
            <script>$('.dropdown-toggle').dropdown()</script>
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
<?php include('include/footer.php'); ?>
