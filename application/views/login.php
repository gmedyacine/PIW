<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

    <body class="am-splash-screen">

<div class="container-fluid">
    <header>
        <div class="row  pad-top ">
           

            <div class="col-lg-4">
                <select class="pull-right " id="select-lang" data-width="fit">
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
    <!--<div id="connexion" class="row ">
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
    </div>-->
	
	
	
	
	
    <!-- ROW END -->

</div>


<div id="connexion" class="am-wrapper am-login">
      <div class="am-content">
        <div class="main-content">
          <div class="login-container">
            <div class="panel panel-default">
              <div class="panel-heading"><img src="<?php echo base_url(); ?>assets/img/logo-piw.png" alt="C"  class="logo-img"><span><?php echo $this->lang->line("title_login"); ?></span></div>
              <div class="panel-body">
                <div id="connexion" class="form-horizontal">
				
                  <div class="login-form">
				  <div class="error"><?php echo validation_errors(); ?></div>
                    <?php echo form_open('connexion'); ?>
                    <div class="form-group">
                      <div class="input-group"><span class="input-group-addon"><i class="icon s7-user"></i></span> 
						<input type="text" size="20" id="username" name="username" class="form-control" placeholder="<?php echo  $this->lang->line("username_connexion"); ?>" />
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="input-group"><span class="input-group-addon"><i class="icon s7-lock"></i></span>
                         
						 <input type="password" size="20" id="passowrd" name="password" class="form-control" placeholder="Password"/>
                      </div>
                    </div>
                    <div class="form-group login-submit">
                      
					  <input data-dismiss="modal" class="btn btn-primary btn-lg" type="submit" value="Login"/>
                    </div>
                     
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

<?php include('include/footer.php'); ?>