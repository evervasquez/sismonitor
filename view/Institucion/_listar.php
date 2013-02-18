<div id="frmtotal">
<script type="text/javascript" src="js/app/evt_form_insitucion.js"></script>
<style>
    #q{
      width: 580px;  
    }
</style>
<div class='ui-widget-header'>Instituciones Registradas</div>
	<div id="msg" ></div>
        <form id="_frm" name="_frm" action="" method="GET">
		<input type="hidden" name="controller" value="Institucion" />
        <input type="hidden" name="action" value="mostrar_instituciones" />
        <input type="hidden" name="p" id="p" value="1" />
                <input type="text" name="q" id="q" class="input_text ui-widget-content "value="<?php echo $query;?>" />
                <a href="javascript:buscar_inst('index.php?controller=Institucion&action=mostrar_instituciones')" class="btn_other">Buscar</a>
	</form>
        <table  id="instituciones_tabla"table width="99%" style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead>
                    <th align='left' class='ui-widget-header'>CODIGO</th>
                    <th align='left' class='ui-widget-header'>COD. MODULAR</th>
                    <th align='left' class='ui-widget-header'>NUMERO</th>
                    <th align='left' class='ui-widget-header'>NOMBRE DE ESCUELA</th>
                    <th align='left' class='ui-widget-header'>DISTRITO</th>
                    <th align="center" width="30" class="ui-widget-header">SELECCIONAR</th>
		</thead>
		<?php  foreach($rows as $key => $val)
		{?>
		<tr style="border-bottom:1px solid #666; background:#F0F0F0;">

			<td align="left"><?php  echo $val[0]; ?></td>
			<td align="left"><?php  echo $val[1]; ?></td>
			<td align="left"><?php  echo $val[2]; ?></td>
                        <td align="left"><?php  echo $val[3]; ?></td>
                        <td align="left"><?php  echo $val[4]; ?></td>
                        <td align="center"><a href="javascript:devolver_institucion('<?php  echo $val[1]; ?>')" title="devolver"><img src="images/add.png"  border="0"></a></td>
		</tr>

			<?php }?>
	</table>
	<?php echo $pag;?>
</div>