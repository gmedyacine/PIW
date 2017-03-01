<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie des onglets -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-panel fade active in" >
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">


                                    <label class="control-label col-sm-2" for="file">Fichier </label>
                                    <div class="tel col-sm-8">
                                        <input type="text" class="form-control" >
                                        </br>
                                    </div>
                                    <div class="upload col-sm-2">
                                        <a href="#" class="btn btn-info pull-right">Upload</a>
                                    </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Calendrier</th>
                                    <th>Job</th>
                                    <th>Vega</th>
                                    <th>Fichier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>LUNDI_AU_SAMEDI</td>
                                    <td>JOB_1_UNIX</td>
                                    <td>Vega</td>
                                    <td>JOB_1_UNIX.doc</td>
                                    <td> <a href="#">Loop </a>|<a href="#"> télécharger </a>|<a href="#"> Supprimer </a></td>

                                </tr>
                                <tr>

                                    <td>LUNDI</td>
                                    <td>JOB_2_NT</td>
                                    <td>Vega</td>
                                    <td>JOB_2_NT.doc</td>
                                    <td> <a href="#">Loop </a>|<a href="#"> télécharger </a>|<a href="#"> Supprimer </a></td>


                                </tr>
                            </tbody>
                        </table>    
                    </div>


                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->
            </div>
        </div>
        <?php include('include/footer.php'); ?>