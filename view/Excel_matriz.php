<?php
header('Content-type: application/x-msexcel;');
header("Content-Disposition: attachment; filename=archivo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="expires" content="0" />
	</head>
<?php 
require_once '../model/matrizi.php';
$data=array();
$obj = new matrizi();
$data['obj']=$obj->getSelect("SELECT * FROM objetivo");
/*SELECT count(*)
FROM
matriz_indicador
where padre_id is not null and estado='1'
and objetivo_id='1'*/

?>
<body>
<table width="1250" border="1" style="border:1px solid #666;font-size:17px; margin-bottom:5px;background:#666;">
  <tr style="background:#c0d398;border-bottom:1px solid #666;">
    <th height="28" colspan="8" align="left">PROYECTO :"Escuelas activas en Ucayali y San Mart&iacute;n: metodolog&iacute;a para mejorar la calidad educativa en comunidades de desarrollo alternativo"</th>
  </tr>
  <tr style="background:#d8e4bc;border-bottom:1px solid #666;">
    <th height="29" colspan="8" align="left">DURACI&Oacute;N PROYECTO: Julio 2012 - Diciembre 2013</th>
  </tr>
  <tr style="background:#ebf1de;border-bottom:1px solid #666;">
    <th height="33" colspan="8" align="left"><?php echo $_GET['tiempo_id']." TRIMESTRE INFORMADO"?></th>
  </tr>
  <tr  style="background:#c4d79b;border-bottom:1px solid #666;">
    <th width="240" rowspan="2">COMPONENTES</th>
    <th width="478" rowspan="2">INDICADORES</th>
    <th height="25" colspan="6" align="center">AVANCE INDICADORES</th>
    
  </tr>
  <tr style="background:#c4d79b;border-bottom:1px solid #666;" >
    <th width="80" height="51">Meta Trimestre</th>
    <th width="80">Ejecutados</th>
    <th width="80">% Avance Trimestre</th>
    <th width="80">Meta Proyecto</th>
    <th width="80">Avance Proyecto</th>
    <th width="80"> % Proyecto</th>
  </tr>
  <tr>
   <th style="background:#ffffff ;">&nbsp;</th>
   <th colspan='7'style="background:#d8e4bc;" align="left" >INDICADORES DE RESULTADO</th>
  </tr>
  <?php foreach($data['obj'] as $key=>$val)
  { $i=1;
    $count=$obj->getSelect("SELECT count(*)  as cantidad FROM matriz_indicador where padre_id is not null and estado='1' and objetivo_id='".$val[0]."'");
	$sql=$obj->getSelect("SELECT * FROM matriz_indicador where padre_id is not null and estado='1' and objetivo_id='".$val[0]."'");
	  foreach($count as $cc)
	     {
	        $c=$cc[0]; 
	     }
  ?>
        <tr style="background:#ebf1de;border-bottom:1px solid #666;">
		      <td rowspan="<?php echo $c;?>"  style="background:#ebf1de;text-align:justify;" ><?php echo ($key+1)." ". $val[2];?></td>
			 <?php foreach($sql as $in){
			 
                    $suma=$obj->avance($_GET['tiempo_id'],$in[0]);
					$detalle=$obj->get_detalle($_GET['tiempo_id'],$in[0]);
					$porr=0;
					$meta=0;
					$avance=0;
					$ejecutado=0;
					$por=0;
					if(isset($suma->avance))
					{
					$avance=$suma->avance;
					}
                    if($in[7]!=0 || isset($suma->avance))
					 {
						  
				     $porr=round(($suma->avance/$in[7])*100,0);
					 }
					if(isset($detalle->id_detalle))
					{
					   $meta=$detalle->meta;
                       $ejecutado=$detalle->ejecutado;					  
						if($detalle->meta!=0)
							{
							   $por=round(($detalle->ejecutado/$detalle->meta)*100,0);
							}
					}
			 ?>
                <td style="background:#ffffff ;text-align:justify;"><?php echo $in[3]." ".$in[4];?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $meta;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $ejecutado;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $por;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $in[7];?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $avance;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $porr;?></td>			 			 
			 
	          	</tr>
        <?php } ?>  
	
  <?php $key++;}?>
  <!-- segunda parte de la matriz -->
   <tr>
   <th style="background:#ffffff ;">&nbsp;</th>
   <th colspan='7'style="background:#d8e4bc;" align="left" >INDICADORES DE PRODUCTO</th>
  </tr>
    <?php foreach($data['obj'] as $key=>$val)
  { $i=1;
    $count=$obj->getSelect("SELECT count(*)  as cantidad FROM matriz_indicador where padre_id is not null and estado='0' and objetivo_id='".$val[0]."'");
	$sql=$obj->getSelect("SELECT * FROM matriz_indicador where padre_id is not null and estado='0' and objetivo_id='".$val[0]."'");
	  foreach($count as $cc)
	     {
	        $c=$cc[0]; 
	     }
  ?>
        <tr style="background:#ebf1de;border-bottom:1px solid #666;">
		      <td rowspan="<?php echo $c;?>"  style="background:#ebf1de;text-align:justify;" ><?php echo ($key+1)." ". $val[2];?></td>
			 <?php foreach($sql as $in){
			 
                    $suma=$obj->avance($_GET['tiempo_id'],$in[0]);
					$detalle=$obj->get_detalle($_GET['tiempo_id'],$in[0]);
					$porr=0;
					$meta=0;
					$avance=0;
					$ejecutado=0;
					$por=0;
					if(isset($suma->avance))
					{
					$avance=$suma->avance;
					}
                    if($in[7]!=0 || isset($suma->avance))
					 {
						  
				     $porr=round(($suma->avance/$in[7])*100,0);
					 }
					if(isset($detalle->id_detalle))
					{
					   $meta=$detalle->meta;
                       $ejecutado=$detalle->ejecutado;					  
						if($detalle->meta!=0)
							{
							   $por=round(($detalle->ejecutado/$detalle->meta)*100,0);
							}
					}
			 ?>
                <td style="background:#ffffff ;text-align:justify;"><?php echo $in[3]." ".$in[4];?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $meta;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $ejecutado;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $por;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $in[7];?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $avance;?></td>			 			 
                <td style="background:#ffffff ;" align="center"><?php echo $porr;?></td>			 			 
			 
	          	</tr>
        <?php } ?>  
	
  <?php $key++;}?>
  <!-- end -->
</table>
<body>
</html>