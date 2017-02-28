<?php

Class User extends CI_Model {

    function login($username, $password) {
        $this->db->select('id, username, password');
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
        $sql_stat_drop = "DROP TABLE IF EXISTS piw_users;";
        $this->db->query($sql_stat_drop);
        $query_creat = "CREATE TABLE IF NOT EXISTS `piw_users` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `num_tel` varchar(15) NOT NULL,
  `notif_mail` tinyint(1) NOT NULL,
  `notif_sms` tinyint(1) NOT NULL,
  `sup_user` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;";
        $this->db->query($query_creat);

        $query_insert = "INSERT INTO `piw_users` (`id`, `username`, `password`, `mail`, `num_tel`, `notif_mail`, `notif_sms`, `sup_user`) VALUES
(1, 'sup_user', '5ddd2ef311a9bd6179dac0c21502f47e', '', '0', 0, 0, 1),
(7, 'farid', '10fadc2981c5d4e062a690518b7f14e2', 'gmedyacine@gmail.com', '0716154343', 1, 1, 0);";
        $this->db->query($query_insert);
    }

    public function insertUser($uname, $mail, $tel, $notif_mail = 1, $notif_sms = 1, $sup_user = 0) {
        $user_to_add = array(
            'username' => $uname,
            'password' => md5($uname . "123"),
            'mail' => $mail,
            'num_tel' => $tel,
            'notif_mail' => !empty($notif_mail),
            'notif_sms' => !empty($notif_sms),
            'sup_user' => !empty($sup_user));

        $this->db->insert('piw_users', $user_to_add);
        return true;
    }

    public function updateUser($id, $uname, $mail, $notif_sms = 0, $notif_mail = 1, $sup_user = 0) {
        $this->db->update();
    }

    public function getAllUsers() {
        $this->db->select('id,username,mail,num_tel,notif_mail,notif_sms,sup_user');
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