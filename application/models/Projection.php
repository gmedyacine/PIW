<?php

Class Projection extends CI_Model {

    protected $tab_projection_id = array();
    protected $egalDateFiltre = false;
    protected $dateDebut;
    protected $dateFin;

    public function __construct() {
        $this->load->model('report', '', TRUE);
        $tab_report_crt = $this->report->searchReporttables();
        if (empty($tab_report_crt))
            return;
        foreach ($tab_report_crt as $rpt) {
            $rest_check = $this->getColonneName($rpt["table_name"]);
            $rest_structure = array("table" => $rpt["table_name"]) + $rest_check;
            $this->tab_projection_id+= array($rpt["n"] => $rest_structure);
        }
    }

    public function getProjection($id_projection = "0", $date_debut = null, $date_fin = null, $per_page = 8000, $page = 0, $colone_order = null, $search_value = null) {

        $this->dateDebut = $date_debut;
        $this->dateFin = $date_fin;

        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];
        $filtre = $this->tab_projection_id[$id_projection]["date_filtre"];

        $this->db->select('*');
        $this->db->from($projection);

        if ($date_fin && $dateFin = $this->validateDate($date_fin . " 23:59:59")) {
            $this->db->where($filtre . " <=", $dateFin);
        }
        if ($date_debut == $date_fin) {
            $this->egalDateFiltre = true;
        }
        if ($date_debut && $datDeb = $this->validateDate($date_debut . " 00:00:00")) {
            $this->db->where($filtre . " >=", $datDeb);
        }
        if (!empty($search_value)) {
            $this->db->like($this->tab_projection_id[$id_projection]["tab_colonne"][0], $search_value);
            foreach ($this->tab_projection_id[$id_projection]["tab_colonne"] as $col) {
                $this->db->or_like($col, $search_value);
            }
        }
        $db = clone $this->db;
        $num_row = $db->get()->num_rows();

        if (!empty($colone_order)) {
            $this->db->order_by($this->tab_projection_id[$id_projection]["tab_colonne"][$colone_order["column"]], $colone_order["dir"]);
        } else {
            $this->db->order_by($filtre, " desc");
        }


        $this->db->limit($per_page, $page);
        $query = $this->db->get();
        $arrayAss = $query->result_array();
        // echo $this->db->last_query();
        //  die;
        $ret["data"] = array();
        foreach ($arrayAss as $row) {
            $ret["data"][] = array_values($row);
        }
        $ret["num_row"] = $num_row;
        $ret["lastDate"] = !empty($arrayAss) ? $arrayAss[0][$filtre] : "";
        return $ret;
    }

    public function getNameColonne($id_projection) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];

        $ret = $this->db->list_fields($projection);
        return $ret;
    }

    public function getNameTable($id_projection) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $table = $this->tab_projection_id[$id_projection]["table"];

        return $table;
    }

    private function validateDate($date, $format = "Y-m-d H:i:s") {
        $d = DateTime::createFromFormat($format, $date);
        if ($this->egalDateFiltre) {
            $d->modify("-1 day")->modify(" +23 hour")->modify("+59 minute");
        }

        if ($d && $d->format($format)) {
            return $d->format($format);
        } else {
            return false;
        }
    }

    public function getLignesAlert() {
        $this->db->select('proj_code,max(job_date) as job_date,status');
        $this->db->from('ipw_charge_reports_stat');
        $this->db->where_in('status', array("0", "ERROR", "ERREUR", "KO"));
        $this->db->group_by("proj_code");
        // $this->db->where('proj_code not in');
        $query = $this->db->get();

        $retStatChrg["st_rep"] = $query->result();

        $this->db->select('nom_tache,alias,agent,max(endup_time) as endup_time');
        $this->db->from('ipw_status_task');
        $this->db->where_in('statut', array("0", "ERROR", "ERREUR", "KO"));
        $this->db->group_by("nom_tache");
        // $this->db->where('proj_code not in');
        $querySt = $this->db->get();

        $retStatChrg["st_tach"] = $querySt->result();
        return $retStatChrg;
    }

    public function ecritJournal($dataInsert) {
        $this->creatJournal();
        if (empty($dataInsert))
            return;
        $this->db->insert_batch('ipw_log_alert', $dataInsert);
    }

    private function creatJournal() {
        $query = 'CREATE TABLE IF NOT EXISTS `ipw_log_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
        $this->db->query($query);
    }

    public function checkAlertExistLog($code) {
        $this->db->select('*');
        $this->db->from('ipw_log_alert');
        $this->db->where('code', $code);
        $queryReq = $this->db->get();
        $num = $queryReq->num_rows();
        if ($num > 0) {
            return true;
        }
        return false;
    }

    public function showAllReports() {

        $this->db->query("show tables from  like 'ipw%';");
                foreach ($this->result() as $prj) {
            
        }
    }

    private function getCreatedRept() {
        $this->db->select('*');
        $this->db->from('ipw_create_report');
        $req = $this->db->get();
        $result = $req->result();
        return $result;
    }

    private function getColonneName($table_name) {
        $fields = $this->db->field_data($table_name);
        $date_filtre="";
        foreach ($fields as $field) {
            $tab_col[] = $field->name;
            if (in_array($field->type, array("date", "datetime", "timestamp"))) {
                $date_filtre = $field->name;
            }
        }
        if (empty($date_filtre)) {
            $sql_add_column = "ALTER TABLE  `" . $table_name . "` ADD  default_date  TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ;";
            if ($this->db->query($sql_add_column)) {
                
            } else {
                
            }
            $date_filtre = "default_date";
        }
        $ret = array("tab_colonne" => $tab_col, "date_filtre" => $date_filtre);
        return $ret;
    }

}

?>
