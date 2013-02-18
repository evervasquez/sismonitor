<?php

require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../lib/Helper.php';
require_once '../model/Matriz.php';

class MatrizController extends Controller {
    //put your code here
    public function index() {
        $matriz=new Matriz();
        
        $data=array();
        $data['sub_sistemas']=$matriz->list_subsistemas();
        $data['titulo']="Mantrices";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
   public function show_matriz() {
        $matriz=new Matriz();
        $data=array();
        $id_=$_REQUEST['id'];
        $data['matriz']= ($this->bld_var_($matriz->bld_matriz($id_)));
        
        $data['titulo']="Mantrices";
        $data['niveles']=$matriz->list_niveles();
                
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_show.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
    
     public function listar() {
        $matriz=new Matriz();
        
        $data=array();
        $data['sub_sistemas']=$matriz->list_subsistemas();
        $data['titulo']="Mantrices";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
       public function show_variables() {
        $matriz=new Matriz();
        $id_=$_REQUEST['id'];
        $data=array();
        $data['variables']=$matriz->get_variables($id_);
        $data['titulo']="Variables";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
       public function show_componentes() {
        $matriz=new Matriz();
        $id_=$_REQUEST['id'];
        $data=array();
        $data['componentes']=$matriz->get_componentes($id_);
        $data['titulo']="Componentes";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
        public function show_indicadores() {
        $matriz=new Matriz();
        $id_=$_REQUEST['id'];
        $data=array();
        $data['indicadores']=$matriz->get_indicadores($id_);
        $data['titulo']="Indicadores";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
       public function show_niveles() {
        $matriz=new Matriz();
        $id_=$_REQUEST['id'];
        $data=array();
        $data['niveles']=$matriz->get_niveles($id_);
        $data['titulo']="Niveles";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/matriz_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	// modificar
	public function editar_subsistemas() 
	{
        $obj = new Matriz();
        $data = array();
        $view = new View();
        $data['obj'] = $obj->editar_subsistemas($_GET['id']);
		$data['titulo']="Sub sistema";
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_edit.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	public function editar_variable() 
	{
        $obj = new Matriz();
        $data = array();
        $obj  = $obj->editar_variable($_GET['id']);
		$data['obj'] = $obj;
		$data['sub_id'] = $this->Select(array('id'=>'sub_id','name'=>'sub_id','table'=>'vsub_sistema','code'=>$obj->sub_id));
		$data['titulo']="Variable";
		$view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_edit_v.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }	
	public function editar_componente() 
	{
        $obj = new Matriz();
        $data = array();
        $obj  = $obj->editar_componente($_GET['id']);
		$data['obj'] = $obj;
		$data['var_id'] = $this->Select(array('id'=>'var_id','name'=>'var_id','table'=>'vvariable','code'=>$obj->var_id));
		$data['titulo']="componente";
		$view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_edit_c.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	public function editar_indicador() 
	{
        $obj = new Matriz();
        $data = array();
        $obj  = $obj->editar_indicador($_GET['id']);
		$data['obj'] = $obj;
		$data['comp_id'] = $this->Select(array('id'=>'comp_id','name'=>'comp_id','table'=>'vcomponente','code'=>$obj->comp_id));
		$data['titulo']="Indicador";
		$view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_edit_i.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	public function editar_niveles() 
	{
        $obj = new Matriz();
        $data = array();
        $obj  = $obj->editar_niveles($_GET['id']);
		$data['obj'] = $obj;
		$data['nivl_id'] = $this->Select(array('id'=>'nivl_id','name'=>'nivl_id','table'=>'vnivel','code'=>$obj->nivl_id));
		$data['titulo']="nivel";
		$view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_edit_n.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }
	
	public function save()
	{
        $obj = new Matriz();
        $p = $obj->modificar($_POST);
		if ($p[0])
		{
			header('Location: index.php?controller=Matriz&action=listar');
		} 
		else 
		{
			$data = array();
			$view = new View();
			$data['msg'] = $p[1];
			$data['url'] =  'index.php?controller=Matriz&action=listar';
			$view->setData($data);
			$view->setTemplate( '../view/_Error_App.php' );
			$view->setLayout( '../template/Layout.php' );
			$view->render();
		}
	}
	
    public function  edit_nivel(){
        $matriz=new Matriz();
        $id_=$_REQUEST['id'];
        $data=array();
        $data['nivel']=$matriz->get_nivel($id_);
        $data['titulo']="Niveles";
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Matriz/frm_nivel.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
    }



    function bld_var_($rows)
{
     $rw="<tr>";
     $rw.="<td rowspan='".$rows['rowspan']."' >".$rows['row'][1]."</td>";
     for ($i_1 = 0; $i_1 < $rows['nrows']; $i_1++) {
         if($i_1==0)
         {
             $rw.="<td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['var_numero']." ".$rows['children'][$i_1]['row']['var_descripcion']."</td>";
         }
         else
         {
              $rw.="<tr><td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['var_numero']." ".$rows['children'][$i_1]['row']['var_descripcion']."</td>";
         }
         $actual=$rows['children'][$i_1];
         $rw.=$this->bld_comp_($actual);
     }
      return $rw;
}
 function bld_comp_($rows)
{
     $rw="";
     for ($i_1 = 0; $i_1 < $rows['nrows']; $i_1++) {
         if($i_1==0)
         {
             $rw.="<td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['comp_numero']." ".$rows['children'][$i_1]['row']['comp_descripcion']."</td>";
         }
         else
         {
              $rw.="<tr><td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['comp_numero']." ".$rows['children'][$i_1]['row']['comp_descripcion']."</td>";
         }
         $actual=$rows['children'][$i_1];
            $rw.=$this->bld_ind_($actual);
     }
      return $rw;
}
 function bld_ind_($rows)
{
     $rw="";
     for ($i_1 = 0; $i_1 < $rows['nrows']; $i_1++) {
         if($i_1==0)
         {
             $rw.="<td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['ind_numero']." ".$rows['children'][$i_1]['row']['ind_descripcion']."</td>";
         }
         else
         {
              $rw.="<tr><td rowspan='{$rows['children'][$i_1]['rowspan']}'>".$rows['children'][$i_1]['row']['ind_numero']." ".$rows['children'][$i_1]['row']['ind_descripcion']."</td>";
         }
         $actual=$rows['children'][$i_1];
         $rw.=$this->bld_niv_($actual);
     }
     return $rw;
}
function bld_niv_($rows)
{
    $rw="";
    for ($i = 0; $i < count($rows['niveles']); $i++) {
        $rw.="<td>".$rows['niveles'][$i]['niv_descripcion']."</td>";
    }
    $rw.="</tr>";
    return $rw;
}

}
?>