<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projection', '', TRUE);
        $this->load->model('user', '', TRUE);
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
        $this->load->view('main_select', $this->data);
    }

    public function logout() {
        parent::logout();
    }

    public function projection($id) {
        $dataPrj = $this->projection->getProjection($id);
        $dataColonneNames = $this->projection->getNameColonne($id);
        $this->data["dataTable"] = json_encode($dataPrj);
        $this->data["dataNameColonne"] = json_encode($dataColonneNames);
        $this->data["id_projection"] = $id;
        $this->data["title"] = "Afficher Ma projection";
        $this->load->view("projection", $this->data);
    }

    public function excuteFiltre() {
        $date_debut = $this->input->post('date_debut');
        $date_fin = $this->input->post('date_fin');

        $id_projection = $this->input->post('idPrj');
        $dataPrj = $this->projection->getProjection($id_projection, $date_debut, $date_fin);
        $datas = json_encode($dataPrj);
        header('Content-Type: application/json');
        echo $datas;
    }

    function checkDateFormat($date) {
        if (preg_match("/[0-9]{4}\/[0-12]{2}\/[0-31]{2}/", $date)) {
            if (checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public function parametrage() {
        $users = $this->user->getAllUsers();
        $this->data["title"] = "Parametrage de notification";
        $this->data["users"] = json_encode($users);

        $this->load->view("parametrage", $this->data);
    }

}
