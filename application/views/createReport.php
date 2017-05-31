<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
 <link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
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
                                    <select  id="rpt_select" name="old_name"  class="form-control chosen-select" tabindex="2" required="required">
                                        <option value="">-- <?php echo $this->lang->line("select_report"); ?>--</option>
                                    </select>
                                    <br>
                                    <br>
                                    <input type="text" name="new_name" id="create" maxlength="18" placeholder="<?php echo $this->lang->line("create_report"); ?>" required="required" class="form-control">
									<span id="rchars" style="font-size: 12px; display: inline;">18</span><p style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('still_char'); ?></p>
                                    <br>
                                    <input type="submit" class="btn btn-info pull-right" value="<?php echo $this->lang->line('save'); ?>" >
                                </div>


                                </form>    

                            </div>


                        </div>
                    </div>

                </div>



            </div> <!-- fin pagination  -->
<script src="<?php echo base_url(); ?>assets/js/chosen.jquery.js"></script>
            <script type="text/javascript">
                $(document).ready(function () {
                   $('.chosen-select').chosen();
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
	<script type="text/javascript">
                $(document).ready(function () {		
			var maxLength = 18;
                    $('input#create').keyup(function() {
                        var textlen = maxLength - $(this).val().length;
                        $('#rchars').text(textlen);
                    });
					  });
            </script>

        </div> <!-- Fin partie du tableau -->
        <!-- ROW END -->

    </div>
    <?php include('include/footer.php'); ?>