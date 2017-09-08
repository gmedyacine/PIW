<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var msg_required = "<?php echo $this->lang->line("required_field"); ?>";
    var report_categ_json = <?php echo $report_categ_json; ?>;
    var report_sous_categ_json = <?php echo $report_sous_categ_json; ?>;

</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>
        <?php echo $this->session->flashdata('msg-modif'); ?>
        <?php // var_dump($projections); die; ?>
        <div class="am-content">
            <div class="main-content">
                <div class="col-md-12"> <!-- Début partie du tableau -->
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo $this->lang->line("rename_category"); ?>
                            </div>

                            <div class="panel-body"> 

                                <div class="form-group">    

                                    <form action="<?php echo base_url(); ?>index.php/home/rename_category" method="post" id="renameReport" required>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select id="select_report_categ" name="report_categ_id" class="form-control" required >
                                                    <option value="">-- <?php echo $this->lang->line('select_categ'); ?> --</option>
                                                </select>
                                               
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="new_name" placeholder="<?php echo $this->lang->line("rename_category"); ?>" required="required" class="form-control">
                                            </div>

                              
                                            <br>
                                            <input type="submit" class="btn btn-primary pull-right" value="<?php echo $this->lang->line('save'); ?>" >
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
 

                </script>


                <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateRenameReport.js"></script>

            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
    </div>
    <?php include('include/footer.php'); ?>