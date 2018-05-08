<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
</script>
<body>
    <?php //var_dump($allCharts); die;?>
    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->


        <?php include('include/menu.php'); ?>
        <div class="am-content">
            <div class="main-content">
                <div class="col-sm-12">
                    <div class="panel panel-primary select-main-box">
                        <div class="panel-heading">
                            <?php echo str_replace('%20', ' ', $error); ?>
                        </div>
                        </br>
                        <div class="panel-body"> 

                            <div class="form-group">        
                                <h4 align='center'><?php echo $this->lang->line('verify_data'); ?> </h4>

                            </div>
                        </div>
                    </div>


                    <!-- ROW END -->
                </div>
            </div>


            <?php include('include/footer.php'); ?>
