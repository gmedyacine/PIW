<?php

Class Projection extends CI_Model
{

    protected $tab_projection_id = array(
        "1" => array("table" => "ipw_charge_reports_stat", "date_filtre" => "job_date", "tab_colonne" => array( "proj_code", "job_count", "job_date", "status")),
        "2" => array("table" => "ipw_chrg_rep_temps", "date_filtre" => "date_chargement", "tab_colonne" => array( "report_nom","temps_execution", "date_chargement")),
        "3" => array("table" => "ipw_crt_masteri", "date_filtre" => "date_oper", "tab_colonne" => array("programme", "date_oper", "temps_execution")),
        "4" => array("table" => "ipw_status_task", "date_filtre" => "startup_time", "tab_colonne" => array("id", "tache_id","plan_id", "plan_name", "nom_tache","date_reference", "startup_time", "endup_time", "elapsed", "statut", "monitor", "alias", "agent", "procedure")),
        "5" => array("table" => "ipw_taches_vega", "date_filtre" => "date_suivi", "tab_colonne" => array("id", "date_suivi", "scheduled", "tache", "num_tsk", "plan_id", "plan_name", "procedure", "libelle", "comments")));

    protected $egalDateFiltre = false;

    protected $dateDebut;
    protected $dateFin;

    public function getProjection($id_projection = "0", $date_debut = null, $date_fin = null, $per_page = 8000, $page = 0, $colone_order = null,$search_value=null)
    {

        $this->dateDebut = $date_debut;
        $this->dateFin = $date_fin;

        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];
        $filtre = $this->tab_projection_id[$id_projection]["date_filtre"];

        $this->db->select('*');
        $this->db->from($projection);

        if ($date_fin &&$dateFin=$this->validateDate($date_fin . " 23:59:59")) {
            $this->db->where($filtre . " <=", $dateFin);
        }
        if ($date_debut == $date_fin) {
            $this->egalDateFiltre = true;
        }
        if ($date_debut && $datDeb=$this->validateDate($date_debut . " 00:00:00")) {
            $this->db->where($filtre . " >=", $datDeb);
        }
        if(!empty($search_value)){
              $this->db->like($this->tab_projection_id[$id_projection]["tab_colonne"][0], $search_value);
            foreach ($this->tab_projection_id[$id_projection]["tab_colonne"] as $col){
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

        foreach ($arrayAss as $row) {
            $ret["data"][] = array_values($row);
        }
        $ret["num_row"] = $num_row;
        $ret["lastDate"] = !empty($arrayAss) ? $arrayAss[0][$filtre] : "";
        return $ret;
    }

    public function getNameColonne($id_projection)
    {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];

        $ret = $this->db->list_fields($projection);
        return $ret;
    }

    private function validateDate($date, $format = "Y-m-d H:i:s")
    {
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

    public function getLignesAlert()
    {
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

    public function ecritJournal($dataInsert)
    {
        $this->creatJournal();
        if (empty($dataInsert)) return;
        $this->db->insert_batch('ipw_log_alert', $dataInsert);
    }

    private function creatJournal()
    {
        $query = 'CREATE TABLE IF NOT EXISTS `ipw_log_alert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(250) NOT NULL, 
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;';
        $this->db->query($query);

    }

    public function checkAlertExistLog($code)
    {
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

}

?>