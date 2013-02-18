
<script>
$(".btn_other").button();
 function muestra(id)
 {
		 if(document.getElementById(id).style.display=='none'){
		  //document.getElementById(id).style.display='block';
		   $("#"+id).slideDown();
		  document.getElementById('a'+id).innerHTML='[-]';
		  }else
		  {
		   //document.getElementById(id).style.display='none';
		   document.getElementById('a'+id).innerHTML='[+]';
			$("#"+id).slideUp();
		  }
 // alert('ok');
 }
</script>
<table width='400'>
  <tr>
     <td>&nbsp;</td>
     <td><b>nr</b></td>
     <td><b>descripcion</b></td>
     <td>&nbsp;</td>
  </tr>
<?php

  $c=0;
   foreach($mod as $valor){
   $c=$c+1;
 ?>
     <tr>
         <td><a href="javascript:void(0);" class="btn_other" onclick="muestra('<?php echo $c;?>');" id='a<?php echo $c;?>'>[+]</a></td>
          <td><?php echo $c;?></td>
          <td><?php echo $valor['descripcion'];?></td>
          <td></td>
	 </tr>
	<tr>
    <td>&nbsp;</td>
	 <td colspan='2'>
	  <div id='<?php echo $c;?>'  style='display:none;'>
		   <table width='300'>
					<?php 
			 $d = 0;
			 foreach($valor['enlaces'] as $v)
			 {
			 $d++;
			?>
				   <tr id='<?php echo $valor['pru_id'].$v['pru_id']?>' >
					 <td>&nbsp;</td>
					  <td>&nbsp;&nbsp;&nbsp;<?php echo $c.".".$d." "; ?></td>
					  <td><?php echo $v['descripcion'];?></td>
					  <td></td>
				  </tr>
			 <?php }?>
		   
		   </table>
	   
	  </div>
	 </td>
	</tr>
 <?php
 
 }
 ?>
 </table>
 