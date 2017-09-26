<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');

?>﻿
   
<body>
    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW start -->

        <!-- Colonne du Menu -->
        <?php include('include/menu.php'); ?>


        <?php echo $this->session->flashdata('msg-add'); ?> 
        <div class="am-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-sm-12"> <!-- Début partie des onglets -->
                        <ul class="nav nav-tabs " role="tablist">
                            <li class="active">
                                <a data-target="#biblio" class="tab" role="tab" data-toggle="tab">
                                    <?php echo $this->lang->line("add_lib"); ?> 
                                </a>
                            </li>
                            <li>
                                <a data-target="#sousBiblio" class="tab" role="tab" data-toggle="tab">
                                    <?php echo $this->lang->line("add_sub_lib"); ?> 
                                </a>
                            </li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content bg-white ">
                            <div class="tab-pane fade active in" id="biblio">
                                <div id="panel-table" class="panel panel-default col-md-11 col-sm-12 col-xs-12">
                                    <div class="panel-body form-horizontal">              

                                        <div class="form-group">
                                            <?php echo form_open('add-biblio'); ?>

                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-6 col-xs-12sm-2" for="nom"><?php echo $this->lang->line("name"); ?> </label>
                                                <div class="nom col-md-10 col-sm-6 col-xs-12">
                                                    <input name="nom" type="text"  required="required" class="form-control " >

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="description"><?php echo $this->lang->line("description"); ?>  </label>
                                                <div class="desc col-md-10 col-sm-6 col-xs-12">
                                                    <input name="description" type="text" class="form-control " >

                                                </div>
                                            </div> 

                                            <div class="add ">
                                                <input class="btn btn-primary pull-right" type="submit" value="<?php echo $this->lang->line("add"); ?>"/>
                                            </div>

                                            </form>

                                        </div>

                                    </div>
                                </div>

                                <table id="tabCat" class="table table-striped table-hover table-fw-widget dataTable no-footer dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line("name"); ?></th>
                                            <th><?php echo $this->lang->line("description"); ?></th>
                                            <th><?php echo $this->lang->line("added_by"); ?></th>
                                            <th><?php echo $this->lang->line("added_at"); ?></th>
                                            <th><?php echo $this->lang->line("delete"); ?></th>
                                            <th><?php echo $this->lang->line("update"); ?></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>   
                            </div>
                            <div  class="tab-pane fade" id="sousBiblio">
                                <div class="panel panel-default col-md-11 col-sm-12 col-xs-12">
                                    <div class="panel-body form-horizontal">              

                                        <div class="form-group">
                                            <?php echo form_open('add-sous-biblio'); ?>

                                            <div class="form-group"> 

                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="biblio"><?php echo $this->lang->line("bibliotheque"); ?></label>
                                                <div class="nom col-md-10 col-sm-6 col-xs-12">
                                                    <select id="list-bib" name="id_cat" class="form-control" required="required" >
                                                      
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="form-group">

                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="nom"><?php echo $this->lang->line("name"); ?></label>
                                                <div class="nom col-md-10 col-sm-6 col-xs-12">
                                                    <input name="nom" type="text"  required="required" class="form-control " >

                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-md-2 col-sm-6 col-xs-12" for="description"><?php echo $this->lang->line("description"); ?> </label>
                                                <div class="desc col-md-10 col-sm-6 col-xs-12">
                                                    <input name="description" type="text" class="form-control " >

                                                </div>
                                            </div>
                                            <div class="add ">
                                                <input class="btn btn-primary pull-right" type="submit" value="<?php echo $this->lang->line("add"); ?>"/>
                                            </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <table  id="sou_bib" class="table table-striped dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th><?php echo $this->lang->line("name"); ?> (<?php echo $this->lang->line("sous_lib"); ?>)</th>
                                            <th><?php echo $this->lang->line("description"); ?></th>
                                            <th><?php echo $this->lang->line("added_by"); ?></th>
                                            <th><?php echo $this->lang->line("added_at"); ?></th>
                                            <th><?php echo $this->lang->line("delete"); ?></th>
<!--                                            <th><?php //echo $this->lang->line("update"); //la partie update  ?></th>-->

                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>   
                            </div>
                        </div> <!-- Fin partie du tableau -->
                        <!-- ROW END -->
                        <!-- Modal -->
                        <?php include('partial/renameCateg.php'); ?>
                        <?php include('partial/renameSubCateg.php'); ?>
                    </div>

                </div>
            </div>
        </div>
        
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
   
    <script type="text/javascript">

        $(document).ready(function () {

            window.setTimeout(function () {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                    $(this).remove();
                });
            }, 1000);
        });
        
    </script>
    <script>
           $(function () {
                var lastTab = localStorage.getItem('lastTab');
                 var select;
                $('.container, .tab-content').removeClass('hidden');
                if (lastTab) {
                    $('[data-target="' + lastTab + '"]').tab('show');
                    //select = $("#list-bib").find(":selected").val();
                }
                $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                    localStorage.setItem('lastTab', $(this).data('target'));
                   
                    
                });
//                 document.getElementById("list-bib").onchange = function() {
//     localStorage['list-bib'] = document.getElementById("list-bib").value;
//    }
//    window.onload= function(){
//        if(localStorage['list-bib'])
//            document.getElementById("list-bib").value = localStorage['list-bib'];
//    }

//                // On submit
//var id_cat = $('#list-bib').val()
//localStorage.setItem('storedPickup', id_cat);
//
//// On the pages that have the select box
//jQuery(document).ready(function () {
//  var loadedPickup = localStorage.getItem('storedPickup');
//  $('#id_cat').val(loadedPickup);
//});


        
    });
        </script>
 <script src="<?php echo base_url(); ?>assets/js/categ.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/functions.js"></script>
    <?php include('include/footer.php'); ?>
