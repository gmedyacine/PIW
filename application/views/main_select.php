<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
 <script type="text/javascript">
     var projections = <?php echo $projections; ?>
 </script>
    <body>

        <div class="container-fluid">
            <header>
                <div class="row  pad-top ">
                    <div class="col-lg-4"> <!-- début div logo -->
                        <img src="<?php echo base_url(); ?>assets/img/vivaldi-font-logo.png" alt=""  />
                    </div> <!-- fin div logo -->

                    <div class="col-lg-8"> 
                    </div> 
                </div> 
                <br /><br />
            </header>


            <!-- ROW END -->
             <div class="row ">
                <script src="<?php echo base_url(); ?>assets/js/home.js"></script> 
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
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
                            
                            <a href="<?php echo base_url()."index.php/logout" ?>" class="btn btn-info pull-left">Déconnecter </a>
                            <a href="#" class="btn btn-info pull-right">Valider </a>
                            </br>


                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
  <?php    include('include/footer.php');   ?>