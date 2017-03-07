<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>﻿
<header>
    <script type="text/javascript">
        var idPrj = <?php echo $id_projection; ?>;
        var idBib = <?php echo $idBib; ?>;
    </script>
    <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="logo">
                <img src="<?php echo base_url(); ?>assets/img/logo-piw.png" alt=""  />
            </div>
        </div>
        <div class="col-lg-9 col-md-6 col-sm-6">
            <a id="logout" href="<?php echo base_url() . "index.php/logout" ?>" class="btn-bleu btn btn-info">Déconnecter </a>
        </div>     
        <br /><br />
    </div>
</header>
