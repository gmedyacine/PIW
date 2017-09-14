<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var rpt_tables_json = <?php echo $rpt_tables_json; ?>;
    var rpt_allow_tables = <?php echo $rpt_allow_tables; ?>;

    var msg_required = "<?php echo $this->lang->line("required_field"); ?>";
    var report_categ_json = <?php echo $report_categ_json; ?>;
    var report_sous_categ_json = <?php echo $report_sous_categ_json; ?>;

</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <!-- Colonne du Menu -->
        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <?php echo $this->session->flashdata('msg-modif'); ?> 

                <div class="col-md-12"> <!-- Début partie du tableau -->
                    <div class="row">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <?php echo $this->lang->line("create_report"); ?>
                            </div>

                            <div class="panel-body"> 
                                <div class="form-group">    
                                    <form action="<?php echo base_url(); ?>index.php/home/create_report" method="post" id="createReport">
                                        <div class="col-sm-12">

                                            <div class="form-group">								   
                                                <select  id="rpt_select" name="old_name"  class="form-control chosen-select" tabindex="2" required>
                                                    <option value="">-- <?php echo $this->lang->line('select_report'); ?> --</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="new_name" id="create" placeholder="<?php echo $this->lang->line("create_report"); ?>" required="required" class="form-control">
                                            </div> 
                                            <div class="form-group">
                                                <select id="select_report_categ" name="report_categ" class="form-control" required >
                                                    <option value="">-- <?php echo $this->lang->line('select_categ'); ?> --</option>
                                                </select>
                                                <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('categ_not_found'); ?></p><a href="#" id="add_categ" data-toggle="modal" onclick=" $('#addCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
                                            </div>
                                            <div class="form-group">
                                                <select id="select_report_sous_categ" name="report_sous_categ" class="form-control" >
                                                    <option value="">-- <?php echo $this->lang->line('select_sub_categ'); ?> --</option>
                                                </select>
                                                <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('sub_categ_not_found'); ?></p><a href="#" id="add_sous_categ" data-toggle="modal" onclick=" $('#addSubCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
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

                                            <div class="text-right">
                                                <input type="submit" class="btn btn-space btn-primary" value="<?php echo $this->lang->line('save'); ?>" >
                                            </div>

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
                <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>
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
                        $.each(rpt_allow_tables, function (i, item) {
                            $('#rpt_select').append($('<option>', {
                                value: item.n,
                                text: item.table_name
                            }));
                        });
                    }
                </script>

                <script type="text/javascript">
                    $(document).ready(function () {
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

                        $('#rpt_select').on('change', function () {
                            var rept = $("#rpt_select").find(":selected").val();
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

//                            $('#multi').on('click', function () {
//                                var rept = $("#rpt_select").find(":selected").val();
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
                <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/validateCreateReport.js"></script>
            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
    </div>
    <?php include('include/footer.php'); ?>