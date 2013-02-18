<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TipoPreg
 *
 * @author sophie
 */
require_once 'Main.php';
class  TipoPreg extends Main 
{
    
    function index($query , $p ) 
	{
        $sql = "SELECT tipopreg_id, descripcion FROM tipo_preg WHERE descripcion LIKE :query OR tipopreg_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM tipo_preg WHERE tipopreg_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO tipo_preg (tipopreg_id,descripcion) VALUES (:p1 , UPPER(:p2))");
        $stmt->bindValue(':p1', $_P['tipopreg_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $stmt = $this->db->prepare("UPDATE tipo_preg SET  descripcion = UPPER(:p1) WHERE tipopreg_id = :p2");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['tipopreg_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM tipo_preg WHERE tipopreg_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
