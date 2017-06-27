<?php

function creatQuery() {
     $sql_show= "show tables where tables_in_".$this->db->database."  like 'ipw_rept%'";
	 $query_show = $this->db->query($sql_show);
     $ret_show = $query_show->result_array();
        
		foreach ($ret_show as $key=>$ret){
		 $set=array_values($ret);
		 $tableName=$set[0] ;
		
         $sql_add_column_cat = "ALTER TABLE  `".$tableName."` ADD  `report_categ` INT DEFAULT NULL;";
		 $sql_add_column_sous_cat = "ALTER TABLE  `".$tableName."` ADD  `report_sous_categ` INT DEFAULT NULL;";
         $this->db->query($sql_add_column_cat);
		 $this->db->query($sql_add_column_sous_cat);
    }
}
?>         
