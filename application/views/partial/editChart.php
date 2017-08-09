<!-- Modal -->
<script type="text/javascript">
    var chartType;
    var chartTitle;
    var chartX;
    var chartY;
    var multi;
    $.each(chartConfigJson, function (key, element) {
        chartType = element.chartType;
        chartType = element.chartTitle;
        chartX = element.chartX;
        chartY = element.chartY;
        multi = element.multi;
    });
</script>
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
        $('#chartType').val(chartType);
        $('#chartTitle').val(chartTitle);
        var report = <?php echo $id_projection; ?>;
        $.ajax({
            type: "GET",
            url: "<?php echo base_url(); ?>index.php/home/getColumns/",
            dataType: 'json',
            data: {rept_id: report},
            success: function (result) {
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

                    $('#chartX').val(chartX);
                    $('#chartY').val(chartY);
                    var multiSelect = multi.split(',');
                    $('#multi').val(multiSelect);
                });
            }
        });

    });

</script>