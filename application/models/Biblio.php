<?php

Class Biblio extends CI_Model {


    function fetch_categ() {
        $query = $this->db->get("ipw_lib_categ‏"); //select * from piw_files
        return $query;
    }
	
	    function delete_categ($id) {
        $this->db->where("id", $id);
        $this->db->delete("ipw_lib_categ‏");
    }
	
    function add_categ($data) {

     if($this->db->insert('ipw_lib_categ‏',$data))
	 {
	 return true;
	 }else{
	  return false;
	 }
	 }

}

?>