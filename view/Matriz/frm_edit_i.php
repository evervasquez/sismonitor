<script type="text/javascript"  >
    $(function(){
         $(".btn_other").button();
    });  
</script>
<div class="div_container">
<h4 class="ui-widget-header" ><?php echo $titulo; ?></h4>
<form id="form_area" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Matriz" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="ind_id">Codigo:</label></td>
                <td><input type="text" name="ind_id" id="ind_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->ind_id; ?>" /> </td>
            </tr>        
            <tr>
                <td class="label" ><label for="ind_numero">Nro:</label></td>
                <td><input type="text" name="ind_numero" id="ind_numero" class="input_text ui-widget-content" style="width: 80px;"  value="<?php echo $obj->ind_numero; ?>" onkeypress="return permite(event,'num')"/>
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $titulo; ?>" />
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="ind_es_unipersonal">Unidocente:</label></td>
                <td><select name="ind_es_unipersonal" id="ind_es_unipersonal">
				  <option value="0"> Si es aplicable</option>
				  <option value="1"> No es aplicablee</option>
				</select>
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="ind_descripcion">Descripcion:</label></td>
                <td>
				<textarea cols="87" rows="5"  name="ind_descripcion" id="ind_descripcion"  maxlength="1000"><?php echo $obj->ind_descripcion; ?></textarea>
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="comp_id">Componentes:</label></td>
                <td><?php echo $comp_id; ?>
				</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
					<a href="index.php?controller=Matriz&action=show_indicadores&id=<?php echo $obj->comp_id; ?>" class="btn_other"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>