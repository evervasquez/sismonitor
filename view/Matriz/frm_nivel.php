
<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container" style="min-height: 700px;">
<h6 class="ui-widget-header">Lista de Matrices de subsistemas</h6>
<div class="contain_">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;height: 160px;margin-top: 50px;">
    <div style="display: block;width: 200px;margin-left:5%">
       
        <table width="681" cellspacing="0">
  <tr>
    <td>Niveles</td>
    <td><a href="javascript:add_nivel" class="btn_other"> Agregar</a></td>
    <td></td>
    <td></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td></td>
    <td></td>
  </tr>
  <tr class="matriz_header">
    <td>Nivel</td>
    <td>Descripción</td>
    <td>Ponderado</td>
    <td>Eliminar</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><textarea name="ind_descripcion3" id="ind_descripcion3" cols="70"></textarea></td>
    <td></td>
    <td width="83"></td>
  </tr>
</table>
    </div>
   
    
</div>
   
    <div style="clear: both"></div> 
</div>
<?php echo $pag; ?>

</div>
