<?php
require_once 'Main.php';
class  Personal extends Main 
{
  function index($query , $p ) 
	{
        $sql = "SELECT *
		FROM
		personal
		WHERE pers_dni LIKE :query OR pers_fecha_nac LIKE :query OR pers_nombres LIKE :query OR concat(pers_apellido_p,' ',pers_apellido_m) LIKE :query OR pers_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
		array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function edit($id ) {
        return $this->getSelect("SELECT * FROM personal WHERE pers_id = $id");;
    }
    
    function index_p($query , $p){
         $sql = "SELECT encabezado.enca_id,
                        concat(concat(personal.pers_nombres,' ',personal.pers_apellido_p),' ',personal.pers_apellido_m),                       
                        institucion.inst_nombre,
                        grupo_acompanamiento.grup_descripcion
                FROM encabezado
                INNER JOIN institucion ON institucion.inst_id = encabezado.inst_id
                INNER JOIN personal ON encabezado.doc_id_entrevistado = personal.pers_id
                INNER JOIN grupo_acompanamiento ON grupo_acompanamiento.grup_id = encabezado.grup_id
		WHERE personal.pers_nombres LIKE :query OR concat(pers_apellido_p,' ',pers_apellido_m) LIKE :query OR encabezado.enca_id = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
		array('key'=>':id' , 'value'=>$query , 'type'=>'INT' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p);
        return $data;
    }
    function insert($_P ) 
    {
        $personal =ORM::for_table('personal')->create();
        $personal->pers_id=$_P['pers_dni'];
        $personal->inst_id=$_P['inst_id'];
        $personal->tip_id=0;
        $personal->pers_apellido_p=$_P['pers_apellido_p'];
        $personal->pers_apellido_m=$_P['pers_apellido_m'];
        $personal->pers_nombres=$_P['pers_nombres'];
        $personal->pers_ano_ingreso_proyecto=$_P['pers_ano_ingreso_proyecto'];
        $personal->pers_grado_ensena=$_P['pers_grado_ensena'];
        $personal->pers_experiencia_director=$_P['pers_experiencia_director'];
        $personal->pers_sexo=$_P['pers_sexo'];
        $personal->pers_experiencia_docente=$_P['pers_experiencia_docente'];
        $personal->pers_experiencia_escuela=$_P['pers_experiencia_escuela'];
        $personal->pers_experiencia_proyecto=$_P['pers_experiencia_proyecto'];
        $personal->pers_estado_civil=$_P['pers_estado_civil'];
        $personal->pers_condicion_lab=$_P['pers_condicion_lab'];
        $personal->pers_fecha_nac= todate_($_P['pers_fecha_nac']);
        $personal->pers_dni=$_P['pers_dni'];
        $personal->pers_lugar_nac=$_P['pers_lugar_nac'];
        $personal->pers_domicilio=$_P['pers_domicilio'];
        $personal->pers_comunidad_escuela=$_P['pers_comunidad_escuela'];
        $personal->pers_correo=$_P['pers_correo'];
        $personal->pers_telefono=$_P['pers_telefono'];
        $personal->pers_es_director=$_P['pers_es_director'];
        $personal->save();
        $p1=true;
        return array($p1 , $p2[2]);
    }
    function update($_P )
    {        
        $personal =ORM::for_table('personal')->where('pers_id',$_P['pers_id'])->find_one();    
        $personal->inst_id=$_P['inst_id'];
        $personal->pers_apellido_p=$_P['pers_apellido_p'];
        $personal->pers_apellido_m=$_P['pers_apellido_m'];
        $personal->pers_nombres=$_P['pers_nombres'];
        $personal->pers_ano_ingreso_proyecto=$_P['pers_ano_ingreso_proyecto'];
        $personal->pers_grado_ensena=$_P['pers_grado_ensena'];
        $personal->pers_experiencia_director=$_P['pers_experiencia_director'];
        $personal->pers_sexo=$_P['pers_sexo'];
        $personal->pers_experiencia_docente=$_P['pers_experiencia_docente'];
        $personal->pers_experiencia_escuela=$_P['pers_experiencia_escuela'];
        $personal->pers_experiencia_proyecto=$_P['pers_experiencia_proyecto'];
        $personal->pers_estado_civil=$_P['pers_estado_civil'];
        $personal->pers_condicion_lab=$_P['pers_condicion_lab'];
        $personal->pers_fecha_nac= todate_($_P['pers_fecha_nac']);
        $personal->pers_dni=$_P['pers_dni'];
        //$personal->pers_lugar_nac=$_P['pers_lugar_nac'];
        $personal->pers_lugar_nac=$_P['dist_id'];
        $personal->pers_domicilio=$_P['pers_domicilio'];
        $personal->pers_comunidad_escuela=$_P['pers_comunidad_escuela'];
        $personal->pers_correo=$_P['pers_correo'];
        $personal->pers_telefono=$_P['pers_telefono'];
        $personal->pers_es_director=$_P['pers_es_director'];
        $personal->save();
        $p1=true;
        return array($p1 , $p2[2]);
    }
    function delete($id ) 
    {
        $stmt = $this->db->prepare("DELETE FROM personal WHERE pers_id = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>