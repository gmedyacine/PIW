<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('projection','',TRUE);
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     * 	- or -
     * 		http://example.com/index.php/welcome/index
     * 	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index() {
        $this->data["title"] = "Selectionnez une projection";
        
        $projection = array("1" => "STATUS CHARGEMENT REPORTS",
            "2" => "TEMPS_CHARGEMENT_REPORTS",
            "3" => "COMPTE RENDU MASTERI",
            "4" => "STATUS TACHES",
            "5" => "SUIVI VEGA",
            "120" => "PARAMETRAGE");
        
        $this->data["projections"] = json_encode($projection);
        
        $this->load->view('main_select', $this->data);
    }

    public function logout() {
        parent::logout();
    }

    public function projection($id) {
        $result = $this->projection->getProjection($id);
        $this->data["dataTable"]= json_encode($result);
        $this->data["id_projection"]= $id;
        $this->data["title"] = "Afficher Ma projection";
        $projection = array("0" => "STATUS CHARGEMENT REPORTS",
            "1" => "TEMPS_CHARGEMENT_REPORTS",
            "2" => "COMPTE RENDU MASTERI",
            "3" => "STATUS TACHES",
            "4" => "SUIVI VEGA",
            "5" => "PARAMETRAGE");
        $this->data["projections"] = json_encode($projection);
        $this->load->view("projection", $this->data);
    }

}
