<script type="text/javascript" src="js/app/evt_form_pregunta.js" ></script>
<script type="text/javascript">
    $(function(){
        $(".links").button();
    });
</script>
<div class="div_container">
<h4 >Ver pregunta</h4>
<form id="form_pregunta" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Pregunta" />
    <input type="hidden" name="action" value="delete" />
    <table border="0" >
        <tbody>
            <tr>
                <td class="label" ><label for="idpregunta">Codigo:</label></td>
                <td><input type="text" name="idpregunta" id="idpregunta" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->idpregunta; ?>" /> </td>
            </tr>
            <tr>
                <td class="label" ><label for="idtipo_pregunta">Tipo:</label></td>
                <td> <?php echo $idtipo_pregunta; ?> </td>
            </tr>
            <tr>
                <td class="label" ><label for="descripcion">Descripcion:</label></td>
                <td><input type="text" name="descripcion" id="descripcion" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->descripcion; ?>" readonly="readonly" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Eliminar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=Pregunta" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>