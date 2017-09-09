<?php

Class Report extends CI_Model {

    function getAllReportCateg() {
        $query = $this->db->select('*')
                ->from("ipw_report_categ")
                ->where('archived', 0)
                ->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }
    function getArchivedReportCateg() {
        $query = $this->db->select('*')
                ->from("ipw_report_categ")
                ->where('archived', 1)
                ->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }
    

    function getAllReportSubCateg() {
        $query = $this->db->select('*')
                ->from("ipw_report_sous_categ")
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                //->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }

    function getAllReportSubCategById($id) {
        $query = $this->db->select('*')
                ->from("ipw_report_sous_categ")
                ->where('report_categ', $id)
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                //->join("piw_users", 'piw_users.id = added_by')
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret;
    }

    function getCreatedRept() {
        $query = $this->db->select('old_report_name as id, new_report_name, report_categ, report_sous_categ')
                ->from("ipw_create_report")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        $tab_ret = array();
        foreach ($ret as $lineRep) {
            $tab_ret[$lineRep["id"]] = $lineRep["new_report_name"];
        }
        return $tab_ret; // return just id, new_report_name
    }

    function getCreatedReptFull() {
        $query = $this->db->select('*')
                ->from("ipw_create_report")
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                ->join("ipw_report_sous_categ", 'ipw_report_sous_categ.id_report_sous_categ = report_sous_categ', "LEFT OUTER")
                ->join("ipw_chart", 'ipw_chart.id_report = old_report_name', "LEFT OUTER")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret; // return all fields of table : ipw_create_report
    }

    function getCreatedReptFullByCat($id) {
        $query = $this->db->select('*')
                ->from("ipw_create_report")
                ->where('ipw_create_report.report_categ', $id)
                ->join("ipw_report_categ", 'ipw_report_categ.id_report_categ = report_categ')
                ->join("ipw_report_sous_categ", 'ipw_report_sous_categ.id_report_sous_categ = report_sous_categ', "LEFT OUTER")
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        return $ret; // return all fields of table : ipw_create_report
    }

    function addReportCateg($data) {
        if ($this->db->insert('ipw_report_categ', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function addReportSousCateg($data) {
        if ($this->db->insert('ipw_report_sous_categ', $data)) {
            return true;
        } else {
            return false;
        }
    }

    function createReport($data, $chart) {

        if (!empty($chart)) { // si le tableau $chart n'est pas vide .. on le créé le rapport et on créé son configuration
            if (($this->db->insert('ipw_create_report', $data)) && ($this->db->insert('ipw_chart', $chart))) {
                return true;
            }
        } else {
            if ($this->db->insert('ipw_create_report', $data)) {
                return true;
            }
        }
    }

    function renameReport($data, $chart) {
        $report_id = $data['old_report_name'];
        $new_report_name = $data['new_report_name'];


        if (!empty($chart)) { // si le tableau $chart n'est pas vide .. on le créé le rapport et on créé son configuration
            if (($this->db->set('new_report_name', $new_report_name)
                            ->where('old_report_name', $report_id)
                            ->update('ipw_create_report')) && ($this->db->insert('ipw_chart', $chart))) {
                return true;
            }
        } else {
            if ($this->db->set('new_report_name', $new_report_name)
                            ->where('old_report_name', $report_id)
                            ->update('ipw_create_report')) {
                return true;
            }
        }
    }

    function manager_report() { // pour afficher les tables report
        $sql_show = "show tables where tables_in_" . $this->db->database . "  like 'ipw_rept%'and tables_in_" . $this->db->database . " not in (select report from ipw_reports_show)";
        $query_show = $this->db->query($sql_show);
        $ret_show = $query_show->result_array();
        foreach ($ret_show as $key => $ret) {
            $set = array_values($ret);
            $ret_insert = array("report" => $set[0]);
            $req_ins = $this->db->insert("ipw_reports_show", $ret_insert);
        }
    }

    function searchReporttables() {
        $query = $this->db->query("SELECT id as n,report as table_name FROM ipw_reports_show WHERE id NOT IN
                    (SELECT id_report FROM ipw_delete_report)");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function searchAllowReport() {
        $query = $this->db->query("SELECT id as n,report as table_name FROM ipw_reports_show WHERE id NOT IN
                    (SELECT id_report FROM ipw_delete_report UNION SELECT old_report_name FROM ipw_create_report)");
        $ret = $query->result_array();
        return $ret;
        //return $query->num_rows();
    }

    function deleteCreatedReport($id) {
        $this->db->where('old_report_name', $id);
        $this->db->delete('ipw_create_report');
    }

    function saveDeletedReport($data) {
        if ($this->db->insert('ipw_delete_report', $data)) {
            return true;
        }
    }

    function fetch_menu_report() {
        $menu = $this->getAllReportCateg();
        $ret =array();
        foreach ($menu as $report) {
            $ret[] = array("id_menu" => $report["id_report_categ"],
                "report_menu" => $report["nom_report_categ"],
                "sous_menu" => $this->getCreatedReptFullByCat($report["id_report_categ"]));
        }
        return $ret;
    }
    function fetch_archived_menu_report() {
        $menu = $this->getArchivedReportCateg();
        $ret = array();
        foreach ($menu as $report) {
            $ret[] = array("id_menu" => $report["id_report_categ"],
                "report_menu" => $report["nom_report_categ"],
                "sous_menu" => $this->getCreatedReptFullByCat($report["id_report_categ"]));
        }
        return $ret;
    }

    function dropQuery() {
        $sql_show = "show tables where tables_in_" . $this->db->database . "  like 'ipw_rept%'";
        $query_show = $this->db->query($sql_show);
        $ret_show = $query_show->result_array();

        foreach ($ret_show as $key => $ret) {
            $set = array_values($ret);
            $tableName = $set[0];

            $sql_drop_column_cat = "ALTER TABLE  `" . $tableName . "` DROP COLUMN  `report_categ` ;";
            $sql_drop_column_sous_cat = "ALTER TABLE  `" . $tableName . "` DROP COLUMN  `report_sous_categ` ;";
            $this->db->query($sql_drop_column_cat);
            $this->db->query($sql_drop_column_sous_cat);
        }
    }

    function getCalender() {
        $query = $this->db->distinct()
                ->select('calendrier')
                ->from('ipw_files')
                ->order_by('calendrier', 'ASC')
                ->get();
        $ret = $query->result_array(); // selectionner les dates 
        $result = array(); // declarer le tableau des resultats
        foreach ($ret as $key => $val) {
            $date = array_values($val);
            $result[] = $date[0];  // enregistrer la valeur de la date dans $calender
        }
        return $result; //  retourne les dates sans répétition  
    }

    function getNbrUploads() {
        $query = $this->db->distinct()
                ->select('calendrier')
                ->from('ipw_files')
                ->order_by('calendrier', 'ASC')
                ->get();
        $ret = $query->result_array(); // selectionner les date 
        $result = array(); // declarer le tableau des resultats
        foreach ($ret as $key => $val) {
            $date = array_values($val);
            $calender = $date[0];  // enregistrer la valeur de la date dans $calender
            $queryCount = $this->db->select('count(*)')
                    ->from('ipw_files')
                    ->where('calendrier', $calender)
                    ->get();
            $res = $queryCount->result_array();  // selectionner le nombre de fichiers par date
            foreach ($res as $key => $val) {
                $set = array_values($val);
                $count = intval($set[0]);
                // $result[$calender] = $count; // stocker la combinaison (date,nbr_upload) dans un tableau associatif
                $result[] = $count; // stocker les resultats (les nbr de Uploads)dans un tableau non associatif
            }
        }
        return $result; // retourne les nbr de downloads
    }

    function getChartReportId($id) {
        $query = $this->db->select('id_report')
                ->from("ipw_chart")
                ->where('id_report', $id)
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();
        $report;
        foreach ($ret as $key => $val) {
            $set = array_values($val);
            $report = intval($set[0]);
        }
        if ($ret) {
            return $report; // return all fields of table : ipw_create_report
        } else {
            return null;
        }
    }

    function getChartConfig($id) {
        $query = $this->db->select('*')
                ->from("ipw_chart")
                ->where('id_report', $id)
                ->join("ipw_reports_show", 'ipw_reports_show.id = id_report')
                ->join("ipw_create_report", 'ipw_create_report.old_report_name = id_report')
                ->get();

        $ret = $query->result_array();

        if ($ret) {
            return $ret; // return all fields of table : ipw_create_report
        } else {
            return null;
        }
    }

    function editChart($id_projection, $chartType, $chartTitle, $chartX, $chartY, $multi) {
        if ($this->db->set('chartType', $chartType)
                        ->set('chartTitle', $chartTitle)
                        ->set('chartX', $chartX)
                        ->set('chartY', $chartY)
                        ->set('multi', $multi)
                        ->where('id_report', $id_projection)
                        ->update('ipw_chart')) {
            return true;
        }
    }

    function createChart($chart) {
        if ($this->db->insert('ipw_chart', $chart)) {
            return true;
        }
    }

    function deleteChart($id) {
        $this->db->where("id_report", $id);
        $this->db->delete("ipw_chart");
    }

    function getSeries($report, $multi) {
        if ($multi) {
            $query = $this->db->select($multi)
                    ->from($report)
                    ->get(); //select * from ipw_report_categ‏

            $ret = $query->result_array();
            $series = array();
            $data = array();
            $multi = explode(",", $multi);

            foreach ($multi as $row) {

                foreach ($ret as $cle => $valeur) {
                    $data['name'] = $row;
                    $data['data'] = array_column($ret, $row);
                    //var_dump( $data['data']);
                    $data['data'] = array_map('intval', $data['data']); // Convertir les valeurs en entiers pour pouvoir les afficher sur le graphique
                }
                $series[] = $data;
            }
            return $series;
        }
    }

    function getXData($report, $xAxis) {
        if ($xAxis) {
            $query = $this->db->select($xAxis)
                    ->from($report)
                    ->get(); //select * from ipw_report_categ‏

            $ret = $query->result_array();

            $xData = array();

            foreach ($ret as $cle => $valeur) {
                $data = array_values($valeur);
                $element = $data[0];
                $xData[] = $element;
            }
            return $xData;
        }
    }

    function getOriginalReportName($id) {
        $query = $this->db->select('report')
                ->from('ipw_reports_show')
                ->where('id', $id)
                ->get(); //select * from ipw_report_categ‏

        $ret = $query->result_array();

        if ($ret) {
            return $ret[0]; // return all fields of table : ipw_create_report
        } else {
            return null;
        }
    }

    function getAllCharts() {
        $query = $this->db->select('*')
                ->from('ipw_chart')
                ->join("ipw_reports_show", 'ipw_reports_show.id = id_report')
                ->get(); //select * from ipw_chart

        $ret = $query->result_array();
        $allData = array();
        foreach ($ret as $row) {
            $xData = $this->getXData($row["report"], $row["chartX"]);
            $row["xData"] = $xData;
            $series = $this->getSeries($row["report"], $row["multi"]);
            $row["series"] = $series;
            $allData[] = $row;
        }

        return $allData;
    }

    function renameCategory($idCat, $newName) {
        if ($this->db->set('nom_report_categ', $newName)
                        ->where('id_report_categ', $idCat)
                        ->update('ipw_report_categ')) {
            return true;
        }
    }

    function deleteCategory($idCat) {
        $this->db->where("id_report_categ ", $idCat);
        $this->db->delete("ipw_report_categ");
    }

    function deleteReportByCateg($idCat) {
        
        $query = $this->db->select('old_report_name')
                ->from("ipw_create_report")
                ->where('report_categ', $idCat)
                ->get();

        $ret = $query->result_array(); // récupérer les id des rapports de la catégorie $idCat
        
        foreach ($ret as $key => $val) {
            $id = array_values($val);
            $this->deleteChart($id[0]);
            $this->deleteCreatedReport($id[0]);
        }
             
    }

    function deleteGroupByCateg($idCat) { //supprimer tous les sous categ d'une categorie bien détérminée
        $this->db->where("report_categ", $idCat);
        $this->db->delete("ipw_report_sous_categ");
    }
    
    function isArchived($id){
         $query = $this->db->select('archived')
                ->from("ipw_report_categ")
                ->where('id_report_categ', $id)
                ->get();

        $ret = $query->result_array(); // récupérer les id des rapports de la catégorie $idCat
        $archived;
        foreach ($ret as $key => $val) {
            $id = array_values($val);
            $archived = $id[0];
        }
        return $archived;
    }
    
    function moveToArchive($id){
        if ($this->db->set('archived', 1)
                        ->where('id_report_categ', $id)
                        ->update('ipw_report_categ')) {
            return true;
        }
        
    }

}

?>