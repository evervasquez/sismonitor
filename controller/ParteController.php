<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TestController
 *
 * @author sophie
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Parte.php';

class ParteController extends Controller {
    //put your code here
    public function index() {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Parte();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Parte&action=index','query'=>$_GET['q']));        
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Parte/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Parte();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idencuesta'] = $this->Select(array('id'=>'idencuesta','name'=>'idencuesta','table'=>'encuesta','code'=>$obj->idencuesta));
        $view->setData($data);
        $view->setTemplate( '../view/Parte/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Parte();
        if ($_POST['idparte']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Parte');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=TipoPregunta';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Parte');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=TipoPregunta';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Parte();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Parte');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=TipoPregunta';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
      
    }
    public function create() {        
        $data = array();
        $view = new View();
        $data['idencuesta'] = $this->Select(array('id'=>'idencuesta','name'=>'idencuesta','table'=>'encuesta'));
        $view->setData($data);
        $view->setTemplate( '../view/Parte/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new Parte();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idencuesta'] = $this->Select(array('id'=>'idencuesta','name'=>'idencuesta','table'=>'encuesta','code'=>$obj->idencuesta,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/Parte/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
}
?>
