<script type="text/javascript">
    $(function(){
        $( "#q" ).focus();
        $(".links").button();
    });
</script>
<div class="div_container"  >
<div class="contain"  >
<h4 class="ui-widget-header" >Buscar Alternativa</h4>
<form action="" method="GET">
    <input type="hidden" name="controller" value="alternativa" />
    <input type="hidden" name="action" value="index" />
    <input type="hidden" name="p" value="1" />    
    <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
    <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
    <a href="index.php?controller=alternativa&action=create" class="links" > Nuevo </a>
</form>
<table class="ui-widget ui-widget-content" style="width: 660px; margin-top: 1px; margin-left: 3px; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th width="5%">COD</th>
            <th width="55%">PREGUNTA</th>
            <th width="20%">ALTERNATIVA</th>
            <th width="10%">PONDERADO</th>
            <th width="5%">&nbsp;</th>
            <th width="5%">&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[1]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td ><a href="index.php?controller=alternativa&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <td ><a href="index.php?controller=alternativa&action=delete&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/delete.png" /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>
</div>