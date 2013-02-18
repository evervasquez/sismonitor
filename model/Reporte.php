<?php

require_once 'Main.php';
require_once 'Modulo.php';
class  Reporte extends Main {

    public $Me;
    public function getSql($param){
      $modu= new Modulo();
      $obj= $modu->edit($param['id']);     
      $stmt = $this->db->prepare($obj->consulta);
      $stmt->execute();
     return $stmt->fetchAll();
    }
    
    
    function index($query , $p,$op ) {
        if(!isset($p)){$p=1;}
       
        $modu= new Modulo();
         $obj= $modu->edit($query); 
        $sql = $obj->consulta;
        if($op=="consulta"){
            $sql = $obj->consulta;
        }
         if($op=="consulta1"){
            $sql = $obj->consulta1;
        }
         if($op=="consulta2"){
            $sql = $obj->consulta2;
        }    
        
        
        $param = array();
        //$param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql,  $param   );
        $data['rows'] =  $this->getRow($sql,   $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function queryRows($id ) {
        $modulo= ORM::for_table("modulo")->where("idmodulo",$id)->find_one();
        $rows= $this->getSelect($modulo->consulta);
        return $rows;
    }
    function get_($id ) {
        $modulo= ORM::for_table("modulo")->where("idmodulo",$id)->find_one();
        $this->Me= $modulo;
        return $modulo;
    }


}
?>
