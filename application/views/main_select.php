<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
 <script type="text/javascript">
     var projections = <?php echo $projections; ?>
 </script>
    <body>

        <div class="am-wrapper">
          <?php include('include/header.php'); ?>

            <!-- ROW END -->
              
                        
             <?php include('include/menu.php'); ?>
             <div class="am-content">
             <div class="main-content">
                <div class="col-sm-6">
                    <div class="panel panel-primary">
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
            <!-- ROW END -->
</div>
        </div>
  <?php    include('include/footer.php');   ?>