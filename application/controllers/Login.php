<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('user', '', TRUE);
        $this->load->model('projection', '', TRUE);
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
        //$this->user->creatQuery();
        $this->load->helper(array('form'));
        $this->load->view('login', $this->data);
    }

    public function sendNotif() {

        $dataAlert = $this->projection->getLignesAlert();
        $usersTonotif = $this->user->getAllUsers();
        foreach ($usersTonotif as $user) {
            if ($user->notif_mail) {
                $this->sendMail($user->mail, $dataAlert);
            }
            if ($user->notif_sms) {
                $this->sendSms($user->num_tel, $dataAlert);
            }
        }
    }

    private function sendMail($mail, $dataAlert) {
        if (empty($dataAlert))
            return;
        $ligneLog = array();
        $this->load->library('email');

        $this->email->from('no-replay@ipw.centor-it.fr.com', 'Gharsa');
        $this->email->to($mail);
        $this->email->cc("gmedyacine@gmail.com");

        $this->email->subject('IPW Notification statut');
        $message = "<h2>Liste des projet avec status KO</h2><br>";

        $message .= "<h3> Statut des rapports</h3><br>";
        foreach ($dataAlert["st_rep"] as $alert) {
            list($date, $time) = explode(' ', $alert->job_date);
            if (!$this->projection->checkAlertExistLog($alert->proj_code . "_" . $date)) {
                $message .= "<br><b>*</b> code projet: " . $alert->proj_code . " | job date: " . $alert->job_date;
                $ligneLog[] = array("code" => $alert->proj_code . "_" . $date);
            }
        }

        $message .= "<h3> Statut des taches</h3><br>";
        foreach ($dataAlert["st_tach"] as $alert) {
            list($date, $time) = explode(' ', $alert->endup_time);
            if (!$this->projection->checkAlertExistLog($alert->nom_tache . "_" . $date)) {
                $message .= "<br><b>*</b> nom de tache: " . $alert->nom_tache . " [ " . $alert->alias . " ]  | agent:  " . $alert->agent . " | date fin: " . $alert->endup_time;
                $ligneLog[] = array("code" => $alert->nom_tache . "_" . $date);
            }
        }
        $this->email->message($message);
        $this->email->set_mailtype('html');

        // $this->email->send();
        $this->projection->ecritJournal($ligneLog);
    }

    private function sendSms($tel, $data) {
        if (empty($data))
            return;
        $this->load->library('smsenvoi');
        $message = "Liste des projet avec status KO \n";
        $message .= " Statut des rapports \n";
        foreach ($data["st_rep"] as $alert) {
            list($date, $time) = explode(' ', $alert->job_date);
            if (!$this->projection->checkAlertExistLog($alert->proj_code . "_" . $date)) {
                $message .= "\n *code projet: " . $alert->proj_code . " | job date: " . $alert->job_date;
                $ligneLog[] = array("code" => $alert->proj_code);
            }
        }

        $message .= " Statut des taches";
        foreach ($data["st_tach"] as $alert) {
            list($date, $time) = explode(' ', $alert->endup_time);
            if (!$this->projection->checkAlertExistLog($alert->nom_tache . "_" . $date)) {
                $message .= "\n * nom de tache: " . $alert->nom_tache . " [ " . $alert->alias . " ]  | agent:  " . $alert->agent . " | date fin: " . $alert->endup_time;
                $ligneLog[] = array("code" => $alert->nom_tache);
            }
        }


        //$this->smsenvoi->sendSMS($tel, $message, 'PREMIUM', $senderlabel = 'NOTIFICATION STATUT IPW', '', '', '', 'http://ipw.centor-it.fr/');
        //$credits = $this->smsenvoi->checkCredits();
        //var_dump($credits);
        die;
    }

}
