<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<script type="text/javascript">
    var data_categs =<?php echo $data_categs; ?>;
    var data_sous_categs =<?php echo $data_sous_categs; ?>;
</script>
<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW start -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>
            <div><?php echo $this->session->flashdata('msg'); ?> </div>
            <div class="col-md-9 "> <!-- Début partie des onglets -->
                <ul class="nav nav-tabs " role="tablist">
                    <li class="active">
                        <a href="#biblio" class="tab" role="tab" data-toggle="tab">
                            Ajouter Bibliothèque
                        </a>
                    </li>
                    <li>
                        <a href="#sousBiblio" class="tab" role="tab" data-toggle="tab">
                            Ajouter Sous-bibliothèque
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content bg-white">
                    <div class="tab-pane fade active in" id="biblio">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <?php echo form_open('add-biblio'); ?>

                                    <label class="control-label col-sm-2" for="nom">Nom</label>
                                    <div class="nom col-sm-10">
                                        <input name="nom" type="text"  required="required" class="form-control " >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="description">Description </label>
                                    <div class="desc col-sm-10">
                                        <input name="description" type="text" class="form-control " >
                                        </br>
                                    </div>



                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                    </div>

                                    </form>

                                </div>

                            </div>
                        </div>

                        <table id="tabCat" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Added_by</th>
                                    <th>Added_at</th>
                                    <th>Supprimer</th>

                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>   
                    </div>
                    <div  class="tab-pane fade" id="sousBiblio">
                        <div class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <?php echo form_open('add-sous-biblio'); ?>


                                    <label class="control-label col-sm-2" for="biblio">Bibliothèque</label>
                                    <div class="nom col-sm-10">
                                        <select id="list-bib" name="id_cat" class="form-control" required="required" >
                                        </select>
                                        </br>
                                    </div>

                                    <label class="control-label col-sm-2" for="nom">Nom</label>
                                    <div class="nom col-sm-10">
                                        <input name="nom" type="text"  required="required" class="form-control " >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="description">Description </label>
                                    <div class="desc col-sm-10">
                                        <input name="description" type="text" class="form-control " >
                                        </br>
                                    </div>
                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <table  id="sou_bib" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom (Sous-bibliothèque)</th>
                                    <th>Description</th>
                                    <th>Added_by</th>
                                    <th>Added_at</th>
                                    <th>Supprimer</th>

                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>   
                    </div>
                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->

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
