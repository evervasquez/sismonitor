<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pregunta
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class Pregunta_p extends Main
{
    function index($query , $p ) 
    {
        $sql = "SELECT pregunta_id, pregunta_p.prueba_id, tipo_preg.descripcion, pregunta_p.descripcion_p, peso FROM pregunta_p INNER JOIN tipo_preg ON pregunta_p.tipopreg_id = tipo_preg.tipopreg_id
                WHERE pregunta_p.descripcion_p LIKE :query OR pregunta_id = :id  OR prueba_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT pregunta_p.pregunta_id, prueba.prueba_id, area.area, prueba.fecha, tipo_preg.tipopreg_id, pregunta_p.peso, pregunta_p.descripcion_p FROM pregunta_p INNER JOIN prueba ON pregunta_p.prueba_id = prueba.prueba_id INNER JOIN tipo_preg ON pregunta_p.tipopreg_id = tipo_preg.tipopreg_id INNER JOIN area ON prueba.area_id = area.area_id WHERE pregunta_id = :id");
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
    function insert($_P ) {
        $stmt = $this->db->prepare("INSERT INTO pregunta_p (pregunta_id,prueba_id,tipopreg_id,descripcion_p,peso) VALUES ( :p1 , :p2, :p3 , UPPER(:p4) , :p5)");
        $stmt->bindValue(':p1', $_P['pregunta_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['prueba_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['tipopreg_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['peso'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("UPDATE pregunta_p SET  prueba_id = :p2 , tipopreg_id = :p3 , descripcion_p = UPPER(:p4) , peso = :p5 WHERE pregunta_id = :p1");
        $stmt->bindValue(':p1', $_P['pregunta_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['prueba_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['tipopreg_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['peso'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM pregunta_p WHERE pregunta_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    public function get_tipouso()
    {
        $rw=$this->getSelect("SELECT * FROM usodecredtio");
        return $rw;
    }
    public function get_actividades()
    {
        $activ= array();
        $tipAct= $this->getSelect("SELECT * FROM tipoinversion ORDER BY idTipoInversion");
        for ($i = 0; $i < count($tipAct); $i++) {
            $ti=$tipAct[$i]['idTipoInversion'];
            $activ[$i]= $this->getSelect("SELECT * FROM inversion  WHERE idTipoInversion=$ti ORDER BY idInversion");
        }
        return $activ;
    }
    
}
?>
