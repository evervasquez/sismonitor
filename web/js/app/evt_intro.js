    var rep0018 = new  Array(); 
    var rep0022 = new  Array(); //Varible que alamacena las opciones seleccionadas de la pregunta 22
    var rep0023 = new  Array(); //Varible que alamacena las opciones seleccionadas de la pregunta 23
    var rep0024 = new  Array();
    jQuery(function($){   
        
    $(".link-update").bind("click",function(){       
       $(this).css("background","#fafafa");
   })
   
    var cont0022 = 0;
    var cont0023 = 0;
    var cont0018 = 0;
    var cont0024 = 0;
    var num22 = "";
    var num23 = "";
    $('#dialog').dialog({
                    draggable: true,
                    modal:true,
                    autoOpen: false,
                    position:'center',                    
                    title: 'Mensaje',
                    resizable: false,
                    buttons: {"Ok": function() {
				$(this).dialog("close");
                                }}
                });
    $("#cc002300,#cc002200,#cc001800").buttonset();
    $("#frmintro").submit(function(){        
        str = $(this).serializeArray();
        bval = true;
        bval = bval && $("#001000").required();
        bval = bval && $("#001100").required();
        bval = bval && $("#001200").required();
        bval = bval && $("#001300").required();
        bval = bval && $("#001400").required();
        bval = bval && $("#001500").required();
        bval = bval && $("#001600").required();
        bval = bval && $("#001700").required();
         if(cont0018<3 && bval==true){$("#msg001800").empty().append("* Debe marcar 3 Items!.");
                        bval=false;
                        msg("Complete la respuesta de la pregunta Nro <b>18</b> !");
                        }
            else {$("#msg001800").empty();}
        bval = bval && $("#001900").required();
        bval = bval && $("#002000").required();
        bval = bval && $("#002100").required();
        if(cont0022<2 && bval==true){$("#msg002200").empty().append("* Debe marcar 2 Items!.");
                                     msg("Complete la respuesta de la pregunta Nro <b>22</b>");
                                    bval=false;}
            else {$("#msg002200").empty();}
        if(cont0023<3 && bval==true){$("#msg002300").empty().append("* Debe marcar 3 Items!.");
                                     msg("Complete la respuesta de la pregunta Nro <b>23</b> !");
                                    bval=false;}
            else {$("#msg002300").empty();}
        if(bval){
        if(!$("#resp24").validateradio({'number':1})){
            if(!$("#problems").validateradio({'number':16}))
               {$("#002401").focus();
                msg("Marque todas de las opciones de los diversos problemas en la pregunta <b>24</b>, en caso de no marcar alguna seleccione el motivo que puede ser 'Otro', 'Ninguno','NS'");
                bval = false;
                }

                }
        }
        if(bval){
        if(!$("#resp24").validateradio({'number':1})){
        if(cont0024<3 && bval==true){$("#msg002400").empty().append("* Debe marcar 3 Problemas principales!.");
                                     msg("Debe seleccionar a tres de los problemas como principales en la pregunta Nro <b>24</b> !");
                                    bval=false;}
            else {$("#msg002400").empty();}}
          }
        if(bval){
          if(confirm("Realmente deseas guardar los datos de esta parte de la encuesta?")){
            dat = new Object();
            
            dat['002200'] = rep0022;
            dat['002300'] = rep0023;
            if(cont0024==3){
                dat['002500'] = rep0024;
                }

             

        $.get("index.php",{'controller':'Unicri','action':'save','data': str},function(data){
              $.get("index.php",{'controller':'Unicri','action':'save_multi','data':dat},function(data){

                 if(data.res=="1"){$( "#container" ).tabs({disabled:[4,5]});
                                   $( "#container" ).tabs({selected:3});}
                       else {
                           msg(data.msg);
                       }
             },'json');
          });
        }}
        return false;
        
    });

    $(".check001800").click(function(){
        ck = $(this).attr("checked");
        if(ck){
            if(cont0018<3){cont0018 +=1;}
            else {
              msg("Solo puede seleccionar 3 items como maximo. Deseleccione alguno para poder seleccionar otros");
              $(this).removeAttr("checked");
              index = $(this).index();
              $('#cc001800 label').eq((index/3)).removeClass("ui-state-active");
                }
            }
        else {cont0018 -=1;}
    });

    $(".check002200").click(function(){
        ck = $(this).attr("checked");
//        $.each(rep0022, function(i,j){
//            alert(i+" => "+j);
//        });
        if(ck){
            if(cont0022<2){
                cont0022 +=1;
                val = $(this).val();
                index = $(this).index();
                text = $('#cc002200 span').eq((index/3)).html();                
                $('#cc002200 span').eq((index/3)).empty().append(cont0022+". "+text);
                rep0022.push(val);
            }
            else {
              msg("Solo puede seleccionar 2 items como maximo. Deseleccione alguno para poder seleccionar otros");
              $(this).removeAttr("checked");
              index = $(this).index();
              $('#cc002200 label').eq((index/3)).removeClass("ui-state-active");
              }
            }
        else {index = $(this).index();
                text = $('#cc002200 span').eq((index/3)).html();
                t = text.length;
                text = text.substring(3,t);
                $('#cc002200 span').eq((index/3)).empty().append(text);
                cont0022 -=1;
                rep0022.pop();
            }
    });

    $(".check002300").click(function(){
        ck = $(this).attr("checked");
//        $.each(rep0023, function(i,j){
//            alert(i+" => "+j);
//        });
        if(ck){
            if(cont0023<3){
                cont0023 +=1;
                val = $(this).val();
                index = $(this).index();
                text = $('#cc002300 span').eq((index/3)).html();
                $('#cc002300 span').eq((index/3)).empty().append(cont0023+". "+text);
                rep0023.push(val);
            }
            else {
              msg("Solo puede seleccionar 3 items como maximo. Deseleccione alguno para poder seleccionar otros");
              $(this).removeAttr("checked");
              index = $(this).index();
              $('#cc002300 label').eq((index/3)).removeClass("ui-state-active");
              }
            }
        else {index = $(this).index();
                text = $('#cc002300 span').eq((index/3)).html();
                t = text.length;
                text = text.substring(3,t);
                $('#cc002300 span').eq((index/3)).empty().append(text);
                cont0023 -=1;
                rep0023.pop();
            }
    })

    $(".prin24").hover(function(){$(this).addClass("ui-state-hover");}, function(){$(this).removeClass("ui-state-hover");})


        $(".prin24").click(function(){

                if($(this).html()=='<span class="ui-icon ui-icon-circle-plus"></span>')
                    {
                        if(cont0024<3){
                           tr = $(this).parent().parent().index();
                           val = null;
                           $.each($('#tproblems tbody tr:eq('+tr+') input:radio'),function(){
                               if($(this).attr("checked")){val = $(this).val();}
                           });
                           if(val==null || val=="Nunca")
                            {
                                msg("No puede agrega este problema como principal ya que no esta marcado como 'Algunas veces', 'Frecuentemente' o 'Siempre'");
                            }
                           else {
                               rep0024[cont0024] = $('#tproblems tbody tr:eq('+tr+') td:eq(0)').text();
                               cont0024 +=1;
                               $(this).empty().append('<span class="ui-icon ui-icon-check"></span>');
                            }
                          }
                     else {msg("Solo puede seleccionar 3 items como maximo!");}
                    }
                 else {
                     cont0024 -=1;
                    $(this).empty().append('<span class="ui-icon ui-icon-circle-plus"></span>');
                 }
            }
        );

  $('input[name|="002400"]').click(function(){
      $("#problems").resetcheckbox();
      $("#problems").resetradio();
      $(".prin24").empty().append('<span class="ui-icon ui-icon-circle-plus"></span>');
      cont0024=0;
  });
  $(".radproblems").click(function(){
      $("#resp24").resetradio();
  })
});