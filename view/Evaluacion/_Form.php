<script type="text/javascript" src="js/app/evt_form_Evaluacion.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Evaluacion</h4>
<form id="form_Evaluacion" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Evaluacion" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;"  >
        <tbody>
            <tr>
                <td class="label" ><label for="Evaluacion">Codigo:</label></td>
                <td>
                    <input type="text" name="evaluacion_id" id="evaluacion_id" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $obj->evaluacion_id; ?>" /> 
                    Anexo:
                    <input type="text" name="anexo" id="anexo" class="input_text ui-widget-content" style="width: 100px;" value="<?php echo $obj->anexo; ?>" /> 
					Fecha: 
					<input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 80px;"   value="<?php echo $obj->fecha; ?>" />
					Nro: 
					<input type="text" name="nro_evaluacion" id="nro_evaluacion" class="input_text ui-widget-content" style="width: 70px;" value="<?php echo $obj->nro_evaluacion; ?>" onkeypress="return permite(event,'num')" />
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="proyecto_id">Proyecto:</label></td>
                <td>
                    <input type="text" name="proyecto" id="proyecto" class="input_text ui-widget-content" style="width: 450px;" readonly="readonly" value="<?php echo $obj->proyecto; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="nombre">Prueba:</label></td>
                <td>
                    <input type="hidden" name="prueba_id" id="prueba_id" class="input_text ui-widget-content" style="width: 150px;" value="<?php echo $obj->prueba_id; ?>" /> 
                    <input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 200px;" readonly="readonly" value="<?php echo $obj->area; ?>" /> 
                    Fecha Prueba:
                    <input type="text" name="fecha_p" id="fecha_p" class="input_text ui-widget-content" style="width: 90px;"  readonly="readonly" value="<?php echo $obj->fecha_p; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_prueba" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Evaluacion&action=mostrar_prueba',700,400)"/>              
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="Estudiante">Estudiante:</label></td>
                <td>
                    <input type="hidden" name="estudiante_id" id="estudiante_id" class="input_text ui-widget-content" style="width: 10px;" readonly="readonly" value="<?php echo $obj->estudiante_id; ?>" /> 
                    <input type="text" name="estudiante" id="estudiante" class="input_text ui-widget-content" style="width: 450px;" readonly="readonly" value="<?php echo $obj->estudiante; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="Escuela">Escuela:</label></td>
                <td>
                    <input type="text" name="escuela" id="escuela" class="input_text ui-widget-content" style="width: 260px;" readonly="readonly" value="<?php echo $obj->escuela; ?>" /> 
                    <input type="text" name="tipo_escuela" id="tipo_escuela" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $obj->tipo_escuela; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_escuela" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Evaluacion&action=mostrar_estudiante',700,400)"/>
                </td>
            </tr>
			<tr>
			 <td colspan="2" id="_prueba">
				<?php
					if (isset($obj->evaluacion_id))
					{
						//require_once("../view/Evaluacion/_preguntas.php");
				?>
				<script>				
					$.post("index.php","controller=Evaluacion&action=get_pregunta_m&id="+<?php echo $obj->evaluacion_id; ?>,function(data)
					{
						// alert(data);
						//	$("#_prueba").append(data);
						document.getElementById("_prueba").innerHTML=data;
					});
				</script>
				<?php				
				}
				?>
			 </td>
			</tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Evaluacion" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>