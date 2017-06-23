
<div class="row">
                      <div class="panel panel-default panel-set">
                        <div class="panel-heading">
                           <?php echo $this->lang->line("assigner_categ"); ?>
                        </div>
                    
                        <div class="panel-body"> 

                            <div class="form-group">    
                             
                                
								 <form id="assignCateg" action="<?php echo base_url(); ?>index.php/home/assign_categ" method="post" >
                                <div class="col-sm-10">
                                    <select id="select_report_categ" name="report_categ" class="form-control" required >
                                           <option value="">-- <?php echo $this->lang->line('select_categ'); ?> --</option>
                                       </select>
                                    <input type="hidden" name="report_id" value="<?php echo $id_projection; ?>">
                                    <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('categ_not_found'); ?></p><a href="#" id="add_categ" data-toggle="modal" onclick=" $('#addCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
                                    <br>
									
                                </div>
								<div class="col-sm-10">
                                    <select id="select_report_sous_categ" name="report_sous_categ" class="form-control" required >
                                           <option value="">-- <?php echo $this->lang->line('select_sub_categ'); ?> --</option>
                                       </select>
                                    <input type="hidden" name="report_id" value="<?php echo $id_projection; ?>">
                                    <p style="font-size: 12px; display: inline;"><?php echo $this->lang->line('sub_categ_not_found'); ?></p><a href="#" id="add_sous_categ" data-toggle="modal" onclick=" $('#addSubCateg').modal('show')" style="font-size: 12px; display: inline;"> <?php echo $this->lang->line('create_new'); ?></a>
                                    <br>
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" id="btn_select_report_categ" class="btn btn-info pull-right" value="<?php echo $this->lang->line('valider'); ?>" >
                                </div>
                                </form>    
                               
                            </div>
							 <?php include('addCateg.php'); ?>
							 <?php include('addSubCateg.php'); ?>
                           
                            
                          
                        </div>
                    </div>
                  
                    </div>