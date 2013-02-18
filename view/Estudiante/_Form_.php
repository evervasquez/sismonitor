<script type="text/javascript" src="js/app/evt_form_Estudiante.js" ></script>
<script type="text/javascript">
    $(function(){
        $(".links").button();
    });
</script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Estudiante</h4>
<form id="form_estudiante" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Estudiante" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;"  width="600px">
        <tbody>
            <tr>
                <td class="label" ><label for="estudiante_id">Codigo:</label></td>
                <td>
                    <input type="text" name="estudiante_id" id="estudiante_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->estudiante_id; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="nombre">Nombres:</label></td>
                <td>
                   <input type="text" name="nombre" id="nombre" class="input_text ui-widget-content" style="width: 150px;" value="<?php echo $obj->nombre; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="apellidos">Apellidos:</label></td>
                <td>
                    <input type="text" name="apellidos" id="apellidos" class="input_text ui-widget-content" style="width: 250px;" value="<?php echo $obj->apellidos; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="Escuela">Escuela:</label></td>
                <td>
                    <input type="hidden" name="escuela_id" id="escuela_id" value="<?php echo $obj->escuela_id; ?>"/>
                    <input type="text" name="escuela" id="escuela" class="input_text ui-widget-content" style="width: 150px;" readonly="readonly" value="<?php echo $obj->escuela; ?>" /> 
                    <input type="text" name="tipo_escuela" id="tipo_escuela" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->tipo_escuela; ?>" /> 
                    <input  type="button" class="btn_other"  name="btn_escuela" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Escuela&action=mostrar_escuela',750,400)"/>
                </td>
            </tr> 
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Estudiante" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>