function mostrar_reporte()
{
  var a_=  $("#opcion_id").attr("value");
  var id_= $("#id_").attr("value");
  getiTable_("tb_reporte", "index.php", "Reporte", "get_report", id_+'&opcion='+a_, 1, false, true, false);
  $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Reporte',
            action:'get_report_draw',
            p:1,
            q:id_,
            opcion:a_
        },
        beforeSend:function (data){

        },
        success: function(data){
            drawn_bar_("report_space", data, "Reporte", "Reporte", "X", "Cantidad");
        }
    });

}
function mostrar_excel()
{
  var a_=  $("#opcion_id").attr("value");
  var id_= $("#id_").attr("value");
  location.href= "index.php"+'?controller='+"Reporte"+'&action='+"get_report_excel"+'&q='+id_+'&opcion='+a_+'&p=1';
}