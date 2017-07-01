<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Home_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('projection', '', TRUE);
        $this->load->model('user', '', TRUE);
        $this->load->model('files', '', TRUE);
        $this->load->model('biblio', '', TRUE);
        $this->load->model('demande', '', TRUE);


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

        $retPrj = $this->projection->getProjection($id_projection, $date_debut, $date_fin, $per_page, $page, $order[0], $search['value']);
        $dataPrj = $retPrj["data"];
        $ret = array("draw" => intval($this->input->post('draw')),
            "recordsTotal" => intval($retPrj["num_row"]),
            "recordsFiltered" => intval($retPrj["num_row"]),
            "data" => $dataPrj   // total data array
        );

        $datas = json_encode($ret);
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

    public function biblio($id_bib, $id_sous_bib = 0) {
        $data = $this->data;
        $data["idBib"] = json_encode($id_bib);
        $data["id_categ"] = json_encode($id_bib);
        $data["id_sous_categ"] = json_encode($id_sous_bib);
        $data["fetch_data"] = $this->files->fetch_data($id_bib, $id_sous_bib);
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
            if ($this->biblio->add_categ($data)) {
                $this->session->set_flashdata('msg-add', "<div  class='brav-fix alert alert-success text-center'>" . $this->lang->line("msg_add") . "</div>");
                redirect(base_url() . "index.php/add-biblio");
            }
            $this->load->view("addBib");
        }
    }

    public function add_sous_biblio() {
        $nom = $this->input->post('nom');
        $id_cat = $this->input->post('id_cat');
        $desc = $this->input->post('desc');
        $data = array('lib_sous_categ‏_nom' => $nom, 'lib_sous_categ‏_desc' => $desc, 'lib_sous_categ‏_categ' => $id_cat, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));
        if ($this->biblio->add_sous_categ($data)) {
            $this->session->set_flashdata('msg-add', "<div  class='brav-fix alert alert-success text-center'>" . $this->lang->line("msg_add") . "</div>");
            redirect(base_url() . "index.php/add-biblio");
        }
        $this->load->view("addBib");
    }

    public function demandeSpecifique() {
        $this->data["allDemandes_json"] = json_encode($this->demande->getAllDemandes());
        $this->load->view("demande", $this->data);
    }

    public function addDemande() {
        $objet = $this->input->post('objet');
        $msg = $this->input->post('message');
        $data = array('objet' => $objet, 'message' => $msg, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));
        if ($this->demande->add_demande($data)) {
            $this->session->set_flashdata('msg-success', "<div  class='brav-fix alert alert-success text-center'>" . $this->lang->line("msg_success") . "</div>");
            redirect(base_url() . "index.php/demande");
        }
    }

    public function download($file) {
        $this->load->helper('download');
        $data = file_get_contents(base_url() . 'uploads/' . $file);
        force_download($file, $data);
    }

    public function delete_data($id, $name, $categ, $sous_categ) {
        $this->load->model('files');
        $this->files->delete_data($id);
        unlink('./uploads/' . $name); // delete file
        redirect('biblio/' . $categ . '/' . $sous_categ, 'refresh');
    }

    /*     * ************ Upload_multi_file************ */

    public function upload_file() {
        //var_dump($_FILES['newFiles'][file_ext]); die;  
        $this->data["fetch_data"] = $this->files->fetch_data();

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'txt|docx|pdf|doc|xls|xlsx';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);
       
        if ($this->input->post('fileSubmit') && !empty($_FILES['newFiles']['name'])) {
            $filesCount = count($_FILES['newFiles']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
                $_FILES['userFile']['name'] = $_FILES['newFiles']['name'][$i];
                $_FILES['userFile']['type'] = $_FILES['newFiles']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $_FILES['newFiles']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $_FILES['newFiles']['error'][$i];
                $_FILES['userFile']['size'] = $_FILES['newFiles']['size'][$i];

                if ($this->upload->do_upload('userFile')) {
                    $fileData = $this->upload->data();
                    $ext = $fileData['file_ext'];
                    $uploadData[$i]['nom_fichier'] = $fileData['file_name'];
                    $uploadData[$i]['calendrier'] = $this->input->post('calender');
                    $uploadData[$i]['heure_lib'] = $this->input->post('heureLib');
                    $uploadData[$i]['job'] = basename($fileData['file_name'], $ext);
                    $uploadData[$i]['lib_categ_id'] = $this->input->post("libCat");
                    $uploadData[$i]['lib_sous_categ_id'] = $this->input->post("libSousCat");
                    $uploadData[$i]['vega'] = $this->input->post('vega');
                }
            }
            if (!empty($uploadData)) {
                //Insert file information into the database

                $this->files->add_file($uploadData);
                $categ = $this->input->post("libCat");
                $sous_categ = $this->input->post("libSousCat");
                redirect('biblio/' . $categ . '/' . $sous_categ, 'refresh');
            }
        }
    }

    /*     * ************ Upload file from table biblio************ */

    public function upload_extra_file() {
        $this->load->helper(array('form'));
        $this->data["fetch_data"] = $this->files->fetch_data();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'txt|docx|pdf|doc|xls|xlsx';
        $config['max_size'] = '';
        $config['max_width'] = '';
        $config['max_height'] = '';
        $this->load->library('upload', $config);
        

        if ($this->upload->do_upload('extraFile')) {
            $row_id = $this->input->post('row_id');      //récupérer la ligne du tableau depuis laquelle se fait l'upload
            $categ = $this->input->post('id_categ');
            $sous_categ = $this->input->post('id_sous_categ');
            $upload_data = $this->upload->data();        // récupérer les donnée du fichier uploadé
            $name = $upload_data['file_name'];           // garder le nom du fichier dans la variable $name
            $ext = $upload_data['file_ext'];              // garder l'extension du fichier dans la variable $ext
            $title = basename($name, $ext);               // garder le nom du fichier sans extension dans la variable $title
            $this->files->update_file($row_id, $name, $title);
            redirect('biblio/' . $categ . '/' . $sous_categ, 'refresh');
        }
    }

    public function list_scat() {
        $id_cat = $this->input->post('id_cat');
        $ret = $this->biblio->fetch_sous_categ($id_cat);
        $datas = json_encode($ret);
        // var_dump($id_cat);die;
        header('Content-Type: application/json');
        echo $datas;
    }

    public function search_bib() {
        $file_cnt = $this->input->post('cnt_file');
        $data_fetch = $this->files->fetch_data(0, 0, $file_cnt);
        $this->data["fetch_data"] = $data_fetch;
        $this->load->view("partial/table_biblio.php", $this->data);
    }

    public function rename_form() {
        $this->load->view("renameReport", $this->data);
    }

    public function create_form() {

        $this->data['rpt_tables_json'] = json_encode($this->report->searchReporttables());
        //var_dump($this->report->searchReporttables());die;
        $this->load->view("createReport", $this->data);
    }

    public function rename_report() {

        $id_projection = $this->input->post('id_projection');
        $new_name = $this->input->post('new_name');
        $old_name = $this->projection->getNameTable($id_projection);
        $data = array('renamed_by' => $this->data['id_user_connected'], 'new_report_name' => $new_name, 'old_report_name' => $id_projection);

        if ($this->report->renameReport($data)) {
            $this->session->set_flashdata('msg-modif', "<div  class='brav-fix alert alert-success text-center'>" . $this->lang->line("msg_modif") . "</div>");
            //traduction ici 
        }

        redirect(base_url() . "index.php/home/rename_form");
    }

    public function create_report() {
        $report_categ = $this->input->post('report_categ');
        $new_name = $this->input->post('new_name');
        $old_name = $this->input->post('old_name');
        $data = array('renamed_by' => $this->data['id_user_connected'], 'new_report_name' => $new_name, 'old_report_name' => $old_name, 'report_categ' => $report_categ);

        if ($this->report->createReport($data)) {
            $this->session->set_flashdata('msg-modif', "<div  class='brav-fix alert alert-success text-center'>" . $this->lang->line("msg_modif") . "</div>");
        }

        redirect(base_url() . "index.php/home/create_form");
    }

    public function delete_report($id) {
        $data = array('deleted_by' => $this->data['id_user_connected'], 'id_report' => $id);
        $this->report->saveDeletedReport($data);
    }

    public function delete_report_menu($id) {
        $this->report->deleteCreatedReport($id);
        $this->delete_report($id);

    }

    public function add_report_categ() {
        $nom_report_categ = $this->input->post('nom_report_categ');
        $id_projection = $this->input->post('id_projection');

        $data = array('nom_report_categ' => $nom_report_categ, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));
        if ($this->report->addReportCateg($data)) {
            $this->session->set_flashdata('msg', '<div  class="brav-fix alert alert-success text-center">La categorie a été créée avec succès !! </div>');
        }

        redirect(base_url() . "index.php/projection/" . $id_projection);
    }

    public function add_report_sous_categ() {

        $report_categ_id = $this->input->post('nom_report_categ');
        $nom_report_sous_categ = $this->input->post('nom_report_sous_categ');
        $id_projection = $this->input->post('id_projection');

        $data = array('report_categ' => $report_categ_id, 'nom_report_sous_categ' => $nom_report_sous_categ, 'added_by' => $this->data['id_user_connected'], 'added_at' => date('Y-m-d H:i:s', time()));

        if ($this->report->addReportSousCateg($data)) {
            $this->session->set_flashdata('msg', '<div  class="brav-fix alert alert-success text-center">La categorie a été créée avec succès !! </div>');
        }

        redirect(base_url() . "index.php/projection/" . $id_projection);
    }

    public function assign_categ() {
        $id_categ = $this->input->post('report_categ');
        $id_sous_categ = $this->input->post('report_sous_categ');
        $id_report = $this->input->post('report_id');

        if ($id_sous_categ == null) {
            $id_sous_categ = 0;
        }
        $this->report->assignCateg($id_report, $id_categ, $id_sous_categ);
             
        redirect(base_url() . "index.php/projection/" . $id_report);
    }

}
