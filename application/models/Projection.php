<?php

Class Projection extends CI_Model {

    protected $tab_projection_id = array(
        "1" => array("table" => "ipw_charge_reports_stat", "date_filtre" => "job_date"),
        "2" => array("table" => "ipw_chrg_rep_temps", "date_filtre" => "date_chargement"),
        "3" => array("table" => "ipw_crt_masteri", "date_filtre" => "date_oper"),
        "4" => array("table" => "ipw_status_task", "date_filtre" => "startup_time"),
        "5" => array("table" => "ipw_suivi_vega", "date_filtre" => "date_suivi"));

    public function getProjection($id_projection = "0", $per_page=10,$page=0,$date_debut = null, $date_fin = null) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];
        $filtre = $this->tab_projection_id[$id_projection]["date_filtre"];

        $this->db->select('*');
        $this->db->from($projection);

        if ($date_debut && $this->validateDate($date_debut)) {
            $this->db->where($filtre . " >=", $date_debut);
        }
        if ($date_fin && $this->validateDate($date_fin)) {
            $this->db->where($filtre . " <=", $date_fin);
        }
        $this->db->order_by($filtre, " desc");
        $this->db->limit($per_page,$page);
        $query = $this->db->get();

        $ret = $query->result();
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

    private function validateDate($date, $format = 'Y-m-d') {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
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
        if(empty($dataInsert)) return;
        $this->db->insert_batch('ipw_log_alert',$dataInsert);
    }

    private function creatJournal() {
         $query = 'CREATE TABLE IF NOT EXISTS `ipw_log_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
        $this->db->query($query);   
         
    }
    
    public function checkAlertExistLog($code){
        $this->db->select('*');
        $this->db->from('ipw_log_alert');
        $this->db->where('code',$code);
        $queryReq=$this->db->get();
        $num=$queryReq->num_rows();
        if($num > 0){
            return true;
        }
        return false;
    }

}

?>