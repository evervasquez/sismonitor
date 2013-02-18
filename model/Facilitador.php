<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Facilitador
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class  Facilitador extends Main 
{
    
    function index($query , $p ) 
	{
        $sql = "SELECT
		facilitador.facilitador_id,
		facilitador.dni,
		facilitador.nombres,
		facilitador.apellidos,
		facilitador.fecha_nac
		FROM
		facilitador
		WHERE dni LIKE :query OR fecha_nac LIKE :query OR nombres LIKE :query OR apellidos LIKE :query OR facilitador_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
		array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM facilitador WHERE facilitador_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO facilitador (facilitador_id,dni,nombres,apellidos,fecha_nac) VALUES (:p1 , :p2, UPPER(:p3), UPPER(:p4), :p5)");
        $stmt->bindValue(':p1', $_P['facilitador_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['fecha_nac'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $stmt = $this->db->prepare("UPDATE facilitador SET  dni= :p1, nombres = UPPER(:p2), apellidos = UPPER(:p3), fecha_nac = :p4 WHERE facilitador_id = :p5");
        $fe= explode('/',$_P['fecha_nac']);
        $stmt->bindValue(':p1', $_P['dni'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $fe[2].'-'.$fe[1].'-'.$fe[0], PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['facilitador_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM facilitador WHERE facilitador_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
