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
                                <?php echo $this->lang->line("rename_report"); ?>
                            </div>

                            <div class="panel-body"> 

                                <div class="form-group">    

                                    <form action="<?php echo base_url(); ?>index.php/home/rename_report" method="post" id="renameReport" required>
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <select  id="main_select" name="old_name"  class="form-control chosen-select" tabindex="2" required="required" >
                                                    <option value="">-- <?php echo $this->lang->line('select_report'); ?> --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="new_name" id="rename"  placeholder="<?php echo $this->lang->line("rename_report"); ?>" required="required" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <div class="am-checkbox">
                                                    <input id="chartCheck" type="checkbox" name="chartCheck" value="chart" class="needsclick">
                                                    <label for="chartCheck"><?php echo $this->lang->line('genetate_chart'); ?></label>
                                                </div>
                                            </div>
                                            <div class="row" id="chart_config">
                                                <div class="form-group col-md-8">
                                                    <fieldset>
                                                        <legend>Chart Configuration</legend>
                                                        <div class="form-group col-md-2">
                                                            <label for="chartType" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('chart_type'); ?></label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <select  id="chartType" name="chartType" class="form-control " >
                                                                <option value="">-- <?php echo $this->lang->line('select_chart'); ?> --</option>
                                                                <option value="line">-- Courbe --</option>
                                                                <option value="column">-- historgamme --</option>
                                                                <option value="pie">-- Cercle --</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="chartTitle" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('chart_title'); ?></label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <input type="text" id="chartTitle" name="chartTitle"  placeholder="<?php echo $this->lang->line('chart_title'); ?>" class="form-control" />

                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="chartX" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('x_axis'); ?></label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <select id="chartX" name="chartX" class="form-control" >
                                                                <option value="">-- <?php echo $this->lang->line('select_X'); ?> --</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="chartY" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('y_axis'); ?></label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <select  id="chartY" name="chartY" class="form-control" >
                                                                <option value="">-- <?php echo $this->lang->line('select_Y'); ?> --</option>
                                                            </select> 
                                                        </div>
                                                        <div class="form-group col-md-2">
                                                            <label for="multi" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('multi_options'); ?></label>
                                                        </div>
                                                        <div class="form-group col-md-8">
                                                            <select  multiple id="multi" name="multi[]" class="form-control tags" >
                                                                <option value="">-- <?php echo $this->lang->line('select_options'); ?> --</option>
                                                            </select> 
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-4"></div>
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
                    $(document).ready(function () {
                        $(".am-checkbox").hide();
                        $("#chart_config").hide();
                        $('input[type="checkbox"]').click(function () {
                            if ($(this).prop("checked") == true) {
                                $("#chart_config").show();
                                $('#chartType').attr('required', 'required');
                                $('#chartTitle').attr('required', 'required');
                                $('#chartX').attr('required', 'required');
                                $('#chartY').attr('required', 'required');
                                $('#multi').attr('required', 'required');

                            } else if ($(this).prop("checked") == false) {
                                $("#chart_config").hide();
                                $('#chartType').removeAttr('required');
                                $('#chartTitle').removeAttr('required');
                                $('#chartX').removeAttr('required');
                                $('#chartY').removeAttr('required');
                                $('#multi').removeAttr('required');
                            }
                        });

                        $('#main_select').on('change', function () {
                            var rept = $("#main_select").find(":selected").val();
                            $.ajax({
                                type: "GET",
                                url: "<?php echo base_url(); ?>index.php/home/getColumns/",
                                dataType: 'json',
                                data: {rept_id: rept},
                                success: function (result) {
                                    $('#chartX').empty();
                                    $('#chartY').empty();
                                    $('#multi').empty();
                                    $.each(result, function (i, item) {

                                        $('#chartX').append($('<option>', {
                                            value: item,
                                            text: item
                                        }));
                                        $('#chartY').append($('<option>', {
                                            value: item,
                                            text: item
                                        }));
                                        $('#multi').append($('<option>', {
                                            value: item,
                                            text: item
                                        }));
                                    });
                                }
                            });
                            $.ajax({
                                type: "GET",
                                url: "<?php echo base_url(); ?>index.php/home/hasChart/",
                                dataType: 'json',
                                data: {rept_id: rept},
                                success: function (result) {
                                   if(result==null){
                                       $(".am-checkbox").show();
                                   }else{
                                    $(".am-checkbox").hide();   
                                   }                                
                                }
                            });

//                            $('#multi').on('click', function () {
//                                var rept = $("#main_select").find(":selected").val();
//                                var multi = $("#multi option:selected").last().val();
//                                $.ajax({
//                                    type: "GET",
//                                    url: "<?php //echo base_url(); ?>index.php/home/checkNumeric/",
//                                    dataType: 'json',
//                                    data: {
//                                        rept_id: rept,
//                                        col_name: multi
//                                    },
//                                    success: function (res) {
//                                        if (res == false) {
//                                            alert("This is not a numeric choice !");
//                                            $('#multi option:selected').last().prop('selected', false).trigger('chosen:updated').attr("disabled", true);
//                                        }
//                                    }
//                                });
//                            });
                        });
                    });

                </script>


                <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.16.0/jquery.validate.min.js"></script>
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateRenameReport.js"></script>

            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
    </div>
    <?php include('include/footer.php'); ?>