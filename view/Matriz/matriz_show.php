<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<div class="div_container" style="height: 700px;">
<h6 class="ui-widget-header">Lista de Matrices de subsistemas</h6>
<div class="contain_">
<div style="margin-left:0px;float: left; margin-bottom: 10px;margin-top: 20px;width: 100%;height:100%">
    <table class="tb_variables">
    <tr class="matriz_header">
        <td colspan="4"></td>
        <td colspan="<?php echo count($niveles) ?>"><label>NIVELES</label></td>
    </tr>
    <tr class="matriz_header">
        <td  width="60"><label>SUB SISTEMA</label></td>
        <td width="65"><label>VARIABLE</label></td>
        <td width="120">NIVEL</td>
        <td width="140">INDICADOR</td>
        
        <?php
        for ($i = 0; $i < count($niveles); $i++) {
            echo "<td ><label> {$niveles[$i]['nivl_descripcion']} </label></td>";
        }
            
        ?>
    
    </tr>
    <?php 
     echo ($matriz);
     // print_r( $matriz[0]['row']);
      //print_r( $matriz);
    ?>
    </table>
    
    
</div>

</div>
<?php echo $pag; ?>

</div>
