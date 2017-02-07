<?php

Class Projection extends CI_Model {

    protected $tab_projection_id = array("1" => "ipw_charge_reports_stat",
        "2" => "ipw_chrg_rep_temps",
        "3" => "ipw_crt_masteri",
        "4" => "ipw_status_task",
        "5" => "ipw_suivi_vega");

    public function getProjection($id_projection = "0", $date_debut = null, $date_fin = null) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection];
        $this->db->select('*');
        $this->db->from($projection);
        if ($date_debut) {
            // traitement date debut
        }
        if ($date_fin) {
            // traitement date fin
        }
        $query = $this->db->get();

        return $query->result();
    }

    public function getNameColonne($id_projection) {
        if (!array_key_exists($id_projection, $this->tab_projection_id)) {
            return;
        }
        $projection = $this->tab_projection_id[$id_projection];
       
        $ret=$this->db->list_fields($projection);
        return $ret;
    }

}

?>