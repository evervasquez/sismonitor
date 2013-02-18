<script type="text/javascript" src="js/app/evt_form_Proyecto.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Proyecto</h4>
<form id="form_proyecto" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Proyecto" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="proyecto_id">Codigo:</label></td>
                <td>
					<input type="text" name="proyecto_id" id="proyecto_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->proyecto_id; ?>" /> 
					Fecha: <input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 80px;"  value="<?php echo $obj->fecha; ?>" />
				</td>
            </tr>        
            <tr>
                <td class="label" ><label for="proyecto">Descripcion:</label></td>
                <td><input type="text" name="proyecto" id="proyecto" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->proyecto; ?>" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Proyecto" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>