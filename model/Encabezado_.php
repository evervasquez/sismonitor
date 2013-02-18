<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encabezado
 *
 * @author sophie
 */
require_once 'Main.php';
class Encabezado extends Main  {
    //put your code here
    public function gethead($id) {
        $stmt = $this->db->prepare("SELECT * FROM vencabezado WHERE idencabezado = :id ");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        $obj = $stmt->fetchObject();
        return $obj;
    }
    function getprevioushead($_P) {
        $stmt = $this->db->prepare("SELECT * FROM encabezado WHERE idencabezado = :id ");
        $stmt->bindValue(':id', $_P['id'] , PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function saveactivahead($p){
        $stmt1 = $this->db->prepare("INSERT INTO encabezado(idencabezado, idubigeo,
            idencuesta,
            idencuestador, casa, nro, seg, oficina, campo, codificacion,
            digitacion, observaciones, fecha , municipio , idusuario )
            VALUES ( DEFAULT , '220901' , :p1 , :p2 , :p3 , :p4,  :p5 , :p6 , :p7 , :p8 , :p9 ,
            :p10 , :p11 , :p12 , :p13 ) RETURNING idencabezado;");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $stmt1->bindValue(':p1', 2 , PDO::PARAM_INT);
            $stmt1->bindValue(':p2', $p['encuestador-id'] , PDO::PARAM_INT);
            $stmt1->bindValue(':p3', $p['casa'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p4', $p['nro'] , PDO::PARAM_INT);
            $stmt1->bindValue(':p5', $p['seg'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p6', $p['oficina'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p7', $p['subcampo'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p8', $p['codificacion'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p9', $p['digitacion'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p10', $p['observaciones'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p11', date('Y-m-d',strtotime($p['fecha'])) , PDO::PARAM_STR);
            $stmt1->bindValue(':p12', $p['municipio'] , PDO::PARAM_STR);
            $stmt1->bindValue(':p13', '3' , PDO::PARAM_STR);
            $stmt1->execute();
            $this->db->commit();
            $obj = $stmt1->fetchObject();
            $_SESSION['ID'] = $obj->idencabezado;
            return array('res'=>"1",'msg'=>'OK!', 'id'=>$obj->idencabezado);
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage());
        }
    }

    //////////////////////////////////////////////////
    // INSTRUMENTO
     public function save_cabecera($p){
        $a =$p['a'];
        if($a['action']=="editar")
        {
            $this->update_cabecera($p);
            return true;
        }
        $b= $p['b'];
        $ob=$p['c'];
        $c=$a['enca_lugar'];
        $a['enca_id']=$p['id_'];
        ORM::get_db()->beginTransaction();
        if($c==-1||$c=="")
        {
           $lugar =ORM::for_table('lugar')->create();
           
           $lugar->lug_descripcion=$a['lugar'];
           $lugar->dist_id=$a['ubi_id'];
           $lugar->save();
           $lg=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
           $a['enca_lugar'] =$lg->lug_id;
        }
        $encabezado =ORM::for_table('encabezado')->create();
        $fecha=  explode("/", $a['enca_fecha']);        
        $fecha_=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
        
        $encabezado->enca_id=$a['enca_id'];
        $encabezado->inst_id=$a['inst_id'];
        $encabezado->ins_id=$a['ins_id'];
        $encabezado->enca_grado=$a['enca_grado'];
        $encabezado->enca_seccion=$a['enca_seccion'];
        $encabezado->enca_nivel=$a['enca_nivel'];
        $encabezado->enca_lugar=$a['enca_lugar'];
        $encabezado->ubi_id=$a['ubi_id'];
        $encabezado->doc_id_entrevistado=$a['doc_id_entrevistado'];
        $encabezado->doc_id_entrevistador=$a['doc_id_entrevistador'];
        $encabezado->enca_fecha=$fecha_;
        $encabezado->enca_total_est=$a['enca_total_est'];
        $encabezado->enca_ini=$a['enca_ini'];
        $encabezado->enca_fin=$a['enca_fin'];
        $encabezado->save();

        for ($i = 0; $i < count($b); $i++) {
            //C = Id Pregunta; D= Id Indicador, E= Id Nivel (Tabla Nivel)-nivl_id
            list($c,$d,$e)  =explode("-", $b[$i]);

            if($e=="si"){
                $e=-1;
            }
            if($e=="no"){
                $e=-2;
            }
             $nivel =ORM::for_table('nivel_logro')->where('ind_id',$d )->where('nivl_id',$e )->find_one();
             $niv_id=$nivel->niv_id;
             if($e<0)
             {
                 $niv_id=$e;
             }
                     
            $respuesta =ORM::for_table('respuesta')->create();
            $respuesta->enca_id=$a['enca_id'];
            $respuesta->item_id=$c;
            $respuesta->ind_id=$d;
            $respuesta->niv_id=$niv_id;
            $respuesta->save();

        }
        
        for ($i_1 = 0; $i_1 < count( $ob); $i_1++) {
            if($ob[$i_1]!=""){
             $observacion =ORM::for_table('observacion')->create();
             $observacion->obs_descripcion= $ob[$i_1];
             $observacion->enca_id= $a['enca_id'];
             $observacion->save();
            }
        }
      ORM::get_db()->commit();
      $data=array();
      $data['result']=true;
      $data['id_']=$p['id_'];
      echo json_encode($data);
    }
    
      public function update_cabecera($p){
        $a =$p['a'];
        $b= $p['b'];
        $ob=$p['c'];
        $c=$a['enca_lugar'];
        ORM::get_db()->beginTransaction();
         $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
        if($comun==false)
        {
           $lugar =ORM::for_table('lugar')->create();
           $lugar->lug_descripcion=$a['lugar'];
           $lugar->dist_id=$a['dist_id'];
           $lugar->save();
           $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
           $a['lugar_id'] =$comun->lug_id;
        }
        $encabezado =ORM::for_table('encabezado')->where('enca_id',$a['enca_id'])->find_one();
        
        if($encabezado!=false)
        {
            $fecha=  explode("/", $a['enca_fecha']);        
            $fecha_=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            $encabezado->inst_id=$a['inst_id'];
            $encabezado->ins_id=$a['ins_id'];
            $encabezado->enca_grado=$a['enca_grado'];
            $encabezado->enca_seccion=$a['enca_seccion'];
            $encabezado->enca_nivel=$a['enca_nivel'];
            $encabezado->enca_lugar=$a['enca_lugar'];
            $encabezado->ubi_id=$a['ubi_id'];
            $encabezado->doc_id_entrevistado=$a['doc_id_entrevistado'];
            $encabezado->doc_id_entrevistador=$a['doc_id_entrevistador'];
            $encabezado->enca_fecha=$fecha_;
            $encabezado->enca_total_est=$a['enca_total_est'];
            $encabezado->enca_ini=$a['enca_ini'];
            $encabezado->enca_fin=$a['enca_fin'];
            $encabezado->save();
        }

        $resp_=ORM::for_table('respuesta')->where('enca_id',$a['enca_id'])->find_many();
        
        for($i=0;$i<count($resp_);$i++)
        {
            $resp_[$i]->delete();
        }
     
        $obs_ =ORM::for_table('observacion')->where('enca_id',$a['enca_id'])->find_many();
        for($i=0;$i<count($obs_);$i++)
        {
        $obs_[$i]->delete();
        }
        
        for ($i = 0; $i < count($b); $i++) {
            //C = Id Pregunta; D= Id Indicador, E= Id Nivel (Tabla Nivel)-nivl_id
            list($c,$d,$e)  =explode("-", $b[$i]);

            if($e=="si"){
                $e=-1;
            }
            if($e=="no"){
                $e=-2;
            }
             $nivel =ORM::for_table('nivel_logro')->where('ind_id',$d )->where('nivl_id',$e )->find_one();
             $niv_id=$nivel->niv_id;
             if($e<0)
             {
                 $niv_id=$e;
             }
                     
            $respuesta =ORM::for_table('respuesta')->create();
            $respuesta->enca_id=$a['enca_id'];
            $respuesta->item_id=$c;
            $respuesta->ind_id=$d;
            $respuesta->niv_id=$niv_id;
            $respuesta->save();

        }
        
        for ($i_1 = 0; $i_1 < count( $ob); $i_1++) {
            if($ob[$i_1]!=""){
             $observacion =ORM::for_table('observacion')->create();
             $observacion->obs_descripcion= $ob[$i_1];
             $observacion->enca_id= $a['enca_id'];
             $observacion->save();
            }
        }
      ORM::get_db()->commit();
      $data=array();
      $data['result']=true;
      $data['id_']=$e['enca_id'];
      echo json_encode($data);
    }
    
       public function save_cabecera_1($p){
        $a =$p['encabezado'];
        if($a['action']=="editar")
        {
            $this->update_cabecera_1($p);
            return true;
        }
        $c=$a['lugar_id'];
        ORM::get_db()->beginTransaction();
        
        $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
        if($comun==false)
        {
           $lugar =ORM::for_table('lugar')->create();
           $lugar->lug_descripcion=$a['lugar'];
           $lugar->dist_id=$a['dist_id'];
           $lugar->save();
           $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
           $a['lugar_id'] =$comun->lug_id;
        }
        
        //Registrar institucion educativa
        $institucion =ORM::for_table('institucion')->create();
        $institucion->inst_id=$a['codigo_modular'];
        $inst_id=$a['codigo_modular'];
        $institucion->idgrupo_intervencion=$a['grup_intervencion'];
        $institucion->inst_nro_escuela=$a['num_escuela'];
        $institucion->inst_nombre=$a['nombre_escuela'];
        $institucion->inst_cod=$a['codigo_modular'];
        $institucion->inst_tipo=$a['tipo_escuela'];
        $institucion->ubi_id=$a['dist_id'];
        $institucion->inst_pip=$a['intervencion_otro'];
        $institucion->inst_nombre_pip=$a['nombre_proyecto_otro'];
        $institucion->inst_anio_ingreso=$a['ano_ingreso'];
        $institucion->inst_anio_ingreso_pip=$a['ano_ingreso_otro'];
        $institucion->inst_telefono_comu=$a['telefono_comunitario'];
        $institucion->inst_comunidad=$a['lug_id'];
        $institucion->inst_md=$a['turno_manana_ini'];
        $institucion->inst_ma=$a['turno_manana_fin'];
        $institucion->inst_td=$a['turno_tarde_ini'];
        $institucion->inst_ta=$a['turno_tarde_fin'];
        $institucion->inst_dd=$a['duracion_desayuno_ini'];
        $institucion->inst_da=$a['duracion_desayuno_fin'];
        $institucion->inst_rd=$a['duracion_recreo_ini'];
        $institucion->inst_ra=$a['duracion_recreo_fin'];
        $institucion->inst_ad=$a['duracion_almuerzo_ini'];
        $institucion->inst_aa=$a['duracion_almuerzo_fin'];
        
        $institucion->inst_datosubigeo=$a['punto_referencial'];
        $institucion->inst_distkm=$a['enca_distancia'];
        $institucion->inst_tiempomin=$a['tiempo_minutos'];
        $institucion->forma_transporteid=$a['form_transporte'];
       
        $aulas=$p['aula'];
        
        if(count($aulas)>0){
        $idx_=array_keys($aulas);
        $aulas_grados="";
        for ($i_1 = 0; $i_1 < count($idx_); $i_1++) {
             $aula=$aulas[$idx_[$i_1]];
             $idx_1=array_keys($aula);
             for ($i_2 = 0; $i_2 < count($idx_1); $i_2++) {
                 $grado=$aula[$idx_1[$i_2]];
                 
                  $aulas_grados.=''.$idx_[$i_1].','.$grado['value'].';';
             }
        }
        }
        
        $institucion->inst_distribucion_aulas=$aulas_grados;
        $institucion->inst_nro_aulas=count($idx_);
        $institucion->inst_nro_asociados=$a['numero_padres'];
        $institucion->inst_conei_rec_ugel=bool_($p['conei_cuenta'][1]['value']);
        $institucion->inst_conei_res_direc=bool_($p['conei_cuenta'][2]['value']);
        $institucion->inst_pei=bool_($p['conei_cuenta'][3]['value']);
        $institucion->inst_vision=bool_($p['conei_cuenta'][4]['value']);
        $institucion->inst_mision=bool_($p['conei_cuenta'][5]['value']);
        $institucion->inst_diagnostico=bool_($p['conei_cuenta'][6]['value']);
        $institucion->inst_prop_pedagogica=bool_($p['conei_cuenta'][7]['value']);
        $institucion->inst_prop_gestion=bool_($p['conei_cuenta'][8]['value']);
        $institucion->inst_pat=bool_($p['conei_cuenta'][9]['value']);
        
        $institucion->inst_luz_electrica=bool_($p['servicios'][1]['value']);
        $institucion->inst_agua_potable=bool_($p['servicios'][2]['value']);
        $institucion->inst_desague=bool_($p['servicios'][3]['value']);
        $institucion->inst_relleno_sanitario=bool_($p['servicios'][4]['value']);
        $institucion->inst_sshh_pozo_septico=bool_($p['servicios'][5]['value']);
        $institucion->inst_sshh_letrina_silo=bool_($p['servicios'][6]['value']);
        $institucion->inst_telefono=bool_($p['servicios'][7]['value']);
        $institucion->save();
        //
        
       $ambiente= $p['ambientes'];
       for ($i_1 = 1; $i_1 <=9; $i_1++) {
           
           $ambiente_ =ORM::for_table('ambiente')->create();
   
           $ambiente_->inst_id = $inst_id;
           $ambiente_->tipo_ambienteid = $i_1;
           $ambiente_->tiene =bool_($ambiente[$i_1][1]['value']);
           $ambiente_->bueno = $ambiente[$i_1][2]['value'];
           $ambiente_->regular = $ambiente[$i_1][3]['value'];  
           $ambiente_->malo = $ambiente[$i_1][4]['value'];  
           $ambiente_->save();
       }
       $poblacion_=$p['poblacion'];
       
       for ($i_1 = 1; $i_1 <= count($poblacion_); $i_1++) {
           
           $pobla_ =ORM::for_table('poblacion_estudiantil')->create();
           $pobla_->inst_id=$inst_id;
           $pobla_->grado= $i_1;
           $pobla_->hombres = $poblacion_[$i_1][1]['value'];
           $pobla_->mujeres = $poblacion_[$i_1][2]['value'];
           $pobla_->save();
       }
        //echo '-';
       
         $miembros_escolar=$p['miembros_escolar'];
        
         for ($i_1 = 1; $i_1 <= count($miembros_escolar); $i_1++) {
             if($miembros_escolar[$i_1][1]['value']!=""){
             $miembros_escolar_=ORM::for_table('municipio_escolar')->create();
             $miembros_escolar_->inst_id=$inst_id;
             $miembros_escolar_->cargo_id= $miembros_escolar[$i_1][0]['value'];
             $miembros_escolar_->nombres_apell=$miembros_escolar[$i_1][1]['value'];
             $miembros_escolar_->sexo=$miembros_escolar[$i_1][2]['value'];
             $miembros_escolar_->edad=$miembros_escolar[$i_1][3]['value'];
             $miembros_escolar_->grado=$miembros_escolar[$i_1][4]['value'];
             $miembros_escolar_->save();
             }
         }
         
           $miembros_conei=$p['miembros_conei'];
         for ($i_1 = 1; $i_1 <= count($miembros_conei); $i_1++) {
             
             if($miembros_conei[$i_1][1]['value']!=""){
             $miembros_conei_=ORM::for_table('conei')->create();
             $miembros_conei_->inst_id=$inst_id;
             $miembros_conei_->cargoid=$miembros_conei[$i_1][0]['value'];
             $miembros_conei_->nombres=$miembros_conei[$i_1][1]['value'];
             $miembros_conei_->sexo=$miembros_conei[$i_1][2]['value'];
             $miembros_conei_->dni=$miembros_conei[$i_1][3]['value'];
             $miembros_conei_->save();
             }
             
         }
          $personal=$p['personal'];
        
         for ($i_1 = 1; $i_1 <= count($personal); $i_1++) {
                
                 $personal_=ORM::for_table('personal')->where('pers_dni',$personal[$i_1][11])->find_one();
                  if($personal_==false)
                {
                      $personal_=ORM::for_table('personal')->create();
                }
                
                
                if($personal[$i_1][0]!="")
                {
                    
               
                $personal_->pers_id=$personal[$i_1][11];
                $personal_->inst_id=$inst_id;
                $personal_->tip_id=0;
                
                $names=explode(' ',$personal[$i_1][0]);
                if(count($names)==3)
                {
                    $names_  =$names[0];
                    $ap_p =$names[1];
                    $ap_m =$names[2];
                }
                if(count($names)==4)
                {
                    $names_  =$names[0] ." ".$names[1];
                    $ap_p =$names[2];
                    $ap_m =$names[3];
                }
                $personal_->pers_apellido_p=$ap_p;
                $personal_->pers_apellido_m=$ap_m;
                $personal_->pers_nombres=$names_;
                $personal_->pers_ano_ingreso_proyecto=$personal[$i_1][2];
                $grad="";
                 
                 $grados=array_keys($personal[$i_1][1]);
                for ($i_2 = 0; $i_2 < count($grados); $i_2++) {
                    $ind=$grados[$i_2];
                   $grad.= $personal[$i_1][1][$ind]."-";
                }
                $personal_->pers_grado_ensena=$grad;
                $personal_->pers_experiencia_director=$personal[$i_1][3];
                $personal_->pers_sexo=$personal[$i_1][7];
                $personal_->pers_experiencia_docente=$personal[$i_1][4];
                $personal_->pers_experiencia_escuela=$personal[$i_1][5];
                $personal_->pers_experiencia_proyecto=$personal[$i_1][6];
                $personal_->pers_estado_civil=$personal[$i_1][8];
                $personal_->pers_condicion_lab=$personal[$i_1][9];
                $personal_->pers_fecha_nac=$personal[$i_1][10];
                $personal_->pers_dni=$personal[$i_1][11];
                $personal_->pers_lugar_nac=todate_($personal[$i_1][13]);
                $personal_->pers_domicilio=$personal[$i_1][14];
                $personal_->pers_comunidad_escuela=$personal[$i_1][15];
                $personal_->pers_correo=$personal[$i_1][16];
                $personal_->pers_telefono=$personal[$i_1][17];
                   if( $personal[$i_1][18]!=1){
                      $personal[$i_1][18]=0;
                   }
                $personal_->pers_es_director=$personal[$i_1][18];

                $personal_->save();
                }
         }
         
        $encabezado =ORM::for_table('encabezado_one')->create();
        $fecha=  explode("/", $a['enca_fecha']);        
        $fecha_=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
        $encabezado->enca_id=$a['enca_id'];
        $encabezado->inst_id=  (int)trim($a['codigo_modular']);
        $encabezado->ins_id='I1';
        $encabezado->enca_lugar=$a['lugar_id'];
        $encabezado->ubi_id=$a['dist_id'];
        $encabezado->doc_id_entrevistador=$a['faci_id'];
        $encabezado->enca_fecha=$fecha_;
        $encabezado->save();

      
        
        for ($i_1 = 0; $i_1 < count($p['observaciones']); $i_1++) {
            if($p['observaciones'][$i_1]!=""){
             $observacion =ORM::for_table('observacion_one')->create();
             $observacion->obs_descripcion= $p['observaciones'][$i_1];
             $observacion->enca_id= $a['enca_id'];
             $observacion->save();
            }
        }
      ORM::get_db()->commit();
    }
    
    
       public function update_cabecera_1($p){
        $a =$p['encabezado'];
        $c=$a['lugar_id'];
        ORM::get_db()->beginTransaction();
//        if($c==-1||$c=="")
//        {
        
        $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
        if($comun==false)
        {
           $lugar =ORM::for_table('lugar')->create();
           $lugar->lug_descripcion=$a['lugar'];
           $lugar->dist_id=$a['dist_id'];
           $lugar->save();
           $comun=ORM::for_table('lugar')->where('lug_descripcion',$a['lugar'])->find_one();
           $a['lugar_id'] =$comun->lug_id;
        }
          
//        }
        //Registrar institucion educativa
        $inst_id=(int)$a['codigo_modular'];
        $a['inst_id']=$inst_id;
        $institucion =ORM::for_table('institucion')->where('inst_id',$inst_id)->find_one();
        
        if($institucion!=false)
        {
            $institucion->inst_id=$a['codigo_modular'];
            $inst_id=$a['codigo_modular'];
            $institucion->idgrupo_intervencion=$a['grup_intervencion'];
            $institucion->inst_nro_escuela=$a['num_escuela'];
            $institucion->inst_nombre=$a['nombre_escuela'];
            $institucion->inst_cod=$a['codigo_modular'];
            $institucion->inst_tipo=$a['tipo_escuela'];
            $institucion->ubi_id=$a['dist_id'];
            $institucion->inst_pip=$a['intervencion_otro'];
            $institucion->inst_nombre_pip=$a['nombre_proyecto_otro'];
            $institucion->inst_anio_ingreso_pip=$a['ano_ingreso_otro'];
            $institucion->inst_anio_ingreso=$a['ano_ingreso'];
            $institucion->inst_telefono_comu=$a['telefono_comunitario'];
            $institucion->inst_comunidad=$a['lug_id'];
            $institucion->inst_md=$a['turno_manana_ini'];
            $institucion->inst_ma=$a['turno_manana_fin'];
            $institucion->inst_td=$a['turno_tarde_ini'];
            $institucion->inst_ta=$a['turno_tarde_fin'];
            $institucion->inst_dd=$a['duracion_desayuno_ini'];
            $institucion->inst_da=$a['duracion_desayuno_fin'];
            $institucion->inst_rd=$a['duracion_recreo_ini'];
            $institucion->inst_ra=$a['duracion_recreo_fin'];
            $institucion->inst_ad=$a['duracion_almuerzo_ini'];
            $institucion->inst_aa=$a['duracion_almuerzo_fin'];

            $institucion->inst_datosubigeo=$a['punto_referencial'];
            $institucion->inst_distkm=$a['enca_distancia'];
            $institucion->inst_tiempomin=$a['tiempo_minutos'];
            $institucion->forma_transporteid=$a['form_transporte'];
        }
        
       
        $aulas=$p['aula'];
        
        if(count($aulas)>0){
        $idx_=array_keys($aulas);
        $aulas_grados="";
        for ($i_1 = 0; $i_1 < count($idx_); $i_1++) {
             $aula=$aulas[$idx_[$i_1]];
             $idx_1=array_keys($aula);
             for ($i_2 = 0; $i_2 < count($idx_1); $i_2++) {
                 $grado=$aula[$idx_1[$i_2]];
                 
                  $aulas_grados.=''.$idx_[$i_1].','.$grado['value'].';';
             }
        }
        }
        
        $institucion->inst_distribucion_aulas=$aulas_grados;
        $institucion->inst_nro_aulas=count($idx_);
        $institucion->inst_nro_asociados=$a['numero_padres'];
        $institucion->inst_conei_rec_ugel=bool_($p['conei_cuenta'][1]['value']);
        $institucion->inst_conei_res_direc=bool_($p['conei_cuenta'][2]['value']);
        $institucion->inst_pei=bool_($p['conei_cuenta'][3]['value']);
        $institucion->inst_vision=bool_($p['conei_cuenta'][4]['value']);
        $institucion->inst_mision=bool_($p['conei_cuenta'][5]['value']);
        $institucion->inst_diagnostico=bool_($p['conei_cuenta'][6]['value']);
        $institucion->inst_prop_pedagogica=bool_($p['conei_cuenta'][7]['value']);
        $institucion->inst_prop_gestion=bool_($p['conei_cuenta'][8]['value']);
        $institucion->inst_pat=bool_($p['conei_cuenta'][9]['value']);
        
        $institucion->inst_luz_electrica=bool_($p['servicios'][1]['value']);
        $institucion->inst_agua_potable=bool_($p['servicios'][2]['value']);
        $institucion->inst_desague=bool_($p['servicios'][3]['value']);
        $institucion->inst_relleno_sanitario=bool_($p['servicios'][4]['value']);
        $institucion->inst_sshh_pozo_septico=bool_($p['servicios'][5]['value']);
        $institucion->inst_sshh_letrina_silo=bool_($p['servicios'][6]['value']);
        $institucion->inst_telefono=bool_($p['servicios'][7]['value']);
        $institucion->save();
        //
        
        ORM::delete_many(ORM::for_table('ambiente')->where('inst_id',$a['inst_id'])->find_many());
        ORM::delete_many(ORM::for_table('poblacion_estudiantil')->where('inst_id',$a['inst_id'])->find_many());
        ORM::delete_many(ORM::for_table('municipio_escolar')->where('inst_id',$a['inst_id'])->find_many());
        ORM::delete_many(ORM::for_table('conei')->where('inst_id',$a['inst_id'])->find_many());
        ORM::delete_many(ORM::for_table('municipio_escolar')->where('inst_id',$a['inst_id'])->find_many());
        ORM::delete_many(ORM::for_table('observacion_one')->where('enca_id',$a['enca_id'])->find_many());
        
        
       $ambiente= $p['ambientes'];
       for ($i_1 = 1; $i_1 <=9; $i_1++) {
           
           $ambiente_ =ORM::for_table('ambiente')->create();
   
           $ambiente_->inst_id = $inst_id;
           $ambiente_->tipo_ambienteid = $i_1;
           $ambiente_->tiene =bool_($ambiente[$i_1][1]['value']);
           $ambiente_->bueno = $ambiente[$i_1][2]['value'];
           $ambiente_->regular = $ambiente[$i_1][3]['value'];  
           $ambiente_->malo = $ambiente[$i_1][4]['value'];  
           $ambiente_->save();
       }
       $poblacion_=$p['poblacion'];
       
       for ($i_1 = 1; $i_1 <= count($poblacion_); $i_1++) {
           
           $pobla_ =ORM::for_table('poblacion_estudiantil')->create();
           $pobla_->inst_id=$inst_id;
           $pobla_->grado= $i_1;
           $pobla_->hombres = $poblacion_[$i_1][1]['value'];
           $pobla_->mujeres = $poblacion_[$i_1][2]['value'];
           $pobla_->save();
       }
        //echo '-';
       
         $miembros_escolar=$p['miembros_escolar'];
        
         for ($i_1 = 1; $i_1 <= count($miembros_escolar); $i_1++) {
             if($miembros_escolar[$i_1][1]['value']!=""){
             $miembros_escolar_=ORM::for_table('municipio_escolar')->create();
             $miembros_escolar_->inst_id=$inst_id;
             $miembros_escolar_->cargo_id= $miembros_escolar[$i_1][0]['value'];
             $miembros_escolar_->nombres_apell=$miembros_escolar[$i_1][1]['value'];
             $miembros_escolar_->sexo=$miembros_escolar[$i_1][2]['value'];
             $miembros_escolar_->edad=$miembros_escolar[$i_1][3]['value'];
             $miembros_escolar_->grado=$miembros_escolar[$i_1][4]['value'];
             $miembros_escolar_->save();
             }
         }
         
           $miembros_conei=$p['miembros_conei'];
         for ($i_1 = 1; $i_1 <= count($miembros_conei); $i_1++) {
             
             if($miembros_conei[$i_1][1]['value']!=""){
                 
                 if($miembros_conei[$i_1][1]['value']!="")
                 {
                    $miembros_conei_=ORM::for_table('conei')->create();
                    $miembros_conei_->inst_id=$inst_id;
                    $miembros_conei_->cargoid=$miembros_conei[$i_1][0]['value'];
                    $miembros_conei_->nombres=$miembros_conei[$i_1][1]['value'];
                    $miembros_conei_->sexo=$miembros_conei[$i_1][2]['value'];
                    $miembros_conei_->dni=$miembros_conei[$i_1][3]['value'];
                    $miembros_conei_->save();
                 }
             
             }
             
         }
          $personal=$p['personal'];
        
         for ($i_1 = 1; $i_1 <= count($personal); $i_1++) {
                $personal_=ORM::for_table('personal')->where('pers_dni',$personal[$i_1][11])->find_one();
                  if($personal_==false)
                {
                      $personal_=ORM::for_table('personal')->create();
                }
                if($personal[$i_1][0]!="")
                {
                    $personal_->pers_id=$personal[$i_1][11];
                $personal_->inst_id=$inst_id;
                $personal_->tip_id=0;
                
                $names=explode(' ',$personal[$i_1][0]);
                if(count($names)==3)
                {
                    $names_  =$names[0];
                    $ap_p =$names[1];
                    $ap_m =$names[2];
                }
                if(count($names)==4)
                {
                    $names_  =$names[0] ." ".$names[1];
                    $ap_p =$names[2];
                    $ap_m =$names[3];
                }
                $personal_->pers_apellido_p=$ap_p;
                $personal_->pers_apellido_m=$ap_m;
                $personal_->pers_nombres=$names_;
                $personal_->pers_ano_ingreso_proyecto=$personal[$i_1][2];
                $grad="";
                 if(count($personal[$i_1][1])>0)
                 {
                 $grados=array_keys($personal[$i_1][1]);
                for ($i_2 = 0; $i_2 < count($grados); $i_2++) {
                    $ind=$grados[$i_2];
                   $grad.= $personal[$i_1][1][$ind]."-";
                }
                 }
                 $personal_->pers_grado_ensena=$grad;
                $personal_->pers_experiencia_director=$personal[$i_1][3];
                $personal_->pers_sexo=$personal[$i_1][7];
                $personal_->pers_experiencia_docente=$personal[$i_1][4];
                $personal_->pers_experiencia_escuela=$personal[$i_1][5];
                $personal_->pers_experiencia_proyecto=$personal[$i_1][6];
                $personal_->pers_estado_civil=$personal[$i_1][8];
                $personal_->pers_condicion_lab=$personal[$i_1][9];
                $personal_->pers_fecha_nac= todate_($personal[$i_1][10]);
                $personal_->pers_dni=$personal[$i_1][11];
                $personal_->pers_lugar_nac=$personal[$i_1][13];
                $personal_->pers_domicilio=$personal[$i_1][14];
                $personal_->pers_comunidad_escuela=$personal[$i_1][15];
                $personal_->pers_correo=$personal[$i_1][16];
                $personal_->pers_telefono=$personal[$i_1][17];
                    if( $personal[$i_1][18]!=1){
                        $personal[$i_1][18]=0;
                    }
                $personal_->pers_es_director=$personal[$i_1][18];
                
                $personal_->save();
                }
                
         }
         
        $encabezado =ORM::for_table('encabezado_one')->where('inst_id',$a['inst_id'])->find_one();
        if($encabezado!=false)
        {
            $fecha=  explode("/", $a['enca_fecha']);        
            $fecha_=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            $encabezado->enca_id=$a['enca_id'];
            $encabezado->inst_id=  (int)trim($a['codigo_modular']);
            $encabezado->ins_id='I1';
            $encabezado->enca_lugar=$a['lugar_id'];
            $encabezado->ubi_id=$a['dist_id'];
            $encabezado->doc_id_entrevistador=$a['faci_id'];
            $encabezado->enca_fecha=$fecha_;
            $encabezado->save();
            
        }
        else {
            $encabezado =ORM::for_table('encabezado_one')->create();
            $fecha=  explode("/", $a['enca_fecha']);        
            $fecha_=$fecha[2].'-'.$fecha[1].'-'.$fecha[0];
            $encabezado->enca_id= $p['id_'];
            $encabezado->inst_id= (int)trim($a['codigo_modular']);
            $encabezado->ins_id='I1';
            $encabezado->enca_lugar=$a['lugar_id'];
            $encabezado->ubi_id=$a['dist_id'];
            $encabezado->doc_id_entrevistador=$a['faci_id'];
            $encabezado->enca_fecha=$fecha_;
            $encabezado->save();
            $a['enca_id']=$p['id_'];
        }
        for ($i_1 = 0; $i_1 < count($p['observaciones']); $i_1++) {
                if($p['observaciones'][$i_1]!=""){
                 $observacion =ORM::for_table('observacion_one')->create();
                 $observacion->obs_descripcion= $p['observaciones'][$i_1];
                 $observacion->enca_id= $a['enca_id'];
                 $observacion->save();
                }
            }
      ORM::get_db()->commit();
    }
    
}


?>