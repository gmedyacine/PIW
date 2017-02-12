<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

<script type="text/javascript">
    var dataUsers = <?php echo $users; ?>;
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
                            Notification
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-panel fade active in" id="sms">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <?php echo form_open('add-user'); ?>
                                    <div class="error"><?php echo validation_errors(); ?></div>
                                    <label class="control-label col-sm-2" for="username">Username</label>
                                    <div class="nom col-sm-10">
                                        <input name="username" type="text" class="form-control" >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="mail">E-mail </label>
                                    <div class="mail col-sm-10">
                                        <input name="mail" type="text" class="form-control" >
                                        </br>
                                    </div>
                                    <label class="control-label col-sm-2" for="tel">Téléphone </label>
                                    <div class="tel col-sm-10">
                                        <input name="tel" type="text" class="form-control" >
                                        </br>
                                    </div>
                                    <label class="control-label col-sm-2" for="admin">Admin </label>
                                    <div class="admin col-sm-10">
                                        <input name="admin"  type="checkbox" class="form-control float-left">
                                        </br>
                                    </div>
                                    <label class="control-label col-sm-2" for="notifMail">Notif mail </label>
                                    <div class="notif-mail col-sm-10">
                                        <input name="notifMail"  type="checkbox" checked="checked" class="form-control float-left">
                                        </br>
                                    </div>

                                    <label class="control-label col-sm-2" for="notifSms">Notif sms </label>
                                    <div class="notif-mail col-sm-10">
                                        <input name="notifSms"  checked="checked"  type="checkbox" class="form-control float-left">
                                        </br>
                                    </div>

                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <table id="tabUsers" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>UserName</th>
                                    <th>Mail</th>
                                    <th>Téléphone</th>
                                    <th>Notif mail</th>
                                    <th>Notif sms</th>
                                    <th>Admin</th>
                                    <th>Supprimer</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>    
                    </div>

                    <script src="<?php echo base_url(); ?>assets/js/users.js"></script>
                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->
            </div>
        </div>
        <?php include('include/footer.php'); ?>