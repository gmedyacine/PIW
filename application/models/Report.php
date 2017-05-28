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
    
    function getCreatedRept() {
        $query = $this->db->select('old_report_name as id, new_report_name')
                ->from("ipw_create_report")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        $tab_ret=array();
        foreach ($ret as $lineRep){
            $tab_ret[$lineRep["id"]]= $lineRep["new_report_name"];
        }
        return $tab_ret;
        
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
            $sql_add_column = "ALTER TABLE  `" . $tableName . "` ADD  `report_categ` INT DEFAULT NULL;";
            $this->db->query($sql_add_column);
        }
    }

    function assignCateg($idReport, $idCateg) {
        $sql_assign_categ = "ALTER TABLE  `" . $tableName . "` ADD  `report_categ_id` INT DEFAULT NULL;";
        $this->db->query($sql_add_column);
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
        $user_id = $data['renamed_by'];
        $report_id = $data['old_report_id'];
        $new_report_name = $data['new_report_name'];

        $this->db->select('*');
        $this->db->from('ipw_rename_report');
        $this->db->where('renamed_by', $user_id);
        $this->db->where('old_report_id', $report_id);

        if ($this->db->count_all_results() == 0) {
            if ($this->db->insert('ipw_rename_report', $data)) {
                return true;
            }
        } else {
            if ($this->db->set('new_report_name', $new_report_name)
                            ->where('renamed_by', $user_id)
                            ->where('old_report_id', $report_id)
                            ->update('ipw_rename_report')) {
                return true;
            }
        }
    }

    function createReport($data) {
        if ($this->db->insert('ipw_create_report', $data)) {
            return true;
        }
    }

    function searchReporttables() {

        $query = $this->db->query("SELECT @n := @n + 1 n,table_name FROM  information_schema.TABLES, (SELECT @n := 7) m WHERE TABLE_SCHEMA =  'piw' AND table_name LIKE  'ipw_rept%' order by CREATE_TIME ASC");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function deleteRenamedReport($id) {
        $this->db->where('id_rename_report', $id);
        $this->db->delete('ipw_rename_report');
    }

    function getUserReports($userId) {
        $query = $this->db->select('*')
                ->from("ipw_rename_report")
                ->where('renamed_by', $userId)
                ->get();

        $ret = $query->result_array();
        return $ret;
    }

}

?>