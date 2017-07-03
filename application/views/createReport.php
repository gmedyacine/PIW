<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
 <link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var rpt_tables_json = <?php echo $rpt_tables_json; ?>;
	var msg_required = "<?php echo $this->lang->line("required_field"); ?>";
        var report_categ_json = <?php echo $report_categ_json; ?>;
			var report_sous_categ_json = <?php echo $report_sous_categ_json; ?>;
	
</script>
<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>
            <?php echo $this->session->flashdata('msg-modif'); ?> 

            <div class="col-md-6"> <!-- Début partie du tableau -->
                <div class="row">
                    <div class="panel panel-default panel-set">
                        <div class="panel-heading">
                            <?php echo $this->lang->line("create_report"); ?>
                        </div>

                        <div class="panel-body"> 
                            <div class="form-group">    
                                <form action="<?php echo base_url(); ?>index.php/home/create_report" method="post" id="createReport">
                                <div class="col-sm-12">
                                    									
																	   
                                    <select  id="rpt_select" name="old_name"  class="form-control chosen-select" tabindex="2" required>
                                           
                                    </select>
                                    <br>
                                    <br>
                                    <input type="text" name="new_name" id="create" placeholder="<?php echo $this->lang->line("create_report"); ?>" required="required" class="form-control">
                                    <br>
									<select id="select_report_categ" name="report_categ" class="form-control" required >
                                         <option value="">-- <?php echo $this->lang->line('select_categ'); ?> --</option>
                                    </select>
                                         <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('categ_not_found'); ?></p><a href="#" id="add_categ" data-toggle="modal" onclick=" $('#addCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
                                    <br>
								
                                   <select id="select_report_sous_categ" name="report_sous_categ" class="form-control" >
                                         <option value="">-- <?php echo $this->lang->line('select_sub_categ'); ?> --</option>
                                   </select>
                                         <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('sub_categ_not_found'); ?></p><a href="#" id="add_sous_categ" data-toggle="modal" onclick=" $('#addSubCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
                                   <br>
                                    <input type="submit" class="btn btn-info pull-right" value="<?php echo $this->lang->line('save'); ?>" >
                                </div>


                                </form>    

                            </div>
							<?php include('partial/addCateg.php'); ?>
            <?php include('partial/addSubCateg.php'); ?>

                        </div>
                    </div>

                </div>



            </div> <!-- fin pagination  -->
			 
	 
			 <script src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script><!-- pour les listes liées -->
             <script src="<?php echo base_url(); ?>assets/js/reportCateg.js"></script>
			 
	<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
             <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateCreateReport.js"></script>
			 
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                   $(".chosen-select").chosen({
			         search_contains: true
                  });
				});
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
            <script type="text/javascript">

                loadRpt();
                function loadRpt() {
                    $.each(rpt_tables_json, function (i, item) {
                        $('#rpt_select').append($('<option>', {
                            value: item.n,
                            text: item.table_name
                        }));
                    });
                }
            </script>

   <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
             <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateCreateReport.js"></script>
        </div> <!-- Fin partie du tableau -->
        <!-- ROW END -->

    </div>
    <?php include('include/footer.php'); ?>