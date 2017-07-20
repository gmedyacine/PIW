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
    <div class="am-wrapper">

        <?php include('include/header.php'); ?>
        <?php include('include/dataTables.php'); ?>
        <?php include('include/fancy.php'); ?> 
        <!-- ROW END -->
         
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>
            <div class="am-content">
           <div class="page-head">
          <h2>Panels</h2>
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">UI Elements</a></li>
            <li class="active">Panels</li>
          </ol>
        </div>
        <div class="main-content">
		
            <div class="row">
            <div class="col-sm-12"> <!-- Début partie des onglets -->

                <!-- Tab panes -->
				<?php if ($role != 2) { ?>
				 
				
                <div class="panel tab-content">
				 
                    <div style="overflow: auto;" class="tab-panel fade active in" >
                        <button type="button"  id="show-form" class="btn btn-primary"><?php echo $this->lang->line("add_document"); ?></button>
                        <div id="panel-table" class="panel col-md-11 col-sm-12 col-xs-12" style="display: none; margin-right: 0 !important">
                            <div class="panel-body form-horizontal" style="width: 100%">              
                               
                                    <div class="form-group">
                                        <form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" id="addDocForm" enctype="multipart/form-data" role="form" data-parsley-validate="" novalidate="" class="form-horizontal" >
                                            <div class="error">
                                                <?php echo validation_errors(); ?>
                                                <?php echo isset($error_upload) ? $error_upload['error'] : ""; ?>
                                            </div>
                                            <div class="form-group">
                                            <label  class="label_calender control-label col-md-2 col-sm-6 col-xs-12" for="calender"><?php echo $this->lang->line("calendar"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12 datetimepicker input-group ">
                                                <input name="calender"  type="text"  value="<?php echo date('d/m/Y ', time())?>" class="form-control datepicker" >
                                                <span class="input-group-addon btn btn-primary"><i class="icon-th s7-date"></i>
                                            </div>
                                     
                                            </div>
                                           <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-6 col-xs-12" for="lib_cat"><?php echo $this->lang->line("biblio"); ?></label>
                                            <div class="col-md-10 col-sm-6 col-xs-12">
                                                <select name="libCat"  class="form-control"  id="list-bib"></select>
                                                 
                                            </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="lib_sous_cat"><?php echo $this->lang->line("sous_lib"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12">
                                                <select name="libSousCat"  class="form-control"  id="lib-sous-cat"></select>
                                                 
                                            </div>
                                             </div>
                                             <div class="form-group">

                                            <label class="control-label col-md-2 col-sm-6 col-xs-12" for="job"><?php echo $this->lang->line("title"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12">
                                                <input name="job"  type="text" value="<?php echo set_value('job'); ?>" required="required" class="form-control" >
                                                
                                            </div> </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-6 col-xs-12" for="vega"><?php echo $this->lang->line("categorie"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12">
                                                <input name="vega"  type="text" value="<?php echo set_value('vega'); ?>" required="required" class="form-control" >
                                                 
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label  class="heur_lib control-label col-md-2 col-sm-6 col-xs-12" for="heure_lib"><?php echo $this->lang->line("hour"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12">
                                                <input name="heureLib"  type="text" value="Document" class="form-control" >
                                                 
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label class="control-label col-md-2 col-sm-6 col-xs-12" for="file"><?php echo $this->lang->line("file"); ?></label>
                                            <div class=" col-md-10 col-sm-6 col-xs-12">
                                                <input type="file"  name="newFiles[]" class="form-control" multiple/>
                                             
                                            </div>
                                            </div>
                                            <div class="upload text-right">
                                                <input class="btn btn-primary" type="submit" name="fileSubmit" value="<?php echo $this->lang->line("add"); ?>"/>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            
                        </div>
                        
                        
                    </div>
				

                </div> 
<div class="clear"></div>
                <!-- Fin partie du tableau -->
                <!-- ROW END -->
			  	<?php } ?>
				
				                <!-- Tab panes --> 
								 
								
                <div style="overflow: auto;" class="panel tab-content">
		
                        <div  class="panel ">
                  <div class="panel-body">
  
  					<div class="bg-white" id="cnt-mainTablesBib">
                             <?php include('partial/table_biblio.php'); ?>
                    </div>
  
                        </div>
                        </div>
       
                </div> <!-- Fin partie du tableau -->
                 <!-- ROW END -->
				             
								            
            </div>
        </div>
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
