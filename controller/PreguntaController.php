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
require_once '../model/Pregunta.php';

class PreguntaController extends Controller {
    //put your code here
    public function index() {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Pregunta();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Pregunta&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Pregunta();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['idtipo_pregunta'] = $this->Select(array('id'=>'idtipo_pregunta','name'=>'idtipo_pregunta','table'=>'vtipo_pregunta','code'=>$obj->idtipo_pregunta));
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Pregunta();
        if ($_POST['idpregunta']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Pregunta');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Pregunta';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } else {
            $p = $obj->update($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Pregunta');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Pregunta';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Pregunta();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Pregunta');
        } else {
        $data = array();
        $view = new View();
        $data['msg'] = $p[1];
        $data['url'] =  'index.php?controller=Pregunta';
        $view->setData($data);
        $view->setTemplate( '../view/_Error_App.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
      
    }
    public function create() {        
        $data = array();
        $view = new View();
        $data['idtipo_pregunta'] = $this->Select(array('id'=>'idtipo_pregunta','name'=>'idtipo_pregunta','table'=>'vtipo_pregunta'));
        $view->setData($data);
        $view->setTemplate( '../view/Pregunta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new Pregunta();
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
}
?>
