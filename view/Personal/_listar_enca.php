<script type="text/javascript" src="js/app/evt_form_personal.js"></script>
<div class='ui-widget-header'>Docentes Registrados</div>
<div id="frmtotal">
	<div id="msg" ></div>
        <form id="_frm" name="_frm" action="" method="GET">
		<input type="hidden" name="controller" value="Personal" />
        <input type="hidden" name="action" value="mostrar_personal_enca" />
        <input type="hidden" name="p" id="p" value="1" />
                <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query;?>" style="width: 600px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
                <a href="javascript:buscar_person('index.php?controller=Personal&action=mostrar_personal_enca')" class="btn_other">Buscar</a>
        
	</form>
	<table  table width="99%" style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead>
                    <th align='left' class='ui-widget-header'>ENCABEZADO</th>
                    <th align='left' class='ui-widget-header'>DOCENTE</th>
                    <th align='left' class='ui-widget-header'>INSTITUCION</th>
                    <th align='left' class='ui-widget-header'>NRO ACOMPAÑAMIENTO</th>
                    <th align="center" width="30" class="ui-widget-header">SELECCIONAR</th>
		</thead>
		<?php  foreach($rows as $key => $val)
		{?>
		<tr style="border-bottom:1px solid #666; background:#F0F0F0;">

			<td align="left"><?php  echo $val[0]; ?></td>
			<td align="left"><?php  echo $val[1]; ?></td>
			<td align="left"><?php  echo $val[2]; ?></td>
                        <td align="left"><?php  echo $val[3]; ?></td>
                        <td align="center"><a href="javascript:devolver_personal('<?php  echo $val[0]; ?>')" title="devolver"><img src="images/add.png"  border="0"></a></td>
		</tr>

			<?php }?>
	</table>
	<?php echo $pag;?>
</div>
