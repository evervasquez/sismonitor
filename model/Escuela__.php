<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Escuela
 *
 * @author TheRainMaker
 */
require_once 'Main.php';
class  Escuela extends Main 
{
    
    function index($query , $p ) 
    {
        $sql = "SELECT
			institucion.inst_id,
			institucion.inst_nro_escuela,
			institucion.inst_nombre,
			institucion.inst_cod,
			ubigeo.Nombre
			FROM
			institucion
			INNER JOIN ubigeo ON institucion.ubi_id = ubigeo.Ubigeo
            WHERE inst_nombre LIKE :query OR inst_id = :id OR inst_cod = :id OR inst_nro_escuela LIKE :query ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT
			escuela.escuela_id,
			escuela.escuela,
			escuela.tipo_escuela_id,
			escuela.id_ibugeo,
			escuela.comunidad,
			escuela.cod_modular,
			escuela.nro_escuela,
			escuela.categoria_escuela_id,
			escuela.facilitador_id,
			CONCAT(facilitador.nombres,' ',facilitador.apellidos) as facilitador
			FROM
			escuela
			INNER JOIN facilitador ON escuela.facilitador_id = facilitador.facilitador_id
		WHERE escuela_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("INSERT INTO escuela (escuela_id,escuela, tipo_escuela_id,id_ibugeo,comunidad,cod_modular,nro_escuela,categoria_escuela_id,facilitador_id) VALUES (:p1, UPPER(:p2), :p3, :p4, UPPER(:p5), :p6, :p7, :p8, :p9)");
        $stmt->bindValue(':p1', $_P['escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['escuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['tipo_escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['distrito'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['comunidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['cod_modular'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['nro_escuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['categoria_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p9', $_P['facilitador_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $stmt = $this->db->prepare("UPDATE escuela SET  escuela = UPPER(:p2), tipo_escuela_id= :p3, id_ibugeo= :p4, comunidad= UPPER(:p5), cod_modular= :p6, nro_escuela= :p7, categoria_escuela_id= :p8, facilitador_id= :p9 WHERE escuela_id = :p1");
        $stmt->bindValue(':p1', $_P['escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['escuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['tipo_escuela_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p4', $_P['distrito'] , PDO::PARAM_INT);
        $stmt->bindValue(':p5', $_P['comunidad'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['cod_modular'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['nro_escuela'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['categoria_id'] , PDO::PARAM_INT);
        $stmt->bindValue(':p9', $_P['facilitador_id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM escuela WHERE escuela_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
	
	public function getList_ajax($query) //funcion para habilitar el combo de provincias
	{
        $statement = $this->db->prepare("SELECT * FROM {$this->table}  where substr(cast(id_ubigeo as char(6)),1,2)= :query");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
	
	public function getList_ajax2($query) //funcion para habilitar el combo de distritos
	{
        $statement = $this->db->prepare("SELECT * FROM {$this->table}  where substr(cast(id_ubigeo as char(6)),1,4)= :query");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
}
?>