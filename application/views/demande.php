<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

<script type="text/javascript">
    var allDemandes_json = <?php echo $allDemandes_json; ?>;

</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW start -->
         
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <?php echo $this->session->flashdata('msg-success'); ?>
        <div class="am-content">
        <div class="main-content">
            <div class="row">
            <div class="col-sm-12"> <!-- Début partie des onglets -->
                
              
                <ul class="nav nav-tabs">

                    <li class="active"><a data-toggle="tab" href="#demande" class="tab"><?php echo $this->lang->line("demande_specifique"); ?></a></li>
                    <?php if ($role == 1) { ?>
                    <li><a data-toggle="tab" href="#listeDemandes" class="tab" ><?php echo $this->lang->line("liste_des_demandes"); ?></a></li>
                    <?php } ?>
                </ul>
                

                <div class="tab-content ">

                    <div id="demande" class="tab-pane tab-panel fade in active">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body form-horizontal col-md-8 col-sm-12 col-xs-12">
                              
                                <div class="form-group">
                               
                                   <?php echo form_open('home/addDemande'); ?>
                                    <!--<form action="#" method="post"> -->
                                    <div class="form-group">

                                        <label class="control-label col-sm-2" for="objet"><?php echo $this->lang->line("objet_de_demande"); ?></label>
                                        <div class="nom col-sm-10">
                                            <input name="objet" type="text"  required="required" class="form-control " >
                                            
                                        </div>
                                        </div>

                                        <div class="form-group">
                                        <label class="control-label col-sm-2" for="description"><?php echo $this->lang->line("message"); ?> </label>
                                        <div class="desc col-sm-10">
                                            <textarea rows="8" name="message" required="required"  class="form-control " > </textarea>
                                            
                                        </div>
                                        </div>



                                        <div class="add">
                                            <input class="btn btn-primary pull-right" type="submit" value="<?php echo $this->lang->line("envoyer"); ?>"/>
                                        </div>
                                        

                                    </form>
                                   
                                </div>

                            </div>
                            <div class="clear"></div>
                        </div>
      
                    </div>
               <?php if ($role == 1) { ?>    
               <div class="tab-pane tab-panel fade" id="listeDemandes">
                   <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title"><?php echo $this->lang->line("liste_des_demandes"); ?></h3>
                <div class="pull-right">
                    <button class="btn btn-primary  btn-filter"><span class="s7-filter"></span> Filter</button>
                </div>
            </div>
            <table id="tabDemande" class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="<?php echo $this->lang->line("objet_de_demande"); ?>" disabled></th>
                        <th><input type="text" class="form-control" placeholder="<?php echo $this->lang->line("message"); ?>" disabled></th>
                        <th><input type="text" class="form-control" placeholder="<?php echo $this->lang->line("added_by"); ?>" disabled></th>
                        <th><input type="text" class="form-control" placeholder="<?php echo $this->lang->line("added_at"); ?>" disabled></th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
                    </div>
                    <?php } ?>
                </div>

                <!-- Fin partie du tableau -->
                <!-- ROW END -->

            </div>

        </div>
    </div>
</div></div>
    <script type="text/javascript">

    $(document).ready(function () {

        window.setTimeout(function () {
            $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                $(this).remove();
            });
        }, 1000);

    });
    </script>

 <script src="<?php echo base_url(); ?>assets/js/table.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/demande.js"></script>
   
    <?php include('include/footer.php'); ?>
