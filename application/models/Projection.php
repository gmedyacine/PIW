<?php

Class Projection extends CI_Model {

    protected $tab_projection_id = array(
        "1" => array("table" => "ipw_charge_reports_stat", "date_filtre" => "job_date"),
        "2" => array("table" => "ipw_chrg_rep_temps", "date_filtre" => "temps_execution"),
        "3" => array("table" => "ipw_crt_masteri", "date_filtre" => "date_oper"),
        "4" => array("table" => "ipw_status_task", "date_filtre" => "startup_time"),
        "5" => array("table" => "ipw_suivi_vega", "date_filtre" => "date_suivi"));

    public function getProjection($id_projection = "0", $date_debut = null, $date_fin = null) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection]["table"];
        $filtre = $this->tab_projection_id[$id_projection]["date_filtre"];
        
        $this->db->select('*');
        $this->db->from($projection);

        if ($date_debut&&$this->validateDate($date_debut)) {
           $this->db->where($filtre." >=",$date_debut);
        }
        if ($date_fin&&$this->validateDate($date_fin)) {
           $this->db->where($filtre." <=",$date_fin);
       }
       $this->db->order_by($filtre," desc");
        $query = $this->db->get();

        $ret=$query->result();
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
    
   
    private function validateDate($date, $format = 'Y-m-d')
{
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
} 

}

?>