<?php

function creatQuery() {
    $tab_projection = array("ipw_charge_reports_stat",
        "ipw_chrg_rep_temps",
        "ipw_crt_masteri",
        "ipw_status_task",
        "ipw_taches_vega",
        "ipw_rept_distribuicao_vendas",
        "ipw_rept_list_agents",
        "ipw_rept_report_ledger",
        "ipw_rept_statement",
        "ipw_rept_statement_bim",
        "ipw_rept_subscriptions_by_txntype");
    foreach ($tab_projection as $tableName) {
        $sql_add_column = "ALTER TABLE  `".$tableName."` ADD  `report_categ_id` INT DEFAULT NULL;";
        $this->db->query($sql_add_column);
    }
}
?>         
