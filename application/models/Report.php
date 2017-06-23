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
	
    function getCreatedRept() {
        $query = $this->db->select('old_report_name as id, new_report_name')
                ->from("ipw_create_report")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        $tab_ret = array();
        foreach ($ret as $lineRep) {
            $tab_ret[$lineRep["id"]] = $lineRep["new_report_name"];
        }
        return $tab_ret;
    }

function creatQuery() {
     $sql_show= "show tables where tables_in_".$this->db->database."  like 'ipw_rept%'";
	 $query_show = $this->db->query($sql_show);
     $ret_show = $query_show->result_array();
         foreach ($ret_show as $key=>$ret){
		 $set=array_values($ret);
		 $tableName=$set[0] ;
		
        $sql_add_column1 = "ALTER TABLE  `".$tableName."` ADD  `report_categ` INT DEFAULT NULL;";
		$sql_add_column2 = "ALTER TABLE  `".$tableName."` ADD  `report_sous_categ` INT DEFAULT NULL;";
        $this->db->query($sql_add_column1);
		$this->db->query($sql_add_column2);
    }
}

    function assignCateg($tableName,$idCateg, $idSousCateg) {
        $sql_assign_categ = "UPDATE `".$tableName."` SET  `report_categ` =  ".$idCateg.";";
		$sql_assign_sous_categ = "UPDATE `".$tableName."` SET  `report_sous_categ` =  ".$idSousCateg.";";
        $this->db->query($sql_assign_categ);
		$this->db->query($sql_assign_sous_categ);
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

    function manager_report(){
        $sql_show="show tables where tables_in_".$this->db->database."  like 'ipw_rept%'and tables_in_".$this->db->database." not in (select report from ipw_reports_show)";
         $query_show = $this->db->query($sql_show);
         $ret_show = $query_show->result_array();
         foreach ($ret_show as $key=>$ret){
             $set=array_values($ret);
             $ret_insert=array("report"=>$set[0] );
             $req_ins= $this->db->insert("ipw_reports_show",$ret_insert);
         }
    }
    function searchReporttables() {
        $query = $this->db->query("SELECT id as n,report as table_name FROM ipw_reports_show WHERE id NOT IN
                    (SELECT id_report FROM ipw_delete_report)");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function deleteRenamedReport($id) {
        $this->db->where('id_rename_report', $id);
        $this->db->delete('ipw_rename_report');
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