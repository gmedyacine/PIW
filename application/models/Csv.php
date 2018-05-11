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

        $query = $this->db->table_exists($table); // test if table exists

        if (!$query) {
            //table does not exist
            
            if ($this->dbforge->create_table($table, TRUE, $attributes)) {
                return true;
            } else {
                return false;
            }
        } else {
            // table exists
            $this->session->set_flashdata('table-exist', "<div  class='brav-fix alert alert-warning text-center'>" . $this->lang->line("table_exist") . "</div>");
            redirect(base_url() . "index.php/create-report");
        }
    }

    function insert($table, $data) {
        if ($this->db->insert_batch($table, $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function drop_table($table) {
         if ($this->dbforge->drop_table($table, TRUE)) {
            return TRUE;
        } else {
            return FALSE;
        }
        if ($this->db->error()) {
            $this->session->set_flashdata('error-delete', "<div  class='brav-fix alert alert-warning text-center'>" . $this->lang->line("error_delete") . "</div>");
            redirect(base_url() . "index.php/create-report");
        }
    }

}

?>