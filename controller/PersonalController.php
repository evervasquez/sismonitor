<?php


require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Personal.php';
require_once '../model/Ubigeo.php';
class PersonalController extends Controller 
{
    public function index() 
	{
        if (!isset ($_GET['p'])){$_GET['p']=1;}
        $obj = new Personal();
        $data = array();
        $data['data'] = $obj->index($_GET['q'],$_GET['p']);
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Personal&action=index','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Personal/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
    
    public function edit() {
        $obj = new Personal();
        $ubi= new Ubigeo();
        $data = array();
        $view = new View();
        $data['personal'] = $obj->edit($_REQUEST['id']);
       
        $estado_civil=array(array(1,"Soltero(a)"),
                array(2,"Casado(a)"),
                array(3,"Conviviente"),
                array(4,"Divorciado(a)"),
                array(5,"Viudo(a)"));
        $sexo=array(array('2',"M"),
                array('1',"F"));
        $es_director=array(array('0',"NO"),
                array('1',"SI"));
        $condicion_laboral=array(array(1,"Nombrado"),
                array(2,"Contratado"),
                array(3 ,"Destacado"),
                array(4 ,"Reasignado"),
                array(5,"Reubicado"));     
        $data['institucion']=$obj->getSelect("SELECT inst_nombre FROM institucion WHERE inst_id=".$data['personal'][0]['inst_id']."");
        $data['lugar'] =$ubi->getAll($data['personal'][0]['pers_lugar_nac']);
        $data['regiones']= cmbGetVal( $ubi->getList_departamentos(), "", false);
        $opt_esta=  cmbGetVal($estado_civil, $data['personal'][0]['pers_estado_civil'], true);
        $opt_sexo=  cmbGetVal($sexo, $data['personal'][0]['pers_sexo'], true);
        $opt_laboral=  cmbGetVal($condicion_laboral, $data['personal'][0]['pers_condicion_lab'], true);
        $data['personal'][0]['pers_fecha_nac']= redate_($data['personal'][0]['pers_fecha_nac']);
        $data['estado_civil']=$opt_esta;
        $data['condicion_laboral']=$opt_laboral;
        $data['sexo']=$opt_sexo;
        $data['pers_es_director']=cmbGetVal($es_director, $data['personal'][0]['pers_es_director'], true);
        $view->setData($data);
        $view->setTemplate( '../view/Personal/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function save(){
        $obj = new Personal();
        if ($_POST['pers_id']=='')
        {
            $p = $obj->insert($_REQUEST);
            if ($p[0])
            {
                header('Location: index.php?controller=Personal');
            }
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Personal';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        } 
        else 
        {
            $p = $obj->update($_REQUEST);
            if ($p[0])
            {
                header('Location: index.php?controller=Personal');
            } 
            else 
            {
                $data = array();
                $view = new View();
                $data['msg'] = $p[1];
                $data['url'] =  'index.php?controller=Personal';
                $view->setData($data);
                $view->setTemplate( '../view/_Error_App.php' );
                $view->setLayout( '../template/Layout.php' );
                $view->render();
            }
        }
    }
    public function delete(){
        $obj = new Personal();
        $p = $obj->delete($_GET['id']);
        if ($p[0])
        {
            header('Location: index.php?controller=Personal');
        } 
        else 
        {
            $data = array();
            $view = new View();
            $data['msg'] = $p[1];
            $data['url'] =  'index.php?controller=Personal';
            $view->setData($data);
            $view->setTemplate( '../view/_Error_App.php' );
            $view->setLayout( '../template/Layout.php' );
            $view->render();
        }
      
    }
    public function create() 
	{        
        $data = array();
        $ubi= new Ubigeo();
        $view = new View();
         $estado_civil=array(array(1,"Soltero(a)"),
                array(2,"Casado(a)"),
                array(3 ,"Conviviente"),
                array(4 ,"Divorciado(a)"),
                array(5,"Viudo(a)"));
        $sexo=array(array('M',"M"),
                array('F',"F"));
        $es_director=array(array('0',"NO"),
                array('1',"SI"));
        $condicion_laboral=array(array(1,"Nombrado"),
                array(2,"Contratado"),
                array(3 ,"Destacado"),
                array(4 ,"Reasignado"),
                array(5,"Reubicado"));     
       $data['regiones']= cmbGetVal( $ubi->getList_departamentos(), "", false);
        
        $opt_esta=  cmbGetVal($estado_civil, $data['personal'][0]['pers_estado_civil'], true);
        $opt_sexo=  cmbGetVal($sexo, $data['personal'][0]['pers_sexo'], true);
        $opt_laboral=  cmbGetVal($condicion_laboral, $data['personal'][0]['pers_condicion_lab'], true);
        
        $data['pers_es_director']=cmbGetVal($es_director, $data['personal'][0]['pers_es_director'], true);
        $data['estado_civil']=$opt_esta;
        $data['condicion_laboral']=$opt_laboral;
        $data['sexo']=$opt_sexo;
        $view->setData($data);
        $view->setTemplate( '../view/Personal/_Form.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    public function show() 
    {
        $obj = new Personal();
        $data = array();
        $view = new View(); 
        $data['personal'] = $obj->edit($_GET['id']);
        $view->setData($data);
        $view->setTemplate( '../view/Personal/_Show.php' );
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
        $data['pag'] = $this->Pagination(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Personal&action=mostrar_personal','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Personal/_lista_personal.php');
        $view->setLayout('../template/list.php');
        $view->render();
    }
    
    public function mostrar_personal_enca(){
        if(!isset($_GET['p'])){$_GET['p']=1;}
        if(!isset($_GET['q'])){$_GET['q']="";}
        if(!isset($_GET['order'])){$_GET['order']="";}
        $obj = new Personal();
        $data = array();
        $data['data'] = $obj->index_p($_GET['q'],$_GET['p']);
        $data['rows']=$data['data']['rows'];
        $data['query'] = $_GET['q'];
        $data['pag'] = $this->Pagination_1(array('rows'=>$data['data']['rowspag'],'url'=>'index.php?controller=Personal&action=mostrar_personal_enca','query'=>$_GET['q']));
        $view = new View();
        $view->setData($data);
        $view->setTemplate('../view/Personal/_listar_enca.php');
        $view->setLayout('../template/list_2.php');
        $view->render();
    }
}
?>
