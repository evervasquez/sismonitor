<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Proyecto
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class  Proyecto extends Main 
{
    
    function index($query , $p )
	{
        $sql = "SELECT
		proyecto.proyecto_id,
		proyecto.proyecto,
		proyecto.fecha
		FROM
		proyecto
		WHERE proyecto LIKE :query OR  fecha LIKE :query OR proyecto_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM proyecto WHERE proyecto_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO proyecto (proyecto_id,proyecto,fecha) VALUES (:p1 , UPPER(:p2), :p3)");
        $stmt->bindValue(':p1', $_P['proyecto_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['fecha'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $stmt = $this->db->prepare("UPDATE proyecto SET  proyecto = UPPER(:p1), fecha = :p2 WHERE proyecto_id = :p3");
        $stmt->bindValue(':p1', $_P['proyecto'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['fecha'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['proyecto_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM proyecto WHERE proyecto_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
