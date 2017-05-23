<?php

Class Report extends CI_Model {

    function getAllReportCateg() {
        $query = $this->db->select('*')
                ->from("ipw_report_categ")
                ->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }
    
    function creatQuery() {
    $tab_projection = array("ipw_charge_reports_stat",
        "ipw_chrg_rep_temps",
        "ipw_crt_masteri",
        "ipw_status_task",
        "ipw_taches_vega",
        "ipw_rept_distribuicao_vendas",
        "ipw_rept_list_agents",
        "ipw_rept_report_ledger",
        "ipw_rept_statement",
        "ipw_rept_statement_bim",
        "ipw_rept_subscriptions_by_txntype");
    foreach ($tab_projection as $tableName) {
        $sql_add_column = "ALTER TABLE  `".$tableName."` ADD  `report_categ_id` INT DEFAULT NULL;";
        $this->db->query($sql_add_column);
    }
}

    function assignCateg($idReport,$idCateg) {
        $sql_assign_categ = "ALTER TABLE  `".$tableName."` ADD  `report_categ_id` INT DEFAULT NULL;";
        $this->db->query($sql_add_column);
    }
    
    function searchReportByName($keyword) {

        $query = $this->db->query("SHOW TABLES WHERE `Tables_in_piw` LIKE '%ipw%' AND `Tables_in_piw` LIKE '%".$keyword."%'");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();

    }

    function deleteReportCateg($id) {
        $this->db->where("id", $id);
        $this->db->delete("ipw_report_categ");
    }
    

    function addReportCateg($data) {
        if ($this->db->insert('ipw_report_categ', $data)) {
            return true;
        } else {
            return false;
        }
    }
	
	    function renameReport($data) {
        if ($this->db->insert('ipw_rename_report', $data)) {
            return true;
        } else {
            return false;
        }
    }
}

?>