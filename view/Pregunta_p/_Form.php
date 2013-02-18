<script type="text/javascript" src="js/app/evt_form_pregunta_p.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de pregunta</h4>
<form id="form_pregunta" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Pregunta_p" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;"  >
        <tbody>
            <tr>
                <td class="label" ><label for="pregunta_id">Codigo:</label></td>
                <td>
                    <input type="text" name="pregunta_id" id="idpregunta" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->pregunta_id; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="prueba_id">Prueba:</label></td>
                <td>
                    <input type="hidden" name="prueba_id" id="prueba_id" value="<?php echo $obj->prueba_id; ?>"/>
                    <input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $obj->area; ?>" /> 
                    <input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $obj->fecha; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_prueba" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=prueba&action=mostrar_p',500,400)"/>
                </td>
            </tr> 
            <tr>
                <td class="label" ><label for="tipopreg_id">Tipo:</label></td>
                <td> 
                    <?php echo $tipopreg_id; ?> Peso:
                    <input type="text" name="peso" id="peso" class="input_text ui-widget-content" style="width: 50px;" value="<?php echo $obj->peso; ?>" onkeypress="return permite(event,'num')"/>
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="descripcion">Descripcion:</label></td>
                <td><input type="text" name="descripcion" id="descripcion" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->descripcion_p; ?>" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Pregunta_p" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>