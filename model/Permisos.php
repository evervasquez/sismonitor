    <?php
    include_once("Main.php");
    class Permisos extends Main
    {
       function index($query , $p ) {
            $sql = "select * from boletin  where titulo ilike :query";
            $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
            $data['total'] = $this->getTotal( $sql, $param );
            $data['rows'] =  $this->getRow($sql, $param , $p );
            $data['rowspag'] =  $this->getRowPag($data['total'], $p );
            return $data;
        }

        function Modulos($p)
        {
            $stmt = $this->db->prepare("select pe.descripcion,m.descripcion,m.idmodulo
                                        from permiso as p right outer join perfil as pe on p.idperfil = pe.idperfil
                                        right outer join modulo as m on p.idmodulo = m.idmodulo and pe.idperfil = :p1
                                        where m.idpadre is null and m.estado = 1");
            $stmt->bindValue(':p1', $p , PDO::PARAM_INT);
            $stmt->execute();
            $items = $stmt->fetchAll();
            $cont = 0;
            $cont2 = 0;
            foreach ($items as $valor)
            {
                $stmt = $this->db->prepare("select pe.descripcion,m.descripcion,m.idmodulo
                                            from permiso as p right outer join perfil as pe on p.idperfil = pe.idperfil
                                            right outer join modulo as m on p.idmodulo = m.idmodulo and pe.idperfil = :p1
                                            where  m.idpadre=:p2 and m.estado = 1");
                $stmt->bindValue(':p1', $p , PDO::PARAM_INT);
                $stmt->bindValue(':p2', $valor[2] , PDO::PARAM_INT);
                $stmt->execute();
                $hijos = $stmt->fetchAll();
                $menu[$cont] = array(
                'perfil' => $valor[0],
                'descripcion' => $valor[1],
                'idmodulo' => $valor[2],
                'hijos' => array()
                    );
                $cont2 = 0;
                foreach($hijos as $h)
                {

                  $menu[$cont]['hijos'][$cont2] = array('perfil'=>$h[0],'descripcion' => $h[1],'idmodulo' => $h[2],'hijos'=>array());


                  $cont3=0;
                  $stmt = $this->db->prepare("select pe.descripcion,m.descripcion,m.idmodulo
                                            from permiso as p right outer join perfil as pe on p.idperfil = pe.idperfil
                                            right outer join modulo as m on p.idmodulo = m.idmodulo and pe.idperfil = :p1
                                            where  m.idpadre=:p2 and m.estado = 1");
                  $stmt->bindValue(':p1', $p , PDO::PARAM_INT);
                  $stmt->bindValue(':p2', $h[2] , PDO::PARAM_INT);
                  $stmt->execute();
                  $hijos2 = $stmt->fetchAll();
                  foreach ($hijos2 as $val) {
                     $menu[$cont]['hijos'][$cont2]['hijos'][$cont3] = array('perfil'=>$val[0],'descripcion' => $val[1],'idmodulo' => $val[2],'hijos'=>array());
                     $cont3 ++;
                  }
                   $cont2 ++;
                }
                $cont ++;
            }
            return $menu;
        }

        public function Save($p)
        {

            $this->getSelect("DELETE FROM permiso WHERE idperfil={$p['idperfil']}");

            try{
                        ORM::get_db()->beginTransaction();


                        for($i=0;$i<count($p['m']);$i++)
                        {
                            if($p['m']!="")
                            {
                                $permiso = ORM::for_table("permiso")->where("idperfil",$p['idperfil'])->where("idmodulo",$p['m'][$i]);
                                if($permiso!=false)
                                {
                                    $permiso = ORM::for_table("permiso")->create();
                                }

                                $permiso->idmodulo=$p['m'][$i];
                                $permiso->idperfil=$p['idperfil'];
                                $permiso->acceder=1;
                                $permiso->anadir=1;
                                $permiso->editar=1;
                                $permiso->eliminar=1;
                                $permiso->imprimir=1;
                                $permiso->save();
                            }
                        }
                        ORM::get_db()->commit();
                    return array('res'=>"1",'msg'=>'Sus Cambios fueron guardados Correctamente!');
                }
                catch(PDOException $e) {
                    return array('res'=>"2",'msg'=>'Error : '.$e->getMessage() . $str);
                }

        }
    }
    ?>