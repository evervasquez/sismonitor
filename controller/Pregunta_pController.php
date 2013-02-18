<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of preguntaController
 *
 * @author TheRainMaker
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Pregunta_p.php';

class Pregunta_pController extends Controller 
{
    public function index() 
    {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Pregunta_p();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Pregunta_p&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta_p/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() 
    {
        $obj = new Pregunta_p();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['tipopreg_id'] = $this->Select(array('id'=>'tipopreg_id','name'=>'tipopreg_id','table'=>'vtipopreg','code'=>$obj->tipopreg_id));
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta_p/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Pregunta_p();
        if ($_POST['pregunta_id']=='') 
        {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Pregunta_p');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Pregunta_p';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Pregunta_p');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Pregunta_p';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Pregunta_p();
        $p = $obj->delete($_GET['id']);
        if ($p[0]){
            header('Location: index.php?controller=Pregunta_p');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Pregunta_p';
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
        $data['tipopreg_id'] = $this->Select(array('id'=>'tipopreg_id','name'=>'tipopreg_id','table'=>'vtipopreg'));
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta_p/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new Pregunta_p();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idtipo_pregunta'] = $this->Select(array('id'=>'idtipo_pregunta','name'=>'idtipo_pregunta','table'=>'vtipo_pregunta','code'=>$obj->idtipo_pregunta,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function mostrar_p()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Pregunta_p();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Pregunta_p&action=mostrar_p','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/pregunta_p/_lista_pregunta.php');
        $view->setLayout('../template/list.php');
        $view->render();

    }
    
}
?>
