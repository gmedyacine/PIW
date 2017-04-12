<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, username, password,sup_user as role');
        $this->db->from('piw_users');
        $this->db->where('username', $username);
        $this->db->where('password', MD5($password));
        $this->db->limit(1);

        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function creatQuery() {
        $sql_stat_alter = "ALTER TABLE  `ipw_files` ADD  `lib_categ_id` INT NOT NULL DEFAULT  '0',
ADD  `lib_sous_categ_id` INT NOT NULL DEFAULT  '0';";
        $this->db->query($sql_stat_alter);
        $query_creat = "CREATE TABLE IF NOT EXISTS `ipw_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendrier` varchar(200) NOT NULL,
  `job` varchar(200) NOT NULL,
  `vega` varchar(200) NOT NULL,
  `nom_fichier` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;";
      //  $this->db->query($query_creat);

        $query_insert = "INSERT INTO `ipw_files` (`id`, `calendrier`, `job`, `vega`, `nom_fichier`) VALUES
(1, 'LUNDI_AU_SAMEDI', 'JOB_1_UNIX', 'Vega', 'cdc_site1.docx'),
(3, 'JEUDI', 'JOB_3_WIN7', 'Vega', 'JOB_3_WIN7.doc'),
(4, 'SAMEDI', 'JOB_4_LINUX', 'Vega', 'JOB_4_LINUX.txt');";
        //$this->db->query($query_insert);
    }

    public function insertUser($uname, $mail, $tel, $notif_mail = 1, $notif_sms = 1, $sup_user = 0) {
        $user_to_add = array(
            'username' => $uname,
            'password' => md5($uname . "123"),
            'mail' => $mail,
            'num_tel' => $tel,
            'notif_mail' => !empty($notif_mail),
            'notif_sms' => !empty($notif_sms),
            'sup_user' => $sup_user);

        $this->db->insert('piw_users', $user_to_add);
        return true;
    }

    public function updateUser($id, $uname, $mail, $notif_sms = 0, $notif_mail = 1, $sup_user = 0) {
        $this->db->update();
    }

    public function getAllUsers() {
        $this->db->select('id,username,mail,num_tel,notif_mail,notif_sms,sup_user');
        $this->db->where_not_in('id',1);
        $this->db->from('piw_users');
        $query = $this->db->get();
        $res = $query->result();
        return $res;
    }

    public function deleteUser($id) {
        $this->db->where('id', $id);
        $this->db->delete('piw_users');
        return true;
    }

}

?>