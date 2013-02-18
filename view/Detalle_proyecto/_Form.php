<script type="text/javascript" src="js/app/evt_form_Detalle_proyecto.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Prueba - Proyecto</h4>
<form id="form_detalle_proyecto" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Detalle_proyecto" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;"  width="750px">
        <tbody>
            <tr>
                <td class="label" ><label for="detalle_proyecto_id">Codigo:</label></td>
                <td>
                    <input type="text" name="detalle_proyecto_id" id="detalle_proyecto_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->detalle_proyecto_id; ?>" /> 
                </td>
            </tr>
			<tr>
                <td class="label" ><label for="proyecto_id">Proyecto:</label></td>
                <td>
                    <input type="hidden" name="proyecto_id" id="proyecto_id" value="<?php echo $obj->proyecto_id; ?>"/>
					<input type="text" name="proyecto" id="proyecto" class="input_text ui-widget-content" style="width: 550px;" readonly="readonly" value="<?php echo $obj->proyecto; ?>" />
					<input  type="button" class="btn_other"  name="btn_prueba" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Proyecto&action=mostrar_proyecto',700,400)"/>
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="prueba_id">Prueba:</label></td>
                <td>
                    <input type="hidden" name="prueba_id" id="prueba_id" value="<?php echo $obj->prueba_id; ?>"/>
                    <input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $obj->area; ?>" /> 
                    <input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $obj->fecha; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_prueba" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Prueba&action=mostrar_p',500,400)"/>
                </td>
            </tr> 
			<tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Detalle_proyecto" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>