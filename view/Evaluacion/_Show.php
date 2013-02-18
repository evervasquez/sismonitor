<?php 
    $c=0;
    $ponderado=0;
    foreach($rows as $c)
    {
        $c[0];//id
        $c[1];//anexo
        $c[2];//proyecto
        $c[3];// prueba
        $c[4];// fecha
        $c[5];// estudiante
        $c[6];// escuela
        $c[7];// tipo_escuela
        $c[10];// ponderado
        $c[11];// fecha
        $c[12];// nro_evaluacion
        $ponderado=$ponderado+$c[10];
    }
?>
<script type="text/javascript" src="js/app/evt_form_Evaluacion.js" ></script>
<div class="div_container">
<h4 >Ver Evaluacion</h4>
<form id="form_prueba" action="index.php" method="POST">
    <input type="hidden" name="controller" value="prueba" />
    <input type="hidden" name="action" value="show" />
    <fieldset>
    <table border="0" >
        <tbody>
            <tr>
                <td class="label" ><label for="Evaluacion">Codigo:</label></td>
                <td>
                    <input type="text" name="evaluacion_id" id="evaluacion_id" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $c[0]; ?>" /> 
                    Anexo:
                    <input type="text" name="anexo" id="anexo" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $c[1]; ?>" />
					Fecha: 
					<input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 80px;"  value="<?php echo $c[11]; ?>" readonly="readonly" />
					Nro: 
					<input type="text" name="nro_evaluacion" id="nro_evaluacion" class="input_text ui-widget-content" style="width: 70px;" value="<?php echo $c[12]; ?>" readonly="readonly" />
                    Nota:
                    <input type="text" name="nota" id="nota" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $ponderado; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="proyecto_id">Proyecto:</label></td>
                <td>
                    <input type="text" name="proyecto" id="proyecto" class="input_text ui-widget-content" style="width: 600px;" readonly="readonly" value="<?php echo $c[2]; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="nombre">Prueba:</label></td>
                <td>
                    <input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 200px;" readonly="readonly" value="<?php echo $c[3]; ?>" /> 
                    Fecha Prueba:
                    <input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 90px;"  readonly="readonly" value="<?php echo $c[4]; ?>" />             
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="Estudiante">Estudiante:</label></td>
                <td>
                    <input type="text" name="estudiante" id="estudiante" class="input_text ui-widget-content" style="width: 450px;" readonly="readonly" value="<?php echo $c[5]; ?>" /> 
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="Escuela">Escuela:</label></td>
                <td>
                    <input type="text" name="escuela" id="escuela" class="input_text ui-widget-content" style="width: 260px;" readonly="readonly" value="<?php echo $c[6]; ?>" />
					Tipo:
                    <input type="text" name="tipo_escuela" id="tipo_escuela" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $c[7]; ?>" /> 
                </td>
            </tr>
        </tbody>
    </table>
    </fieldset>
    <fieldset>
        <legend>Preguntas:</legend>
    <table border="0" >
        <tbody>
            <?php
            $v8=" ";
            $v=0;
            $cont=0;
            foreach($rows as $key => $v)
            {
                if($v8!=$v[8])
                {
                    $v8=$v[8];
                    $cont=$cont+1;

            ?>
            <tr>
                <td class="label" >
                    <label for="descripcion_p">Pregunta &nbsp<?php echo $cont ?> :</label>
                </td>
                <td>
                    <input type="text" name="descripcion_p[]" id="descripcion_p[]" class="input_text ui-widget-content" style="width: 600px;" readonly="readonly" value="<?php echo $v[8]; ?>" />
                </td>
            </tr>
            <tr>
                <td class="label" ><label for="descripcion_a[]"></label></td>
                <td>
                    Respuesta:
                    <input type="text" name="descripcion_a" id="descripcion_a" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $v[9]; ?>" />
            <?php 
                }
            }
            ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <a href="index.php?controller=Evaluacion" class="btn_other"> Atras </a>
                </td>
            </tr>
        </tbody>
    </table>
    </fieldset>    
</form>
</div>