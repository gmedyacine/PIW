<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<body>
    <script type="text/javascript">
        var $ = jQuery.noConflict();
        var lib_dossier="<?php echo $this->lang->line("lib_dossier"); ?>";
        var lib_insert_date="<?php echo $this->lang->line("lib_insert_date"); ?>";
        var msg = "<?php echo $this->lang->line("required_field"); ?>";
    </script>
    <div class="container-fluid">

        <?php include('include/header.php'); ?>
        <?php include('include/dataTables.php'); ?>
        <?php include('include/fancy.php'); ?> 
        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie des onglets -->

                <!-- Tab panes -->
				<?php if ($role != 2) { ?>
				<div class="row">
                <div class="panel tab-content">
				 
                    <div style="overflow: auto;" class="tab-panel fade active in" >
                        <button type="button"  id="show-form" class="btn btn-info"><?php echo $this->lang->line("add_document"); ?></button>
                        <div id="panel-table" class="panel" style="width: 100%;display: none; margin-right: 0 !important">
                            <div class="panel-body" style="width: 100%">              
                               
                                    <div class="form-group">
                                        <form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" id="addDocForm" enctype="multipart/form-data" >
                                            <div class="error">
                                                <?php echo validation_errors(); ?>
                                                <?php echo isset($error_upload) ? $error_upload['error'] : ""; ?>
                                            </div>

                                            <label  class="label_calender control-label col-sm-2" for="calender"><?php echo $this->lang->line("calendar"); ?></label>
                                            <div class="nom col-sm-10">
                                                <input name="calender"  type="text"   class="form-control datepicker" >
                                                </br>
                                            </div>

                                            <label class="control-label col-sm-2" for="lib_cat"><?php echo $this->lang->line("biblio"); ?></label>
                                            <div class="nom col-sm-10">
                                                <select name="libCat"  class="form-control"  id="list-bib"></select>
                                                </br>
                                            </div>
                                            <label class="control-label col-sm-2" for="lib_sous_cat"><?php echo $this->lang->line("sous_lib"); ?></label>
                                            <div class="nom col-sm-10">
                                                <select name="libSousCat"  class="form-control"  id="lib-sous-cat"></select>
                                                </br>
                                            </div>

                                            <label class="control-label col-sm-2" for="job"><?php echo $this->lang->line("title"); ?></label>
                                            <div class="nom col-sm-10">
                                                <input name="job"  type="text" value="<?php echo set_value('job'); ?>" class="form-control" >
                                                </br>
                                            </div>
                                            <label class="control-label col-sm-2" for="vega"><?php echo $this->lang->line("categorie"); ?></label>
                                            <div class="nom col-sm-10">
                                                <input name="vega"  type="text" value="<?php echo set_value('vega'); ?>" class="form-control" >
                                                </br>
                                            </div>
                                            <label  class="heur_lib control-label col-sm-2" for="heure_lib"><?php echo $this->lang->line("hour"); ?></label>
                                            <div class="nom col-sm-10">
                                                <input name="heureLib"  type="text" value="<?php echo set_value('heure_lib'); ?>" class="form-control" >
                                                </br>
                                            </div>
                                            <label class="control-label col-sm-2" for="file"><?php echo $this->lang->line("file"); ?></label>
                                            <div class="tel col-sm-8">
                                                <input type="file" name="newFile"  class="form-control" >
                                                </br>
                                            </div>
                                            <div class="upload col-sm-2">
                                                <input class="btn btn-success pull-right" type="submit" value="<?php echo $this->lang->line("add"); ?>"/>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            
                        </div>
                        
                        
                    </div>
				

                </div> <!-- Fin partie du tableau -->
              </div>  <!-- ROW END -->
			  	<?php } ?>
				
				                <!-- Tab panes --> 
								<div class="row">
								
                <div style="overflow: auto;" class="panel tab-content">
		
                        <div  class="panel ">
                  <div class="panel-body" style="width: 95%">
  
  					<div class="bg-white" id="cnt-mainTablesBib">
                             <?php include('partial/table_biblio.php'); ?>
                    </div>
  
                        </div>
                        </div>
       
                </div> <!-- Fin partie du tableau -->
                </div><!-- ROW END -->
				             
								            
            </div>
        </div>
    </div>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateDocForm.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biblio.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script><!-- pour les listes liées -->
     <script type="text/javascript">
     $(document).ready(function(){
     $("#lib-sous-cat").chainedTo("#list-bib");
     });
     </script>
    <script type="text/javascript">
        $(document).ready(function(){
          $('.datepicker').datepicker({dateFormat: 'dd/mm/yy'});
        });
    </script>
    
	
    <?php include('include/footer.php'); ?>
