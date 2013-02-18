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
require_once '../model/User.php';

class UserController extends Controller {
   
    function login() {
          
        $obj = new User();
        $_p = $obj->Start($_REQUEST);
        if ($_p['flag'] == 1) {
            $obj = $_p['obj'];
            $_SESSION['user'] = $obj->login;
            $_SESSION['name'] = $obj->nombres;
            $_SESSION['id_perfil'] = $obj->idperfil;
            $_SESSION['perfil'] = $obj->perfil;
            header('Location: index.php');           
        }
        else
        {
            header('Location: Login.php?error=1');           
        }
    }

    function logout(){
        session_destroy();
        header('Location: Login.php');
    }
    
    public function index() {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        $obj = new User();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=User&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/User/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() {
        $obj = new User();
        $data = array();
        $view = new View();
        
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   public function save()
   {
        $obj = new User();
        if ($_REQUEST['oper']=='0') {
            $p = $obj->insert($_REQUEST);
            if ($p[0]){
                header('Location: index.php?controller=User');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        } 
        if($_REQUEST['oper']=='1'){
            $p = $obj->update($_REQUEST);
            if ($p[0]){
                header('Location: index.php?controller=User');
            } else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
            }
        }
    }
    public function delete()
      {
        $obj = new User();
        $p = $obj->delete($_REQUEST);
        if ($p[0]){
            header('Location: index.php?controller=User');
        } 
        else {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=User';
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
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() {
        $obj = new User();
        $data = array();
        $view = new View();
        $obj = $obj->edit($_GET['id']);
        $data['obj'] = $obj;   
        $data['perfil'] = $this->Select(array('id'=>'idperfil','name'=>'idperfil','table'=>'perfil','code'=>$obj->idperfil));
        $view->setData($data);
        $view->setTemplate( '../view/User/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }

}
?>
