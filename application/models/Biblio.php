<?php

Class Biblio extends CI_Model {



    function add_biblio($data) {

     $this->db->insert('ipw_lib_categ‏',$data);
	 return true;
	 }

}

?>