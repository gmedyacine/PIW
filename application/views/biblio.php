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
                    <div style="overflow: auto;" class="tab-panel fade active in" >
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" enctype="multipart/form-data" >
                                        <div class="error">
                                            <?php echo validation_errors(); ?>
                                            <?php echo isset($error_upload) ? $error_upload['error'] : ""; ?>
                                        </div>
                                        <label class="control-label col-sm-2" for="calender">Calender</label>
                                        <div class="nom col-sm-10">
                                            <input name="calender" type="text" value="<?php echo set_value('calender'); ?>" class="form-control" >
                                            </br>
                                        </div>
                                        <label class="control-label col-sm-2" for="job">Job</label>
                                        <div class="nom col-sm-10">
                                            <input name="job" type="text" value="<?php echo set_value('job'); ?>" class="form-control" >
                                            </br>
                                        </div>
                                        <label class="control-label col-sm-2" for="vega">Vega</label>
                                        <div class="nom col-sm-10">
                                            <input name="vega" type="text" value="<?php echo set_value('vega'); ?>" class="form-control" >
                                            </br>
                                        </div>
                                        <label class="control-label col-sm-2" for="file">Fichier </label>
                                        <div class="tel col-sm-8">
                                            <input type="file" name="new_file" class="form-control" >
                                            </br>
                                        </div>
                                        <div class="upload col-sm-2">
                                            <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <table id="mainTablesBib" class="table table-striped" cellspacing="0" width="100%"> 
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
                                <?php
                                if ($fetch_data->num_rows() > 0) {

                                    foreach ($fetch_data->result() as $row) {
                                        ?>
                                        <tr>

                                            <td><?php echo $row->calendrier; ?></td>
                                            <td><?php echo $row->job; ?></td>
                                            <td><?php echo $row->vega; ?></td>
                                            <td><?php echo $row->nom_fichier; ?></td>
                                            <td> 
                                                <a class="fancybox" data-fancybox-type="iframe" href="http://docs.google.com/gview?url=<?php echo base_url(); ?>uploads/<?php echo $row->nom_fichier; ?>&embedded=true">Loop </a>|
                                                <a href="<?php echo base_url(); ?>index.php/home/download/<?php echo $row->nom_fichier; ?>"> télécharger </a>|
                                                <?php if ($role != 2) { ?>
                                                    <a href="<?php echo base_url(); ?>index.php/home/delete_data/<?php echo $row->id; ?>/<?php echo $row->nom_fichier; ?>" class="delete_data" "> Supprimer </a> 
                                                    <br>
                                                    <form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" enctype="multipart/form-data" >
                                                        <input type="file" name="new_file"  />
                                                        <input type="hidden" name="row_id" value="<?php echo $row->id; ?>" />
                                                        <input type="submit" class="btn btn-primary btn-xs" name="upload" value="Upload" />
                                                    </form>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                } else {
                                    ?>
                                    <tr>
                                        <td colspan="3"> Pas de données   </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>    
                    </div>
                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/biblio.js"></script>

        <?php include('include/footer.php'); ?>
