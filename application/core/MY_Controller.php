<?php


class MY_Controller extends CI_Controller {

    protected $data = array('title' => 'Login');

    public function __construct() {
        parent::__construct();
    }

    //put your code here
}

class Home_Controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('login', 'refresh');
        }
    }

    protected function logout() {
        $this->session->unset_userdata('logged_in');
        session_destroy();
        redirect('login', 'refresh');
    }

}
