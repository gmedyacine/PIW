<?php

Class Biblio extends CI_Model {

    function fetch_categ() {
        $query = $this->db->select('*')
                ->from("ipw_lib_categ‏")
                ->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from piw_files

        $ret = $query->result_array();
        return $ret;
    }

    function fetch_sous_categ() {
        $query = $this->db->select('*')
                ->from("ipw_lib_categ‏")
                ->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from piw_files

        $ret = $query->result_array();
        return $ret;
    }

    function delete_categ($id) {
        $this->db->where("lib_categ_id", $id);
        $this->db->delete("ipw_lib_categ‏");
    }

    function add_categ($data) {
        if ($this->db->insert('ipw_lib_categ‏', $data)) {
            return true;
        } else {
            return false;
        }
    }
    function add_sous_categ($data) {
        if ($this->db->insert('ipw_lib_categ‏', $data)) {
            return true;
        } else {
            return false;
        }
    }

}

?>