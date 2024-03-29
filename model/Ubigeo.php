<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Main.php';
class Ubigeo  extends Main {
    public function getListDistritos($p=NULL){
        $valor = "%".$p['valor']."%";
        $sql = "select * from ubigeo where SUBSTRING(Ubigeo,3,4)<>'0000' and substring(Ubigeo,5,2)<>'00' and substring(Ubigeo,1,2) LIKE '22' ";
        if($p!=NULL) {$andwhere = " and ".$p['criterio']." ilike (:p1)"; }
            else {$andwhere = ""; }
        $sql .= $andwhere." order by descripcion";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':p1', $valor, PDO::PARAM_STR);
        $stmt->execute();
       return $stmt->fetchAll();
    }
  public function getList_ajax($query) {
        $statement = $this->db->prepare("SELECT * FROM {$this->table} where SUBSTRING(Ubigeo,1,2) = :query");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
  public function getList_distrito($query) {
        $query= substr($query,0,4);
        $statement = $this->db->prepare("SELECT * FROM ubigeo WHERE SUBSTRING(Ubigeo,1,4) = :query AND substr(Ubigeo,5,2) <> '00' ");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
     public function getList_departamentos() {
       
        $statement = $this->db->prepare("SELECT * FROM ubigeo WHERE SUBSTRING(Ubigeo,3,4) LIKE '0000'");
       // $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
  public function getList_provincia($query) {
        $query= substr($query,0,2);
        $statement = $this->db->prepare("SELECT * FROM ubigeo WHERE SUBSTRING(Ubigeo,1,2) = :query AND SUBSTRING(Ubigeo,3,4) <> '0000' AND SUBSTRING(Ubigeo,5,2)='00'");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
    
    public function getList_Localidad($query)
    {
        $statement = $this->db->prepare("SELECT idlocalidad, nombccpp FROM localidadi WHERE SUBSTRING(idlocalidad,1,6) LIKE :query ");
        $statement->bindParam (":query",$query, PDO::PARAM_STR);
        $statement->execute();
        return $statement->fetchAll();
    }
        public function getList_Zona()
    {
        $statement = $this->db->prepare("SELECT idZona, Nombre FROM zona ");
        $statement->execute();
        return $statement->fetchAll();
    }
    public function getAll($dist_id)
    {
        $data= array();
        
        
        $prov_id=  substr($dist_id, 0,4)."00";
        $dep_id=  substr($dist_id, 0,2)."0000";
        $ubigeo = ORM::for_table('ubigeo')->where('Ubigeo', $dist_id)->find_one();
        $data['distrito']=$ubigeo->Nombre;
        $ubigeo = ORM::for_table('ubigeo')->where('Ubigeo', $prov_id)->find_one();
        $data['provincia']=$ubigeo->Nombre;
        $ubigeo = ORM::for_table('ubigeo')->where('Ubigeo', $dep_id)->find_one();
        $data['departamento']=$ubigeo->Nombre;
        return $data;
    }
}
?>
