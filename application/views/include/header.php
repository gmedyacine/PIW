<?php defined('BASEPATH') OR exit('No direct script access allowed');?>﻿
<header>
    <script type="text/javascript">
        var idPrj = <?php echo $id_projection; ?>;
    </script>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/img/logo-piw.png" alt=""  />
            </div>
        </div>
        <div class="col-lg-3 right-header">
            <a id="logout" href="<?php echo base_url() . "index.php/logout" ?>" class="btn-bleu btn btn-info"><?php echo $this->lang->line("logout"); ?> </a>
            <select class="selectpicker" id="select-lang" data-width="fit">
                <option value="english"  <?php if($this->session->userdata('site_lang') == 'English') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-gb"></span> English'>English</option>
                <option value="portuguese" <?php if($this->session->userdata('site_lang') == 'portuguese') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-pt"></span> Portuguese'>Portuguese</option>
                <option value="french" <?php if($this->session->userdata('site_lang') == 'french') echo 'selected="selected"'; ?>  data-content='<span class="flag-icon flag-icon-fr"></span> Français'>Fr</option>
            </select>
        </div>
        <br /><br />
    </div>
</header>
