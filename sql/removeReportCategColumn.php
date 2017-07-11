<?php

function dropQuery() {
     $sql_show= "show tables where tables_in_".$this->db->database."  like 'ipw_rept%'";
	 $query_show = $this->db->query($sql_show);
     $ret_show = $query_show->result_array();
        
		foreach ($ret_show as $key=>$ret){
		 $set=array_values($ret);
		 $tableName=$set[0] ;
		
         $sql_drop_column_cat = "ALTER TABLE  `".$tableName."` DROP COLUMN  `report_categ` ;";
		 $sql_drop_column_sous_cat = "ALTER TABLE  `".$tableName."` DROP COLUMN  `report_sous_categ` ;";
         $this->db->query($sql_drop_column_cat);
		 $this->db->query($sql_drop_column_sous_cat);
    }
}
?>         
