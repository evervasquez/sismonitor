<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Respuesta
 *
 * @author sophie
 */
require_once 'Main.php';
class Respuesta extends Main {
    //put your code here
    public function getanswers($idanswers) {
        $idanswers = $idanswers . '%';
        $stmt = $this->db->prepare("SELECT * FROM respuesta WHERE idencabezado = :id AND idpregunta LIKE :idanswers");
        $stmt->bindValue(':id', $_SESSION['ID'] , PDO::PARAM_INT);
        $stmt->bindValue(':idanswers', $idanswers , PDO::PARAM_STR);
        $stmt->execute();
        $set = $stmt->fetchAll();
        $data = array();
        foreach ($set as $val ) {
            $val[0] = str_replace('-', '_', $val[0] );
            $data[$val[0]] = $val[1];
        }
        $obj = (object)$data;
        return $obj;
    }
    function getprevious($_P) {
        $_P['sec'] = $_P['sec'] . '%';
        $stmt = $this->db->prepare("SELECT * FROM respuesta WHERE idencabezado = :id AND idpregunta LIKE :idanswers");
        $stmt->bindValue(':id', $_P['id'] , PDO::PARAM_INT);
        $stmt->bindValue(':idanswers', $_P['sec'] , PDO::PARAM_STR);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    /////////////////////////////////
    //Unicri
    public function getInfo(){
        $stmt = $this->db->prepare("select fechan from encuestado where idencabezado=:id and encuestado=1");
        $stmt->bindValue(':id',$_SESSION['idu'],PDO::PARAM_STR);
        $stmt->execute();
        $set = $stmt->fetchAll();
        foreach($set as $val)
        {
            $fecha = $val[0];
        }
        return $fecha;
    }
    public function getRespuesta_u($idpregunta){
             $stmt = $this->db->prepare("select respuesta.*
                                    from pregunta inner join tipo_pregunta on
                                            pregunta.idtipo_pregunta=tipo_pregunta.idtipo_pregunta
                                            inner join parte on parte.idparte=tipo_pregunta.idparte
                                            inner join detencuesta on detencuesta.idpregunta = pregunta.idpregunta
                                            inner join encabezado on encabezado.idencabezado=detencuesta.idencabezado
                                            inner join respuesta on respuesta.idencabezado=detencuesta.idencabezado and
                                            respuesta.idpregunta = detencuesta.idpregunta
                                    where pregunta.idpregunta = :idpregunta and respuesta.idencabezado= :id
                                    order by respuesta.idrespuesta");
        $stmt->bindValue(':id', $_SESSION['idu'] , PDO::PARAM_INT);
        $stmt->bindValue(':idpregunta', $idpregunta , PDO::PARAM_STR);
        $stmt->execute();
        $set = $stmt->fetchAll();
        foreach ($set as $val ) {
            $data = $val[1];
        }
        return $data;
    }
    public function getanswers_u($idparte) {
        $stmt = $this->db->prepare("select respuesta.*
                                    from pregunta inner join tipo_pregunta on
                                            pregunta.idtipo_pregunta=tipo_pregunta.idtipo_pregunta
                                            inner join parte on parte.idparte=tipo_pregunta.idparte
                                            inner join detencuesta on detencuesta.idpregunta = pregunta.idpregunta
                                            inner join encabezado on encabezado.idencabezado=detencuesta.idencabezado
                                            inner join respuesta on respuesta.idencabezado=detencuesta.idencabezado and
                                            respuesta.idpregunta = detencuesta.idpregunta
                                    where parte.idparte=:idparte and respuesta.idencabezado= :id
                                    order by  respuesta.idrespuesta");
        $stmt->bindValue(':id', $_SESSION['idu'] , PDO::PARAM_INT);
        $stmt->bindValue(':idparte', $idparte , PDO::PARAM_INT);
        $stmt->execute();
        $set = $stmt->fetchAll();
        return $set;
    }

    public function loadTabs()
    {
        $stmt = $this->db->prepare("select distinct(parte.idparte)
                                    from pregunta inner join tipo_pregunta on
                                        pregunta.idtipo_pregunta=tipo_pregunta.idtipo_pregunta
                                        inner join parte on parte.idparte=tipo_pregunta.idparte
                                        inner join detencuesta on detencuesta.idpregunta = pregunta.idpregunta
                                        inner join encabezado on encabezado.idencabezado=detencuesta.idencabezado
                                        inner join respuesta on respuesta.idencabezado=detencuesta.idencabezado and
                                        respuesta.idpregunta = detencuesta.idpregunta
                                    where respuesta.idencabezado= :id
                                    order by parte.idparte");
        $stmt->bindValue(':id', $_SESSION['idu'] , PDO::PARAM_INT);
        $stmt->execute();
        $set = $stmt->fetchAll();
        return $set;
    }
    
    public function get_detalle_venta()
    {
      return  $this->getSelect("SELECT * FROM comprador ORDER BY idComprador");
    }
    
}
?>
