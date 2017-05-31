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
        $this->projections += $this->report->getCreatedRept();
        $this->data["projections"] = json_encode($this->rename_reports());
        $this->data["menu"] = json_encode($this->biblio->fetch_menu());
        $this->data['data_categs'] = json_encode($this->biblio->fetch_categ());
        $this->data['data_sous_categs'] = json_encode($this->biblio->fetch_sous_categ());
    }

    protected function rename_reports() {

        $rename = $this->report->getUserReports($this->data['id_user_connected']);
        $new_projections = array();
        foreach ($this->projections as $key => $value) {
            $new_projections[$key] = $value;
            for ($i = 0; $i < sizeof($rename); $i++) {
                if ($key == $rename[$i]['old_report_id']) {
                    $new_projections[$key] = $rename[$i]['new_report_name'];
                }
            }
        }
        return $new_projections;
    }

    protected function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
