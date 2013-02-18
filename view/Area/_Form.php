<script type="text/javascript" src="js/app/evt_form_Area.js" ></script>
<script type="text/javascript">
    $(function(){
        $(".links").button();
    });
</script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de Area</h4>
<form id="form_area" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Area" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="area_id">Codigo:</label></td>
                <td><input type="text" name="area_id" id="area_id" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->area_id; ?>" /> </td>
            </tr>        
            <tr>
                <td class="label" ><label for="area">Descripcion:</label></td>
                <td><input type="text" name="area" id="area" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->area; ?>" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Area" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>