<!-- REQUIRED SCRIPTS FILES -->
<!-- REQUIRED BOOTSTRAP SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.2/js/bootstrap-select.min.js"></script>
<img id="loader" src="<?php echo base_url(); ?>assets/img/loader.svg"/>
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
