<!-- Modal -->
<script type="text/javascript">
    var id_projection = <?php echo $id_projection; ?>;
    // var not_Num = <?php //echo $this->lang->line("not_num");  ?>;
</script>
<div class="modal fade" id="createChart" tabindex="-1" role="dialog" aria-labelledby="basicModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="myModalLabel"><?php echo $this->lang->line('chart_config'); ?></h4> 
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(); ?>index.php/home/create_chart" method="post" >

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
                            <select  id="chartType" name="chartType" class="form-control " required="">
                                <option value="">-- <?php echo $this->lang->line('select_chart'); ?> --</option>
                                <option value="line">-- Courbe --</option>
                                <option value="column">-- historgamme --</option>
                                <option value="pie">-- Cercle --</option>
                            </select>
                        </div>

                    </div>

                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="chartTitle" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('chart_title'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <input type="text" id="chartTitle" name="chartTitle"  placeholder="<?php echo $this->lang->line('chart_title'); ?>" class="form-control" required=""/>
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
                            <label for="chartY" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('y_axis'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select id="chartY" name="chartY" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_Y'); ?> --</option>
                            </select>
                        </div>

                    </div>
                    <div class="row form-group">   
                        <div class="col-md-3">
                            <label for="multi" class="control-label" style="margin-top: 10px;" ><?php echo $this->lang->line('multi_options'); ?></label>                     
                        </div>
                        <div class="col-md-9">
                            <select multiple id="multi" name="multi[]" class="form-control" required="">
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
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>index.php/home/getColumns/",
            dataType: 'json',
            data: {rept_id: id_projection},
            success: function (result) {
              //  alert(result);
                $.each(result, function (i, item) {
                    $('#chartX').append($('<option>', {
                        value: item,
                        text: item
                    }));
                    $('#chartY').append($('<option>', {
                        value: item,
                        text: item
                    }));
                    $('#multi').append($('<option>', {
                        value: item,
                        text: item
                    }));
                });
            }
        });

        $('#multi').on('click', function () {
            var multi = $("#multi option:selected").last().val();
            $.ajax({
                type: "GET",
                url: "<?php echo base_url(); ?>index.php/home/checkNumeric/",
                dataType: 'json',
                data: {
                    rept_id: id_projection,
                    col_name: multi
                },
                success: function (res) {
                    if (res == false) {
                        alert("This is not a numeric choice !");
                        $('#multi option:selected').last().prop('selected', false).trigger('chosen:updated').attr("disabled", true);
                    }
                }
            });
        });
    });

</script>