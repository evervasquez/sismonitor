<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EscuelaController
 *
 * @author TheRainMaker
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Escuela.php';

class EscuelaController extends Controller 
{
    public function index() 
    {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Escuela();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Escuela&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Escuela/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() 
    {
        $obj = new Escuela();
        $data = array();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipo_escuela_id'] = $this->Select(array('id'=>'tipo_escuela_id','name'=>'tipo_escuela_id','table'=>'vtipo_escuela','code'=>$obj->tipo_escuela_id));
		$data['departamento'] = $this->Select(array('id'=>'departamento','name'=>'departamento','table'=>'v_departamento','code'=>substr($obj->id_ibugeo, 0,2)."0000"));
		$data['categoria_id'] = $this->Select(array('id'=>'categoria_id','name'=>'categoria_id','table'=>'v_categoria','code'=>$obj->categoria_escuela_id));
		$data['provincia'] = $this->Select(array('id'=>'provincia','name'=>'provincia','table'=>'v_provincia','code'=>substr($obj->id_ibugeo,0,4)."00"));
		$data['distrito'] = $this->Select(array('id'=>'distrito','name'=>'distrito','table'=>'v_distrito','code'=>$obj->id_ibugeo));
        $view = new View();
		$view->setData($data);
        $view->setTemplate( '../view/Escuela/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }

    public function save(){
        $obj = new Escuela();
        if ($_POST['escuela_id']=='')
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Escuela');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Escuela';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        } 
        else 
        {
            $p = $obj->update($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Escuela');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Escuela';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete()
    {
        $obj = new Escuela();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Escuela');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Escuela';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
        }
      
    }
    public function create() 
    {        
        $data = array();
        $view = new View();
        $data['tipo_escuela_id'] = $this->Select(array('id'=>'tipo_escuela_id','name'=>'tipo_escuela_id','table'=>'vtipo_escuela'));
		$data['departamento'] = $this->Select(array('id'=>'departamento','name'=>'departamento','table'=>'v_departamento','code'=>'0'));
		$data['categoria_id'] = $this->Select(array('id'=>'categoria_id','name'=>'categoria_id','table'=>'v_categoria','code'=>'0'));
        $view->setData($data);
        $view->setTemplate( '../view/Escuela/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() 
    {
        $obj = new Escuela();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte','code'=>$obj->idparte,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Escuela/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function mostrar_escuela()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Escuela();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Prueba&action=mostrar_escuela','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Escuela/_lista_escuela.php');
        $view->setLayout('../template/list.php');
        $view->render();
    }
	
	public function _provincia()
	{
		echo $this->Select_ajax(array('id'=>'provincia','name'=>'provincia','table'=>'v_provincia','query'=>$_GET['cod']));
	}
	
	public function _distrito()
	{
		echo $this->Select_ajax2(array('id'=>'distrito','name'=>'distrito','table'=>'v_distrito','query'=>$_GET['cod']));
	}
	
	public function Select_ajax($p)
    {
        $obj = new Escuela();
        $obj->table =  $p['table'];
        $data = array();
        $data['rows'] = $obj->getList_ajax($p['query']);
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
		$view = new View();
        $view->setData( $data );
        $view->setTemplate( '../view/_Select_ajax.php' );
        return $view->renderPartial();
    }
	
	public function Select_ajax2($p)
    {
        $obj = new Escuela();
        $obj->table =  $p['table'];
        $data = array();
        $data['rows'] = $obj->getList_ajax2($p['query']);
        $data['name'] = $p['name'];
        $data['id'] = $p['id'];
        $data['code'] = $p['code'];
		$view = new View();
        $view->setData( $data );
        $view->setTemplate( '../view/_Select_ajax.php' );
        return $view->renderPartial();
    }
}
?>