<?php

include_once("Main.php");
class Matrizi extends Main{
    
    function index($query , $p ) 
    {
        
    }
    
    function view_proposito( ) 
    {
        $stmt = $this->db->prepare("SELECT * FROM proposito ");
      //  $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function getmatriz()
	{
		$stmt=$this->db->prepare("SELECT indi_id,numero,indicadores,definicion,resultados,metas_periodo,metodo_recopilacion,frecuencia_anunciar,personal,estado,item_meta FROM matriz_indicador where padre_id is null");
		$stmt->execute();        
		$items = $stmt->fetchAll();
		$cont = 0; 
		$cont2 = 0;
		$cont3 = 0;
	   foreach ($items as $valor)
        {
			$stmt=$this->db->prepare("SELECT indi_id,numero,indicadores,definicion,resultados,metas_periodo,metodo_recopilacion,frecuencia_anunciar,personal,estado,item_meta FROM matriz_indicador where padre_id =".$valor['indi_id']."");
			$stmt->execute(); 
			$hijos = $stmt->fetchAll();
			$matriz[$cont] = array(
            'indi_id' => $valor['indi_id'],
            'numero' => $valor['numero'],
            'indicadores' => $valor['indicadores'],
            'definicion' => $valor['definicion'],
            'resultados' => $valor['resultados'],
            'metas_periodo' => $valor['metas_periodo'],
            'metodo_recopilacion' => $valor['metodo_recopilacion'],
            'frecuencia_anunciar' => $valor['frecuencia_anunciar'],
            'personal' => $valor['personal'],
            'estado' => $valor['estado'],
            'item_meta' => $valor['item_meta'],
            'enlaces' => array()
                );
			$cont2 = 0;
			foreach($hijos as $h)
			{
				$stmt=$this->db->prepare("SELECT indi_id,numero,indicadores,definicion,resultados,metas_periodo,metodo_recopilacion,frecuencia_anunciar,personal,estado,item_meta FROM matriz_indicador where padre_id =".$h['indi_id']."");
				$stmt->execute(); 
				$hijos2 = $stmt->fetchAll();
				$matriz[$cont]['enlaces'][$cont2] = array(
				'indi_id' => $h['indi_id'],
				'numero' => $h['numero'],
				'indicadores' => $h['indicadores'],
				'definicion' => $h['definicion'],
				'resultados' => $h['resultados'],
				'metas_periodo' => $h['metas_periodo'],
				'metodo_recopilacion' => $h['metodo_recopilacion'],
				'frecuencia_anunciar' => $h['frecuencia_anunciar'],
				'personal' => $h['personal'],
				'estado' => $h['estado'],
				'item_meta' => $h['item_meta'],
				'enlaces' => array()
                   );
				   	$cont3 = 0;
				 foreach($hijos2 as $hi)
				 {
					$matriz[$cont]['enlaces'][$cont2]['enlaces'][$cont3]= array(
					'indi_id' => $hi['indi_id'],
					'numero' => $hi['numero'],
					'indicadores' => $hi['indicadores'],
					'definicion' => $hi['definicion'],
					'resultados' => $hi['resultados'],
					'metas_periodo' => $hi['metas_periodo'],
					'metodo_recopilacion' => $hi['metodo_recopilacion'],
					'frecuencia_anunciar' => $hi['frecuencia_anunciar'],
					'personal' => $hi['personal'],
					'estado' => $hi['estado'],
					'item_meta' => $hi['item_meta'],
					'enlaces' => array()
                       );
				   $cont3++;
					if($cont3<=0)
					{
					  $matriz2=array();
					}
				 }
				
				
				 $cont2++;
			}
			$cont++;
		}
		return $matriz;
	}
    function getprueba() 
    {
       $stmt = $this->db->prepare("SELECT pru_id, padre_id,descripcion FROM prueba where padre_id is null ");  
	    $stmt->execute();        
        $items = $stmt->fetchAll();
        $cont = 0; 
        $cont2 = 0;
        $cont3 = 0;
		foreach ($items as $valor)
        {
		  $stmt = $this->db->prepare("SELECT pru_id, padre_id,descripcion FROM prueba where padre_id =".$valor['pru_id']." ");  
	      $stmt->execute(); 
		  $hijos = $stmt->fetchAll();
          $matriz[$cont] = array(
          'pru_id' => $valor['pru_id'],
          'descripcion' => $valor['descripcion'],
          'enlaces' => array()
                );
            $cont2 = 0;
			foreach($hijos as $h)
			{
			   $stmt = $this->db->prepare("SELECT pru_id, padre_id,descripcion FROM prueba where padre_id =".$h['pru_id']." ");  
			   $stmt->execute();
               $hijos2 = $stmt->fetchAll();
			   foreach($hijos2 as $hi)
			   {
			       $matriz2[$cont3] = array(
                    'pru_id'=>$hi['pru_id'],
                    'descripcion' => $hi['descripcion']);
                    $cont3++;
					if($cont3<=0)
					{
					  $matriz2=array();
					}
			   }
			    $matriz[$cont]['enlaces'][$cont2] = array(
				'pru_id'=>$h['pru_id'],
				'descripcion' => $h['descripcion'],
				'enlaces' => $matriz2
				);
			   $cont2++;
			}
			$cont++;
		}
		return $matriz;
    }
    
    function save($_P) 
    {
       $stmt=$this->db->prepare("UPDATE matriz_indicador 
	   SET
	   item_meta=:p1
	   WHERE indi_id=:id
	   ");
	   try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
	            $stmt->bindValue(':id',$_P['id'], PDO::PARAM_INT);
				$stmt->bindValue(':p1',$_P['item_meta'], PDO::PARAM_INT);
				$stmt->execute();
				$this->db->commit();
				$resp = array('rep'=>'1','msg'=>'grabado correctamente');
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('rep'=>"2",'msg'=>'no se pudo realizar la accion de actualizar : '.$e->getMessage());
			}
    }
    
    function get_detalle($idd,$id) 
    { //id es del indicador
	//idd tiempo
       $sql="SELECT
		detalle_tiempo.id_detalle as id_detalle,
		detalle_tiempo.meta as meta,
		detalle_tiempo.ejecutado as ejecutado,
		matriz_indicador.indi_id as indi_id,
		matriz_indicador.metas_periodo as metas_periodo,
		tiempo.tiempo_id as tiempo_id,
		tiempo.descripcion as descripcion
		FROM
		detalle_tiempo
		INNER JOIN matriz_indicador ON matriz_indicador.indi_id = detalle_tiempo.indi_id
		INNER JOIN tiempo ON tiempo.tiempo_id = detalle_tiempo.tiempo_id
		where matriz_indicador.indi_id='".$id."' and tiempo.tiempo_id='".$idd."'";
		 $stmt=$this->db->prepare($sql);
		 $stmt->execute();
        return $stmt->fetchObject();
    }
	function get_trimestre($id)
	{
	  $sql="SELECT tiempo_id,descripcion from tiempo where tiempo_id='".$id."'";
	   $stmt=$this->db->prepare($sql);
	  $stmt->execute();
        return $stmt->fetchObject();
	}
	function get_indicador($id)
	{
	  $sql="SELECT indi_id,metas_periodo from matriz_indicador where indi_id='".$id."'";
	   $stmt=$this->db->prepare($sql);
	  $stmt->execute();
        return $stmt->fetchObject();
	}
	function avance($idd,$id)
	{
	  $sql="select sum(ejecutado) as avance from detalle_tiempo where indi_id='".$id."' and tiempo_id<='".$idd."'";
	  $stmt=$this->db->prepare($sql);
		 $stmt->execute();
        return $stmt->fetchObject();
	}
	function save_trimestre($_P)
	{
	  $stmt=$this->db->prepare("INSERT INTO  detalle_tiempo (indi_id,tiempo_id,meta,ejecutado)
	  VALUES(:p1,:p2,:p3,:p4)");
	   try
			{
				$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->db->beginTransaction();
	            $stmt->bindValue(':p1',$_P['indi_id'], PDO::PARAM_INT);
				$stmt->bindValue(':p2',$_P['tiempo_id'], PDO::PARAM_INT);
				$stmt->bindValue(':p3',$_P['meta_detalle'], PDO::PARAM_INT);
				$stmt->bindValue(':p4',$_P['ejecutado'], PDO::PARAM_INT);
				$stmt->execute();
				$this->db->commit();
				$resp = array('rep'=>'1','msg'=>'grabado correctamente');
				return $resp;
			}
			catch(PDOException $e) 
			{
				$this->db->rollBack();
				return array('rep'=>"2",'msg'=>'no se pudo realizar la accion de actualizar : '.$e->getMessage());
			}
	
	}
	
    //POSIBLE SLQ PARA EL REPORTE GENERAL
	/*select sum(ejecutado) as avance,indi_id
	  from detalle_tiempo where tiempo_id<='2'
	 GROUP BY indi_id
	 order by indi_id asc*/
    
}
?>
