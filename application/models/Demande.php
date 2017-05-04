<?php

Class Demande extends CI_Model {

    function getAllDemandes() {
        $query = $this->db->select('*')
                ->from("ipw_demande_specifique")
                ->join("piw_users", 'piw_users.id = added_by')
                ->order_by('added_at', 'DESC')
                ->get(); //select * from ipw_demande_specifique

        $ret = $query->result_array();
        return $ret;
    }


    function delete_demande($id) {
        $this->db->where("id", $id);
        $this->db->delete("ipw_demande_specifique");
    }
    

    function add_demande($data) {
        if ($this->db->insert('ipw_demande_specifique', $data)) {
            return true;
        } else {
            return false;
        }
    }
}

?>