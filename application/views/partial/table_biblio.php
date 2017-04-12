<table id="mainTablesBib" class="table table-striped cell-border"  cellspacing="0" width="100%"> 
    <thead>
        <tr>
            <th>Calendrier</th>
            <th class="whiteSpace">heure lib</th>
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
            <tr>

                <td><?php echo $row->calendrier; ?></td>
                <td><?php echo $row->heure_lib; ?></td>
                <td  class="whiteSpace"><?php echo $row->job; ?></td>
                <td><?php echo $row->vega; ?></td>
                <td><?php echo $row->nom_fichier; ?></td>
                <td> 
                    <a class="fancybox" data-fancybox-type="iframe" 
                       <?php if ($row->nom_fichier) { ?>  href="http://docs.google.com/gview?url=<?php echo base_url(); ?>uploads/<?php echo $row->nom_fichier; ?>&embedded=true" <?php } else { ?> href="#" <?php } ?> >Loop </a>|
                    <a href="<?php echo base_url(); ?>index.php/home/download/<?php echo $row->nom_fichier; ?>"> télécharger </a>|
                    <?php if ($role != 2) { ?>
                        <a href="<?php echo base_url(); ?>index.php/home/delete_data/<?php echo $row->id; ?>/<?php echo $row->nom_fichier; ?>" class="delete_data" "> Supprimer </a> 
                        <br>
                        <form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" enctype="multipart/form-data" >
                            <input type="file" name="new_file"  />
                            <input type="hidden" name="row_id" value="<?php echo $row->id; ?>" />
                            <input type="submit" class="btn btn-primary btn-xs" name="upload" value="Upload" />
                        </form>
                    <?php } ?>
                </td>

            </tr>
        <?php } ?>

    </tbody>
</table>    