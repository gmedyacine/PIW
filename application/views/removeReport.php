<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var rpt_allow_tables = <?php echo $rpt_allow_tables; ?>;
    var msg_required = "<?php echo $this->lang->line("required_field"); ?>";
    var report_categ_json = <?php echo $report_categ_json; ?>;
    var report_sous_categ_json = <?php echo $report_sous_categ_json; ?>;

</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>

        <?php // var_dump($projections); die; ?>
        <div class="am-content">
            <div class="main-content">
                <div class="col-md-12"> <!-- Début partie du tableau -->
                    <?php echo $this->session->flashdata('error-delete'); ?>
                    <?php echo $this->session->flashdata('msg-remove'); ?>
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo $this->lang->line("remove_report"); ?>
                            </div>

                            <div class="panel-body"> 

                                <div class="form-group">    

                                    <form action="<?php echo base_url(); ?>index.php/home/remove_report" method="post" id="renameReport" required>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select  id="rpt_select" name="old_name"  class="form-control chosen-select" tabindex="2" required="required" >
                                                    <option value="">-- <?php echo $this->lang->line('select_report'); ?> --</option>
                                                </select>
                                            </div>

                                            <br>
                                            <input type="submit" class="btn btn-primary pull-right" value="<?php echo $this->lang->line('delete'); ?>" >
                                        </div>


                                    </form>    

                                </div>

                            </div>
                        </div>

                    </div>



                </div> <!-- fin pagination  -->


                <script src="<?php echo base_url(); ?>assets/js/jquery.chained.min.js"></script><!-- pour les listes liées -->
                <script src="<?php echo base_url(); ?>assets/js/reportCateg.js"></script>
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
                    $(document).ready(function () {


                    });

                </script>
                <script type="text/javascript">
                    loadRpt();
                    function loadRpt() {
                        $.each(rpt_allow_tables, function (i, item) {
                            $('#rpt_select').append($('<option>', {
                                value: item.n,
                                text: item.table_name.substring(4) // substring(4) pour enlever "ipw_" au début du nom du rapport 
                            }));
                        });
                    }
                </script>


                <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateRenameReport.js"></script>

            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
    </div>
    <?php include('include/footer.php'); ?>