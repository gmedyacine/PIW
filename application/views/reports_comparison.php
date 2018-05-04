<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    var id_rept = <?php echo json_encode($id_rept); ?>;
    var dataTable = <?php echo json_encode($dataTable); ?>;
    var dataNameColonne = <?php echo json_encode($dataNameColonne); ?>;
    var charts = <?php echo json_encode($charts); ?>;
    var name_rept = [];

</script>

<?php //var_dump($projections); die ; ?>;
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->

        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <div class="row">
                    <h1 align="center" style="margin-top: -30;"><?php echo $this->lang->line("rept_comparison"); ?></h1>
                    <div class="col-sm-12"> <!-- Début col-sm-12 -->
                        <div id="chartCompared">
                            <div class="row ">
                                <?php for ( $i=0 ; $i<2 ; $i++) { ?>

                                    <div id="<?php echo "chart" . $charts[$i]['id_report']; ?>" class="chart col-md-6 col-sm-12" style="margin-top:30px; height: 300px; min-width: 310px;max-width: 800px;">

                                    </div>

                                <?php } ?>
                            </div>

                        </div>


                    </div> <!-- fin col-sm-12  -->
                </div>
                <div class="row">
                    <?php foreach ($id_rept as $id) { ?>
                        <div id="<?php echo "table_" . $id; ?>" class="col-md-6 col-sm-12"> <!-- Début col-sm-12 -->
                            <div>
                                <br>
                                <br>
                            </div>
                            <div  class=" panel panel-default widget widget-fullwidth widget-small ">
                                <table id="<?php echo "mainTables_" . $id; ?>" class="table table-striped table-hover table-fw-widget dataTable no-footer dt-responsive nowrap col-md-6 col-sm-12 " > 

                                    <div class="widget-head">
                                        <div  class=" pull-left clo-md-6">
                                            <div class="title"><h2 id="<?php echo "h2_" . $id; ?>"></h2></div>
                                        </div>
                                        <thead class="" > 

                                        </thead>



                                        <tbody> 


                                        </tbody> 
                                </table>
                            </div>
                        </div>  <?php } ?>

                </div> <!-- fin row  -->

                <script src="<?php echo base_url(); ?>assets/js/compare.js"></script>	
                <script src="<?php echo base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
                <script src="https://code.highcharts.com/highcharts.js"></script>

                <script>$('.dropdown-toggle').dropdown();
                </script>

                <script type="text/javascript">
                    $(document).ready(function () {
                        for (var i = 0; i < 2; i++) {

                            $('#h2_' + id_rept[i]).empty().append(name_rept[i]); // Nom du rapport

                            creatColonne(dataNameColonne[id_rept[i]], 'mainTables_' + id_rept[i]); // colonnes du tableau
                            
                            var tbody = $('<tbody></tbody>').empty();  //vider la table
                            $.each(dataTable[id_rept[i]], function (idObj, valData) { //reconstruire la table
                                var trData = $('<tr></tr>');
                                $.each(valData, function (id, val) {
                                    trData.append($('<td class="whiteSpace">' + val + '</td>'));
                                });
                                tbody.append(trData);
                            });
                            $('#mainTables_' + id_rept[i]).append(tbody);


                            $('#mainTables_' + id_rept[i]).DataTable(); // creation du dataTable
                        }



                        $(".dataTables_filter").addClass("hidden"); // hidden search input
                        $(".dataTables_length").addClass("hidden"); // hidden entry select



                    });
                </script>
                <script type="text/javascript">

                    $.each(charts, function (i, item) {
                        name_rept[i] = item.new_report_name;
                    });

                </script>

                <script type="text/javascript">
                    $(document).ready(function () {
                        $.each(charts, function (key, element) {

                            Highcharts.chart('chart' + element.id_report, {
                                chart: {
                                    type: element.chartType
                                },
                                title: {
                                    text: element.new_report_name
                                },
                                subtitle: {
                                    text: element.chartTitle
                                },
                                xAxis: {
                                    categories: element.xData
                                },
                                yAxis: {
                                    title: {
                                        text: element.chartY
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
                                series: element.series
                            });

                            $("#chart" + element.id_report).click(function () {
                                location.replace(base_url + "index.php/projection/" + element.id_report);
                            });
                        });
                    });
                </script>





            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
    </div></div>
<?php include('include/footer.php'); ?>
