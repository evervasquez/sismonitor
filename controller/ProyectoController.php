<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author TheRainMaker
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Proyecto.php';

class ProyectoController extends Controller 
{
    public function index() 
	{
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Proyecto();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Proyecto&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Proyecto/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Proyecto();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Proyecto();
        if ($_POST['proyecto_id']=='')
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Proyecto');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Proyecto';
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
                header('Location: index.php?controller=Proyecto');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Proyecto';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Proyecto();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Proyecto');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Proyecto';
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
        $view->setData($data);
        $view->setTemplate( '../view/Proyecto/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() 
    {
        $obj = new Proyecto();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte','code'=>$obj->idparte,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Proyecto/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
	public function mostrar_proyecto()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Proyecto();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Proyecto&action=mostrar_proyecto','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Proyecto/_lista_proyecto.php');
        $view->setLayout('../template/list.php');
        $view->render();

    }
}
?>
