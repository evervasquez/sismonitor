<?php

include_once("Main.php");
class Modulo extends Main{
    public $Me;
    function index($query , $p ) 
    {
        $sql = "select m.*,mm.descripcion
                from modulo as m left outer join modulo as mm on mm.idmodulo=m.idpadre
                where m.descripcion like :query";        
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }

    function get_($id)
    {
        $modulo= ORM::for_table("modulo")->where("idmodulo",$id)->find_one();
        $this->Me= $modulo;
        return $modulo;
    }
    function edit($id ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM modulo WHERE idmodulo = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    
    function list_modulos($id_)
    {
        if($id_!="")
        {
        return $this->getSelect("SELECT * FROM modulo WHERE idpadre = $id_");
        }
        return $this->getSelect("SELECT * FROM modulo WHERE idmodulo <> $id_");
    }
    
    function bld_list_modulos($id_)
    {
        
      $father=$this->getSelect("SELECT idpadre FROM modulo WHERE idmodulo=$id_ ");
      $idpadre=$father[0][0];
      if(!isset($father[0][0]))
      {
          $idpadre="";
      }
      return  cmbGetVal($this->getSelect("SELECT idmodulo,descripcion FROM modulo WHERE idmodulo  <> $id_ ORDER BY descripcion"), $idpadre, true);
    }
    function insert($_P ) 
    {
        $stmt = $this->db->prepare("select func_inseactu_modulo(0,:p1,:p2,:p3,:p5,:p6,0,:p7,:p8,:p9,:p10)");
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idpadre'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['url'] , PDO::PARAM_STR);
        
        $stmt->bindValue(':p5', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':p6', $_P['orden'] , PDO::PARAM_INT);
         $stmt->bindValue(':p7', $_P['consulta'] , PDO::PARAM_STR);
         $stmt->bindValue(':p8', $_P['consulta1'] , PDO::PARAM_STR);
         $stmt->bindValue(':p9', $_P['consulta2'] , PDO::PARAM_STR);
         $stmt->bindValue(':p10', $_P['titulo'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function update($_P ) 
    {
        $stmt = $this->db->prepare("select func_inseactu_modulo(:idmodulo,:p1,:p2,:p3,:p5,:p6,1,:p7,:p8,:p9,:p10)");
        if($_P['idpadre']==""){$_P['idpadre']=null;}
        $stmt->bindValue(':p1', $_P['idpadre'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p3', $_P['url'] , PDO::PARAM_STR);
        
        $stmt->bindValue(':p5', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':p6', $_P['orden'] , PDO::PARAM_INT);
        $stmt->bindValue(':idmodulo', $_P['idmodulo'] , PDO::PARAM_INT);
        $stmt->bindValue(':p7', $_P['consulta'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['consulta1'] , PDO::PARAM_STR);
        $stmt->bindValue(':p9', $_P['consulta2'] , PDO::PARAM_STR);
        $stmt->bindValue(':p10', $_P['titulo'] , PDO::PARAM_STR);

        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function delete($_P ) 
    {
        $stmt = $this->db->prepare("DELETE FROM modulo WHERE idmodulo = :p1");
        $stmt->bindValue(':p1', $_P['idmodulo'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    
}
?>
