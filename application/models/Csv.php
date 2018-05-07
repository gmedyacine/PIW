<?php

Class Csv extends CI_Model {

    function create_table($table, $champs) {

        $this->load->dbforge();

        $attributes = array('ENGINE' => 'InnoDB');

        $fields = array();

        $string = $champs[0];
        $string = str_replace('"', ' ', $string);
        $string = str_replace(', ', ' , ', $string);
        $champs_array = explode(' , ', $string);
        $isId = FALSE;

        if ($isId == FALSE) {
            $this->dbforge->add_field('id');
            // gives id INT(9) NOT NULL AUTO_INCREMENT 
        }

        foreach ($champs_array as $champ) {
            $champ = trim($champ);
            if ($champ == 'id') {
                $isId = TRUE;
                $fields[$champ] = array(
                    'type' => 'INT',
                    'constraint' => 15,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                );
            } else {

                $fields[$champ] = array(
                    'type' => 'VARCHAR',
                    'constraint' => '1000',
                    'null' => TRUE,
                );
            }
        }

        $this->dbforge->add_field($fields);


        if ($this->dbforge->create_table($table, TRUE, $attributes)) {
            return true;
        } else {
                return false;
        }
    }

    function insert($table, $data) {
        //  var_dump($data); die;

          $query = $this->db->insert_batch($table, $data);
          
          
        //  echo $str; die;
        // returns null if SQL error occurs.
//$res = $this->db->query($str);

//        if (!$res) {
//            // if query returns null
//            $msg = $this->db->_error_message();
//            $num = $this->db->_error_number();
//
//            $data['msg'] = "Error(" . $num . ") " . $msg;
//            $this->load->view('error_db', $data);
        }
    }



?>