<?php
//session_start();
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Matrizi.php';


/*
 * 
 */
class MatriziController extends Controller  {
    //put your code here
    public function Index()
    {    

	    $view = new View();
        
        $view->setTemplate( '../view/Matrizi/_Index.php' );
        $view->setLayout( '../template/Layout.php');
        $view->render();
    }
    public function p()
    {
         $obj= new Matrizi;
	    $data=array();
	    $data['obj']=$obj->view_proposito();
        $view = new View();
		$view->setData($data);
        $view->setTemplate( '../view/Matrizi/_Form.php' );
        echo $view->renderPartial();
    } 
	public function ob()
    {
       $obj= new Matrizi;
	    $data=array();
	    $data['rows']=$obj->getSelect("SELECT * FROM objetivo");
        $view = new View();
		$view->setData($data);
        $view->setTemplate( '../view/Matrizi/_Formobj.php' );
        echo $view->renderPartial();
    }public function ma()
    {
        $obj = new Matrizi();
		  $data=array();
        $data['mod'] = $obj->getmatriz();
		$data['trimestres']=$obj->getSelect("SELECT * FROM tiempo");
	    $view = new View();
		$view->setData($data);
        //$view->setTemplate( '../view/matrizi/_matriz.php' );
        $view->setTemplate( '../view/Matrizi/_Matriz.php' );
        echo $view->renderPartial();
    }public function pru()
    {
        $obj = new Matrizi();
		  $data=array();
        $data['mod'] = $obj->getprueba();
	    $view = new View();
		$view->setData($data);
        //$view->setTemplate( '../view/matrizi/_matriz.php' );
        $view->setTemplate( '../view/Matrizi/P.php' );
        echo $view->renderPartial();
    }
	public function trimestre()
    {
        $obj = new Matrizi();
		$data=array();
      $data['objd'] = $obj->get_detalle($_GET['idd'],$_GET['id']);
      $data['objt'] = $obj->get_trimestre($_GET['idd']);
      $data['obji'] = $obj->get_indicador($_GET['id']);
      $data['suma'] = $obj->avance($_GET['idd'],$_GET['id']);
	    $view = new View();
		$view->setData($data);
        $view->setTemplate( '../view/Matrizi/_Trimestre.php' );
		$view->setLayout( '../template/list.php');
        $view->render();
       // echo $view->renderPartial();
    }
    public function save()
    {
		$obj = new Matrizi();
		print_r(json_encode($obj->save($_POST)));
	}
	public function save_trimestre()
    {
		$obj = new matrizi();
		print_r(json_encode($obj->save_trimestre($_POST)));
	}
	public function devolver_trimestre()
	{
	  $obj = new Matrizi();
	  $objd = $obj->get_detalle($_POST['idd'],$_POST['id']);
      $objt = $obj->get_trimestre($_POST['idd']);
      $obji = $obj->get_indicador($_POST['id']);
      $suma = $obj->avance($_POST['idd'],$_POST['id']);
	  $por_trimestre=0;
	  $porpryecto=0;
	  if($objd->meta!=0)
	  {
	    $por_trimestre=round(($objd->ejecutado/$objd->meta)*100,0);
	  }
	  if($obji->metas_periodo!=0)
        {
         $porpryecto=round(($suma->avance/$obji->metas_periodo)*100,0);
       }
	     $resp = array('por_trimestre'=>$por_trimestre,'porpryecto'=>$porpryecto,'avance'=>$suma->avance,'metas_periodo'=>$obji->metas_periodo);
	   print_r(json_encode($resp));
	  
	}
    public function report()
	{
	  $data=array();
	  $data['trimestre']=$this->Select(array('id'=>'tiempo_id','name'=>'tiempo_id','table'=>'tiempo','code'=>'0'));
	  $view = new View();
	  $view->setData($data);
	  $view->setTemplate( '../view/Matrizi/Reporte.php' );
	  $view->setLayout( '../template/Layout.php');
       $view->render();
	}
}
?>
