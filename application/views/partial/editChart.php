<!-- Modal -->
<div class="modal fade" id="editChart" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('chart_config'); ?></h4> 
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>index.php/home/edit_chart" method="post" >

                    <div class="row form-group hidden">

                        <div class="col-md-3">
                            <label  for="id"> ID_Report </label>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="id_projection" value="<?php echo $id_projection; ?>">
                        </div>
                    </div> 

                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="chartType" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('chart_type'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select  id="chartType" name="chartType" class="form-control " >
                                <option value="">-- <?php echo $this->lang->line('select_chart'); ?> --</option>
                                <option value="">-- Courbe --</option>
                                <option value="">-- historgamme --</option>
                                <option value="">-- Cercle --</option>
                            </select>
                        </div>

                    </div>
                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="chartX" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('x_axis'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select id="chartX" name="chartX" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_X'); ?> --</option>
                            </select>
                        </div>

                    </div>
                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="chartX" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('x_axis'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select id="chartX" name="chartX" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_Y'); ?> --</option>
                            </select>
                        </div>

                    </div>
                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="chartY" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('multi_options'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select multiple="" id="chartY" name="chartX" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_options'); ?> --</option>
                            </select>
                        </div>

                    </div>
                    <br>

                    <input type="submit"  class="btn btn-primary pull-right" value="<?php echo $this->lang->line('save'); ?>">

                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $(document).ready(function () {
        var report = <?php echo $id_projection; ?>;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>index.php/home/getColumns/",
            dataType: 'json',
            data: {rept_id: report},
            success: function (result) {
                $.each(result, function (i, item) {
                    $('#chartX').append($('<option>', {
                        value: i,
                        text: item
                    }));
                    $('#chartY').append($('<option>', {
                        value: i,
                        text: item
                    }));
                    $('#multi').append($('<option>', {
                        value: i,
                        text: item
                    }));
                });
            }
        });
    });

</script>