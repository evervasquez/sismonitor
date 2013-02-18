<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PruebaController
 *
 * @author TheRainMaker
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Prueba.php';

class PruebaController extends Controller 
{
    public function index() 
	{
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Prueba();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Prueba&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Prueba/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() 
    {
        $obj = new Prueba();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['area_id'] = $this->Select(array('id'=>'area_id','name'=>'area_id','table'=>'varea','code'=>$obj->area_id));
        $view->setData($data);
        $view->setTemplate( '../view/Prueba/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Prueba();
        if ($_POST['prueba_id']=='')
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Prueba');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Prueba';
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
                header('Location: index.php?controller=Prueba');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Prueba';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Prueba();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Prueba');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Prueba';
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
        $data['area_id'] = $this->Select(array('id'=>'area_id','name'=>'area_id','table'=>'varea'));
       // $data['tipopreg_id'] = $this->Select(array('id'=>'tipopreg_id','name'=>'tipopreg_id','table'=>'vtipopreg'));
        $view->setData($data);
        $view->setTemplate( '../view/Prueba/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function show()
    {
        $obj = new Prueba();
        $data = array();
        $view = new View();
        $data['rows']=$obj->_verprueba($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Prueba/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function mostrar_p()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Prueba();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=prueba&action=mostrar_p','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Prueba/_lista_prueba.php');
        $view->setLayout('../template/list.php');
        $view->render();
        

    }
}
?>
