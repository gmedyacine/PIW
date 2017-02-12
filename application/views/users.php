<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

<script type="text/javascript">
    var users = <?php echo $users; ?>;
</script>
<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie des onglets -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#sms" role="tab" data-toggle="tab">
                            Notification Par SMS
                        </a>
                    </li>
                    <li><a href="#email" role="tab" data-toggle="tab">
                            <i class="fa fa-user"></i> Notification Par E-mail
                        </a>
                    </li>

                </ul>
            
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane fade active in" id="sms">
                    <div id="panel-table" class="panel panel-default">
                        <div class="panel-body">              

                            <div class="form-group">
                                <form action="#" method="post">

                                    <label class="control-label col-sm-2" for="nom">Nom</label>
                                    <div class="nom col-sm-10">
                                        <input type="text" class="form-control" >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="prenom">Prénom </label>
                                    <div class="prenom col-sm-10">
                                        <input type="text" class="form-control" >
                                        </br>
                                    </div>
                                    <label class="control-label col-sm-2" for="tel">Téléphone </label>
                                    <div class="tel col-sm-10">
                                        <input type="text" class="form-control" >
                                        </br>
                                    </div>

                                    <div class="add">
                                        <a href="#" class="btn btn-success pull-right">Ajouter</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Téléphone</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>Smith</td>
                                <td>3234445556</td>
                                <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </tr>
                            <tr>
                                <td>Mary</td>
                                <td>Moe</td>
                                <td>1234657654</td>
                                <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </tr>
                            <tr>
                                <td>July</td>
                                <td>Dooley</td>
                                <td>4356785435</td>
                                <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                            </tr>
                        </tbody>
                    </table>    
                </div>

                <script src="<?php echo base_url(); ?>assets/js/users.js"></script>
            </div> <!-- Fin partie du tableau -->
            <!-- ROW END -->
            </div>
        </div>
        <?php include('include/footer.php'); ?>