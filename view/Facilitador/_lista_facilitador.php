<script type="text/javascript" src="js/app/evt_form_Facilitador.js"></script>
<script type="text/javascript">
	$(function(){
    	$( "#q" ).focus();
    });
</script>
<div class='ui-widget-header'>Facilitadores Registrados</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_frm" name="_frm" action="" method="GET">
		<input type="hidden" name="controller" value="Facilitador" />
        <input type="hidden" name="action" value="mostrar_facilitador" />
		<input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query;?>" style="width: 300px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" class="btn_other" value="Buscar"/>
	</form>
	<table  table width="99%" style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead>
			<th align='left' class='ui-widget-header'>CODIGO</th>
			<th align='left' class='ui-widget-header'>DNI</th>
			<th align='left' class='ui-widget-header'>NOMBRES</th>
			<th align="center" width="30" class="ui-widget-header">ok</th>
		</thead>
		<?php  foreach($rows as $key => $val)
		{?>
		<tr style="border-bottom:1px solid #666; background:#F0F0F0;">
			<td align="left"><?php  echo $val[0]; ?></td>
			<td align="left"><?php  echo $val[1]; ?></td>
			<td align="left"><?php  $facilitador=$val[2]." ".$val[3]; echo $facilitador; ?></td>
			<td align="center"><a href="javascript:devolver_facilitador('<?php echo $val[0]; ?>','<?php  echo $facilitador; ?>');" title="devolver"><img src="images/add.png"  border="0"></a></td>
		</tr>
			<?php }?>
	</table>
	<?php echo $pag;?>
</div>