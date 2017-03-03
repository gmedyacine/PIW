<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿

<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW END -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9"> <!-- Début partie des onglets -->

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-panel fade active in" >
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">


                                    <label class="control-label col-sm-2" for="file">Fichier </label>
                                    <div class="tel col-sm-8">
                                        <input type="text" class="form-control" >
                                        </br>
                                    </div>
                                    <div class="upload col-sm-2">
                                        <a href="#" class="btn btn-info pull-right">Upload</a>
                                    </div>


                                    </form>
                                </div>
                            </div>
                        </div>

                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Calendrier</th>
                                    <th>Job</th>
                                    <th>Vega</th>
                                    <th>Fichier</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
							<?php  if($fetch_data->num_rows() > 0)
							{
							
							  foreach ($fetch_data->result() as $row)
							  { ?>
							    <tr>
								
                                    <td><?php echo $row->calendrier ; ?></td>
									<td><?php echo $row->job ; ?></td>
                                    <td><?php echo $row->vega ; ?></td>
                                    <td><?php echo $row->nomFichier ; ?></td>
                                 
                                    <td> <a href="#">Loop </a>|<a href="<?php echo base_url(); ?>index.php/home/download/<?php echo $row->nomFichier ; ?>"> télécharger </a>|<a href="<?php echo base_url(); ?>index.php/home/delete_data/<?php echo $row->id ; ?>/<?php echo $row->nomFichier ; ?>" class="delete_data" "> Supprimer </a> 
									<br>
									 
								
									
									<form action="<?php echo base_url(); ?>index.php/home/upload_file" method="post" enctype="multipart/form-data" >
									<input type="file" name="new_file"  />
									
									<input type="submit" class="btn btn-primary btn-xs" name="upload" value="Upload" />
									</form>
									</td>
                                
                                </tr>
								
							  
							  
							 <?php }
							
							}
							else
							{?>
							<tr>
							<td colspan="3"> Pas de données   </td>
							</tr>
						<?php	}
							
							
							?>
                              
                                
                            </tbody>
                        </table>    
                    </div>


                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->
            </div>
        </div>
        <?php include('include/footer.php'); ?>