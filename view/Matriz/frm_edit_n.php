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
                <td class="label" ><label for="niv_id">Codigo:</label></td>
                <td><input type="text" name="niv_id" id="niv_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->niv_id; ?>" /> 
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $titulo; ?>" />
				</td>
            </tr>        
			<tr>
                <td class="label" ><label for="niv_ponderado">Ponderado:</label></td>
                <td><input type="text" name="niv_ponderado" id="niv_ponderado" class="input_text ui-widget-content" style="width: 80px;"  value="<?php echo $obj->niv_ponderado; ?>" onkeypress="return permite(event,'num')"/>
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="nivl_id">Nivel:</label></td>
                <td><?php echo $nivl_id; ?>
				</td>
            </tr>
			<tr>
                <td class="label" ><label for="niv_descripcion">Descripcion:</label></td>
                <td>
				<textarea cols="87" rows="5"  name="niv_descripcion" id="niv_descripcion"  maxlength="1000"><?php echo $obj->niv_descripcion; ?></textarea>
				</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
					<a href="index.php?controller=Matriz&action=show_niveles&id=<?php echo $obj->ind_id; ?>" class="btn_other"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>