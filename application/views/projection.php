<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>

<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var dataTable = <?php echo $dataTable; ?>;
    var lastDate = <?php echo (string) $lastDate; ?>;
    var dataNameColonne = <?php echo $dataNameColonne; ?>;
    var chartReportId = <?php echo $chartReportId; ?>;
    var id_projection = <?php echo $id_projection; ?>;
    var chartConfig = <?php echo $chartConfig; ?>;
    var chartType;
    var chartX;
    var chartY;
    var multi;
    $.each(chartConfig, function (key, element) {
        chartType = element.chartType;
        chartX = element.chartX;
        chartY = element.chartY;
        multi = element.multi;
    });

</script>

<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-12"> <!-- Début partie du tableau -->
                        <fieldset class="group-border">

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
                        <?php if ($id_projection == $chartReportId) { ?>
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="chart" class="col-md-12 col-sm-12" style="height: 300px; width: 100%;">

                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        <!-- Début titre du tableau et lien export excel-->
                        <div id="panel-table" class="widget widget-fullwidth widget-small">
                            <div class="widget-head">
                                <div class=" pull-left ">
                                    <div class="title"><h2>Titre du tableau</h2></div>
                                </div> 

                                <div class="clear"></div>

                            </div>  <!-- Fin titre du tableau et lien export excel-->

                            <table id="mainTables" class="table table-striped table-hover table-fw-widget dataTable no-footer dt-responsive nowrap" > 
                                <thead class="" > 

                                </thead>
                                <tbody> 


                                </tbody> 
                            </table>

                        </div>
                        <?php include('partial/editChart.php'); ?>

                    </div> <!-- fin pagination  -->

                    <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>	
                    <script src="https://code.highcharts.com/highcharts.js"></script>
                    <script src="https://code.highcharts.com/modules/exporting.js"></script>

                    <script>$('.dropdown-toggle').dropdown();
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

                            Highcharts.setOptions({
                                lang: {
                                    editBtn: "Edit",
                                    deleteBtn: "Delete"
                                }
                            });
                            Highcharts.chart('chart', {
                                chart: {
                                    type: chartType
                                },
                                title: {
                                    text: 'Monthly Average Temperature'
                                },
                                subtitle: {
                                    text: 'Source: WorldClimate.com'
                                },
                                xAxis: {
                                    categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
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
                                        enableMouseTracking: false
                                    }
                                },
                                series: [{
                                        name: 'Tokyo',
                                        data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
                                    }, {
                                        name: 'London',
                                        data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
                                    }],
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
                            });
                        });


                    </script>

                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->

            </div>
        </div></div>
    <?php include('include/footer.php'); ?>
