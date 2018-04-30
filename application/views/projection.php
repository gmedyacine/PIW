<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>

<link href="<?php echo base_url(); ?>assets/css/bootstrap-chosen.css" rel="stylesheet" />
<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var dataTable = <?php echo $dataTable; ?>;
    var lastDate = <?php echo (string) $lastDate; ?>;
    var dataNameColonne = <?php echo $dataNameColonne; ?>;
    var chartReportId = <?php echo $chartReportId; ?>; 
   
    var id_projection = <?php echo $id_projection; ?>;
<?php if ($id_projection == $chartReportId) { ?>
        var chartConfig = <?php echo $chartConfig; ?>;
        var report;
        var chartType;
        var chartTitle;
        var chartX;
        var chartY;
        var multi;
        $.each(chartConfig, function (key, element) {
            report = element.new_report_name;
            chartType = element.chartType;
            chartTitle = element.chartTitle;
            chartX = element.chartX;
            chartY = element.chartY;
            multi = element.multi;
        });
        var series = <?php echo $series; ?>;
        var xData = <?php echo $xData; ?>;
<?php } ?>
  var projections = <?php echo projectionsFull; ?>;
</script>

<?php //var_dump($projections); die ; ?>;
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <?php echo $this->session->flashdata('msg-add'); ?> 
                <div class="row">
                    <div class="col-sm-12"> <!-- Début partie du tableau -->

                        <?php if ($id_projection == $chartReportId) { ?>
                            <div class="panel panel-default">
                                <div class="panel-body" id="chart_content">
                                    <div id ="chart" class = "col-md-12 col-sm-12" style = "height: 300px; width: 100%;">

                                    </div>
                                    <div id="chart1" style="width: 300px; height: 200px;"></div>
                                </div>
                            </div>
                        <?php } ?>
                        <fieldset id="filter_panel" class="group-border">

                            <div id="panel-table" class="panel panel-default">
                                <div class="panel-body project-filters">

                                    <div class="row">
                                        <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> <?php echo $this->lang->line("date_debut"); ?> </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" class="datepicker filtre_ligne form-control input-sm" id="date_debut_filtre"/>


                                                <span id="msg_error"><?php echo $this->lang->line("date_not_valide"); ?></span>
                                            </div>
                                        </div>


                                        <div class="form-group col-md-5 col-sm-6 col-xs-12">
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> <?php echo $this->lang->line("date_end"); ?> </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" class="datepicker filtre_ligne form-control input-sm" id="date_fin_filtre"/>


                                            </div>
                                        </div>
                                        <div class="form-group col-md-2 col-sm-6 col-xs-12" style="margin-top: 0px">
                                            <a id="filtre_date" href="#"  class="btn  btn-primary pull-left" style="width: 125.03;"><?php echo $this->lang->line("excute_filtre"); ?></a>
                                        </div>
                                    </div> <!--end row filter date-->
                                    <div class="row">
                                        <div class="form-group col-md-5 col-sm-6 col-xs-12" >
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label"> Search  </label>
                                            <div class="col-md-9 col-sm-8 col-xs-12">

                                                <input type="text" id="search"  class="form-control input-sm">

                                            </div>
                                        </div>

                                        <div  class="form-group col-md-5 col-sm-6 col-xs-12" >
                                            <label class="col-md-3 col-sm-4 col-xs-12 control-label " > Show </label>
                                            <div id="showData" class="col-md-9 col-sm-8 col-xs-12">

                                            </div>
                                        </div>
                                        <div id="colVis" class="form-group col-md-2 col-sm-6 col-xs-12">

                                        </div>
                                        <!--end row filtres dataTables-->

                                    </div>

                                    <div class="row">
                                        <!-- Debut btn export excel -->  
                                        <div class="btn-group col-md-12 col-sm-12 col-xs-12">

                                            <button class="btn btn-success dropdown-toggle " type="button" id="dropdownMenu1"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="width: 100%">
                                                <i class="icon icon-left s7-cloud-download"></i>
                                                <?php echo $this->lang->line("export_excel"); ?>
                                                <span class="caret"></span>
                                            </button>


                                            <ul class="dropdown-menu pull-right" aria-labelledby="dropdownMenu1"  role="menu" >
                                                <li><a id="exportExcelFiltre"
                                                       href="#"><?php echo $this->lang->line("export_excute_filtre"); ?></a></li>
                                                <li><a id="exportExcelToDay"
                                                       href="#"><?php echo $this->lang->line("export_last_day"); ?></a></li>
                                                <li><a id="exportExcelAll" href="#"><?php echo $this->lang->line("export_all"); ?></a>
                                                </li>

                                            </ul>
                                        </div>

                                        <!--fin btn export excel -->
                                    </div>
                                </div>
                            </div>


                        </fieldset>

                        <!-- Début titre du tableau et bouton create chart-->
                        <div id="panel-table" class="widget widget-fullwidth widget-small">
                            <div class="widget-head">
                                <div class=" pull-left clo-md-6">
                                    <div class="title"><h2>Titre du tableau</h2></div>
                                </div> 

                                <?php if ($id_projection != $chartReportId) { ?>
                                    <div class=" pull-right clo-md-3">
                                        <div> <button class="btn btn-primary chart_btn" type="button" data-toggle="modal"
                                                      onclick="$('#createChart').modal('show');">
                                                <i class="icon icon-left s7-graph"></i>
                                                <?php echo $this->lang->line('genetate_chart'); ?>
                                            </button></div>
                                    </div>
                                <?php } ?>

                                <div class=" pull-right clo-md-3" style="margin-right: 7px">
                                    <div> <button class="btn btn-success" type="button" id="filter_btn" >
                                            <i class="icon icon-left s7-filter"></i>
                                            <?php echo $this->lang->line('filter'); ?>
                                        </button></div>
                                </div>
                                
                                 <div class=" pull-right clo-md-3" style="margin-right: 7px">
                                  <div> <button class="btn btn-success" type="button"  data-toggle="modal"
                                                      onclick="$('#compare').modal('show');">
                                            <i class="icon icon-left s7-display1"></i>
                                            <?php echo $this->lang->line('compare'); ?>
                                            
                                        </button></div>
                                </div>

                                <div class="clear"></div>
                            </div>  <!-- Fin titre du tableau et lien export excel-->

                            <table id="mainTables" class="table table-striped table-hover table-fw-widget dataTable no-footer dt-responsive nowrap noExl" > 
                                <thead class="" > 

                                </thead>
                                <tbody> 


                                </tbody> 
                            </table>

                        </div>
                        <?php include('partial/editChart.php'); ?>
                        <?php include('partial/createChart.php'); ?>
                        <?php include('partial/compare.php'); ?>

                    </div> <!-- fin pagination  -->

                    <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>	
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>

                    <script>$('.dropdown-toggle').dropdown();
                    </script>
                    
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
                    loadRpt();
                    function loadRpt() {
                        $.each(projections, function (i, item) {
                            $('#rpt_select').append($('<option>', {
                                value: item.n,
                                text: item.new_report_name 
                            }));
                        });
                    }
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

                            $("#filter_panel").addClass("hidden").hide();
                            $('#filter_btn').html("<i class='icon icon-left s7-filter'></i>Show Filter");
                            $('#filter_btn').click(function () {
                                if ($("#filter_panel").hasClass("hidden") == true) {
                                    $("#filter_panel").removeClass("hidden").show();
                                    $(this).html("<i class='icon icon-left s7-filter'></i>Hide Filter");
                                } else {
                                    $("#filter_panel").addClass("hidden").hide();
                                    $(this).html("<i class='icon icon-left s7-filter'></i>Show Filter");
                                }

                            });
                        });
                    </script>
                    <script type="text/javascript">
                        $(document).ready(function () {
                            $("#createChart").draggable({// pour pouvoir deplacer le modal
                                handle: ".modal-header"
                            });
                            $("#editChart").draggable({// pour pouvoir deplacer le modal
                                handle: ".modal-header"
                            });
                        });

                    </script>

                    <script type="text/javascript">
                        $(document).ready(function () {

                            Highcharts.setOptions({
                                lang: {
                                    editBtn: "Edit",
                                    deleteBtn: "Delete"
                                }
                            });
                            function request() {//1
                                return $.ajax({
                                    url: "<?php echo base_url(); ?>index.php/home/updateSeries/",
                                    type: "GET",
                                    async: true,
                                    dataType: "json",
                                    data: {rept_id: id_projection}
                                });
                            }
                            var options = {
                                chart: {
                                    renderTo: "chart",
                                    type: chartType,
                                    events: {// (3)
                                        load: function () {
                                            var multiSelect = multi.split(',');
                                            var markers = [];
                                            for (i = 0; i < multiSelect.length; i++) {
                                                markers[i] = this.series[i];
                                            }
                                            var xData = this.xAxis[0];
                                            setInterval(function () {
                                                request().done(function (point) {
                                                    for (i = 0; i < multiSelect.length; i++) {
                                                        markers[i].update({
                                                            name: point.series[i].name,
                                                            data: point.series[i].data
                                                        });
                                                    }
                                                    xData.update({
                                                        categories: point.XData

                                                    });
                                                });
                                            }, 5000);
                                        }

                                    }
                                },
                                title: {
                                    text: report
                                },
                                subtitle: {
                                    text: chartTitle
                                },

                                xAxis: {
                                    categories: []
                                },
                                yAxis: {
                                    title: {
                                        text: chartY
                                    }
                                },
                                plotOptions: {
                                    line: {
                                        dataLabels: {
                                            enabled: true
                                        },
                                        enableMouseTracking: true
                                    }
                                },
                                series: [],
                                exporting: {
                                    buttons: {
                                        'edit': {
                                            _id: 'edit',
                                            symbol: 'url(<?php echo base_url(); ?>assets/img/edit.png)',
                                            _titleKey: 'edit',
                                            symbolX: 20,
                                            symbolY: 18,
                                            x: -45,
                                            symbolFill: '#B5C9DF',
                                            hoverSymbolFill: '#779ABF',
                                            _titleKey: "editBtn",
                                            onclick: function () {
                                                $('#editChart').modal('show');
                                            }
                                        },
                                        'delete': {
                                            _id: 'delete',
                                            symbol: 'url(<?php echo base_url(); ?>assets/img/delete.png)',
                                            symbolX: 20,
                                            symbolY: 18,
                                            x: -88,
                                            symbolFill: '#B5C9DF',
                                            hoverSymbolFill: '#779ABF',
                                            _titleKey: "deleteBtn",
                                            onclick: function () {
                                                if (confirm('delete chart')) {
                                                    $.ajax({
                                                        url: base_url + "index.php/delete-chart/" + id_projection,
                                                        type: "GET"
                                                    }).done(function (data) {
                                                        location.replace(base_url + "index.php/projection/" + id_projection);
                                                    });
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                            $(function () {//2
                                request().done(function (point) {
                                    options.series = point.series;
                                    options.xAxis.categories = point.XData;
                                    var chart = new Highcharts.Chart(options);

                                });
                            });
                        });

                    </script>
                    

    

                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->

            </div>
        </div></div>
    <?php include('include/footer.php'); ?>
