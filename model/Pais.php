<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'Main.php';
class Pais extends Main {
    function Search($query) {
        $query = "%".$query."%";
        $statement = $this->db->prepare("SELECT * FROM vpais WHERE pais LIKE :query");
        $statement->bindParam (":query", $query , PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    function getNombrePais($id) {
        $stmt = $this->db->prepare("SELECT pai_nombre pais FROM pai_pais WHERE pai_pk = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
}
?>