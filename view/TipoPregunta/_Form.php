<script type="text/javascript" src="js/app/evt_form_tipopregunta.js" ></script>
<div class="div_container">
<h4 class="ui-widget-header" >Registro de tipo pregunta</h4>
<form id="form_tipopregunta" action="index.php" method="POST">
    <input type="hidden" name="controller" value="TipoPregunta" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;" >
        <tbody>
            <tr>
                <td class="label" ><label for="idtipo_pregunta">Codigo:</label></td>
                <td><input type="text" name="idtipo_pregunta" id="idtipo_pregunta" class="input_text ui-widget-content" style="width: 80px;" readonly="readonly" value="<?php echo $obj->idtipo_pregunta; ?>" /> </td>
            </tr>        
            <tr>
                <td class="label" ><label for="idparte">Parte:</label></td>
                <td> <?php echo $idparte; ?> </td>
            </tr>
            <tr>
                <td class="label" ><label for="descripcion">Descripcion:</label></td>
                <td><input type="text" name="descripcion" id="descripcion" class="input_text ui-widget-content" style="width: 442px;"  value="<?php echo $obj->descripcion; ?>" /> </td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
                          <a href="index.php?controller=TipoPregunta" class="links"> Cancelar </a>
                </td>
            </tr>
        </tbody>
    </table>
</form>
</div>