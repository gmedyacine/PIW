<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
 <script type="text/javascript">
     var projections = <?php echo $projections; ?>
 </script>
    <body>

        <div class="container-fluid">
          <?php include('include/header.php'); ?>

            <!-- ROW END -->
             <div class="row content">
                       <!-- Colonne du Menu -->
                         <?php include('include/menu.php'); ?>
                <div class="col-sm-6">
                    <div class="panel panel-info panel-set">
                        <div class="panel-heading">
                            <?php echo $this->lang->line('main_menu'); ?>
                        </div>
                        </br>
                        <div class="panel-body"> 

                            <div class="form-group">        

                                <div class="col-sm-12">
                                    <select id="main_select" class="form-control" >
                                           <option value="0">-- <?php echo $this->lang->line('default_projection'); ?> --</option>
                                       </select>
                                </div>

                            </div>
                            </br>
                            </br>
                            </br>
                            </br>
                            <a href="#" id="valid_select" class="btn btn-info pull-right">Valider </a>
                            </br>


                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
  <?php    include('include/footer.php');   ?>