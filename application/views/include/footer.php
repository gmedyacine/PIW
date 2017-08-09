<!-- REQUIRED SCRIPTS FILES -->
<!-- REQUIRED BOOTSTRAP SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script><script src="assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/lib/jquery.nanoscroller/javascripts/jquery.nanoscroller.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/main.js"></script>
<script src="<?php echo base_url(); ?>assets/lib/parsley/parsley.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.letterpic.js"></script>


<script type="text/javascript">
    var customColors = [ "#E1BEE7", "#26A69A", "#FFCDD2", "#827717", "#90A4AE" ]
    $(".letterpic").letterpic({ fill: 'color',colors: customColors });
 
            
    var base_url = "<?php echo base_url(); ?>";
    $('.selectpicker').selectpicker();
    $("#select-lang").change(function () {
        var lang = $(this).val();
        location.href = base_url + "index.php/select-lang/" + lang;

    });
$('.dropdown-toggle').dropdown();
  $('form').parsley();
</script>
</body>

</html>
