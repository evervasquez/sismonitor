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
require_once '../model/Encuesta.php';

class EncuestaController extends Controller {
    //put your code here
    public function index() {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Encuesta();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Encuesta&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Encuesta/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new Encuesta();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Encuesta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Encuesta();
        if ($_POST['idencuesta']=='') {
            $p = $obj->insert($_POST);
            if ($p[0]){
                header('Location: index.php?controller=Encuesta');
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
                header('Location: index.php?controller=Encuesta');
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
        $obj = new Encuesta();
        $p = $obj->delete($_POST);
        if ($p[0]){
            header('Location: index.php?controller=Encuesta');
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
        $view->setTemplate( '../view/Encuesta/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new Encuesta();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Encuesta/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
}
?>
