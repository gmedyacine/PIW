<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var calenders = <?php echo $calenders; ?>;
    var nbr_uploads = <?php echo $nbr_uploads; ?>;
</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->


        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <div class="col-sm-12">
                    <div class="panel panel-primary select-main-box">
                        <div class="panel-heading">
                            <?php echo $this->lang->line('main_menu'); ?>
                        </div>
                        </br>
                        <div class="panel-body"> 

                            <div class="form-group">        


                                <select id="main_select" class="form-control" >
                                    <option value="0">-- <?php echo $this->lang->line('default_projection'); ?> --</option>
                                </select>





                            </div>

                            <a href="#" id="valid_select" class="btn btn-primary pull-right"><?php echo $this->lang->line('valider'); ?> </a>

                        </div>
                    </div>
                </div>
                <div id="chart1" class="col-md-6 col-sm-12" style="height: 300px; min-width: 310px;max-width: 800px;">

                </div>
                <div id="chart2" class="col-md-6 col-sm-12" style="height: 300px; min-width: 310px;max-width: 800px;">

                </div>
                <!-- ROW END -->
            </div>
        </div>

        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script type="text/javascript">
    $(document).ready(function () {
        var chart = Highcharts.chart('chart1', {

            chart: {
                type: 'column'
            },

            title: {
                text: 'Highcharts responsive chart'
            },

            subtitle: {
                text: 'Resize the frame or click buttons to change appearance'
            },

            legend: {
                align: 'right',
                verticalAlign: 'middle',
                layout: 'vertical'
            },

            xAxis: {
                categories: ['Apples', 'Oranges', 'Bananas'],
                labels: {
                    x: -10
                }
            },

            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Amount'
                }
            },

            series: [{
                    name: 'Christmas Eve',
                    data: [1, 4, 3]
                }, {
                    name: 'Christmas Day before dinner',
                    data: [6, 4, 2]
                }, {
                    name: 'Christmas Day after dinner',
                    data: [8, 4, 3]
                }],

            responsive: {
                rules: [{
                        condition: {
                            maxWidth: 500
                        },
                        chartOptions: {
                            legend: {
                                align: 'center',
                                verticalAlign: 'bottom',
                                layout: 'horizontal'
                            },
                            yAxis: {
                                labels: {
                                    align: 'left',
                                    x: 0,
                                    y: -5
                                },
                                title: {
                                    text: null
                                }
                            },
                            subtitle: {
                                text: null
                            },
                            credits: {
                                enabled: false
                            }
                        }
                    }]
            }
        });
    });

        </script>
        <script type="text/javascript">
            $(document).ready(function () {
                Highcharts.chart('chart2', {
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: ' Average Files Upload'
                    },
//                    subtitle: {
//                        text: 'Source: WorldClimate.com'
//                    },
                    xAxis: {
                        categories: calenders
                    },
                    yAxis: {
                        title: {
                            text: 'Number of Uploads'
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
                    series: [{
                            name: 'Files',
                            data: nbr_uploads
                        }]
                });
            });

        </script>
        <?php include('include/footer.php'); ?>