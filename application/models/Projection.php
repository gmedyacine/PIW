<?php

Class Projection extends CI_Model {

    protected $tab_projection_id = array("1" => "ipw_charge_reports_stat",
        "2" => "ipw_chrg_rep_temps",
        "3" => "ipw_crt_masteri",
        "4" => "ipw_status_task",
        "5" => "ipw_status_task");

   public function getProjection($id_projection="0",$date_debut=null,$date_fin=null) {
        $projection = $this->tab_projection_id[$id_projection];
        $this->db->select('*');
        $this->db->from($projection);
        if($date_debut){
            // traitement date debut
        }
        if($date_fin){
            // traitement date fin
        }
        
        

        $query = $this->db->get();

        return $query->result();
    }

}

?>