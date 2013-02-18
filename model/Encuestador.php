<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Main.php';
class Encuestador extends Main {
    function Search($query) {
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM vencuestadoractiva WHERE encuestador ilike :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }

    function Search_u($query){
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM vencuestadorunicri WHERE encuestador ilike :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    function Search_s($query){
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM vencuestadorunicri_s WHERE encuestador ilike :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>