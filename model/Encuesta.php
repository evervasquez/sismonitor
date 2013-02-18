<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuesta
 *
 * @author sophie
 */
require_once 'Main.php';
class  Encuesta extends Main {
    //Metodos Activa
    public function saveactivadetail($p,$id){
        $str = '';
        foreach ($p as $value) {
            switch ($value['name']) {
                case 'citas[]':
                    break;
                case 'sexo[]':
                    break;
                case 'ingreso[]':
                    break;
                case 'nivel[]':
                    break;
                case 'parentesco[]':
                    break;
                case 'edad[]':
                    break;
                default:
                    $data[] = array('name'=>$value['name'],'value' => $value['value']);
                    break;
            }
        }
        $p = $data;

        $stmt = $this->db->prepare("SELECT * FROM respuesta WHERE idencabezado = :id AND idpregunta = :idanswers ");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->bindValue(':idanswers', substr($p[0]['name'], 1) , PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() == 0) {
            $stmt2 = $this->db->prepare("INSERT INTO detencuesta (idencabezado, idpregunta ) VALUES (:p1 , :p2 )");
            $stmt3 = $this->db->prepare("INSERT INTO respuesta (idencabezado, idpregunta , valor ) VALUES (:p3 , :p4 , :p5 )");
            try{
                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->db->beginTransaction();
                foreach( $p as $value){
                    //stmt2 Insert EN LA TABLA DETALLE DE ENCUESTA
                    $stmt2->bindValue(':p1', $id , PDO::PARAM_STR);
                    $stmt2->bindValue(':p2', substr($value['name'], 1), PDO::PARAM_STR);
                    $stmt2->execute();
                    //stmt3 Insert EN LA TABLA DETALLE DE RESPUESTA
                    $stmt3->bindValue(':p3', $id , PDO::PARAM_STR);
                    $stmt3->bindValue(':p4', substr($value['name'], 1), PDO::PARAM_STR);
                    $stmt3->bindValue(':p5', $value['value'], PDO::PARAM_STR);
                    $stmt3->execute();
                }
                $this->db->commit();
                return array('res'=>"1",'msg'=>'Bien!');
            }
            catch(PDOException $e) {
                $this->db->rollBack();
                return array('res'=>"2",'msg'=>'Error : '.$e->getMessage() . $str);
            }
        } else {
                $stmt3 = $this->db->prepare("UPDATE respuesta SET valor = :p5 WHERE idencabezado = :p3 AND idpregunta = :p4 ");
                try{
                    $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $this->db->beginTransaction();
                    foreach( $p as $value){
                        //stmt3 Insert EN LA TABLA DETALLE DE RESPUESTA
                        $stmt3->bindValue(':p3', $id , PDO::PARAM_STR);
                        $stmt3->bindValue(':p4', substr($value['name'], 1), PDO::PARAM_STR);
                        $stmt3->bindValue(':p5', $value['value'], PDO::PARAM_STR);
                        $stmt3->execute();
                    }
                    $this->db->commit();
                    return array('res'=>"1",'msg'=>'Bien!');
                }
                catch(PDOException $e) {
                    $this->db->rollBack();
                    return array('res'=>"2",'msg'=>'Error : '.$e->getMessage() . $str);
                }
        }
    }
    function Search_Activa_ID($id) {
        $stmt = $this->db->prepare("SELECT * FROM encabezado WHERE idencabezado = :id AND idencuesta = 2");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }
     function Search_Entrevista_ID($id) {
         
        $data['row']= $this->getSelect("SELECT * FROM vista_entrevistaci WHERE idEntrevista = ".$id."");
        $id_=$data['row'][0]['Ubigeo'];
        $idA=$data['row'][0]['idOrganizaciona'];
        $idP=$data['row'][0]['idOrganizacionp'];
        $idF=$data['row'][0]['idFinanciera'];
        
        $data['row'][0]['idDepartamento'] =substr($id_,0,2)."0000";
        $data['row'][0]['idProvincia'] =substr($id_,0,4)."00";
        $data['row'][0]['idDistrito'] =$id_;
        $id__= $this->getSelect("SELECT idlocalidad FROM localidadi WHERE nombccpp LIKE  '" . $data['row'][0]['Localidad'] ."' AND  SUBSTRING(idlocalidad,1,6)  LIKE '".$id_."' ");
        $data['row'][0]['idLocalidad'] =$id__[0]['idlocalidad'];
        $detalle_personal= $this->getSelect("SELECT a.idCargo, a.idPersonal,b.Nombres FROM detalle_personal_ci a INNER JOIN  personal b ON (a.idPersonal=b.idPersonal)  WHERE a.idEntrevista=$id");
        $data['row'][0]['personal1']=$detalle_personal;
        $data['row'][0]['personal2']=$detalle_personal;
        $participante= $this->getSelect("SELECT * FROM participante WHERE idParticipante=". $data['row'][0]['idParticipante']);
        $data['row'][0]['participante']=$participante;
        $hijos= $this->getSelect("SELECT * FROM hijos WHERE idEntrevista=$id");
        $asop= $this->getSelect("SELECT * FROM organizacionp WHERE idOrganizacionp=$idP");
        $asoa= $this->getSelect("SELECT * FROM organizaciona WHERE idOrganizaciona=$idA");
        $dt_aprendio= $this->getSelect("SELECT * FROM detalle_aprendio WHERE idEntrevista=$id");
        $financiera= $this->getSelect("SELECT * FROM financiera WHERE idFinanciera=$idF");
        $detComprador= $this->getSelect("SELECT * FROM detallecomprador WHERE idEntrevista=$id");
        $detUsoCredito=$this->getSelect("SELECT * FROM detalleusodecredtio WHERE idEntrevista=$id");
        
        
       if(count($hijos)>0)
       {
           $data['row'][0]['SiHijos']=1;
           $data['row'][0]['NroHijos']=count($hijos);
       }
       else
       {
            $data['row'][0]['SiHijos']=2;
            $data['row'][0]['NroHijos']=0;
       }
        $data['row'][0]['ListaHijos']=$hijos;
        $data['row'][0]['orgAsociacion']=$asop;
        $data['row'][0]['orgAsistencia']=$asoa;
        $data['row'][0]['detalleAprendio']=$dt_aprendio;
        $data['row'][0]['financiera']=$financiera;
        $data['row'][0]['detComprador']=$detComprador;
        $data['row'][0]['detUsoCredito']=$detUsoCredito;
        return $data;
    }
    
