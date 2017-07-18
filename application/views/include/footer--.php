<!-- REQUIRED SCRIPTS FILES -->
<!-- REQUIRED BOOTSTRAP SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/lib/bootstrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/js/app-form-elements.js" type="text/javascript"></script>






<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
    $('.selectpicker').selectpicker();
    $("#select-lang").change(function () {
        var lang = $(this).val();
        location.href = base_url + "index.php/select-lang/" + lang;

    });
$('.dropdown-toggle').dropdown();
  
</script>
</body>

</html>
