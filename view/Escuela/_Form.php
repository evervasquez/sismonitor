<script type="text/javascript" src="js/app/evt_form_Escuela.js" ></script>
<script type="text/javascript">
    $(document).ready(function()
	{
	    $("#departamento").change(function()
		{
            vv = $(this).val();
			vv = vv.substring(0,2); 	
			$("#provincia").empty();
			$("#distrito").empty();
            $.get("index.php","controller=Escuela&action=_provincia&cod="+vv, function(data)
                { 
                    $("#provincia").append(data);
                });
        });
		$("#provincia").change(function()
		{
            vv = $(this).val();
			vv = vv.substring(0,4); 	
            $.get("index.php","controller=Escuela&action=_distrito&cod="+vv, function(data)
            { 
				$("#distrito").empty().append(data);
            });
        });
         $(".links").button();
    });  
</script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Escuela</h4>
<form id="form_Escuela" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Escuela" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="escuela_id">Codigo:</label></td>
                <td><input type="text" name="escuela_id" id="escuela_id" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $obj->escuela_id; ?>" /> 
				codigo modular: <input type="text" name="cod_modular" id="cod_modular" class="input_text ui-widget-content" style="width: 100px;"  value="<?php echo $obj->cod_modular; ?>" onkeypress="return permite(event,'num')"/> 
				Nro : <input type="text" name="nro_escuela" id="nro_escuela" class="input_text ui-widget-content" style="width: 55px;"  value="<?php echo $obj->nro_escuela; ?>" onkeypress="return permite(event,'num')"/> 
				</td>
            </tr>        
            <tr>
                <td class="label" ><label for="escuela">Escuela:</label></td>
                <td>
					<input type="text" name="escuela" id="escuela" class="input_text ui-widget-content" style="width: 350px;"  value="<?php echo $obj->escuela; ?>" /> 
				</td>
            </tr>
            <tr>
                <td class="label" ><label for="Tipo">Tipo:</label></td>
                <td>
					<?php echo $tipo_escuela_id; ?>
					Categoria: <?php echo $categoria_id; ?>
					
                    
                </td>
            </tr>
			<tr>
                <td class="label" ><label for="region">Region:</label></td>
                <td>
					<?php echo $departamento; ?>
					Provincia:
					<?php if(strlen($provincia)==0){ ?>
						<select name="provincia" id="provincia" class="input_text ui-widget-content" style="width:165px"></select>
					<?php }
						else {echo $provincia; }
					?>
                </td>
            </tr>
			<tr>
                <td class="label" ><label for="distrito">Distrito:</label></td>
                <td>
					<?php if(strlen($distrito)==0){ ?>
						<select name="distrito" id="distrito" class="text ui-widget-content ui-corner-all" style="width:140px"></select>
					<?php }
						else {echo $distrito; }
					?>
					Comunidad:
					<input type="text" name="comunidad" id="comunidad" class="input_text ui-widget-content" style="width: 150px;"  value="<?php echo $obj->comunidad; ?>" />
                </td>
            </tr>
			<tr>
                <td class="label" ><label for="Facilitador">Facilitador:</label></td>
                <td>
                    <input type="hidden" name="facilitador_id" id="facilitador_id" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $obj->facilitador_id; ?>" />
					<input type="text" name="facilitador" id="facilitador" class="input_text ui-widget-content" style="width: 280px;" readonly="readonly" value="<?php echo $obj->facilitador; ?>" />
					<input  type="button" class="btn_other"  name="btn_prueba" id="btn_prueba" value="Buscar" onclick="popup('index.php?controller=Facilitador&action=mostrar_facilitador',700,400)"/>
                </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Escuela" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>