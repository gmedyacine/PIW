<?php

class MY_Controller extends CI_Controller {

    protected $data = array('title' => 'Login', "id_projection" => 0, "idBib" => 0, 'role' => 2, "id_categ" => 0, "id_sous_categ" => 0);

    public function __construct() {
        parent::__construct();
    }

    //put your code here
}

class Home_Controller extends MY_Controller {

    protected $projections = array();

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
        $this->load->model('biblio', '', TRUE);
        $this->load->model('report', '', TRUE);
        $dataLogin = $this->session->userdata('logged_in');
        $this->data['id_user_connected'] = $dataLogin["id"];
        $this->data['id_param'] = 0;
        $this->data['role'] = $dataLogin["role"];
        $this->report->manager_report();
        $this->data["projections"] = json_encode($this->report->getCreatedRept());
        $this->data["projectionsFull"] = json_encode($this->report->getCreatedReptFull());
        $this->data["menu"] = json_encode($this->biblio->fetch_menu());
        $this->data['data_categs'] = json_encode($this->biblio->fetch_categ());
        $this->data['data_sous_categs'] = json_encode($this->biblio->fetch_sous_categ());
        $this->data['report_categ_json'] = json_encode($this->report->getAllReportCateg());
        $this->data['report_sous_categ_json'] = json_encode($this->report->getAllReportSubCateg());
	$this->data["menu_report"] = json_encode($this->report->fetch_menu_report());
        
    }

    protected function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
