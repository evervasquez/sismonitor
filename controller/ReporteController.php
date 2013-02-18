<?php
require_once '../lib/Controller.php';
require_once '../lib/View.php';
require_once '../model/Ubigeo.php';
require_once '../model/Modulo.php';
require_once '../model/Reporte.php';
require_once '../lib/helper.php';

class ReporteController extends Controller {
    //put your code here
    public function show() {
        if (isset($_GET['id'])){
        $modu= new Modulo();
        $report= new Reporte();
        $hijo=$modu->edit($_GET['id']);
        $padre=$modu->edit($hijo->idpadre);
        $param= array();
        $param['id']=$_GET['id'];
        $data = array();
        $op= array();
        $op[0][0]="Consulta1";
        $op[0][1]="Consulta I";
        $op[1][0]="consulta2";
        $op[1][1]="Consulta II";
        $op[2][0]="consulta3";
        $op[2][1]="Consulta III";
        $data['subtitulo']= $hijo->descripcion;
        $data['titulo']= $padre->descripcion;
        
        $data['opciones']=cmbGetVal($op,"",false);
        $data['id_']=$_GET['id'];
        $view = new View();
        $view->setData($data);
        $view->setTemplate( '../view/Reporte/_Index.php' );
        $view->setLayout( '../template/Layout.php' );
        $view->render();
        }
        else
        {
            header("Location:index.php");
        }
    }
    
   function get_report()
   {
        if (!isset($_REQUEST['p'])){$_REQUEST['p']=1;}  
        $reporte= new Reporte();
        $lista =$reporte->index($_REQUEST['q'], $_REQUEST['p'],$_REQUEST['opcion']);
        $rows=($lista['rows']);
        $lista['rows']=  clrNrow($rows);
        $lista['columns']=getCol($lista['rows'][0]);
        //unset($lista['rows'][0]);
        $lista['nrows']=count($lista['rowspag']);
        $lista['actions']=$actions;
        echo json_encode(($lista));
   }
   
   function get_report_draw()
   {
        if (!isset($_REQUEST['p'])){$_REQUEST['p']=1;}
        $reporte= new Reporte();
        $lista =$reporte->index($_REQUEST['q'], $_REQUEST['p'],$_REQUEST['opcion']);
        $rows=($lista['rows']);
        $lista['rows']=  clrNrow($rows);
        $lista['columns']=getCol($lista['rows'][0]);
        $nrows=count($lista['columns']);
        unset($lista['columns'][($nrows-1)]);
        $lista['rows']= clrRow($rows);
        unset($lista['columns'][0]);
       $lista['columns']= array_values($lista['columns']);
        $lista['nrows']=count($lista['rowspag']);
        $columnas=array();

        for($i=0;$i<count( $lista['rows']);$i++)
        {
            $name_= $lista['rows'][$i][0];
            $data_colum=array();

            for($j=1;$j<=(count($lista['columns']));$j++)
            {
                $data_colum[]=(int)$lista['rows'][$i][$j];
            }
            $columnas[$i]= array('name'=>$name_,'data'=>$data_colum);
        }
        $lista['columnas'] =  $columnas;
        $lista['actions']= $actions;
        echo json_encode(($lista));
   }




