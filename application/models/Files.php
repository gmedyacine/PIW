<?php

Class Files extends CI_Model {

    function fetch_data($id_categ=0,$id_sous_categ=0,$cnt_file="") {
        $query = $this->db->select('*')->from("ipw_files");
        if($id_categ>0){
            $query->where("lib_categ_id",$id_categ);
            if($id_sous_categ>0)  $query->where("lib_sous_categ_id",$id_sous_categ);
        }
        if(!empty($cnt_file)){
            $query->like("heure_lib",$cnt_file);
            $query->or_like("nom_fichier",$cnt_file);
            $query->or_like("job",$cnt_file);
            $query->or_like("calendrier",$cnt_file);
            $query->or_like("vega",$cnt_file);
        }
       
        $ret=$query->get()->result(); //select * from piw_files
        return $ret;
    }

    function delete_data($id) {
        $this->db->where("id", $id);
        $this->db->delete("ipw_files");
    }

    function update_file($id, $name) {
        $this->db->where('id', $id);
        $this->db->update('ipw_files', array("nom_fichier" => $name));
    }

    function add_file($data = array()) {
        //$this->db->insert('ipw_files', $data_to_add);
		$insert = $this->db->insert_batch('ipw_files',$data);
        return $insert?true:false;
    }

    function delete_file($file_path) {
        $this->load->helper("file");
        delete_files($file_path);
    }

}

?>