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
                    'constraint' => 9,
                    'unsigned' => TRUE,
                    'auto_increment' => TRUE
                );
            } else {

                $fields[$champ] = array(
                    'type' => 'VARCHAR',
                    'constraint' => '100',
                    'null' => TRUE,
                );
            }
        }

    
        
      //  $this->dbforge->add_key('id', TRUE);
        // gives PRIMARY KEY (id)
        $this->dbforge->add_field($fields);


        $this->dbforge->create_table($table, TRUE, $attributes);
    }

}

?>