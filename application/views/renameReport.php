<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var msg_required = "<?php echo $this->lang->line("required_field"); ?>";

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
                                <?php echo $this->lang->line("rename_report"); ?>
                            </div>

                            <div class="panel-body"> 

                                <div class="form-group">    

                                    <form action="<?php echo base_url(); ?>index.php/home/rename_report" method="post" id="renameReport">
                                        <div class="col-sm-12">
                                            <select  id="main_select" name="id_projection"  class="form-control chosen-select" tabindex="2" required="required" >

                                            </select>
                                            <br>
                                            <br>
                                            <input type="text" name="new_name" id="rename"  placeholder="<?php echo $this->lang->line("rename_report"); ?>" required="required" class="form-control">
                                            <br>
                                            <input type="submit" class="btn btn-primary pull-right" value="<?php echo $this->lang->line('save'); ?>" >
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
                        $.each(projections, function (i, item) {
                            $('#main_select').append($('<option>', {
                                value: i,
                                text: item
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