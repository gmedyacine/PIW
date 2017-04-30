<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projection', '', TRUE);
        $this->load->model('user', '', TRUE);
        $this->load->model('files', '', TRUE);
        $this->load->model('biblio', '', TRUE);


        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->helper('url');

        $this->load->library('session');
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
        $retPrj = $this->projection->getProjection($id_projection, $date_debut, $date_fin, $per_page, $page, $order[0], $search['value']);
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
        $this->data['id_param'] = json_encode("menu_users");
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

    public function biblio($id_bib,$id_sous_bib=0) {
        $data = $this->data;
        $data["idBib"]= json_encode($id_bib);
        $data["id_categ"]= json_encode($id_bib);
        $data["id_sous_categ"]= json_encode($id_sous_bib);
        $data["fetch_data"] = $this->files->fetch_data($id_bib,$id_sous_bib);
        $this->load->view("biblio", $data);
    }

    public function fetch_biblio() {
        $data = $this->data;
        $data["idCat"] = json_encode("categ");
        $data["fetch_data"] = $this->biblio->fetch_categ();
        $this->load->view("addBib", $data);
    }

    function delete_biblio($idCat) {
        $this->biblio->delete_categ($idCat);
        redirect('add-biblio', 'refresh');
    }
    
    function delete_sous_biblio($idSCat) {
        $this->biblio->delete_sous_categ($idSCat);
        redirect('add-biblio', 'refresh');
    }

    public function add_biblio() {
        $this->load->helper(array('form'));

        //$this->load->helper('security');
        $this->load->library('form_validation');
        $this->data['data_categs'] = json_encode($this->biblio->fetch_categ());
        $this->data['id_param'] = json_encode("categ");
        $this->data['data_sous_categs'] = json_encode($this->biblio->fetch_sous_categ());
        $this->form_validation->set_rules('nom', 'Nom', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('addBib', $this->data);
        } else {
            $nom = $this->input->post('nom');
            $desc = $this->input->post('description');
            $data = array('lib_categ' => $nom, 'commentaire' => $desc, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));
            $this->biblio->add_categ($data);
            $this->session->set_flashdata('msg', '<div  class="brav-fix alert alert-success text-center">Insertion avec succès !! </div>');
            redirect(base_url() . "index.php/add-biblio");

            $this->load->view("addBib");
        }
    }

    public function add_sous_biblio() {
        $nom = $this->input->post('nom');
        $id_cat = $this->input->post('id_cat');
        $desc = $this->input->post('desc');
        $data = array('lib_sous_categ‏_nom' => $nom, 'lib_sous_categ‏_desc' => $desc,'lib_sous_categ‏_categ' => $id_cat, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));
        $this->biblio->add_sous_categ($data);
        $this->session->set_flashdata('msg', '<div class=" brav-fix alert alert-success text-center">Insertion sous categorie avec succès !! </div>');
        redirect(base_url() . "index.php/add-biblio");

        $this->load->view("addBib");
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
                    $categ = $this->input->post("lib_cat");
                    $sous_categ= $this->input->post("lib_sous_cat");
                    $vega = $this->input->post('vega');
                    $data_to_add = array("job" => $job, "calendrier" => $calender, "heure_lib" => $heure_lib, "vega" => $vega,"lib_categ_id"=>$categ,"lib_sous_categ_id"=>$sous_categ, "nom_fichier" => $name);
                    $this->files->add_file($data_to_add);
                    redirect('biblio/'.$categ.'/'.$sous_categ, 'refresh');
                }
            } else {
                $this->files->update_file($row_id, $name);
                redirect('biblio', 'refresh');
            }
        }
    }

    public function list_scat() {
        $id_cat = $this->input->post('id_cat');
        $ret=$this->biblio->fetch_sous_categ($id_cat);
        $datas = json_encode($ret);
       // var_dump($id_cat);die;
        header('Content-Type: application/json');
        echo $datas;
    }
    
    public function search_bib(){
          $file_cnt = $this->input->post('cnt_file');
           $data_fetch=$this->files->fetch_data(0,0,$file_cnt);
           $this->data["fetch_data"]=$data_fetch;
           $this->load->view("partial/table_biblio.php",$this->data);
          
    }

}
