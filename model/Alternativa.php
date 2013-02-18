<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of alternativa
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class alternativa extends Main
{
    function index($query , $p ) 
    {
        $sql = "SELECT alternativa_id, pregunta_p.descripcion_p, alternativa.descripcion_a, alternativa.ponderado FROM alternativa INNER JOIN pregunta_p ON alternativa.pregunta_id = pregunta_p.pregunta_id
                WHERE pregunta_p.descripcion_p LIKE :query OR alternativa.descripcion_a LIKE :query OR alternativa_id = :id  OR alternativa.ponderado = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT alternativa.alternativa_id, alternativa.pregunta_id, pregunta_p.descripcion_p, pregunta_p.peso, alternativa.descripcion_a, alternativa.ponderado, tipo_preg.descripcion FROM alternativa INNER JOIN pregunta_p ON alternativa.pregunta_id = pregunta_p.pregunta_id INNER JOIN tipo_preg ON pregunta_p.tipopreg_id = tipo_preg.tipopreg_id WHERE alternativa.alternativa_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO alternativa (alternativa_id ,pregunta_id,descripcion_a,ponderado) VALUES ( :p1 , :p2 , UPPER(:p3) , :p4)");
        $stmt->bindValue(':p1', $_P['alternativa_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['pregunta_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['descripcion_a'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['ponderado'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) 
    {
        $stmt = $this->db->prepare("UPDATE alternativa SET  pregunta_id = :p3 , descripcion_a = UPPER(:p4) , ponderado = :p5 WHERE alternativa_id = :p1");
        $stmt->bindValue(':p1', $_P['alternativa_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['pregunta_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['descripcion_a'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['ponderado'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM alternativa WHERE alternativa_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
