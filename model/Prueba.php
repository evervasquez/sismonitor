<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of prueba
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class  Prueba extends Main 
{
    
    function index($query , $p ) 
	{
        $sql = "SELECT prueba_id, area.area, fecha FROM prueba INNER JOIN area ON prueba.area_id = area.area_id WHERE area.area LIKE :query OR prueba_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT prueba_id, area_id, fecha FROM prueba WHERE prueba_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function mostrar($id) 
    {
        $stmt = $this->db->prepare("SELECT prueba_id, area_id, fecha FROM prueba WHERE prueba_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function _verprueba($id ) 
    {
        $stmt = $this->db->prepare("SELECT
        prueba.prueba_id,
        area.area,
        prueba.fecha,
        tipo_preg.descripcion,
        pregunta_p.descripcion_p,
        pregunta_p.pregunta_id,
        pregunta_p.peso,
        alternativa.alternativa_id,
        alternativa.descripcion_a,
        alternativa.ponderado
        FROM
        prueba
        INNER JOIN area ON prueba.area_id = area.area_id
        INNER JOIN pregunta_p ON prueba.prueba_id = pregunta_p.prueba_id
        INNER JOIN tipo_preg ON pregunta_p.tipopreg_id = tipo_preg.tipopreg_id
        INNER JOIN alternativa ON pregunta_p.pregunta_id = alternativa.pregunta_id WHERE prueba.prueba_id = :id ORDER BY pregunta_p.pregunta_id asc, alternativa_id asc");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
    }
    
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO prueba (area_id,fecha) VALUES (:p1 , :p2)");
        $stmt->bindValue(':p1', $_P['area_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['fecha'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $stmt = $this->db->prepare("UPDATE prueba SET  area_id = :p1, fecha= :p2 WHERE prueba_id = :p3");
        $stmt->bindValue(':p1', $_P['area_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['fecha'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['prueba_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM prueba WHERE prueba_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
}
?>