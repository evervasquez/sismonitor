<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
        $(".links").button();
    });
</script>
<div class="div_container"  >
<div class="contain"  >
<h4 class="ui-widget-header" >Buscar Prueba-Proyecto</h4>
<form action="" method="GET">
    <input type="hidden" name="controller" value="Detalle_proyecto" />
    <input type="hidden" name="action" value="index" />
    <input type="hidden" name="p" value="1" />    
    <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
    <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
    <a href="index.php?controller=Detalle_proyecto&action=create" class="links" > Nuevo </a>
</form>
<table class="ui-widget ui-widget-content" style="width: 660px; margin-top: 1px; margin-left: 3px; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th>COD</th>
            <th>ID_PY</th>
            <th>PROYECTO</th>
            <th>FECHA PROYECTO</th>
            <th>ID_PRUEBA</th>
            <th>PRUEBA</th>
            <th>FECHA_PRUEBA</th>
            <th>&nbsp;</th>
            <th>&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo $value[4]; ?></td>
            <td ><?php  echo $value[5]; ?></td>
            <td ><?php  echo $value[6]; ?></td>
            <td ><a href="index.php?controller=Detalle_proyecto&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <!--<td ><a href="index.php?controller=Detalle_proyecto&action=show&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/view.png" /></a></td>-->
            <td ><a href="index.php?controller=Detalle_proyecto&action=delete&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/delete.png" /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>