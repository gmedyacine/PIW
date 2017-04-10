<?php

Class Files extends CI_Model {

    function fetch_data($id_categ,$id_sous_categ) {
        $query = $this->db->get("ipw_files"); //select * from piw_files
        return $query;
    }

    function delete_data($id) {
        $this->db->where("id", $id);
        $this->db->delete("ipw_files");
    }

    function update_file($id, $name) {
        $this->db->where('id', $id);
        $this->db->update('ipw_files', array("nom_fichier" => $name));
    }

    function add_file($data_to_add=array()) {
        $this->db->insert('ipw_files', $data_to_add);
    }

    function delete_file($file_path) {
        $this->load->helper("file");
        delete_files($file_path);
    }

}

?>