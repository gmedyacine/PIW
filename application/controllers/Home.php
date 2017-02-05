<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

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
        $projection = array("0" => "projection 1", "1" => "projection 2", "2" => "projection 3");
        $this->data["projections"] = json_encode($projection);
        $this->load->view('main_select', $this->data);
    }
    
    public function logout(){
         parent::logout();
    }

}
