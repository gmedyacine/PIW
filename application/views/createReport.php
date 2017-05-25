<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');

?>

 <script type="text/javascript">
     var projections = <?php echo $projections; ?>;
	 var rpt_tables_json = <?php echo $rpt_tables_json; ?>;
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
                             
                                <?php echo form_open('home/create_report'); ?>
                                <div class="col-sm-12">
                                    <select  id="rpt_select" name="old_name"  class="form-control" >
                                         
                                       </select>
                                  
									  <br>
                                   <input type="text" name="new_name"  placeholder="<?php echo $this->lang->line("create_report"); ?>" required="required" class="form-control">
                                     <br>
								   <input type="submit" class="btn btn-info pull-right" value="<?php echo $this->lang->line('save'); ?>" >
                                </div>
								
                                
                                </form>    
                               
                            </div>
                           
                                                     
                        </div>
                    </div>
                  
                    </div>
                


            </div> <!-- fin pagination  -->
            
          
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
                value: item.Tables_in_piw,
                text: item.Tables_in_piw
            }));
        });
    }
	</script>

        </div> <!-- Fin partie du tableau -->
        <!-- ROW END -->

    </div>
<?php include('include/footer.php'); ?>