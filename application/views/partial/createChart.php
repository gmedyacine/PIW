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
            <div class="modal-body" style="padding-top: 0px;">
                <form action="<?php echo base_url(); ?>index.php/home/create_chart" method="post" >

                    <div class="row form-group hidden">

                        <div class="col-md-3">
                            <label  for="id"> ID_Report </label>
                        </div>
                        <div class="col-md-9">
                            <input type="hidden" name="id_projection" value="<?php echo $id_projection; ?>">
                        </div>
                    </div> 

                    <div class="row form-group" style="margin-bottom: 0px;">   
                       
                        <div class="col-md-6">
                            <select  id="chartType" name="chartType" class="form-control " required="">
                                <option value="">-- <?php echo $this->lang->line('select_chart'); ?> --</option>
                                <option value="line">-- Courbe --</option>
                                <option value="column">-- historgamme --</option>
                                <option value="pie">-- Cercle --</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <input type="text" id="chartTitle" name="chartTitle"  placeholder="<?php echo $this->lang->line('chart_title'); ?>" class="form-control" required=""/>
                        </div>

                    </div>
                    <div class="row form-group" style="margin-bottom: 0px;">   
                        <div class="col-md-6">
                            <select id="graphX" name="chartX" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_X'); ?> --</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <select id="graphY" name="chartY" class="form-control" required="">
                                <option value="">-- <?php echo $this->lang->line('select_Y'); ?> --</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group" style="margin-bottom: 0px;"> 
                     <div class="col-md-12">
                            <select multiple id="multiOpt" name="multi[]" class="form-control" required="">
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
                $.each(result, function (i, item) {
                    $('#graphX').append($('<option>', {
                        value: item,
                        text: item
                    }));
                    $('#graphY').append($('<option>', {
                        value: item,
                        text: item
                    }));
                    $('#multiOpt').append($('<option>', {
                        value: item,
                        text: item
                    }));
                });
            }
        });

        $('#multiOpt').on('click', function () {
            var multi = $("#multiOpt option:selected").last().val();
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
                        $('#multiOpt option:selected').last().prop('selected', false).trigger('chosen:updated').attr("disabled", true);
                    }
                }
            });
        });
    });

</script>