<!-- Modal -->
<div class="modal fade" id="addSubCateg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('create_new_sub_cat'); ?></h4> 
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>index.php/home/add_report_sous_categ" method="post" >

                <div class="row form-group hidden">

                    <div class="col-md-3">
                        <label  for="id"> ID_Report </label>
                    </div>
                    <div class="col-md-9">
                      <input type="hidden" name="id_projection" value="<?php echo $id_projection; ?>">
                    </div>
                </div> 
                <div class="row form-group">

                    
                    <div class="col-md-12">
                        
						<select  id="reportCat" name="reportCat"  class="form-control" >
                            <option value="">--<?php echo $this->lang->line('select_categ'); ?>--</option>
                            
                        </select>
						<br>
                    </div>
                </div>				
                <div class="row form-group">
                    
                    <div class="col-md-12">
                        <input type="text" name="nom_report_categ" required="required" placeholder="--<?php echo $this->lang->line('sub_cat_name'); ?>--" class="form-control"  >
                        <span class="error"></span>
                    </div>

                </div>

            <br>
       
       <input type="submit"  class="btn btn-primary pull-right" value="<?php echo $this->lang->line('add_sub_categ'); ?>">
	   
	   <br>
     </form>
            </div>
            
   
        </div>
    </div>
</div>

