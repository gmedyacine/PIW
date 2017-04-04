<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projection', '', TRUE);
        $this->load->model('user', '', TRUE);
        $this->load->model('files', '', TRUE);

        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('url');
    }

    public function index() {
        $this->data["title"] = "Selectionnez une projection";
        $this->load->view('main_select', $this->data);
    }

    public function logout() {
        parent::logout();
    }

    public function projection($id) {

        $retPrj = $this->projection->getProjection($id);
        $dataPrj = $retPrj["data"];
        $dataColonneNames = $this->projection->getNameColonne($id);
        $this->data["dataTable"] = json_encode($dataPrj);
        $this->data["dataNameColonne"] = json_encode($dataColonneNames);
        $this->data["id_projection"] = $id;
        $this->data["title"] = "Afficher Ma projection";
        $lastDate = $retPrj["lastDate"];
        $this->data['lastDate'] = json_encode($lastDate);
        $this->load->view("projection", $this->data);
    }

    public function excuteFiltre() {
        $date_debut = $this->input->post('date_debut');
        $date_fin = $this->input->post('date_fin');
        $per_page = $this->input->post('length');
        $page = $this->input->post('start');
        $id_projection = $this->input->post('idPrj');
        $order = $this->input->post('order');
        $search = $this->input->post('search');
        //var_dump($oder);die;
        $retPrj = $this->projection->getProjection($id_projection, $date_debut, $date_fin, $per_page, $page, $order[0],$search['value']);
        $dataPrj = $retPrj["data"];
        $ret = array("draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($retPrj["num_row"]),
            "recordsFiltered" => intval($retPrj["num_row"]),
            "data" => $dataPrj   // total data array
        );
      
        $datas = json_encode($ret);
        // var_dump($datas);die;
        header('Content-Type: application/json');
        echo $datas;
    }

    public function parametrage() {
        $this->load->helper(array('form'));
        $users = $this->user->getAllUsers();
        $this->data["title"] = "Parametrage de notification";
        $this->data["users"] = json_encode($users);

        $this->load->view("parametrage", $this->data);
    }

    public function addUser() {
        $this->load->helper(array('form'));
        $this->load->helper('security');
        $this->load->library('form_validation');

        $users = $this->user->getAllUsers();
        $this->data["title"] = "Parametrage de notification";
        $this->data["users"] = json_encode($users);

        $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
        $this->form_validation->set_rules('mail', 'E-Mail', 'trim|required|valid_email|xss_clean');
        $this->form_validation->set_rules('tel', 'Téléphone', 'required|xss_clean|alpha_numeric_spaces');
        $this->form_validation->set_rules('admin', 'Admin', 'xss_clean');
        $this->form_validation->set_rules('notifSms', 'Notif mail', 'xss_clean');
        $this->form_validation->set_rules('notifMail', 'Notif sms', 'xss_clean');


        if ($this->form_validation->run() == FALSE) {
            //Field validation failed.  User redirected to login page
            $this->load->view('parametrage', $this->data);
        } else {
            $username = $this->input->post('username');
            $mail = $this->input->post('mail');
            $tel = $this->input->post('tel');
            $admin = $this->input->post('admin');
            $oper = $this->input->post('oper');
            $notifMail = $this->input->post('notifMail');
            $notifSms = $this->input->post('notifSms');
            $this->user->insertUser($username, $mail, $tel, $notifMail, $notifSms, $admin);
            redirect('parametrage', 'refresh');
        }
    }

    function deleteUser($idUser) {
        $this->user->deleteUser($idUser);
        redirect('parametrage', 'refresh');
    }

    public function biblio() {
        $data = $this->data;
        $data["idBib"] = json_encode("bib_vega");
        $data["fetch_data"] = $this->files->fetch_data();
        $this->load->view("biblio", $data);
    }

    public function download($file) {
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'uploads/' . $file);
        force_download($file, $data);
    }

    public function delete_data($id, $name) {


        $this->load->model('files');
        $this->files->delete_data($id);
        unlink('./uploads/' . $name); // delete file
        redirect(base_url() . "index.php/biblio");
    }

    public function upload_file() {
        $this->load->helper(array('form'));
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->data["fetch_data"] = $this->files->fetch_data();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'txt|docx|pdf|doc|';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('new_file')) {
            $error = array('error' => $this->upload->display_errors());
            $this->data['error_upload'] = $error;
            $this->load->view('biblio', $this->data);
        } else {
            $row_id = $this->input->post('row_id');
            $upload_data = $this->upload->data();
            $name = $upload_data['file_name'];
            if (empty($row_id)) {
 $this->form_validation->set_rules('job', 'Job', 'trim|required|xss_clean');
				$this->form_validation->set_rules('heure_lib', 'heure_lib', 'trim|required|xss_clean');
                $this->form_validation->set_rules('calender', 'Calender', 'trim|required|xss_clean');
                $this->form_validation->set_rules('vega', 'Vega', 'required|xss_clean');

                if ($this->form_validation->run() == FALSE) {
                    $this->load->view('biblio', $this->data);
                } else {
                    $calender = $this->input->post('calender');
					$heure_lib = $this->input->post('heure_lib');
                    $job = $this->input->post('job');
                    $vega = $this->input->post('vega');
                    $data_to_add = array("job" => $job, "calendrier" => $calender, "heure_lib" => $heure_lib, "vega" => $vega, "nom_fichier" => $name);
                    $this->files->add_file($data_to_add);
                    redirect('biblio', 'refresh');
                }
            } else {
                $this->files->update_file($row_id, $name);
                redirect('biblio', 'refresh');
            }
        }
    }

}
