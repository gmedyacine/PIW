<?php defined('BASEPATH') OR exit('No direct script access allowed');?>﻿
<header>
    <script type="text/javascript">
        var idPrj = <?php echo $id_projection; ?>;
    </script>


  <nav class="navbar navbar-default navbar-fixed-top am-top-header">
        <div class="container-fluid">
          <div class="navbar-header">
            <div class="page-title"><span>Dashboard</span></div><a href="#" class="am-toggle-left-sidebar navbar-toggle collapsed"><span class="icon-bar"><span></span><span></span><span></span></span></a><a href="<?php echo base_url() ."index.php/home" ?>" class="navbar-brand"></a>
          </div> <a href="#" data-toggle="collapse" data-target="#am-navbar-collapse" class="am-toggle-top-header-menu collapsed"><span class="icon s7-angle-down"></span></a>
          <div id="am-navbar-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right am-user-nav">
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><span class="letterpic" title="<?php echo $userName_connected ?>" data-userid="1"><?php echo $userName_connected ?>"</span><span class="angle-down s7-angle-down"  style="margin-top: -28px;"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#"> <span class="icon s7-user"></span>My profile</a></li>
                  <li><a href="#"> <span class="icon s7-config"></span>Settings</a></li>
                  <li><a href="#"> <span class="icon s7-help1"></span>Help</a></li>
                  <li><a id="logout" href="<?php echo base_url() . "index.php/logout" ?>"><span class="icon s7-power"></span><?php echo $this->lang->line("logout"); ?> </a></li>
                </ul>
              </li>
            </ul>
            <!--<ul class="nav navbar-nav am-nav-right">
              <li><a href="#">Home</a></li>
              <li><a href="#">About</a></li>
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle">Services <span class="angle-down s7-angle-down"></span></a>
                <ul role="menu" class="dropdown-menu">
                  <li><a href="#">UI Consulting</a></li>
                  <li><a href="#">Web Development</a></li>
                  <li><a href="#">Database Management</a></li>
                  <li><a href="#">Seo Improvement</a></li>
                </ul>
              </li>
              <li><a href="#">Support</a></li>
            </ul>-->
           
            <select class="selectpicker" id="select-lang" data-width="fit">
                <option value="english"  <?php if($this->session->userdata('site_lang') == 'English') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-gb"></span> English'>English</option>
                <option value="portuguese" <?php if($this->session->userdata('site_lang') == 'portuguese') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-pt"></span> Portuguese'>Portuguese</option>
                <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-fr"></span> Français'>Fr</option>
            </select>
          </div>
        </div>
      </nav>
</header>
