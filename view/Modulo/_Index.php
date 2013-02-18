<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container">
<h6 class="ui-widget-header">Modulos Registrados</h6>
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="Modulo" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <input type="text" name="q" id="q" class="input_text ui-widget-content " value="<?php echo $query; ?>" style="width: 360px; margin-left: 3px; margin-top: 5px; margin-bottom: 3px; " />
        <input type="submit" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
        <a href="index.php?controller=Modulo&action=create" class="btn_other" > Nuevo </a>
    </form>
</div>

<table class="ui-widget ui-widget-content" style="width: 660px; margin: 0 auto; " >
    <thead class="ui-widget ui-widget-content" >
        <tr class="ui-widget-header ">
            <th >CODIGO</th>
            <th >DESCRIPCION</th>
            <th >URL</th>
            <th >ESTADO</th>
            <th >PADRE</th>
            <th >ORDEN</th>
            <th >&nbsp;</th>
            <th >&nbsp;</th>
        </tr>
    </thead>
    <tbody >
        <?php foreach ($data['rows'] as $key => $value) { ?>
        <tr >
            <td ><?php  echo $value[0]; ?></td>
            <td ><?php  echo $value[2]; ?></td>
            <td ><?php  echo $value[3]; ?></td>
            <td>
            <?php  
                if($value[4]=="1")
                {
                echo "ACTIVO";
                }
                else 
                {
                echo "INACTIVO";  
                }
            ?>
            </td>
            <td><?php  echo $value[10]; ?></td>
            <td ><?php  
                    echo $value[5];
                 ?>
             </td>
            
            
            <td ><a href="index.php?controller=Modulo&action=edit&id=<?php  echo $value[0]; ?>" title="Editar"><img alt="" src="images/edit.png" /></a></td>
            <td ><a href="index.php?controller=Modulo&action=show&id=<?php  echo $value[0]; ?>" title="Ver"><img alt="" src="images/view.png" /></a></td>
        </tr>
        <?php  } ?>
    </tbody>
</table>
</div>
<?php echo $pag; ?>

</div>
