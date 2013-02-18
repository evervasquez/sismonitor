<script type="text/javascript" src="js/utiles.js"></script>
<script type="text/javascript" src="js/highcharts.js"></script>
<script type="text/javascript" src="js/app/evt_form_reporte.js"></script>
<script type="text/javascript" src="js/app/evt_reporte.js"></script>
<script type="text/javascript">
    $(function(){
	$(".btn_other").button();
        //$( "#q" ).focus();
    });
    $(document).ready(function(){
        var id_= $("#id_").attr("value");
        getiTable_("tb_reporte", "index.php", "Reporte", "get_report", id_, 1, false, true, false);
 
        
    });
</script>

<div class="div_container">
<h6 class="ui-widget-header">REPORTE: <strong><?php echo $titulo.'</strong> -- '.$subtitulo; ?></h6>
<div class="contain">
<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
    <form action="" method="GET">
        <input type="hidden" name="controller" value="Modulo" />
        <input type="hidden" name="action" value="index" />
        <input type="hidden" name="p" value="1" />
        <div class="cnt_reporte">
             <div class="cnt_alternativa" >
                Reporte por:
                <select id="opcion_id" name="opcion_id">
                   <?php echo $opciones; ?>
                </select>     
                <a href="javascript:mostrar_reporte()" class="btn_other">Mostrar</a>
                <a href="javascript:mostrar_excel()" class="btn_other">Exportar</a>
            </div>
            <div class="cnt_table">
                <table id="tb_reporte" class="ui-widget ui-widget-content">
                    <thead class="ui-widget ui-widget-content ui-widget-header"></thead>
                    <tbody></tbody>
                </table>
            </div>
            <div class="cargando"></div>
        </div>
    </form>
    
</div>
    <div id="report_space" style="width: 800px;margin-left:50px;height:650px;">
            
    </div>
<div>
    <input type="hidden" id="id_" value="<?php echo $id_; ?>" />
</div>
</div>


</div>
