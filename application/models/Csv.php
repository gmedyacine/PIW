<?php

Class Csv extends CI_Model {

    function create_table($table, $champs) {

        $this->load->dbforge();

        $attributes = array('ENGINE' => 'InnoDB');
        $fields = array();

        $isId = FALSE;

        if ($isId == FALSE) {
            $this->dbforge->add_field('id');
            // gives id INT(9) NOT NULL AUTO_INCREMENT 
        }

        foreach ($champs as $champ) {
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

        $create_table = $this->dbforge->create_table($table, TRUE, $attributes);
        if ($this->db->error()) {
            redirect(base_url() . "index.php/create-report");
        }

        if ($create_table) {
            return true;
        } else {
            return false;
        }
    }

    function insert($table, $data) {
        $query = $this->db->insert_batch($table, $data);
        if ($query) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>