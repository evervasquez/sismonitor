<?php
function cmbGetVal($qry,$SelOp,$isSel)
{
	$opc="";
	$rst_=$qry;
	for($i=0;$i<count($rst_);$i++)
	{   
		if($isSel==true){
			if($rst_[$i][0]==$SelOp){$slc="selected";}else{$slc="";}
		} 
		$opc=$opc."<option value='".$rst_[$i][0]."'   ". $slc." >".$rst_[$i][1]."</option>";
	}
	return $opc;
}

function clrRow($data)
{
    $list= array();
    for($i=0;$i<count($data);$i++)
    {
        $rw= array();
        
        for($j=0;$j<count($data[$i]);$j++)
        {
//           if( isset($data[$i][$j]))
//           {
            $rw[]=$data[$i][$j];
//           }
        }
        $list[]=$rw;
    }
    return $list;
}
function clrNrow($data)
{
    $list= array();
    for($i=0;$i<count($data);$i++)
    {
        $rw= array();
        
        for($j=0;$j<count($data[$i]);$j++)
        {
           
            unset($data[$i][$j]);
           
        }
        
    }
     
    return $data;
}

function getCol($data)
{
    $cn=0;
    $list= array();
    $col= array();
    if(count($data)>0){
    foreach ($data as $key=>$value) {
        $col[0]=$cn;
        $col[1]=$key;
        $cn++;
        $list[]=ucfirst($col[1]);
    }
    }
    return $list;
}
function clrRowCmb($data)
{
    $list= array();
    for($i=0;$i<count($data);$i++)
    {
        $rw= array();

           if( isset($data[$i][0]))
           {
            $rw['id']=$data[$i][0];
            $rw['value']=$data[$i][1];
           }

        $list[]=$rw;
    }
    return $list;
}

function zerofill($entero, $largo){
            $entero = (int)$entero;
            $largo = (int)$largo;

            $relleno = '';
            if (strlen($entero) < $largo) {
                $sa= $largo - strlen($entero);
                $relleno = str_repeat('0',$sa);
            }
            return $relleno . $entero;
        }

function bldArray($data)
{
  $dat= array();
  for($i=0;$i<count($data);$i++){
      $dat[''.$data[$i]['name'].'']=$data[$i]['value'];
  }
  return $dat;
}
function bldArrayUrl($data)
{
 
  $list="";
  for($i=0;$i<count($data);$i++){
       if($i==0){
           $list .=''.$data[$i]['name'].'='.$data[$i]['value'];
       }
       else
       {
           $list .='&'.$data[$i]['name'].'='.$data[$i]['value'];
       }
        
  }
  parse_str($list,$dat );
  return $dat;
}

function split_array($data){
    $dat= array();
    for ($i = 0; $i < count($data); $i++) {
        parse_str($data[$i],$rw );
        $dat[]=  $rw;
    }
    return $dat;
}
function bool_($value){
//    if($value=="1")
//    {
//        return "SI";
//    }
//    if($value=="0")
//    {
//        return "NO";
//    }
//    return "SI";
    return $value;
}


function todate_($date_)
{
    $a= explode( "/",$date_);
    return $a[2]."-".$a[1]."-".$a[0];
}
function redate_($date_)
{
     $a= explode("-",$date_);
    return $a[2]."/".$a[1]."/".$a[0];
}
?>
