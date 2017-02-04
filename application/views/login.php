<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>﻿
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <!--[if IE]>
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
            <![endif]-->
        <title>login </title>
        <!-- BOOTSTRAP STYLE SHEET -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" />
        <!-- GOOGLE FONT FOR BETTER FONT STYLE -->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300' rel='stylesheet' type='text/css' />
        <!-- CUSTOM STYLE CSS -->
        <style type="text/css">
            body {

                background-color:f4f4f4;
                <!--   font-family: 'Open Sans Condensed', sans-serif; -->
                font-size:17px;
            }

            .pad-top {
                padding-top:20px;
            }


        </style>
    </head>
    <body>

        <div class="container-fluid">
            <header>
                <div class="row  pad-top ">
                    <div class="col-lg-4"> <!-- début div logo -->
                        <img src="assets/img/vivaldi-font-logo.png" alt=""  />
                    </div> <!-- fin div logo -->

                    <div class="col-lg-8"> 
                    </div> 
                </div> 
                <br /><br />
            </header>


            <!-- ROW END -->
            <div class="row ">
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                    <div class="panel panel-info panel-set">
                        <div class="panel-heading">
                            Entrer votre E-mail et mot de passe
                        </div>
                        <div class="panel-body"> 
                            <label> E-mail</label>
                            <input type="text" class="form-control" >
                            </br>
                            <label>Mot de passe </label>
                            <input type="password" class="form-control" >
                            </br>
                            <a href="#" class="btn btn-info pull-right">Connexion </a>
                            </br>
                            <hr/>
                            <label for="rememberme">
                                <input name="rememberme" type="checkbox" id="rememberme" value="forever"/>
                                Se souvenir de moi
                            </label>
                         </div>
                    </div>
                </div>
            </div>
            <!-- ROW END -->

        </div>
        <!-- CONATINER END -->

        <!-- REQUIRED SCRIPTS FILES -->
        <!-- CORE JQUERY FILE -->
        <script src="<?php echo base_url(); ?>/assets/js/jquery-1.11.1.js"></script>
        <!-- REQUIRED BOOTSTRAP SCRIPTS -->
        <script src="<?php echo base_url(); ?>/assets/js/bootstrap.js"></script>
    </body>

</html>
