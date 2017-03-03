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
            $oper= $this->input->post('oper');
            $notifMail = $this->input->post('notifMail');
            $notifSms = $this->input->post('notifSms');
            var_dump($username, $mail, $tel, $notifMail, $notifSms, $admin);die;
            $this->user->insertUser($username, $mail, $tel, $notifMail, $notifSms, $admin);
            redirect('parametrage', 'refresh');
        }
    }

    function deleteUser($idUser) {
        $this->user->deleteUser($idUser);
        redirect('parametrage', 'refresh');
    }
	
public function biblio() {

$data["fetch_data"]=$this->files->fetch_data();

$this->load->view("biblio",$data);
}	

public function download($file) {
$this->load->helper('download');

$data=file_get_contents(base_url().'uploads/'.$file);

force_download($file,$data);

}

public function delete_data($id,$name){

   
	$this->load->model('files');
	$this->files->delete_data($id);
	unlink('./uploads/'.$name); // delete file
	redirect(base_url()."index.php/biblio");



}

        public function upload_file()
        {

		
		
                $config['upload_path']          = './uploads/';
              $config['allowed_types']        = 'txt|docx|pdf|doc|';
               //$config['max_size']             = 100;
               // $config['max_width']            = 1024;
               // $config['max_height']           = 768;
         

                 /*$this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('new_file'))
                {
                       
						echo"Error !!";
                       
                }
                else
                {    
				      
				       echo"Success !!";
					
                } 
				*/
				
        }


}
