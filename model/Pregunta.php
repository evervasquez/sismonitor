<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pregunta
 *
 * @author sophie
 */
require_once 'Main.php';
class Pregunta extends Main{
    //put your code here
    
    public function get_preg_id()
    {
       $rw= $this->getSelect("SELECT max(item_id) FROM detalle_instrumento");
       $n=$rw[0][0];
       if(!isset($n))
       {
           $n=1;
       }
       else
       {
          $n=$n+1;
       }
       return $n;
    }    
    
    
    public function getPregunta( $id ){
//        $stm = $this->db->query("SELECT * FROM pregunta WHERE idpregunta = '{$id}'");
//        $obj = $stm->fetchObject();
//        return $obj->descripcion;
        return '';
    }

    //////////////////////////////
    //
    public function getCuestions_u( $idparte ){
        $stm = $this->db->query("select pregunta.idpregunta,pregunta.descripcion
                                from pregunta inner join tipo_pregunta on pregunta.idtipo_pregunta=tipo_pregunta.idtipo_pregunta
                                        inner join parte on parte.idparte=tipo_pregunta.idparte
                                where parte.idparte={$idparte}
                                order by pregunta.idpregunta");
        $obj = $stm->fetchAll();
        return $obj;
    }
    public function getPregunta_u( $id ){
        $stm = $this->db->query("SELECT descripcion,idpregunta FROM pregunta WHERE idpregunta = '{$id}'");
        $obj = $stm->fetchObject();
        return $obj;
    }

    /*
     * MANTENIMIENTO GENERICO
     */
    function index($query , $p ) {
        $sql = "SELECT idpregunta , tipo_pregunta.descripcion tipo_pregunta , pregunta.descripcion
                FROM pregunta INNER JOIN tipo_pregunta ON tipo_pregunta.idtipo_pregunta = pregunta.idtipo_pregunta
                WHERE pregunta.descripcion LIKE :query OR CAST(idpregunta AS VARCHAR ) = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function get($id_ ) {
        return $this->getSelect("SELECT * FROM detalle_instrumento WHERE item_id = $id_");
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("INSERT INTO pregunta (idpregunta,idtipo_pregunta,descripcion) VALUES ( :p1 , :p2 , UPPER(:p3))");
        $stmt->bindValue(':p1', $_P['idpregunta'] , PDO::PARAM_STR);
        $stmt->bindValue(':p1', $_P['idtipo_pregunta'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("UPDATE pregunta SET  idpregunta = :p1 , idtipo_pregunta = :p2 , descripcion = UPPER(:p3) WHERE idpregunta = :p4");
        $stmt->bindValue(':p1', $_P['idpregunta'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idtipo_pregunta'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['idpregunta'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM pregunta WHERE idpregunta = :p1");
        $stmt->bindValue(':p1', $_P['idpregunta'] , PDO::PARAM_STR);
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
