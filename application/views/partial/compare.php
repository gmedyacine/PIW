<!-- Modal -->
           

<link href="<?php echo base_url(); ?>assets/css/select2.min.css" rel="stylesheet" />

<script type="text/javascript">
    var id_projection = <?php echo $id_projection; ?>;
    var projections = <?php echo $projections; ?>;
    // var not_Num = <?php //echo $this->lang->line("not_num");    ?>;
</script>

<div class="modal fade" id="compare" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="cursor: move;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('compre_rept'); ?></h4> 
            </div>
            <div class="modal-body" style="padding-top: 0px;">
                <form action="<?php echo base_url(); ?>index.php/home/compare_report" method="post" >

                    <div class="row form-group hidden">

                        <div class="col-md-3">
                            <label  for="id"> ID_Report </label>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="id_projection" value="<?php echo $id_projection; ?>">
                        </div>
                    </div> 


                        <div class="form-group">								   
                            <select  id="rpt_select" name="to_compare"  class="form-control chosen-select" tabindex="2" required>
                                <option value="">-- <?php echo $this->lang->line('select_report'); ?> --</option>
                            </select>
                            
                        </div>
                    

                    <br>

                    <input type="submit"  class="btn btn-primary pull-right" value="<?php echo $this->lang->line('compare'); ?>">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


                <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

                <script type="text/javascript">
                    
                    loadRpt();
                    function loadRpt() {
                        $.each(projections, function (i, item) {
                            $('#rpt_select').append($('<option>', {
                                value: item.old_report_name ,
                                text: item.new_report_name 
                            }));
                        });
                    }
                </script>
