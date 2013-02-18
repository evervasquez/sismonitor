<?php
require_once 'Main.php';
class Sistema extends Main
{
   function index($query , $p ) {
        $sql = "select * from boletin  where titulo like :query";
        $param = array(array('key'=>':query' , 'value'=>"%$query%" , 'type'=>'STR' ));
        $data['total'] = $this->getTotal( $sql, $param );
        $data['rows'] =  $this->getRow($sql, $param , $p );
        $data['rowspag'] =  $this->getRowPag($data['total'], $p );
        return $data;
    }

    function menu()
    {
        $stmt = $this->db->prepare("select m.idmodulo,m.idpadre,m.descripcion,m.url from modulo m inner join permiso p on m.idmodulo=p.idmodulo where m.estado=1 and m.idpadre is null and p.idperfil=:p1 and p.acceder=1 order by m.orden DESC");
        $stmt->bindValue(':p1', $_SESSION['id_perfil'] , PDO::PARAM_INT);
        $stmt->execute();        
        $items = $stmt->fetchAll();
        $cont = 0; 
        $cont2 = 0;
        $cont3=0;
        foreach ($items as $valor)
        {
            $stmt = $this->db->prepare("select m.idmodulo,m.idpadre,m.descripcion,m.url from modulo m inner join permiso p on m.idmodulo=p.idmodulo where m.estado=1 and m.idpadre=".$valor['idmodulo']." and p.idperfil=:p1 and p.acceder=1 order by m.orden ASC");
            $stmt->bindValue(':p1', $_SESSION['id_perfil'] , PDO::PARAM_INT);
            $stmt->execute();
            $hijos = $stmt->fetchAll();
            $menu[$cont] = array(
            'texto' => $valor['descripcion'],
            'url' => $valor['url'],
            'enlaces' => array()
                );
            $cont2 = 0;
            foreach($hijos as $h)
            {
                    $stmt = $this->db->prepare("select m.idmodulo,m.idpadre,m.descripcion,m.url from modulo m inner join permiso p on m.idmodulo=p.idmodulo where m.estado=1 and m.idpadre=".$h['idmodulo']." and p.idperfil=:p1 and p.acceder=1 order by m.orden ASC");
                    $stmt->bindValue(':p1', $_SESSION['id_perfil'] , PDO::PARAM_INT);
                    $stmt->execute();
                    $hijos2 = $stmt->fetchAll();
                    $cont3 = 0;
                    foreach($hijos2 as $hi)
                    {
                    $menu2[$cont3] = array(
                    'idmodulo'=>$hi['idmodulo'],
                    'texto' => $hi['descripcion'],
                    'url' => $hi['url']);  
                    $cont3 ++;
                    }
                    if($cont3<=0)
                    {
                        $menu2=array();
                    }
                    $menu[$cont]['enlaces'][$cont2] = array('idmodulo'=>$h['idmodulo'],'texto' => $h['descripcion'],'url' => $h['url'],'enlaces' => $menu2);
                    $cont2 ++;
                    
            }
            $cont ++;
        }
        return $menu;
    }
}
?>