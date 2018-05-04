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
                            <input type="file" name="csvFile" required="required" accept=".csv" class="form-control"  >
                            <span class="error"></span>
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

