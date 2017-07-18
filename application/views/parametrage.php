<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php'); ?>﻿

<script type="text/javascript">
    var dataUsers = <?php echo $users; ?>;
</script>
<body>

    <div class="am-wrapper">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
         
            <?php include('include/menu.php'); ?>
<div class="am-content">
        <div class="main-content">
            <div class="row">
            <div class="col-sm-12">  <!-- Début partie des onglets -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="active">
                        <a href="#sms" role="tab" data-toggle="tab">
                            <?php echo $this->lang->line('notification'); ?>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-panel fade active in" id="sms">
                        <div id="panel-table" class="panel panel-default col-md-8 col-sm-12 col-xs-12">
                            <div class="panel-body form-horizontal">              

                                <div class="form-group">
                                    <?php echo form_open('add-user'); ?>
                                    <div class="error"><?php echo validation_errors(); ?></div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="username"><?php echo $this->lang->line('username'); ?></label>
                                    <div class="nom col-md-10 col-sm-6 col-xs-12">
                                        <input name="username" type="text" value="<?php echo set_value('username'); ?>" class="form-control" >
                                     
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="mail"><?php echo $this->lang->line('email'); ?> </label>
                                    <div class="mail col-md-10 col-sm-6 col-xs-12">
                                        <input name="mail" type="text" value="<?php echo set_value('mail'); ?>" class="form-control" >
                                        
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="tel"><?php echo $this->lang->line('tel'); ?> </label>
                                    <div class="tel col-md-10 col-sm-6 col-xs-12">
                                        <input name="tel" value="<?php echo set_value('tel'); ?>" type="text" class="form-control" >
                                        
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="admin"><?php echo $this->lang->line('admin'); ?> </label>
                                    <div class="admin col-md-10 col-sm-6 col-xs-12">
                                        <div class="am-checkbox">
                                        <input id="check1"  name="admin" value="1" type="checkbox" >
                                        <label for="check1"> </label>
                                       </div>
                                        
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="admin"><?php echo $this->lang->line('oper'); ?> </label>
                                    <div class="admin col-md-10 col-sm-6 col-xs-12">
                                        <div class="am-checkbox">
                                        <input id="check2"  name="admin" value="2" type="checkbox" >
                                        <label for="check2"> </label>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="notifMail"><?php echo $this->lang->line('notif_mail'); ?> </label>
                                    <div class="notif-mail col-md-10 col-sm-6 col-xs-12">
                                        <div class="am-checkbox">
                                        <input id="check3" name="notifMail"  type="checkbox" checked="checked" >
                                         <label for="check3"> </label>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="form-group">

                                    <label class="control-label col-md-2 col-sm-6 col-xs-12" for="notifSms"><?php echo $this->lang->line('notif_sms'); ?> </label>
                                    <div class="notif-mail col-md-10 col-sm-6 col-xs-12">
                                       
                                        <div class="am-checkbox">
                                        <input id="check4" name="notifSms"  checked="checked"  type="checkbox" >
                                        <label for="check4"> </label>
                                       </div>
                                    </div>
                                    </div>

                                    <div class="add ">
                                        <input class="btn btn-primary pull-right" type="submit" value="<?php echo $this->lang->line('add'); ?>"/>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <table id="tabUsers" class="table table-striped table-hover table-fw-widget dataTable no-footer">
                            <thead>
                                <tr>
                                    <th><?php echo $this->lang->line('username'); ?></th>
                                    <th><?php echo $this->lang->line('email'); ?></th>
                                    <th><?php echo $this->lang->line('tel'); ?></th>
                                    <th><?php echo $this->lang->line('notif_mail'); ?> </th>
                                    <th><?php echo $this->lang->line('notif_sms'); ?> </th>
                                    <th><?php echo $this->lang->line('admin'); ?></th>
                                    <th><?php echo $this->lang->line('delete'); ?></th>
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
        </div> </div>
        <?php include('include/footer.php'); ?>