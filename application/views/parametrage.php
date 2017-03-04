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
            

                <!-- Tab panes -->

                  
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <div class="row"> <!-- end row Username, email and tel-->
                                        <?php echo form_open('add-user'); ?>
                                        <div class="error"><?php echo validation_errors(); ?></div>
                                        <label class="control-label col-sm-2" for="username">Username</label>
                                        <div class="nom col-sm-10">
                                            <input name="username" type="text" value="<?php echo set_value('username'); ?>" class="form-control" >
                                            </br>
                                        </div>

                                        </br>
                                        <label class="control-label col-sm-2" for="mail">E-mail </label>
                                        <div class="mail col-sm-10">
                                            <input name="mail" type="text" value="<?php echo set_value('mail'); ?>" class="form-control" >
                                            </br>
                                        </div>
                                        <label class="control-label col-sm-2" for="tel">Téléphone </label>
                                        <div class="tel col-sm-10">
                                            <input name="tel" value="<?php echo set_value('tel'); ?>" type="text" class="form-control" >
                                            <br>
                                            <br>
                                        </div>
                                    </div> <!-- end row Username, email and tel-->

                                    <div class="row"> <!-- start row admin and oper-->
                                        <div class="panel panel-success autorisation" style=" margin-right: 3em; margin-left:2em; ">
                                            <!-- Default panel contents --> 
                                            <div class="panel-heading" >Autorisation</div>
                                            <div class="panel-body " >                                  
                                                <div class="checkbox" style="margin-left:0em; text-align:left;">


                                                    <div class="admin col-sm-12">
                                                        <label  class="label_checkbox">
                                                            <input type="checkbox"    style=" position: relative;
                                                                   display: inline-block;
                                                                   border: 1px solid #a9a9a9;
                                                                   border-radius: .20em;
                                                                   width: 1.1em;
                                                                   height: 1.1em;
                                                                   float: left;
                                                                   margin-right: .2em;"
                                                                   class="form-control " />  Administrateur
                                                            <br>


                                                        </label>

                                                    </div>


                                                    <div class="admin col-sm-12">
                                                        <label class="label_checkbox">
                                                            <input type="checkbox"    style=" position: relative;
                                                                   display: inline-block;
                                                                   border: 1px solid #a9a9a9;
                                                                   border-radius: .20em;
                                                                   width: 1.1em;
                                                                   height: 1.1em;
                                                                   float: left;
                                                                   margin-right: .2em;" class="form-control " />  Opérateur
                                                            <br>

                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row admin and oper-->

                                    <div class="row">  <!-- start row email and sms-->    
                                        <div class="panel panel-info notification" style=" margin-right: 3em; margin-left:2em; ">
                                            <!-- Default panel contents --> 
                                            <div class="panel-heading" >Notification</div>
                                            <div class="panel-body " >  
                                                <div class="checkbox" style="margin-left:0em; text-align:left;">
                                                    <div class="admin col-sm-12">
                                                        <label class="label_checkbox">
                                                            <input type="checkbox"    style=" position: relative;
                                                                   display: inline-block;
                                                                   border: 1px solid #a9a9a9;
                                                                   border-radius: .20em;
                                                                   width: 1.1em;
                                                                   height: 1.1em;
                                                                   float: left;
                                                                   margin-right: .2em;" class="form-control " />  Notification E-mail
                                                            <br>

                                                        </label>
                                                    </div>

                                                    <div class="admin col-sm-12">
                                                        <label class="label_checkbox">
                                                            <input type="checkbox"    style=" position: relative;
                                                                   display: inline-block;
                                                                   border: 1px solid #a9a9a9;
                                                                   border-radius: .20em;
                                                                   width: 1.1em;
                                                                   height: 1.1em;
                                                                   float: left;
                                                                   margin-right: .2em;" class="form-control " />  Notification SMS
                                                            <br>

                                                        </label>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end row email and sms-->



                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>

                                    </div>

                                    </form>
                                </div>

                            </div> <!-- end form group-->
                          
                        </div> <!-- end panel-->
                          <div id="panel-table" class="panel panel-default">
                        <div class="panel-body">
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
                    </div>
                        <script src="<?php echo base_url(); ?>assets/js/users.js"></script>
                    </div> <!-- Fin partie du tableau -->
                    <!-- ROW END -->
                </div>
            </div>
            <?php include('include/footer.php'); ?>