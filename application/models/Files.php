<?php

Class Files extends CI_Model {

function fetch_data()
{
 $query=$this->db->get("piw_files"); //select * from piw_files
 return $query;
}

function delete_data($id)
{
$this->db->where("id",$id);
$this->db->delete("piw_files");
}

}
?>