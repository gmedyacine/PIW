<!-- Modal -->
<div class="modal fade" id="renameCateg" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('update_bib'); ?></h4> 
            </div>
            <div class="modal-body">
            <!--    <form action="<?php //echo base_url(); ?>index.php/home/add_report_categ" method="post" > -->
                 <form action="#" method="post" >

                <div class="row form-group hidden">

                    <div class="col-md-3">
                        <label  for="id"> ID_Categ </label>
                    </div>
                    <div class="col-md-9">
                      <input type="hidden" name="id_projection" value="<?php echo $id_categ; ?>">
                    </div>
                </div> 
                				
                <div class="row form-group">   
                    <div class="col-md-12">
                        <input type="text" id="nom" name="nom_categ" required="required" class="form-control"  >
                        <span class="error"></span>
                    </div>

                </div>

            <br>
       
       <input type="submit"  class="btn btn-success pull-right" value="<?php echo $this->lang->line('update'); ?>">
	   
	   <br>
     </form>
            </div>
            
   
        </div>
    </div>
</div>

