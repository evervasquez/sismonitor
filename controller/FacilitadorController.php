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
require_once '../model/Facilitador.php';

class FacilitadorController extends Controller 
{
    public function index() 
	{
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Facilitador();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Facilitador&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Facilitador/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Facilitador();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Facilitador/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Facilitador();
        if ($_POST['facilitador_id']=='')
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Facilitador');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Facilitador';
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
                header('Location: index.php?controller=Facilitador');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Facilitador';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Facilitador();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Facilitador');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Facilitador';
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
        $view->setTemplate( '../view/Facilitador/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() 
    {
        $obj = new Facilitador();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte','code'=>$obj->idparte,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Facilitador/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
	public function mostrar_facilitador()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Facilitador();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Facilitador&action=mostrar_facilitador','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Facilitador/_lista_facilitador.php');
        $view->setLayout('../template/list.php');
        $view->render();
    }
}
?>
