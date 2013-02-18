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
                <td class="label" ><label for="sub_id">Codigo:</label></td>
                <td><input type="text" name="sub_id" id="sub_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->sub_id; ?>" /> </td>
            </tr>        
            <tr>
                <td class="label" ><label for="sub_nombre">Descripcion:</label></td>
                <td><input type="text" name="sub_nombre" id="sub_nombre" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->sub_nombre; ?>" />
				<input type="hidden" name="tipo" id="tipo" value="<?php echo $titulo; ?>" />
				</td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
		    <a href="index.php?controller=Matriz&action=listar" class="btn_other" > Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>