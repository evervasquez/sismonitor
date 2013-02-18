<?php
include_once("Main.php");
class Matriz extends Main
{
   function index($query , $p ) {
       $data =$this->getSelect("");
        return $data;
    }
    function list_subsistemas()
    {
      return  $this->getSelect("SELECT * FROM sub_sistema");
    }
    function get_componentes($id_)
    {
        return $this->getSelect("SELECT * FROM componente WHERE var_id=$id_ ORDER BY comp_numero");
    }
      function get_indicadores($id_)
    {
        return $this->getSelect("SELECT * FROM indicador WHERE comp_id=$id_ ORDER BY ind_numero");
    }
      function get_variables($id_)
    {
        return $this->getSelect("SELECT * FROM variable WHERE sub_id=$id_ ORDER BY var_numero");
    }
    function get_niveles($id_)
    {
         return $this->getSelect("SELECT * FROM nivel_logro WHERE ind_id=$id_ ORDER BY nivl_id");
    }
    
     function get_nivel($id_)
    {
         $rw=$this->getSelect("SELECT * FROM nivel_logro WHERE niv_id=$id_");
         return $rw[0];
    }
    
    
     function get_componentes_($id_)
    {
        return $this->getSelect("SELECT comp_id, concat( comp_numero,' ', comp_descripcion) as descripcion  FROM componente WHERE var_id=$id_ ORDER BY comp_numero");
    }
      function get_indicadores_($id_)
    {
        return $this->getSelect("SELECT ind_id, concat( ind_numero,' ',ind_descripcion) as descripcion FROM indicador WHERE comp_id=$id_ ORDER BY ind_numero");
    }
      function get_variables_($id_)
    {
        return $this->getSelect("SELECT var_id,concat(var_numero,' ', var_descripcion) as descripcion FROM variable WHERE sub_id=$id_ ORDER BY var_numero");
    }
       function get_variables_all()
    {
        return $this->getSelect("SELECT var_id,concat(var_numero,' ', var_descripcion) as descripcion FROM variable ORDER BY var_numero");
    }
    
    
    function list_instrumentos()
    {
        return $this->getSelect("SELECT * FROM instrumento ORDER BY ins_id");
    }
    function get_id_instrumento()
    {
        
        $row= $this->getSelect("SELECT ins_id FROM instrumento ORDER BY ins_id DESC ");
        list($I ,$n)= explode("I", $row[0][0]);
        return "I".($n+1);
    }
    function get_id_encabezado()
    {
        
        $row= $this->getSelect("SELECT MAX(enca_id) as item_id FROM encabezado ");
        $n= $row[0]['item_id'];
        return ($n+1);
    }
    function get_id_encabezado_()
    {
        
        $row= $this->getSelect("SELECT MAX(enca_id) as item_id FROM encabezado_one ");
        $n= $row[0]['item_id'];
        return ($n+1);
    }
    function bld_matriz($id_)
    {
       $rows= array();
       $data=array();
       $sub_sistema=$this->getSelect("SELECT * FROM sub_sistema WHERE sub_id=  $id_ ");
       $variables= $this->getSelect("SELECT * FROM variable WHERE sub_id= $id_  ");
       $ncomp=0;
       for ($i = 0; $i < count($variables); $i++) {
           $row= array();
           $row['row']=$variables[$i];
           $var_id=$variables[$i]['var_id'];
           $componentes =$this->getSelect("SELECT * FROM componente WHERE var_id=$var_id");
           $nindi=0;
           for ($i1 = 0; $i1 < count($componentes); $i1++) {
              $row2=array();
              $row2['row']=$componentes[$i1];
              $comp_id=$componentes[$i1]['comp_id'];
              $indicadores =   $this->getSelect("SELECT * FROM indicador WHERE comp_id=$comp_id");
              
              for ($i2 = 0; $i2 < count($indicadores); $i2++) {
                  $row3= array();
                  $row3['row']=$indicadores[$i2];
                  $ind_id=$indicadores[$i2]['ind_id'];
                  $row3['niveles']=$this->getSelect("SELECT * FROM nivel_logro WHERE ind_id=$ind_id ORDER BY nivl_id");
                  $row3['children']=null;
                
                  $row3['instrumento']=$this->getSelect("SELECT * FROM instrumento WHERE ins_is='{$indicadores[$i2]['ins_id']}'");
                  $row2['children'][]= $row3;
                  
              }
              $row2['nrows']=count($indicadores);
              $row2['rowspan']=count($indicadores);
              $nindi+=$row2['nrows'];
              $row['children'][]=$row2;
              
           }
           $ncomp+=$nindi;
           $row['nrows']=count($componentes);
           $row['rowspan']=$nindi;
           $rows[]=$row;
       }
       $data['children']=$rows;
       $data['nrows']=count($variables);
       $data['rowspan']=$ncomp;
       $dd=array();
       $dd[0]=$sub_sistema[0]['sub_id'];
       $dd[1]=$sub_sistema[0]['sub_nombre'];
       $data['row']=$dd;
       return $data;
    }
    
