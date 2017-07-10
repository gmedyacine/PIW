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

    function getAllReportSubCateg() {
        $query = $this->db->select('*')
                ->from("ipw_report_sous_categ")
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                //->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }

    function getAllReportSubCategById($id) {
        $query = $this->db->select('*')
                ->from("ipw_report_sous_categ")
                ->where('report_categ', $id)
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                //->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }

    function getCreatedRept() {
        $query = $this->db->select('old_report_name as id, new_report_name, report_categ, report_sous_categ')
                ->from("ipw_create_report")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        $tab_ret = array();
        foreach ($ret as $lineRep) {
            $tab_ret[$lineRep["id"]] = $lineRep["new_report_name"];
        }
        return $tab_ret; // return just id, new_report_name
    }

    function getCreatedReptFull() {
        $query = $this->db->select('*')
                ->from("ipw_create_report")
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                ->join("ipw_report_sous_categ", 'ipw_report_sous_categ.id_report_sous_categ = report_sous_categ', "LEFT OUTER")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret; // return all fields of table : ipw_create_report
    }

    function getCreatedReptFullByCat($id) {
        $query = $this->db->select('*')
                ->from("ipw_create_report")
                ->where('ipw_create_report.report_categ', $id)
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                ->join("ipw_report_sous_categ", 'ipw_report_sous_categ.id_report_sous_categ = report_sous_categ', "LEFT OUTER")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret; // return all fields of table : ipw_create_report
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

    function addReportSousCateg($data) {
        if ($this->db->insert('ipw_report_sous_categ', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function createReport($data) {
        $user_id = $data['renamed_by'];
        $report_id = $data['old_report_name'];
        $new_report_name = $data['new_report_name'];
        $report_categ = $data['report_categ'];
        $report_sous_categ = $data['report_sous_categ'];

        $this->db->select('*');
        $this->db->from('ipw_create_report');
        $this->db->where('old_report_name', $report_id);

        if ($this->db->count_all_results() == 0) {
            if ($this->db->insert('ipw_create_report', $data)) {
                return true;
            }
        } else {
            if ($this->db->set('new_report_name', $new_report_name)
                            ->set('report_categ', $report_categ)
                            ->set('report_sous_categ', $report_sous_categ)
                            ->where('old_report_name', $report_id)
                            ->update('ipw_create_report')) {
                return true;
            }
        }
    }

    function renameReport($data) {
        $user_id = $data['renamed_by'];
        $report_id = $data['old_report_name'];
        $new_report_name = $data['new_report_name'];

        $this->db->select('*');
        $this->db->from('ipw_create_report');
        $this->db->where('old_report_name', $report_id);

        if ($this->db->count_all_results() == 0) {
            if ($this->db->insert('ipw_create_report', $data)) {
                return true;
            }
        } else {
            if ($this->db->set('new_report_name', $new_report_name)
                            ->where('old_report_name', $report_id)
                            ->update('ipw_create_report')) {
                return true;
            }
        }
    }

    function manager_report() { // pour afficher les tables report
        $sql_show = "show tables where tables_in_" . $this->db->database . "  like 'ipw_rept%'and tables_in_" . $this->db->database . " not in (select report from ipw_reports_show)";
        $query_show = $this->db->query($sql_show);
        $ret_show = $query_show->result_array();
        foreach ($ret_show as $key => $ret) {
            $set = array_values($ret);
            $ret_insert = array("report" => $set[0]);
            $req_ins = $this->db->insert("ipw_reports_show", $ret_insert);
        }
    }

    function searchReporttables() {
        $query = $this->db->query("SELECT id as n,report as table_name FROM ipw_reports_show WHERE id NOT IN
                    (SELECT id_report FROM ipw_delete_report)");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function searchAllowReport() {
        $query = $this->db->query("SELECT id as n,report as table_name FROM ipw_reports_show WHERE id NOT IN
                    (SELECT id_report FROM ipw_delete_report UNION SELECT old_report_name FROM ipw_create_report)");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function deleteCreatedReport($id) {
        $this->db->where('old_report_name', $id);
        $this->db->delete('ipw_create_report');
    }

    function saveDeletedReport($data) {
        if ($this->db->insert('ipw_delete_report', $data)) {
            return true;
        }
    }

    function fetch_menu_report() {
        $menu = $this->getAllReportCateg();
        foreach ($menu as $report) {
            $ret[] = array("id_menu" => $report["id_report_categ"],
                "report_menu" => $report["nom_report_categ"],
                "sous_menu" => $this->getCreatedReptFullByCat($report["id_report_categ"]));
        }
        return $ret;
    }

    function dropQuery() {
        $sql_show = "show tables where tables_in_" . $this->db->database . "  like 'ipw_rept%'";
        $query_show = $this->db->query($sql_show);
        $ret_show = $query_show->result_array();

        foreach ($ret_show as $key => $ret) {
            $set = array_values($ret);
            $tableName = $set[0];

            $sql_drop_column_cat = "ALTER TABLE  `" . $tableName . "` DROP COLUMN  `report_categ` ;";
            $sql_drop_column_sous_cat = "ALTER TABLE  `" . $tableName . "` DROP COLUMN  `report_sous_categ` ;";
            $this->db->query($sql_drop_column_cat);
            $this->db->query($sql_drop_column_sous_cat);
        }
    }

}

?>