<script type="text/javascript" src="js/app/evt_form_Prueba.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Prueba</h4>
<form id="form_area" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Prueba" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td>
                    Codigo:<input type="text" name="prueba_id" id="prueba_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->prueba_id; ?>" />
                    Area: <?php echo $area_id; ?>
                    Fecha:<input type="text" name="fecha" id="fecha" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->fecha; ?>" />
                </td>
            </tr>        
            <tr>
                <td>
                    <input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                    <a href="index.php?controller=Prueba" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>