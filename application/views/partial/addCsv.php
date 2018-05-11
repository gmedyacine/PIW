<!-- Modal -->
<div class="modal fade" id="addCsv" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('upload_csv'); ?></h4> 
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>index.php/home/csv_import" method="post" enctype="multipart/form-data" >



                    <!--                    <div class="row form-group">   
                                            <div class="col-md-12">
                                                <input type="text" id="nom" name="nom_report" required="required" placeholder="--<?php echo $this->lang->line('rept_name'); ?>--" class="form-control"  >
                                                <span class="error"></span>
                                            </div>
                    
                                        </div>-->

                    <div class="row form-group">   
                        <div class="col-md-12">
                            <label for="report"><?php echo $this->lang->line('file_csv'); ?></label>
                            <input type="file" name="csvFile" required="required" accept=".csv" class="form-control"  >
                            <span class="error"></span>
                        </div>
                    </div>
                    <div class="row form-group"> 
                        <div class="col-md-3">
                            <label for="delimiter"><?php echo $this->lang->line('delimiter'); ?></label>
                            <input type="text" name="delimiter" required="required" value=";" class="form-control"  >
                            <span class="error"></span>
                        </div>
                        <div class="col-md-9">

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12">
                            <div class="checkbox">
                                <label><input type="checkbox" id="initial_line" name="initial_line" value="1">
                                    <?php echo $this->lang->line('line1_as_cols'); ?><b> (<?php echo $this->lang->line('line1_not_cols'); ?>)</b>
                                </label>
                            </div>

                        </div>
                    </div>

                    <br>

                    <input type="submit"  class="btn btn-primary pull-right" value="<?php echo $this->lang->line('upload_csv'); ?>">

                    <br>
                </form>
            </div>


        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
//        $('#initial_line').click(function () {
//            if($(this).is(":checked")){
//                $(this).val(1);                
//            }
//        });

    });
</script>