<?php

class MY_Controller extends CI_Controller {

    protected $data = array('title' => 'Login', "id_projection" => 0, "idBib" => 0, 'role' => 2,"id_categ"=>0,"id_sous_categ"=>0);

    public function __construct() {
        parent::__construct();
    }

    //put your code here
}

class Home_Controller extends MY_Controller {

    protected $projections = array("1" => "STATUS CHARGEMENT",
        "2" => "TEMPS CHARGEMENT ",
        "3" => "COMPTE RENDU MASTERI",
        "4" => "STATUS TACHES",
        "5" => "TACHES VEGA");

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $this->load->model('biblio', '', TRUE);
        $dataLogin = $this->session->userdata('logged_in');
        $this->data['id_user_connected'] = $dataLogin["id"];
        $this->data['id_param'] = 0;
        $this->data['role'] = $dataLogin["role"];
        $this->data["projections"] = json_encode($this->projections);
        $this->data["menu"] = json_encode($this->biblio->fetch_menu());
         $this->data["id_param"] = 0;;
    }

    protected function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
