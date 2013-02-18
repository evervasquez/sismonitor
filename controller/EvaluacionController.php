<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Evaluacion Controller
 *
 * @author TheRainMaker
 */
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Evaluacion.php';

class EvaluacionController extends Controller 
{
    public function index() 
    {
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Evaluacion();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Evaluacion&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Evaluacion/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function edit() 
    {
        $obj = new Evaluacion();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Evaluacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
    public function save()
    {
        $obj = new Evaluacion();
        if ($_POST['evaluacion_id']=='')
        {
            $p = $obj->insert($_POST);
            if ($p[0])
            {
                header('Location: index.php?controller=Evaluacion');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Evaluacion';
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
                header('Location: index.php?controller=Evaluacion');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Evaluacion';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete()
    {
        $obj = new Evaluacion();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Evaluacion');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Evaluacion';
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
        $view->setTemplate( '../view/Evaluacion/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show()
    {
        $obj = new Evaluacion();
        $data = array();
        $view = new View();
        $data['rows']=$obj->show($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Evaluacion/_Show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    public function mostrar_prueba()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Evaluacion();
        $data = array();
        $data['data'] = $obj->mostrar_prueba($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Pregunta_p&action=mostrar_p','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Evaluacion/_lista_prueba.php');
        $view->setLayout('../template/list.php');
        $view->render();

    }
    
    public function mostrar_estudiante()
    {
        if (!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Evaluacion();
        $data = array();
        $data['data'] = $obj->mostrar_estudiante($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Evaluacion&action=mostrar_estudiante','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Evaluacion/_lista_estudiante.php');
        $view->setLayout('../template/list.php');
        $view->render();

    }
    
	public function get_pregunta()
    {
        $obj = new Evaluacion();
        $data = array();
        $data['rows'] = $obj->get_pregunta($_POST['id']);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Evaluacion/_preguntas.php');
       // $view->setLayout('../template/list.php');
       echo $view->renderPartial();
    }
	
    public function get_pregunta_m()
    {
        $obj = new Evaluacion();
        $data = array();
        $data['rows'] = $obj->get_pregunta_m($_POST['id']);
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Evaluacion/_preguntas.php');
		// $view->setLayout('../template/list.php');
		echo $view->renderPartial();
    }
	
}
?>