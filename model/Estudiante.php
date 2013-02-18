<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Estudiante
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class Estudiante extends Main
{
    function index($query , $p ) 
    {
        $sql = "SELECT estudiante.estudiante_id, escuela.escuela, estudiante.nombre, estudiante.apellidos 
            FROM estudiante 
            INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
            WHERE estudiante.nombre LIKE :query OR escuela.escuela LIKE :query OR estudiante.apellidos LIKE :query OR estudiante.estudiante_id = :id ORDER BY 1 DESC";
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
        estudiante.estudiante_id,
        estudiante.nombre,
        estudiante.apellidos,
        estudiante.escuela_id,
        escuela.escuela,
        tipo_escuela_e.tipo_escuela
        FROM
        estudiante
        INNER JOIN escuela ON estudiante.escuela_id = escuela.escuela_id
        INNER JOIN tipo_escuela_e ON escuela.tipo_escuela_id = tipo_escuela_e.tipo_escuela_id
        WHERE estudiante.estudiante_id = :id");
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
        $stmt = $this->db->prepare("INSERT INTO estudiante (estudiante_id,escuela_id,nombre,apellidos) VALUES ( :p1 , :p2, UPPER(:p3), UPPER(:p4))");
        $stmt->bindValue(':p1', $_P['estudiante_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['nombre'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['apellidos'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) 
    {
        $stmt = $this->db->prepare("UPDATE estudiante SET  escuela_id = :p2 , nombre = UPPER(:p3) , apellidos = UPPER(:p4) WHERE estudiante_id = :p1");
        $stmt->bindValue(':p1', $_P['estudiante_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['nombre'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['apellidos'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM estudiante WHERE estudiante_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
