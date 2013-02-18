<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Encuestado
 *
 * @author sophie
 */
require_once 'Main.php';
class Encuestado  extends Main {
    //put your code here
    function getEncuestados($id) {
        $id = (int)($id);
        $id = (string)($id);
        $stmt = $this->db->prepare("SELECT * FROM vencuestadoactiva WHERE idencabezado = :id ");
        $stmt->bindValue(':id', $id , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function saveactiva($p,$id){
        $id = (int)($id);
        $id = (string)($id);
        $stmt = $this->db->prepare("DELETE FROM encuestado WHERE idencabezado = :id");
        $stmt2 = $this->db->prepare("INSERT INTO encuestado( idencabezado, parentesco, edad, nivel, ingreso , encuestado , sexo , citas ) VALUES ( :p1, :p2 , :p3 , :p4 ,  :p5, :p6 , :p7 , :p8 )");
        try{
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->beginTransaction();
            $stmt->bindValue(':id', $id , PDO::PARAM_STR);
            $stmt->execute();
            foreach( $p['edad'] as $key => $value){
                $stmt2->bindValue(':p1', $id , PDO::PARAM_STR);
                $stmt2->bindValue(':p2', $p['parentesco'][$key], PDO::PARAM_INT);
                $stmt2->bindValue(':p3', $value , PDO::PARAM_INT);
                $stmt2->bindValue(':p4', $p['nivel'][$key], PDO::PARAM_INT);
                $stmt2->bindValue(':p5', $p['ingreso'][$key], PDO::PARAM_INT);
                $stmt2->bindValue(':p6', '0' , PDO::PARAM_INT);
                $stmt2->bindValue(':p7', $p['sexo'][$key] , PDO::PARAM_INT);
                $stmt2->bindValue(':p8', $p['citas'][$key] , PDO::PARAM_INT);
                $stmt2->execute();
            }
            $this->db->commit();
            return array('res'=>"1",'msg'=>'OK!');
        }
        catch(PDOException $e) {
            $this->db->rollBack();
            return array('res'=>"2",'msg'=>'Error : '.$e->getMessage().$id);
        }
    }

    ////////////////////////////////////////////
    //Unicri
     public function getListU(){
        //  return "SELECT * FROM {$this->table} where idencabezado = '".$_SESSION['idu']."'";
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} where idencabezado = :id");
        $stmt->bindValue(':id', $_SESSION['idu'] , PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getList_integrantes(){
        $statement = $this->db->prepare("SELECT * FROM {$this->table} where idencabezado = :query");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
        public function save_encuestado_u($p){
        $stmt = $this->db->prepare("INSERT INTO encuestado(idencabezado,encuestado,parentesco,edad,nivel,fechan,pse,sexo,jefe) values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8,:p9)");
        try {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->db->beginTransaction();
        foreach( $p['edad'] as $key => $value){
            if(isset($p['jefe'][$key])){$jefe = 1;}
                else {$jefe = 0;}
            if(isset($p['entrevistado'][$key])){$entre = 1;}
                else {$entre = 0;}
            if(isset($p['pse'][$key])){$pse = 1;}
                else {$pse = 0;}
                $stmt->bindValue(':p1', $_SESSION['idu'], PDO::PARAM_STR);
                $stmt->bindValue(':p2', $entre, PDO::PARAM_INT);
                $stmt->bindValue(':p3', $p['parentesco'][$key], PDO::PARAM_INT);
                $stmt->bindValue(':p4', $value,PDO::PARAM_INT);
                $stmt->bindValue(':p5', $p['grado'][$key], PDO::PARAM_INT);
                $stmt->bindValue(':p6', $p['fechan'][$key], PDO::PARAM_STR);
                $stmt->bindValue(':p7', $pse, PDO::PARAM_BOOL);
                $stmt->bindValue(':p8', $p['sexo'][$key], PDO::PARAM_INT);
                $stmt->bindValue(':p9', $jefe, PDO::PARAM_INT);
                $stmt->execute();
           }
        $this->db->commit();
        return array('res'=>'1','msg'=>'Se ha registrado exitosamente!');
       }
    catch(PDOException $e){
            $this->db->rollBack();
            return array('res'=>'2','msg'=>'Error : '.$e->getMessage());
        }
    }
}
?>
