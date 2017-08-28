<!-- Modal -->
<div class="modal fade" id="renameCateg" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('update_bib'); ?></h4> 
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <form action="<?php echo base_url(); ?>index.php/home/update_biblio" method="post" > 
                        <div class="row form-group hidden">

                            <div class="col-md-3">
                                <label  for="id"> ID_Categ </label>
                            </div>
                            <div class="col-md-9">
                                <input type="hidden" id="idBiblio" name="idBiblio">
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-6 col-xs-12sm-2" style="margin-top: 10px;" for="nom"><?php echo $this->lang->line("name"); ?> </label>
                            <div class="nom col-md-10 col-sm-6 col-xs-12">
                                <input id="nom" name="nom" type="text"  required="required" class="form-control " >
                                <br>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-6 col-xs-12" style="margin-top: 10px;" for="description"><?php echo $this->lang->line("description"); ?>  </label>
                            <div class="desc col-md-10 col-sm-6 col-xs-12">
                                <input id="description" name="description" type="text" class="form-control " >
                                <br>
                            </div>
                        </div> 

                        <div class="form-group ">
                            <input class="btn btn-success pull-right" type="submit" style="margin-bottom: 20px;" value="<?php echo $this->lang->line("update"); ?>"/>

                        </div>

                    </form>

                </div>

            </div>


        </div>
    </div>
</div>

