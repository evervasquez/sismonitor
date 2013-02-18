<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of detalle_proyecto
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class Detalle_proyecto extends Main
{
    function index($query , $p ) 
    {
        $sql = "SELECT
				detalle_proyecto.detalle_proyecto_id,
				detalle_proyecto.proyecto_id,
				proyecto.proyecto,
				proyecto.fecha,
				detalle_proyecto.prueba_id,
				area.area,
				prueba.fecha
				FROM
				detalle_proyecto
				INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
				INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
				INNER JOIN area ON prueba.area_id = area.area_id
                WHERE proyecto.proyecto LIKE :query OR proyecto.fecha LIKE :query OR area.area LIKE :query OR prueba.fecha LIKE :query OR detalle_proyecto.detalle_proyecto_id = :id  OR detalle_proyecto.proyecto_id = :id  OR detalle_proyecto.prueba_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT
				detalle_proyecto.detalle_proyecto_id,
				detalle_proyecto.proyecto_id,
				proyecto.proyecto,
				proyecto.fecha,
				detalle_proyecto.prueba_id,
				area.area,
				prueba.fecha
				FROM
				detalle_proyecto
				INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
				INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
				INNER JOIN area ON prueba.area_id = area.area_id
				WHERE detalle_proyecto.detalle_proyecto_id= :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function mostrar($id) 
    {
        $stmt = $this->db->prepare("SELECT pregunta_p.pregunta_id, prueba.prueba_id, area.area, prueba.fecha, tipo_preg.tipopreg_id, pregunta_p.peso, pregunta_p.descripcion_p FROM pregunta_p INNER JOIN prueba ON pregunta_p.prueba_id = prueba.prueba_id INNER JOIN tipo_preg ON pregunta_p.tipopreg_id = tipo_preg.tipopreg_id INNER JOIN area ON prueba.area_id = area.area_id WHERE pregunta_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
	{
        $stmt = $this->db->prepare("INSERT INTO detalle_proyecto (detalle_proyecto_id,proyecto_id,prueba_id) VALUES ( :p1 , :p2, :p3 )");
        $stmt->bindValue(':p1', $_P['detalle_proyecto_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['proyecto_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['prueba_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
	{
        $stmt = $this->db->prepare("UPDATE detalle_proyecto SET  proyecto_id = :p2 , prueba_id = :p3 WHERE detalle_proyecto_id = :p1");
        $stmt->bindValue(':p1', $_P['detalle_proyecto_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['proyecto_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['prueba_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM detalle_proyecto WHERE detalle_proyecto_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