    function get_qry_excel()
    {
        $reporte= new Reporte();
        $lista=array();
        $rows=$reporte->queryRows($_REQUEST['q'] );
        $lista['rows']=  clrRow($rows);
        $rows=clrNrow( $rows );
        $lista['columns']=getCol($rows[0]);
        set_time_limit(10);
        require_once "../lib/php/class.writeexcel_workbook.inc.php";
        require_once "../lib/php/class.writeexcel_worksheet.inc.php";
        $fname = tempnam("/tmp", "reporte.xls");
        $workbook =& new writeexcel_workbook($fname);
        $worksheet =& $workbook->addworksheet('reporte');

        $num_ =& $workbook->addformat(array('num_format' => '0'));
        $text_ =& $workbook->addformat(array(
            'bold'    => 10,
            'color'   => 'black',
            'size'    => 10,
            'fg_color'=>26,
            'border'=>1

        ));

        $head_ =& $workbook->addformat(array(
            'bold'    => 10,
            'color'   => 'black',
            'size'    => 11,
            'fg_color'=> 47
        ));
        $head_->set_align('center');
        $head_->set_align('top');
        $head_ ->set_align('vjustify');
        $text_ ->set_align('vjustify');

        $worksheet->set_column(1 , 1,40);
        $worksheet->set_column(2 , (count($lista['rows'][0])-1), 40);

        for($i=0;$i<=count($lista['rows']);$i++)
        {
            for($j=0;$j<count($lista['rows'][$i]);$j++)
            {


                if($i==0)
                {
                    $worksheet->write(1,$j+1,(  $lista['columns'][$j]),$head_);
                }
                else
                {

                       $worksheet->write($i+1,$j+1,utf8_decode($lista['rows'][$i-1][$j]),$text_);

                }
            }

        }

        $workbook->close();

        header("Content-Type: application/x-msexcel; name=\"reporte.xls\"");
        header("Content-Disposition: inline; filename=\"reporte.xls\"");
        $fh=fopen($fname, "rb");
        fpassthru($fh);
        unlink($fname);
    }
    function get_report_excel()
    {
        if (!isset($_REQUEST['p'])){$_REQUEST['p']=1;}
        $reporte= new Reporte();
        $lista =$reporte->index($_REQUEST['q'], $_REQUEST['p'],$_REQUEST['opcion']);
        $rows=($lista['rows']);
        $rows_=$rows;

        $lista['rows']=  clrNrow($rows);
        $lista['columns']=getCol($lista['rows'][0]);
        //unset($lista['rows'][0]);
        $lista['nrows']=count($lista['rowspag']);



        $lista['actions']=$actions;

        set_time_limit(10);

        require_once "../lib/php/class.writeexcel_workbook.inc.php";
        require_once "../lib/php/class.writeexcel_worksheet.inc.php";

        $fname = tempnam("/tmp", "reporte.xls");
        $workbook =& new writeexcel_workbook($fname);
        $worksheet =& $workbook->addworksheet('reporte');

        $num_ =& $workbook->addformat(array(num_format => '0.00'));
        $text_ =& $workbook->addformat(array(
            bold    => 10,
            color   => 'black',
            size    => 10,
            fg_color=>26,
            border=>1

        ));

        $head_ =& $workbook->addformat(array(
            bold    => 10,
            color   => 'black',
            size    => 11,
            fg_color=> 47
        ));
        $head_->set_align('center');
        $head_->set_align('top');
        $head_ ->set_align('vjustify');
        $text_ ->set_align('vjustify');

        $worksheet->set_column(1 , 1, 25);
        $worksheet->set_column(2 , (count($lista['columns'])-1), 12);
        for($i=0;$i<count($lista['rows']);$i++)
        {
            for($j=0;$j<count($lista['columns']);$j++)
            {
                if($j>0)
                {
                    $worksheet->write($i+1,$j+1,$rows_[$i][$j],$num_);
                }
                else
                {

                    $worksheet->write($i+1,$j+1,utf8_decode($rows_[$i][$j]),$text_);
                }


                if($i==0)
                {
                    $worksheet->write(0,$j+1,utf8_decode($lista['columns'][$j]),$head_);
                }
            }

        }

        $workbook->close();

        header("Content-Type: application/x-msexcel; name=\"reporte.xls\"");
        header("Content-Disposition: inline; filename=\"reporte.xls\"");
        $fh=fopen($fname, "rb");
        fpassthru($fh);
        unlink($fname);





    }
    public function exportar()
    {
         $obj= new Reporte();
         $obj->get_($_REQUEST['id']);
         $view= new View();
         $view->setVal("consulta",$obj->Me->consulta);
         $view->setVal("titulo",$obj->Me->descripcion);
         $view->setVal("id",$obj->Me->idmodulo);
         $view->setAllAndRender("Reporte.consulta","Layout");

    }
    public function save()
    {
        $obj=new Modulo();
        $obj->get_($_REQUEST['id']);
        $obj->Me->consulta=$_REQUEST['q'];
        $obj->Me->save();
    }
}
?>