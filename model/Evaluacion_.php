<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evaluacion
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class Evaluacion extends Main
{
    function index($query , $p ) 
    {
        $sql = "SELECT
        evaluacion.evaluacion_id,
        proyecto.proyecto,
        area.area,
        CONCAT(estudiante.nombre,' ',estudiante.apellidos) AS estudiante,
        escuela.escuela,
        sum(alternativa.ponderado)
        FROM
        evaluacion
        INNER JOIN detalle_proyecto ON detalle_proyecto.detalle_proyecto_id= evaluacion.prueba_id
        INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
        INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
        INNER JOIN area ON prueba.area_id = area.area_id
        INNER JOIN estudiante ON evaluacion.estudiante_id = estudiante.estudiante_id
        INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
        INNER JOIN detalle_evaluacion ON evaluacion.evaluacion_id = detalle_evaluacion.evaluacion_id
        INNER JOIN alternativa ON detalle_evaluacion.alternativa_id = alternativa.alternativa_id
        WHERE proyecto.proyecto LIKE :query OR area.area LIKE :query OR estudiante.nombre LIKE :query OR estudiante.apellidos LIKE :query OR escuela.escuela LIKE :query OR evaluacion.evaluacion_id = :id GROUP BY evaluacion_id ORDER BY 1 DESC";
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
		evaluacion.evaluacion_id,
		evaluacion.anexo,
		evaluacion.fecha,
		evaluacion.nro_evaluacion,
		evaluacion.prueba_id,
		proyecto.proyecto,
		area.area,
		prueba.fecha AS fecha_p,
		evaluacion.estudiante_id,
		concat(estudiante.nombre,' ',estudiante.apellidos) AS estudiante,
		escuela.escuela,
		tipo_escuela.tipo_escuela
		FROM
		evaluacion
		INNER JOIN detalle_proyecto ON evaluacion.prueba_id = detalle_proyecto.detalle_proyecto_id
		INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
		INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
		INNER JOIN area ON prueba.area_id = area.area_id
		INNER JOIN estudiante ON evaluacion.estudiante_id = estudiante.estudiante_id
		INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
		INNER JOIN tipo_escuela ON escuela.tipo_escuela_id = tipo_escuela.tipo_escuela_id
		WHERE evaluacion.evaluacion_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
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
    function insert($_P) 
    {
        $stmt = $this->db->prepare("INSERT INTO evaluacion (evaluacion_id,estudiante_id,prueba_id,fecha,anexo, nro_evaluacion) VALUES ( :p1 , :p2, :p3, :p4, :p5, :p6)");
        $stmt->bindValue(':p1', $_P['evaluacion_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['estudiante_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['prueba_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['fecha'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['anexo'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['nro_evaluacion'] , PDO::PARAM_STR);
        $stmt->execute();
        $stmt1 =$this->db->prepare("SELECT MAX(evaluacion_id)as codigo FROM evaluacion");
        $stmt1->execute();
        $set1 = $stmt1->fetchAll();
        foreach ($set1 as $val)
        {
            $evaluacion_id=$val[0];
        }
        foreach ($_P['pregunta_id'] as $key => $value)
        {
            $stmt2 =$this->db->prepare("INSERT INTO detalle_evaluacion (pregunta_id,alternativa_id,evaluacion_id) VALUES ( :d2, :d3, :d4)");
            $stmt2->bindValue(':d2',$value, PDO::PARAM_INT);
            $stmt2->bindValue(':d3',$_P['descripcion_a'][$key], PDO::PARAM_INT);
            $stmt2->bindValue(':d4',$evaluacion_id, PDO::PARAM_INT);
            $p1 = $stmt2->execute();
            $p2 = $stmt2->errorInfo();
        }
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {
        $stmt = $this->db->prepare("UPDATE evaluacion SET  estudiante_id = :p2 , prueba_id = :p3, fecha = :p4 , anexo = UPPER(:p5) , nro_evaluacion = :p6 WHERE evaluacion_id = :p1");
        $stmt->bindValue(':p1', $_P['evaluacion_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['estudiante_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['prueba_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['fecha'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['anexo'] , PDO::PARAM_STR);
		$stmt->bindValue(':p6', $_P['nro_evaluacion'] , PDO::PARAM_STR);
		$stmt->execute();
		$stmt1 = $this->db->prepare("DELETE FROM detalle_evaluacion WHERE evaluacion_id = :eva");
        $stmt1->bindValue(':eva', $_P['evaluacion_id'] , PDO::PARAM_INT);
		$stmt1->execute();
		foreach ($_P['pregunta_id'] as $key => $value)
        {
            $stmt2 =$this->db->prepare("INSERT INTO detalle_evaluacion (pregunta_id,alternativa_id,evaluacion_id) VALUES ( :d2, :d3, :d4)");
            $stmt2->bindValue(':d2',$value, PDO::PARAM_INT);
            $stmt2->bindValue(':d3',$_P['descripcion_a'][$key], PDO::PARAM_INT);
            $stmt2->bindValue(':d4',$_P['evaluacion_id'], PDO::PARAM_INT);
            $p1 = $stmt2->execute();
            $p2 = $stmt2->errorInfo();
        }
        return array($p1 , $p2[2]);
    }
    
    function delete($id ) 
    {
        $stmt1 = $this->db->prepare("DELETE FROM detalle_evaluacion WHERE evaluacion_id = :eva");
        $stmt1->bindValue(':eva', $id , PDO::PARAM_INT);
		$stmt1->execute();
		$stmt = $this->db->prepare("DELETE FROM evaluacion WHERE evaluacion_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function mostrar_prueba($query , $p ) 
    {
        $sql = "SELECT
        detalle_proyecto.detalle_proyecto_id,
        detalle_proyecto.proyecto_id,
        proyecto.proyecto,
        detalle_proyecto.prueba_id,
        area.area,
        prueba.fecha
        FROM
        detalle_proyecto
        INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
        INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
        INNER JOIN area ON prueba.area_id = area.area_id
        WHERE proyecto.proyecto LIKE :query OR area.area LIKE :query OR prueba.fecha LIKE :query OR detalle_proyecto.detalle_proyecto_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    
    function mostrar_estudiante($query , $p ) 
    {
        $sql = "SELECT
        estudiante.estudiante_id,
        CONCAT(estudiante.nombre,' ',estudiante.apellidos) as sabe,
        escuela.escuela,
        tipo_escuela_e.tipo_escuela,
        estudiante.nombre,
        estudiante.apellidos
        FROM
        estudiante
        INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
        INNER JOIN tipo_escuela_e ON escuela.tipo_escuela_id = tipo_escuela_e.tipo_escuela_id
        WHERE estudiante.nombre LIKE :query OR estudiante.apellidos LIKE :query OR escuela.escuela LIKE :query OR tipo_escuela_e.tipo_escuela LIKE :query OR estudiante.estudiante_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
	
	function get_pregunta($id ) 
    {
        $stmt = $this->db->prepare("SELECT
        pregunta_p.pregunta_id,
		pregunta_p.descripcion_p,
		alternativa.alternativa_id,
        alternativa.descripcion_a,
        prueba.fecha
        FROM
        detalle_proyecto
        INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
        INNER JOIN pregunta_p ON prueba.prueba_id = pregunta_p.prueba_id
        INNER JOIN alternativa ON pregunta_p.pregunta_id = alternativa.pregunta_id
        WHERE detalle_proyecto.detalle_proyecto_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function get_pregunta_m($id ) 
    {
        $stmt = $this->db->prepare("SELECT
		pregunta_p.pregunta_id as preg,
		pregunta_p.descripcion_p,
		alternativa.alternativa_id,
		alternativa.descripcion_a,
		(SELECT detalle_evaluacion.alternativa_id from detalle_evaluacion where detalle_evaluacion.pregunta_id = preg) as resp
		FROM
		evaluacion
		INNER JOIN detalle_proyecto ON evaluacion.prueba_id = detalle_proyecto.detalle_proyecto_id
		INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
		INNER JOIN pregunta_p ON prueba.prueba_id = pregunta_p.prueba_id
		INNER JOIN alternativa ON alternativa.pregunta_id = pregunta_p.pregunta_id
        WHERE evaluacion.evaluacion_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    function show($id ) 
    {
        $stmt = $this->db->prepare("SELECT
        evaluacion.evaluacion_id,
        evaluacion.anexo,
        proyecto.proyecto,
        area.area,
        prueba.fecha,
        CONCAT(estudiante.nombre,' ',estudiante.apellidos) AS estudiante,
        escuela.escuela,
        tipo_escuela_e.tipo_escuela,
        pregunta_p.descripcion_p,
        alternativa.descripcion_a,
        alternativa.ponderado,
		evaluacion.fecha,
		evaluacion.nro_evaluacion
        FROM
        evaluacion
        INNER JOIN detalle_proyecto ON detalle_proyecto.detalle_proyecto_id = evaluacion.prueba_id
        INNER JOIN proyecto ON detalle_proyecto.proyecto_id = proyecto.proyecto_id
        INNER JOIN prueba ON detalle_proyecto.prueba_id = prueba.prueba_id
        INNER JOIN area ON prueba.area_id = area.area_id
        INNER JOIN estudiante ON evaluacion.estudiante_id = estudiante.estudiante_id
        INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
        INNER JOIN detalle_evaluacion ON evaluacion.evaluacion_id = detalle_evaluacion.evaluacion_id
        INNER JOIN alternativa ON detalle_evaluacion.alternativa_id = alternativa.alternativa_id
        INNER JOIN pregunta_p ON detalle_evaluacion.pregunta_id = pregunta_p.pregunta_id
        INNER JOIN tipo_escuela_e ON escuela.tipo_escuela_id = tipo_escuela_e.tipo_escuela_id
        WHERE evaluacion.evaluacion_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        $res=$stmt->fetchAll();
        return $res;
    }
}
?>
