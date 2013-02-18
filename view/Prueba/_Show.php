<?php 
    $c=0;
    foreach($rows as $c)
    {
        $c[0];//id
        $c[1];//area
        $c[2];// fecha
    }
?>
<script type="text/javascript" src="js/app/evt_form_prueba.js" ></script>
<div class="div_container">
<h4 >Ver prueba</h4>
<form id="form_prueba" action="index.php" method="POST">
    <input type="hidden" name="controller" value="prueba" />
    <input type="hidden" name="action" value="show" />
    <table border="0" >
        <tbody>
            <tr>
                <td class="label" ><label for="prueba_id">Codigo:</label></td>
                <td>
                    <input type="text" name="prueba_id" id="prueba_id" class="input_text ui-widget-content" style="width: 30px;" readonly="readonly" value="<?php echo $c[0]; ?>" /> 
                    Area:
                    <input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $c[1]; ?>" />
                    Fecha:
                    <input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $c[2]; ?>" />
                </td>
            </tr>
            <?php
            $r=0;
            $v6=" ";
            $cont=0;
            foreach ($rows as $key => $r)
            {
                if($r4!=$r[4])
                {
                    $r4=$r[4];
                    $r7=0;
                    $cont=$cont+1;
            ?>
            <tr>
                <td class="label" ><label for="descripcion_p">Pregunta&nbsp;<?php echo $cont ?> :</label></td>
                <td>
                    <input type="text" name="descripcion_p" id="descripcion_p" class="input_text ui-widget-content" style="width: 500px;" readonly="readonly" value="<?php echo $r[4]; ?>" />
                    Tipo Pregunta:
                    <input type="text" name="descripcion" id="descripcion" class="input_text ui-widget-content" style="width: 100px;" readonly="readonly" value="<?php echo $r[3]; ?>" />
                    Peso:
                    <input type="text" name="peso" id="peso" class="input_text ui-widget-content" style="width: 30px;" readonly="readonly" value="<?php echo $r[6]; ?>" />
                </td>
            </tr>
            <?php }
                $r7=$r7+1;
            ?>
            <tr>
                <td class="label" ><label for="descripcion_a"></label></td>
                <td>
                    Alternativa:&nbsp;<?php echo $r7 ?>
                    <input type="text" name="descripcion_a" id="descripcion_a" class="input_text ui-widget-content" style="width: 200px;" readonly="readonly" value="<?php echo $r[8]; ?>" />
                    Ponderado:
                    <input type="text" name="ponderado" id="ponderado" class="input_text ui-widget-content" style="width: 50px;" readonly="readonly" value="<?php echo $r[9]; ?>" />
                </td>
            </tr>  
            <?php
            } ?>
            <tr>
                <td></td>
                <td>
                    <a href="index.php?controller=Prueba" class="btn_other"> Atras </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>