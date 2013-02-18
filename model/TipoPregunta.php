<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuesta
 *
 * @author sophie
 */
require_once 'Main.php';
class  TipoPregunta extends Main {
    
    function index($query , $p ) {
        $sql = "SELECT idtipo_pregunta , parte.descripcion encuesta , tipo_pregunta.descripcion
                FROM tipo_pregunta INNER JOIN parte ON tipo_pregunta.idparte = parte.idparte
                WHERE tipo_pregunta.descripcion LIKE :query OR CAST(idtipo_pregunta AS VARCHAR ) = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM tipo_pregunta WHERE idtipo_pregunta = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {       
        $stmt = $this->db->prepare("INSERT INTO tipo_pregunta (idparte,descripcion) VALUES (:p1 , UPPER(:p2))");
        $stmt->bindValue(':p1', $_P['idparte'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {        
        $stmt = $this->db->prepare("UPDATE tipo_pregunta SET  idparte = :p1 , descripcion = UPPER(:p2) WHERE idtipo_pregunta = :p3");
        $stmt->bindValue(':p1', $_P['idparte'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['idtipo_pregunta'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM tipo_pregunta WHERE idtipo_pregunta = :p1");
        $stmt->bindValue(':p1', $_P['idtipo_pregunta'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
