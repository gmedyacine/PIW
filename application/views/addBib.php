<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include('include/head.php');
?>﻿


<body>

    <div class="container-fluid">
        <?php include('include/header.php'); ?>

        <!-- ROW start -->
        <div class="row content">
            <!-- Colonne du Menu -->
            <?php include('include/menu.php'); ?>

            <div class="col-md-9 "> <!-- Début partie des onglets -->
                <ul class="nav nav-tabs " role="tablist">
                    <li class="active">
                        <a href="#biblio" class="tab" role="tab" data-toggle="tab">
                            Ajouter Bibliothèque
                        </a>
                    </li>
					<li>
                        <a href="#sousBiblio" class="tab" role="tab" data-toggle="tab">
                           Ajouter Sous-bibliothèque
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-panel fade active in" id="biblio">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <form action="#" method="post">
                              
                                    <label class="control-label col-sm-2" for="nom">Nom</label>
                                    <div class="nom col-sm-10">
                                        <input name="nom" type="text"  required="required" class="form-control " >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="description">Description </label>
                                    <div class="desc col-sm-10">
                                        <input name="description" type="text" class="form-control " >
                                        </br>
                                    </div>

   

                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Description</th>
                                    <th>Supprimer</th>
                               
                                </tr>
                            </thead>
 <tbody>
                                    <tr>
                                        <td>SUIVI_VEGA</td>
                                        <td></td>
                           
                                        <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>
                                    <tr>
                                        <td>MASTERI</td>
                                        <td></td>
                      
                                        <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>
                                    <tr>
                                        <td>EDD</td>
                                        <td></td>
                                   
                                        <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>
                                    <tr>
                                        <td>SAGE</td>
                                        <td></td>
                                   
                                        <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>
                                </tbody>
                        </table>   
                    </div>
				                   <div class="tab-panel fade" id="sousBiblio">
                        <div id="panel-table" class="panel panel-default">
                            <div class="panel-body">              

                                <div class="form-group">
                                    <form action="#" method="post">

																		   
                                    <label class="control-label col-sm-2" for="biblio">Bibliothèque</label>
                                    <div class="nom col-sm-10">
                                       <select class="form-control" required="required" >
                                           <option value="0">-- choisir une bibliothèque--</option>
                                       </select>
                                        </br>
                                    </div>
									
                                    <label class="control-label col-sm-2" for="nom">Nom</label>
                                    <div class="nom col-sm-10">
                                        <input name="nom" type="text"  required="required" class="form-control " >
                                        </br>
                                    </div>

                                    </br>
                                    <label class="control-label col-sm-2" for="description">Description </label>
                                    <div class="desc col-sm-10">
                                        <input name="description" type="text" class="form-control " >
                                        </br>
                                    </div>

   

                                    <div class="add">
                                        <input class="btn btn-success pull-right" type="submit" value="Ajouter"/>
                                    </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        <table  class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nom (Sous-bibliothèque)</th>
							    	 <th>Bibliothèque</th>
                                    <th>Description</th>
                                    <th>Supprimer</th>
                               
                                </tr>
                            </thead>
 <tbody>
                                    <tr>
									     <td>Vega 1</td>
                                        <td>SUIVI_VEGA</td>
                                        <td></td>
                           
                                        <td><button type="button" class="btn btn-danger btn-sm btn-round"><span class="glyphicon glyphicon-trash"></span></button></td>
                                    </tr>

                                </tbody>
                        </table>   
                    </div>

                  
                </div> <!-- Fin partie du tableau -->
                <!-- ROW END -->
            </div>
	
        </div>
		</div>
		  <script src="<?php echo base_url(); ?>assets/js/users.js"></script>

        <?php include('include/footer.php'); ?>
		