    function Search_Entrevista_c2_ID($id) {
         
        $data['row']= $this->getSelect("SELECT * FROM entrevistac2 WHERE idEntrevistac2 = '".$id."'");
        return $data;
    
    }
    
    
    function Search_Entrevista_IDP($id) {
      $rs=$this->getSelect("SELECT * FROM detalle_actividad WHERE idEntrevista=$id ORDER BY idTipoInversion ");
      return $rs;
    }
    
    
    function Resumen_Activa() {
        $stmt = $this->db->prepare("select * from vresumen_activa");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    //Metodos Unicri    
    public function save($p){
        $stmt2 = $this->db->prepare("INSERT INTO detencuesta (idencabezado, idpregunta ) VALUES (:p1 , :p2 )");
        $stmt3 = $this->db->prepare("INSERT INTO respuesta (idencabezado, idpregunta , valor ) VALUES (:p3 , :p4 , :p5 )");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $last = "";
            foreach( $p as $value){
                $t = strlen($value['name']);
                if($t<=6){
                  $stmt2->bindValue(':p1', $_SESSION['idu'], PDO::PARAM_STR);
                  $stmt2->bindValue(':p2',$value['name'], PDO::PARAM_STR);
                  $stmt2->execute();
                  $stmt3->bindValue(':p3', $_SESSION['idu'], PDO::PARAM_STR);
                  $stmt3->bindValue(':p4', $value['name'], PDO::PARAM_STR);
                  $stmt3->bindValue(':p5', $value['value'], PDO::PARAM_STR);
                  $stmt3->execute();
                         }
                else {
                    $preg = substr($value['name'], 1, 6);
                    if($preg!="002200" && $preg!="002300")
                    {
                     if($last==$preg)
                        {
                          $stmt3->bindValue(':p3', $_SESSION['idu'], PDO::PARAM_STR);
                          $stmt3->bindValue(':p4', $preg, PDO::PARAM_STR);
                          $stmt3->bindValue(':p5', $value['value'], PDO::PARAM_STR);
                          $stmt3->execute();
                        }
                     else {
                         $last = $preg;
                         $stmt2->bindValue(':p1', $_SESSION['idu'], PDO::PARAM_STR);
                         $stmt2->bindValue(':p2',$preg, PDO::PARAM_STR);
                         $stmt2->execute();
                         
                         $stmt3->bindValue(':p3', $_SESSION['idu'], PDO::PARAM_STR);
                         $stmt3->bindValue(':p4', $preg, PDO::PARAM_STR);
                         $stmt3->bindValue(':p5', $value['value'], PDO::PARAM_STR);
                         $stmt3->execute();
                         }
                    }
                }
                
            }
            $this->db->commit();
            return array('res'=>"1",'msg'=>'Bien!');
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage());
        }
    }
    public function save_multi($p){
        $stmt2 = $this->db->prepare("INSERT INTO detencuesta (idencabezado, idpregunta ) VALUES (:p1 , :p2 )");
        $stmt3 = $this->db->prepare("INSERT INTO respuesta (idencabezado, idpregunta , valor ) VALUES (:p3 , :p4 , :p5 )");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            foreach($p as $key => $val)
               {
                   $stmt2->bindValue(':p1', $_SESSION['idu'],PDO::PARAM_STR);
                   $stmt2->bindValue(':p2',$key,PDO::PARAM_STR);
                   $stmt2->execute();
                   foreach($val as $value)
                   {
                       $stmt3->bindValue(':p3', $_SESSION['idu'],PDO::PARAM_STR);
                       $stmt3->bindValue(':p4', $key,PDO::PARAM_STR);
                       $stmt3->bindValue(':p5', $value,PDO::PARAM_STR);
                       $stmt3->execute();
                   }
               }
            $this->db->commit();
            return array('res'=>"1",'msg'=>'Se ha registrado correctamente!');
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage());
        }


    }
    public function save_parte1($p){
        $stmt2 = $this->db->prepare("INSERT INTO detencuesta (idencabezado, idpregunta ) VALUES (:p1 , :p2 )");
        $stmt3 = $this->db->prepare("INSERT INTO respuesta (idencabezado, idpregunta , valor ) VALUES (:p3 , :p4 , :p5 )");
        $stmt4 = $this->db->prepare("INSERT INTO respuesta (idencabezado,idpregunta,idvictima) VALUES(:p6,:p7,:p8)");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $last = "";
            foreach( $p as $key=>$value){
              $t = strlen($value['name']);
              if($t<=6){
                  if(strlen($value['value'])==0){$v = "";}
                    else {$v = $value['value'];}
                    $stmt2->bindValue(':p1', $_SESSION['idu'], PDO::PARAM_STR);
                    $stmt2->bindValue(':p2',$value['name'], PDO::PARAM_STR);
                    $stmt2->execute();

                    $stmt3->bindValue(':p3', $_SESSION['idu'], PDO::PARAM_STR);
                    $stmt3->bindValue(':p4',$value['name'], PDO::PARAM_STR);
                    $stmt3->bindValue(':p5',$value['value'], PDO::PARAM_STR);
                    $stmt3->execute();
              }
                else {
                    $valor = explode("_",$value['name']);
                    $preg = $value['value'];
                    if($last!=$preg){
                        $stmt2->bindValue(':p1', $_SESSION['idu'], PDO::PARAM_STR);
                        $stmt2->bindValue(':p2',$preg, PDO::PARAM_STR);
                        $stmt2->execute();
                        $last = $preg;
                      }

                    $stmt4->bindValue(':p6', $_SESSION['idu'], PDO::PARAM_STR);
                    $stmt4->bindValue(':p7', $preg, PDO::PARAM_STR);
                    $stmt4->bindValue(':p8', $valor[1], PDO::PARAM_STR);
                    $stmt4->execute();
                }
            }
            $this->db->commit();
            return array('res'=>"1",'msg'=>'Bien!');
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage());
        }
    }
    public function verifica_nro($p){
       $stmt = $this->db->prepare("select encabezado.idencabezado,
                                   encabezado.idencuestador,
                                   encabezado.zona,
                                   encabezado.manzana,
                                   encabezado.fecha,
                                   encabezado.nro,
                                   encuestador.nombres||' '||encuestador.ape_pat||' '||encuestador.ape_mat,
                                   encabezado.tipo_zona,
                                   encabezado.tipo_vivienda,
                                   encabezado.rechazos,
                                   encabezado.perdidas,
                                   encabezado.motivaciones,
                                   encabezado.idsupervisor,
                                   supervisor.nombres||' '||supervisor.ape_pat||' '||supervisor.ape_mat
                                   from encabezado inner join encuestador on 
                                        encabezado.idencuestador = encuestador.idencuestador left outer join encuestador as supervisor on
                                        supervisor.idencuestador = encabezado.idsupervisor
                                  where encuestador.idencuesta=1  and encabezado.nro=:p1");
       $stmt2 = $this->db->prepare("select nombres,direccion,telefonos from encuestado where idencabezado=:p2 and nombres <> ''");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $stmt->bindValue(':p1', $p, PDO::PARAM_STR);
            $stmt->execute();
            $n =  $stmt->rowCount();
            if($n>0){
                foreach ($stmt->fetchAll() as $r )
                    {
                        $data['res'] = 1;
                        $data['id'] = $r[0];
                        $data['idencuestador'] = $r[1];
                        $data['zona'] = $r[2];
                        $data['manzana'] = $r[3];
                        $data['fecha'] = $this->getfecha($r[4]);
                        $_SESSION['idu'] = $r[0];
                        $_SESSION['nro'] = $r[5];
                        $data['encuestador'] = $r[6];
                        $data['tipo_zona'] = $r[7];
                        $data['tipo_vivienda'] = $r[8];
                        $data['rechazos'] = $r[9];
                        $data['perdidas'] = $r[10];
                        $data['motivaciones'] = $r[11];
                        $data['supervisor'] = $r[13];
                        $data['idsupervisor'] = $r[12];
                    }
                 $stmt2->bindValue(':p2',$data['id'],PDO::PARAM_STR);
                 $stmt2->execute();
                 foreach ($stmt2->fetchAll() as $r )
                    {
                        $data['encuestado'] = $r[0];
                        $data['direccion'] = $r[1];
                        $data['telefono'] = $r[2];
                    }
                return $data;
            }
            else {
                 unset($_SESSION['idu']);
                 unset($_SESSION['nro']);
                 return array('res'=>"2",'msg'=>'No hay datos');
              }
            $this->db->commit();
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage());
        }
    }
    //Metodos de Mantenimiento
    
    function index($query , $p ) {
        $sql = "SELECT * FROM encuesta WHERE descripcion LIKE :query OR CAST(idencuesta AS VARCHAR ) = :id ORDER BY 1 DESC";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ),
                       array('key'=>':id' , 'value'=>$query , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;

    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM encuesta WHERE idencuesta = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {       
        $stmt = $this->db->prepare("INSERT INTO encuesta (descripcion) VALUES (UPPER(:p1))");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {        
        $stmt = $this->db->prepare("UPDATE encuesta SET descripcion = UPPER(:p1) WHERE idencuesta = :p2");
        $stmt->bindValue(':p1', $_P['descripcion'] , PDO::PARAM_STR);
        $stmt->bindValue(':p2', $_P['idencuesta'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM encuesta WHERE idencuesta = :p1");
        $stmt->bindValue(':p1', $_P['idencuesta'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    
    function get_id_ci()
    {
        $stmt = $this->db->prepare("SELECT max(idEntrevista) as id FROM entrevistaci ");
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function search_ci_id($id){
        $stmt = $this->db->prepare("SELECT * FROM entrevistaci WHERE idEntrevista = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
        function search_cii_id($id){
        $stmt = $this->db->prepare("SELECT * FROM entrevistac2 WHERE idEntrevista2 = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        if ($stmt->rowCount() > 0)
        {
            return true;
        } 
        else 
        {
            return false;
        }
    }
}

?>
