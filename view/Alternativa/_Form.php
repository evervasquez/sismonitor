<script type="text/javascript" src="js/app/evt_form_alternativa.js" ></script>
<script type="text/javascript">
    $(function(){
	$(".links").button();
    });
</script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Alternativa</h4>
<form id="form_alternativa" action="index.php" method="POST">
    <input type="hidden" name="controller" value="alternativa" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" width="750px" >
        <tbody>
            <tr>
                <td class="label" ><label for="alternativa_id">Codigo:</label></td>
                <td>
                    <input type="text" name="alternativa_id" id="alternativa_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->alternativa_id; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="pregunta_id">Pregunta:</label></td>
                <td>
                    <input type="hidden" name="pregunta_id" id="pregunta_id" value="<?php echo $obj->pregunta_id; ?>"/>
                    <input type="text" name="descripcion" id="descripcion" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $obj->descripcion; ?>" /> 
                    <input type="text" name="descripcion_p" id="descripcion_p" class="input_text ui-widget-content" style="width: 300px;" readonly="readonly" value="<?php echo $obj->descripcion_p; ?>" /> 
                    <input type="text" name="peso" id="peso" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $obj->peso; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_pregunta" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=pregunta_p&action=mostrar_p',800,350)"/>
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="descripcion_a">Descripcion:</label></td>
                <td>
                    <input type="text" name="descripcion_a" id="descripcion_a" class="input_text ui-widget-content" style="width: 300px;"  value="<?php echo $obj->descripcion_a; ?>" />
                    Ponderado:
                    <input type="text" name="ponderado" id="ponderado" class="input_text ui-widget-content" style="width: 50px;"  value="<?php echo $obj->ponderado; ?>" onkeypress="return permite(event,'num')"/> 
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=alternativa" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>