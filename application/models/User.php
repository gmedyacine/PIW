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
        $query_creat="CREATE TABLE IF NOT EXISTS piw_users (
  id tinyint(4) NOT NULL AUTO_INCREMENT,
  username varchar(10) NOT NULL,
  password varchar(100) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;";
        $this->db->query($query_creat);
        
        $query_insert="INSERT INTO piw_users (id, username, password) VALUES
(1, 'sup_user', '5ddd2ef311a9bd6179dac0c21502f47e');";
         $this->db->query($query_insert);
    }

}

?>