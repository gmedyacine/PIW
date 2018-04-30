<!-- Modal -->
<script type="text/javascript">
    var id_projection = <?php echo $id_projection; ?>;
    // var not_Num = <?php //echo $this->lang->line("not_num");    ?>;
</script>

<div class="modal fade" id="compare" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header" style="cursor: move;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('chart_config'); ?></h4> 
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
                            <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('report_not_found'); ?></p><a href="#" id="add_csv" data-toggle="modal" onclick=" $('#addCsv').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new_csv'); ?></a>
                        </div>
                    

                    <br>

                    <input type="submit"  class="btn btn-primary pull-right" value="<?php echo $this->lang->line('save'); ?>">
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>
           



