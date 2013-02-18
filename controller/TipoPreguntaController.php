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
require_once '../model/TipoPregunta.php';

class TipoPreguntaController extends Controller {
    //put your code here
    public function index() {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new TipoPregunta();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=TipoPregunta&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/TipoPregunta/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new TipoPregunta();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte','code'=>$obj->idparte));
        $view->setData($data);
        $view->setTemplate( '../view/TipoPregunta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new TipoPregunta();
        if ($_POST['idtipo_pregunta']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=TipoPregunta');
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
                header('Location: index.php?controller=TipoPregunta');
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
        $obj = new TipoPregunta();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=TipoPregunta');
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
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte'));
        $view->setData($data);
        $view->setTemplate( '../view/TipoPregunta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new TipoPregunta();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idparte'] = $this->Select(array('id'=>'idparte','name'=>'idparte','table'=>'vparte','code'=>$obj->idparte,'disabled'=>'disabled'));
        $view->setData($data);
        $view->setTemplate( '../view/TipoPregunta/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
}
?>
