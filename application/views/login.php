<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

    <body>

        <div class="container-fluid">
            <header>
                <div class="row  pad-top ">
                    <div class="col-lg-4"> <!-- début div logo -->
                        <img src="<?php echo base_url(); ?>assets/img/logo-piw.png" alt=""  />
                    </div> <!-- fin div logo -->

                    <div class="col-lg-8"> 
                    </div> 
                </div> 
                <br /><br />
            </header>


            <!-- ROW END -->
            <div id="connexion" class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="panel panel-info panel-set">
                        <div class="panel-heading">
                            Entrer votre Login et mot de passe
                        </div>
                        <div class="panel-body"> 
                            <div class="error"><?php echo validation_errors(); ?></div>
                            <?php echo form_open('connexion'); ?>
                            <label for="username">Username:</label>
                            <input type="text" size="20" id="username" name="username" class="form-control"/>
                            <br/>
                            <label for="password">Password:</label>
                            <input type="password" size="20" id="passowrd" name="password" class="form-control"/>
                            <br/>
                            <input class="btn btn-info pull-right" type="submit" value="Login"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
  <?php    include('include/footer.php');   ?>