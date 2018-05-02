<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
include('include/dataTables.php');
?>


<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";


    var twoCharts = <?php echo json_encode($twoCharts); ?>;

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
                    <div class="col-sm-12"> <!-- Début partie du tableau -->
                        <?php //var_dump($twoCharts) ; die; ?>
                        <div id="chartCompared">
                            <div class="row ">
                                <?php foreach ($twoCharts as $key => $chart) { ?>

                                    <div id="<?php echo "chart" . $chart['id_chart']; ?>" class="chart col-md-6 col-sm-12" style="margin-top:30px; height: 300px; min-width: 310px;max-width: 800px;">

                                    </div>

                                <?php } ?>
                            </div>

                        </div>

                        <fieldset id="filter_panel" class="group-border">


                        </fieldset>

                        <!-- Début titre du tableau et bouton create chart-->

                    </div>

                </div> <!-- fin pagination  -->

<!--                    <script src="<?php // echo base_url();  ?>assets/js/projection.js"></script>	-->
                <script src="https://code.highcharts.com/highcharts.js"></script>

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
                        $.each(twoCharts, function (key, element) {

                            Highcharts.chart('chart' + element.id_chart, {
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

                            $("#chart" + element.id_chart).click(function () {
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
