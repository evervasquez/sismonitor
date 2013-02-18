<script type="text/javascript" src="js/app/evt_form_Facilitador.js"></script>
<script type="text/javascript">
	$(function(){
    	$( "#q" ).focus();
    });
</script>
<div class='ui-widget-header'>Docentes Registrados</div>
<div id="frmtotal">
	<div id="msg" ></div>
	<form id="_frm" name="_frm" action="" method="GET">
		<input type="hidden" name="controller" value="Personal" />
        <input type="hidden" name="action" value="mostrar_personal" />
		<input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query;?>" style="width: 300px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" class="btn_other" value="Buscar"/>
	</form>
	<table  table width="99%" style="border:1px solid #666; font-size:14px; margin-bottom:5px;" align="center">
		<thead class="ui-widget ui-widget-content" >
                    <tr class="ui-widget-header ">
                        <th >CODIGO</th>
                        <th >DNI</th>
                        <th >NOMBRES</th>
                        <th >APELLIDOS</th>
                        <th >FECHA NAC</th>
                        <th >&nbsp;</th>
                        <th >&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
		<?php foreach ($data['rows'] as $key => $value) { ?>
                <tr>
                    <td ><?php  echo $value['pers_id']; ?></td>
                    <td ><?php  echo $value['pers_dni']; ?></td>
                    <td ><?php  echo $value['pers_nombres']; ?></td>
                    <td ><?php  echo $value['pers_apellido_p']." ".$value['pers_apellido_m']; ?></td>
                    <td ><?php  echo $value['pers_fecha_nac']." ";  ?></td>
                    <td ><a href="index.php?controller=Personal&action=edit&id=<?php  echo $value['pers_id']; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
                    <td ><a href="index.php?controller=Personal&action=delete&id=<?php  echo $value['pers_id']; ?>" title="Borrar"><img alt="" src="images/delete.png" /></a></td>
                </tr>
                <?php  } ?>
                </tbody>
	</table>
	<?php echo $pag;?>
</div>