<script type="text/javascript" src="js/app/evt_form_Facilitador.js" ></script>
<script type="text/javascript">
     $(function(){
         $(".btn_other").button();
    });
</script>
<?php
    $fe= explode('-',$obj->fecha_nac);
?>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Facilitador</h4>
<form id="form_Facilitador" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Facilitador" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="facilitador_id">CODIGO:</label></td>
                <td><input type="text" name="facilitador_id" id="facilitador_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->facilitador_id; ?>" /> 
				DNI:<input type="text" name="dni" id="dni" class="input_text ui-widget-content" style="width: 80px;" maxlength="8" value="<?php echo $obj->dni; ?>" onkeypress="return permite(event,'num')" /> 
				</td>
            </tr>        
			<tr>
                <td class="label" ><label for="nombres">NOMBRES:</label></td>
                <td><input type="text" name="nombres" id="nombres" class="input_text ui-widget-content" style="width: 200px;"  value="<?php echo $obj->nombres; ?>" /> </td>
            </tr>
			<tr>
                <td class="label" ><label for="apellidos">APELLIDOS:</label></td>
                <td><input type="text" name="apellidos" id="apellidos" class="input_text ui-widget-content" style="width: 200px;"  value="<?php echo $obj->apellidos; ?>" /> </td>
            </tr>
			<tr>
                <td class="label" ><label for="fecha_nac">FECHA NACIMIENTO:</label></td>
                
                <td><input type="text" name="fecha_nac" id="fecha_nac" class="input_text ui-widget-content" style="width: 80px;"  value="<?php    echo $fe[2]."/".$fe[1]."/".$fe[0] ?>" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>
                    <input type="submit" value="Guardar" class="btn_oher" />
                    <a href="index.php?controller=Facilitador" class="btn_oher"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>