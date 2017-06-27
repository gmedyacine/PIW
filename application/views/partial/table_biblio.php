<table id="mainTablesBib" class="table table-striped cell-border "  cellspacing="0" width="100%"> 
    <thead>
        <tr>
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
            <tr>

                <td><?php echo $row->calendrier; ?></td>
                <td><?php echo $row->heure_lib; ?></td>
                <td  class="whiteSpace"><?php echo $row->job; ?></td>
                <td><?php echo $row->vega; ?></td>
                <td><?php echo $row->nom_fichier; ?></td>
                <td> 
                    <a class="fancybox" data-fancybox-type="iframe" 
                       <?php if ($row->nom_fichier) { ?>  href="http://docs.google.com/gview?url=<?php echo base_url(); ?>uploads/<?php echo $row->nom_fichier; ?>&embedded=true" <?php } else { ?> href="#" <?php } ?> >Loop </a>|
                    <a href="<?php echo base_url(); ?>index.php/home/download/<?php echo $row->nom_fichier; ?>"> télécharger </a>
                    <?php if ($role != 2) { ?>
                    
                    
                        |<a href="<?php echo base_url(); ?>index.php/home/delete_data/<?php echo $row->id; ?>/<?php echo $row->nom_fichier; ?>/<?php echo $row->lib_categ_id; ?>/<?php echo $row->lib_sous_categ_id; ?>" class="delete_data" > Supprimer </a> 
                    
                        <br>
                        <form action="<?php echo base_url(); ?>index.php/home/upload_extra_file" method="post" enctype="multipart/form-data" >
                            <input type="file" name="extraFile" required="required" />
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