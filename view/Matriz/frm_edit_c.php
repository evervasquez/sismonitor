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
                <td class="label" ><label for="comp_id">Codigo:</label></td>
                <td><input type="text" name="comp_id" id="comp_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->comp_id; ?>" /> </td>
            </tr>        
            <tr>
                <td class="label" ><label for="comp_numero">Nro:</label></td>
                <td><input type="text" name="comp_numero" id="comp_numero" class="input_text ui-widget-content" style="width: 50px;"  value="<?php echo $obj->comp_numero; ?>" onkeypress="return permite(event,'num')"/>
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $titulo; ?>" />
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="comp_descripcion">Descripcion:</label></td>
                <td><input type="text" name="comp_descripcion" id="comp_descripcion" class="input_text ui-widget-content" style="width: 450px;"  value="<?php echo $obj->comp_descripcion; ?>" />
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="var_numero">Variable:</label></td>
                <td><?php echo $var_id; ?>
				</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                    <a href="index.php?controller=Matriz&action=show_componentes&id=<?php echo $obj->var_id; ?>" class="btn_other"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>