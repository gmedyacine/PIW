<?php

$message = '<style>
table, td, th { 
    border: 1px solid black;  
    padding: 7px;
    text-align: left;
}
table {
    border-collapse: collapse;
	font-size: large;
    width: 100%;
}
</style>';

$message.= '<h1  style="text-align:center;" >Demande Spécifique</h1> 
<p>&nbsp;</p>

<h2> Informations de la demande</h2>
<table>
    <tbody>
	<tr>
        <td><strong>Username:</strong></td>
        <td colspan="3">' . $username . '</td> 
			
    </tr>
	<tr >
        <td><strong>Date De creation:</strong></td>
        <td colspan="3">' . $demande['added_at'] . '</td> 
	  		
    </tr>
	<tr >
        <td><strong>Objet:</strong></td>
        <td colspan="3">' . $demande['objet'] . '</td> 
	  		
    </tr>	
	<tr >
        <td ><strong>Message:</strong></td>
        <td colspan="3">' . $demande['message'] . '</td> 
       	

	</tbody>
</table>';

?>
