<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
        $(".btn_other").button();
        $(".links").button();
    });
</script>
<div class="div_container">
<div class="contain"  >
<h4 class="ui-widget-header" >Buscar Escuela</h4>
<form action="" method="GET">
    <input type="hidden" name="controller" value="Escuela" />
    <input type="hidden" name="action" value="index" />
    <input type="hidden" name="p" value="1" />    
    <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
    <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
    <a href="index.php?controller=Escuela&action=create" class="btn_other"> Nuevo </a>
</form>
<table class="ui-widget ui-widget-content" style="width: 660px; margin-top: 1px; margin-left: 3px; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >COD</th>
            <th >Cod Modular</th>
            <th >Nombre</th>
            <th >Nro</th>
            <th >Tipo</th>
            <th >Categoria</th>
            <th >Departamento</th>
            <th >Facilitador</th>
            <th >&nbsp;</th>
            <th >&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr>
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><?php  echo $value[4]; ?></td>
            <td ><?php  echo $value[5]; ?></td>
            <td ><?php  echo $value[6]; ?></td>
            <td ><?php  echo $value[7]; ?></td>
            <td ><a href="index.php?controller=Escuela&action=edit&id=<?php  echo $value[0]; ?>" title="Editar" class="links"><img alt="" src="images/edit.png" /></a></td>
            <td ><a href="index.php?controller=Escuela&action=delete&id=<?php  echo $value[0]; ?>" title="Borrar"  class="links"><img alt="" src="images/delete.png" /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>