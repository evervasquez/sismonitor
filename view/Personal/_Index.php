<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
        $(".btn_other").button();
    });
</script>
<div class="div_container">
<div class="contain"  >
<h4 class="ui-widget-header" >Buscar Docente</h4>
<form action="" method="GET">
    <input type="hidden" name="controller" value="Personal" />
    <input type="hidden" name="action" value="index" />
    <input type="hidden" name="p" value="1" />    
    <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
    <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
    <a href="index.php?controller=Personal&action=create" class="btn_other"> Nuevo </a>
</form>
<table class="ui-widget ui-widget-content" style="width: 660px; margin-top: 1px; margin-left: 3px; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >DNI</th>
            <th >NOMBRES</th>
            <th >APELLIDOS</th>
            <th >FECHA NAC</th>
            <th >&nbsp;</th>
            <th >&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr>
            <td ><?php  echo $value['pers_id']; ?></td>
            <td ><?php  echo $value['pers_dni']; ?></td>
            <td ><?php  echo $value['pers_nombres']; ?></td>
            <td ><?php  echo $value['pers_apellido_p']." ".$value['pers_apellido_m']; ?></td>
            <td ><?php  echo $value['pers_fecha_nac']." ";  ?></td>
            <td ><a href="index.php?controller=Personal&action=edit&id=<?php  echo $value['pers_id']; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <td ><a href="index.php?controller=Personal&action=delete&id=<?php  echo $value['pers_id']; ?>" title="Borrar"><img alt="" src="images/delete.png" /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>