    function list_niveles()
    {
      return  $this->getSelect("SELECT * FROM nivel");
    }
    
    function get_instrumento($id_)
    {
        return $this->getSelect("SELECT * FROM instrumento WHERE ins_id='$id_'");
    }
    
    
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM perfil WHERE idperfil = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("select func_inseactu_perfil(0,:p1,:p2,0)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("select func_inseactu_perfil(:idperfil,:p1,:p2,1)");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['activo'] , PDO::PARAM_BOOL);
        $stmt->bindValue(':idperfil', $_P['idperfil'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM perfil WHERE idperfil = :p1");
        $stmt->bindValue(':p1', $_P['idperfil'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
      
        
    }
	//modificar
	function editar_subsistemas($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM sub_sistema WHERE sub_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	function editar_variable($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM variable WHERE var_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	function editar_componente($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM componente WHERE comp_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	function editar_indicador($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM indicador WHERE ind_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	function editar_niveles($id ) 
	{
        $stmt = $this->db->prepare("SELECT * FROM nivel_logro WHERE niv_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
	function modificar($_P )
    {        
        if($_P['tipo']=="sub_sistema")
		{
			$stmt = $this->db->prepare("UPDATE sub_sistema SET  sub_nombre = UPPER(:p2) WHERE sub_id = :p1");
			$stmt->bindValue(':p1', $_P['sub_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p2', $_P['sub_nombre'] , PDO::PARAM_STR);
			$p1 = $stmt->execute();
			$p2 = $stmt->errorInfo();
			return array($p1 , $p2[2]);
		}
		if($_P['tipo']=="variable")
		{
			$stmt = $this->db->prepare("UPDATE variable SET  var_descripcion = UPPER(:p2), sub_id= :p3, var_numero= :p4 WHERE var_id = :p1");
			$stmt->bindValue(':p1', $_P['var_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p2', $_P['var_descripcion'] , PDO::PARAM_STR);
			$stmt->bindValue(':p3', $_P['sub_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p4', $_P['var_numero'] , PDO::PARAM_STR);
			$p1 = $stmt->execute();
			$p2 = $stmt->errorInfo();
			return array($p1 , $p2[2]);
		}
		if($_P['tipo']=="componente")
		{
			$stmt = $this->db->prepare("UPDATE componente SET  comp_descripcion = UPPER(:p2), var_id= :p3, comp_numero= :p4 WHERE comp_id = :p1");
			$stmt->bindValue(':p1', $_P['comp_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p2', $_P['comp_descripcion'] , PDO::PARAM_STR);
			$stmt->bindValue(':p3', $_P['var_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p4', $_P['comp_numero'] , PDO::PARAM_STR);
			$p1 = $stmt->execute();
			$p2 = $stmt->errorInfo();
			return array($p1 , $p2[2]);
		}
		if($_P['tipo']=="indicador")
		{
			$stmt = $this->db->prepare("UPDATE indicador SET  ind_descripcion = :p2, comp_id= :p3, ind_numero= :p4, ind_es_unipersonal= :p5 WHERE ind_id = :p1");
			$stmt->bindValue(':p1', $_P['ind_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p2', $_P['ind_descripcion'] , PDO::PARAM_STR);
			$stmt->bindValue(':p3', $_P['comp_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p4', $_P['ind_numero'] , PDO::PARAM_STR);
			$stmt->bindValue(':p5', $_P['ind_es_unipersonal'] , PDO::PARAM_INT);
			$p1 = $stmt->execute();
			$p2 = $stmt->errorInfo();
			return array($p1 , $p2[2]);
		}
		if($_P['tipo']=="nivel")
		{
			$stmt = $this->db->prepare("UPDATE nivel_logro SET  niv_descripcion = :p2, niv_ponderado= :p3, nivl_id= :p4 WHERE niv_id = :p1");
			$stmt->bindValue(':p1', $_P['niv_id'] , PDO::PARAM_INT);
			$stmt->bindValue(':p2', $_P['niv_descripcion'] , PDO::PARAM_STR);
			$stmt->bindValue(':p3', $_P['niv_ponderado'] , PDO::PARAM_INT);
			$stmt->bindValue(':p4', $_P['nivl_id'] , PDO::PARAM_INT);
			$p1 = $stmt->execute();
			$p2 = $stmt->errorInfo();
			return array($p1 , $p2[2]);
		}
    }
	
	
}
?>