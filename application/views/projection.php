<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿
<script type="text/javascript">
    var projections = <?php echo $projections; ?>;
    var dataTable = <?php echo $dataTable; ?>;
    var idPrj = <?php echo $id_projection; ?>;

</script>
<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row ">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie du tableau -->
                <fieldset class="group-border">


                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <p>Date de début:<input type="text" class="datepicker" id="filtre" /></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <p>Date de fin:<input type="text" class="datepicker" id="filtre" /></p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <p>Filtre:<input type="text" id="filtre" /></p>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="row ">       <!-- Début titre du tableau et lien export excel-->
                    <hr/>  <!-- Séparation-->
                    <div class="col-6 pull-left">
                        <H2>Titre du tableau</H2>
                    </div>
                    <div class="col-6 pull-right">
                        <a class="btn icon-btn btn-success" href="#">
                            <span class="glyphicon btn-glyphicon glyphicon-share img-circle text-info"></span>
                            Export Execl
                        </a>
                    </div>
                </div> <!-- Fin titre du tableau et lien export excel-->

                <div id="mainTables" class="row "> <!-- Début tableau  -->

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Nom</th>
                                <th>Prenom</th>
                                <th>Psudo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>

                </div> <!-- Fin tableau -->

                <div class="row "> <!-- Début pagination  -->


                    <nav aria-label="...">
                        <ul class="pager">
                            <li><a href="#">Previous</a></li>
                            <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>

                            <li><a href="#">2</a></li>
                            <li><a href="#">Next</a></li>
                        </ul>
                    </nav>

                </div> <!-- fin pagination  -->
                <script src="<?php echo base_url(); ?>assets/js/projection.js"></script>
            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->

        </div>
        <?php include('include/footer.php'); ?>