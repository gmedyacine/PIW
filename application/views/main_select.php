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
             <div class="row ">
                       <!-- Colonne du Menu -->
                         <?php include('include/menu.php'); ?>
                <script src="<?php echo base_url(); ?>assets/js/home.js"></script> 
                <div class="col-md-9 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="panel panel-info panel-set">
                        <div class="panel-heading">
                            Liste des projections 
                        </div>
                        </br>
                        <div class="panel-body"> 

                            <div class="form-group">        

                                <div class="col-sm-12">
                                    <select id="main_select" class="form-control" >
                                           <option value="0">-- choisir une projection--</option>
                                       </select>
                                </div>

                            </div>
                            </br>
                            </br>
                            </br>
                            </br>
                            <a href="#" class="btn btn-info pull-right">Valider </a>
                            </br>


                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
  <?php    include('include/footer.php');   ?>