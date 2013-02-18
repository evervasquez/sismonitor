<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once("Main.php");
class User extends Main {
    function Start($p) {
        $statement = $this->db->prepare("SELECT usuario.nombres as nombres, usuario.login as login,usuario.idperfil as idperfil, perfil.descripcion as perfil FROM usuario inner join perfil on usuario.idperfil = perfil.idperfil WHERE LOWER(usuario.login) LIKE :user AND usuario.clave LIKE :password ");
        $statement->bindParam (":user", strtolower( $p['usuario']), PDO::PARAM_STR);
        $statement->bindParam (":password", $p['password'] , PDO::PARAM_STR);
        $statement->execute();
        $obj = $statement->fetchObject();
        $obj1= $statement->errorInfo();
        return array('flag'=>$statement->rowCount() , 'obj'=>$obj,'error'=> $obj1);
    }
    
    function index($query , $p ) {
        $sql = "select usuario.idusuario,concat_ws(usuario.nombres,usuario.apellidos) ,perfil.descripcion
                from usuario inner join perfil on usuario.idperfil = perfil.idperfil
                where concat_ws(usuario.nombres,' ',usuario.apellidos) like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }
    function edit($id ) {
        $stmt = $this->db->prepare("SELECT * FROM usuario WHERE idusuario = :id");
        $stmt->bindValue(':id', $id , PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject();
    }
    function insert($_P ) {
        $stmt = $this->db->prepare("insert into usuario (idusuario,idperfil,login,clave,nombres,apellidos,celular,estado)
                                    values(:p1,:p2,:p3,:p4,:p5,:p6,:p7,:p8)");
        $stmt->bindValue(':p1', $_P['idusuario'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idperfil'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['password'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['activo'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function update($_P ) {
        $stmt = $this->db->prepare("update usuario set idperfil=:p2,login=:p3,clave=:p4,nombres=:p5,apellidos=:p6,celular=:p7,estado=:p8 where idusuario = :p1");
        $stmt->bindValue(':p1', $_P['idusuario'] , PDO::PARAM_INT);
        $stmt->bindValue(':p2', $_P['idperfil'] , PDO::PARAM_INT);
        $stmt->bindValue(':p3', $_P['login'] , PDO::PARAM_STR);
        $stmt->bindValue(':p4', $_P['password'] , PDO::PARAM_STR);
        $stmt->bindValue(':p5', $_P['nombres'] , PDO::PARAM_STR);
        $stmt->bindValue(':p6', $_P['apellidos'] , PDO::PARAM_STR);
        $stmt->bindValue(':p7', $_P['celular'] , PDO::PARAM_STR);
        $stmt->bindValue(':p8', $_P['activo'] , PDO::PARAM_BOOL);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
    function delete($_P ) {
        $stmt = $this->db->prepare("DELETE FROM usuario WHERE idusuario = :p1");
        $stmt->bindValue(':p1', $_P['id'] , PDO::PARAM_INT);
        $p1 = $stmt->execute();
        $p2 = $stmt->errorInfo();
        return array($p1 , $p2[2]);
    }
}
?>
