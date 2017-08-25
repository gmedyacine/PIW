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
                                <a href="#biblio" class="tab" role="tab" data-toggle="tab">
                                    <?php echo $this->lang->line("add_lib"); ?> 
                                </a>
                            </li>
                            <li>
                                <a href="#sousBiblio" class="tab" role="tab" data-toggle="tab">
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
                                            <th><?php echo $this->lang->line("update"); ?></th>

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
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url(); ?>assets/js/categ.js"></script>
    <script type="text/javascript">

        $(document).ready(function () {

            window.setTimeout(function () {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                    $(this).remove();
                });
            }, 1000);

        });
    </script>

    <?php include('include/footer.php'); ?>
