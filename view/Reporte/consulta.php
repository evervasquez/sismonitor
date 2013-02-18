<link type="text/css" href="css/codemirror.css" rel="stylesheet" />
<script type="text/javascript" src="js/codemirror.js"></script>
<script type="text/javascript" src="js/plsql.js"></script>
<script type="text/javascript">
    $(function(){
        $(".btn_other").button();
        $("#frm_id").submit(function(e)
        {

        });
    });
</script>

<div class="div_container">
    <h6 class="ui-widget-header">REPORTE: <strong><?php echo $titulo.''; ?></h6>
    <div class="contain">
        <div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">

            <form action="" method="GET" id="frm_id">

                <div class="cnt_reporte">

                    <div class="cnt_alternativa" style="margin-top:40px;">

                        <a href="javascript:mostrar_reporte()" class="btn_other">Mostrar</a>
                        <a href="javascript:mostrar_excel()" class="btn_other">Exportar</a>
                    </div>
                    <div class="cnt_table" style="overflow-x:scroll;width:800px;margin: 0px !important;" >
                        <table id="tb_reporte_" class="ui-widget ui-widget-content" style="width: 800px !important;">
                            <thead class="ui-widget ui-widget-content ui-widget-header" style="width: 800px !important;font-size: 9px !important;"></thead>
                            <tbody style="font-size:9px;font-weight:normal !important;  "></tbody>
                        </table>
                    </div>
                </div>
                <input type="hidden"  id="id" name="id" value="<?php echo $id; ?>" />
                <input type="hidden" name="controller" value="Reporte" />
                <input type="hidden" name="action" value="save" />
            </form>

        </div>
        <div id="report_space" style="width: 800px;margin-left:50px;height:650px;">

        </div>
        <div>

        </div>
    </div>

    <script>
        var editor = CodeMirror.fromTextArea(document.getElementById("consulta"), {
            lineNumbers: true,
            matchBrackets: true,
            indentUnit: 1,
            autoClearEmptyLines:true,
            mode: "text/x-plsql",
            onChange:function()
            {
               $("#consulta").text(editor.getValue()) ;
            }
        });

        function mostrar_reporte()
        {
            var id_=$("#id").val();
            getiTable_("tb_reporte_", "index.php", "Reporte", "get_report", id_+"&opcion=consulta", 1, false, true, false);
        }
        function consulta_save(){
            var data_ = $("#frm_id").serializeArray();
            $.ajax({
                type: "GET",
                url: 'index.php',
                dataType:"json",
                data: data_,
                success:function (data__)
                {
                    alert("Guardado");
                }
            });
        }
        function mostrar_excel()
        {
            var id_= $("#id").attr("value");
            location.href= "index.php"+'?controller='+"Reporte"+'&action='+"get_qry_excel"+'&q='+id_+'&opcion=consulta&p=1';
        }
    </script>
</div>
