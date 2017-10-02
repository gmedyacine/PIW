<table id="mainTablesBib" class="table table-striped cell-border dt-responsive nowrap"  cellspacing="0" width="100%"> 
    <thead>
        <tr>
            <th> </th>
            <th  class="checkbox_delete"><!--<input type="checkbox"  class="delete_all_files"> --><button type="button" name="btn_delete" id="btn_delete" class="btn btn-primary btn-xs">Delete</button></th>
            <th class="label_calender">Calendrier</th>
            <th class="heur_lib whiteSpace">heure lib</th>
            <th  class="whiteSpace">Titre</th>
            <th>Categorie </th>
            <th>Fichier</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>


        <?php
        foreach ($fetch_data as $row) {
            ?>

            <tr id="<?php echo $row->id; ?>">
                <td></td>
                <?php if ($role != 2) { ?>
                    <td><input type="checkbox" name="file_id[]" class="delete_file" value="<?php echo $row->id; ?>,<?php echo $row->nom_fichier; ?>,<?php echo $row->lib_categ_id; ?>" />
                    </td>
                <?php } ?>
                <td><?php echo $row->calendrier; ?></td>
                <td><?php echo $row->heure_lib; ?></td>
                <td  class="whiteSpace"><?php echo $row->job; ?></td>
                <td><?php echo $row->vega; ?></td>
                <td><?php echo $row->nom_fichier; ?></td>
                <td> 
                    <a class="fancybox" data-fancybox-type="iframe" 
                       <?php if ($row->nom_fichier) { ?>  href="http://docs.google.com/gview?url=<?php echo base_url(); ?>uploads/<?php echo $row->nom_fichier; ?>&embedded=true" <?php } else { ?> href="#" <?php } ?> >Visualizer </a>|
                    <a href="<?php echo base_url(); ?>index.php/home/download/<?php echo $row->nom_fichier; ?>"> télécharger </a>
                    <?php if ($role != 2) { ?>

                        |<a href="javascript:deleteFunc('<?php echo $row->id; ?>' ,'<?php echo $row->nom_fichier; ?>' ,'<?php echo $row->lib_categ_id; ?>' ,'<?php echo $row->lib_sous_categ_id; ?>')" class="delete_data" > Supprimer </a> 
                        <br>
                        <form action="<?php echo base_url(); ?>index.php/home/upload_extra_file" method="post" enctype="multipart/form-data" class="formboxs" >
                            <label class="fileBtn btn-xs"><input type="file" name="extraFile" required="required" /></label>
                            <input type="hidden" name="row_id" value="<?php echo $row->id; ?>" />
                            <input type="hidden" name="id_categ" value="<?php echo $row->lib_categ_id; ?>" />
                            <input type="hidden" name="id_sous_categ" value="<?php echo $row->lib_sous_categ_id; ?>" />
                            <input type="submit" class="btn btn-primary btn-xs" name="upload" value="Upload" />
                        </form>
                    <?php } ?>
                </td>


            </tr>
        <?php } ?>

    </tbody>
</table>    

<script>
    function deleteFunc(id, nom, lib, subLib) {
        if (confirm('Vous etes sur le point de supprimer ce/ces documents')) {
            document.location.href = "<?php echo base_url(); ?>index.php/home/delete_data/" + id + "/" + nom + "/" + lib + "/" + subLib;
        } else {
            return;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#btn_delete').click(function () {
            if (confirm('Vous etes sur le point de supprimer ce/ces documents')) {
                var files = [];
                $(':checkbox:checked').each(function (i) {
                    files[i] = $(this).val();
                });
                //alert(files);
                if (files.length === 0) {
                    alert("Vous devez sélectionner au moin un fichier !");
                } else {
                    var data_files = [];
                    for (var i = 0; i < files.length; i++)
                    {
                        data_files[i] = files[i].split(",");
                    }

                    $.ajax({
                        method: "POST",
                        url: "<?php echo base_url(); ?>index.php/home/delete_multi_data/",
                        dataType: 'json',
                        data: {data_files: JSON.stringify(data_files)},
                        success: function (result)
                        {
                            if (result == true) {
                                for (var i = 0; i < data_files.length; i++)
                                {
                                    $('tr#' + data_files[i][0] + '').css('background-color', '#ccc');
                                    $('tr#' + data_files[i][0] + '').fadeOut('slow');

                                }
                            }
                        }


                    });
                }

            } else {
                return;
            }

        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.delete_all_files').click(function () {
            if ($(this).prop("checked") == true) {
                $(".delete_file").prop('checked', true); // Checks it
            } else if ($(this).prop("checked") == false) {
                $(".delete_file").prop('checked', false); // Unchecks itcF
            }
        });
    });
</script>