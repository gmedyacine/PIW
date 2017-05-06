<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

    <body>

<div class="container-fluid">
    <header>
        <div class="row  pad-top ">
            <div class="col-lg-4"> <!-- début div logo -->
                <img src="<?php echo base_url(); ?>assets/img/logo-piw.png" alt=""/>
            </div> <!-- fin div logo -->

            <div class="col-lg-4">
                <select class="pull-right selectpicker" id="select-lang" data-width="fit">
                    <option
                        value="english" <?php if ($this->session->userdata('site_lang') == 'English') echo 'selected="selected"'; ?>
                        data-content='<span class="flag-icon flag-icon-gb"></span> English'>English
                    </option>
                    <option
                        value="portuguese" <?php if ($this->session->userdata('site_lang') == 'portuguese') echo 'selected="selected"'; ?>
                        data-content='<span class="flag-icon flag-icon-pt"></span> Portuguese'>Portuguese
                    </option>
                    <option
                        value="french" <?php if ($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>
                        data-content='<span class="flag-icon flag-icon-fr"></span> Français'>Fr
                    </option>
                </select>
            </div>
        </div>
        <br/><br/>
    </header>


    <!-- ROW END -->
    <div id="connexion" class="row ">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
            <div class="panel panel-info panel-set">
                <div class="panel-heading">
                    <?php echo $this->lang->line("title_login"); ?>
                </div>
                <div class="panel-body">
                    <div class="error"><?php echo validation_errors(); ?></div>
                    <?php echo form_open('connexion'); ?>
                    <label for="username">  <?php echo  $this->lang->line("username_connexion"); ?>:</label>
                    <input type="text" size="20" id="username" name="username" class="form-control"/>
                    <br/>
                    <label for="password"> <?php echo  $this->lang->line("password_connexion"); ?>:</label>
                    <input type="password" size="20" id="passowrd" name="password" class="form-control"/>
                    <br/>
                    <input class="btn btn-info pull-right" type="submit" value="Login"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ROW END -->

</div>
<?php include('include/footer.php'); ?>