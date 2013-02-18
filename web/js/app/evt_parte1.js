$(document).ready(function(){
                $("#cr003100,#cr002700,#cr002600,#cr003400,#cr003600,#cr003900,#cr004200,#cr004400,#cr004700,#cr004900,#cr005200,#cr005500,#cr005800,#cr005900,#cr006200,#cr006300,#cr006600,#cr006900,#cr007200").buttonset();
                $("#frmpart1").submit(function(){
                    bval = true;
                    if(bval){if(!$("#cr002600").validateradiobutton()){bval=false;}}                    
                    if(bval && $("#cpreg002700").css("display")!="none"){if(!$("#cr002700").validateradiobutton()){bval=false;}}
                    if($("#cpreg002800").css("display")!="none"){bval = bval && $("#002800").required();}
                    if($("#cpreg002900").css("display")!="none"){bval = bval && $("#002900").required();}
                    if($("#cpreg003000").css("display")!="none"){bval = bval && $("#003000").required();}
                    if($("#cpreg003100").css("display")!="none"){if(bval){if(!$("#cr003100").validateradiobutton()){bval=false;}}}
                    if($("#cpreg003200").css("display")!="none"){bval = bval && $("#003200").required();}
                    if($("#cpreg003300").css("display")!="none"){bval = bval && $("#003300").required();}
                    if($("#cpreg003400").css("display")!="none"){if(bval){if(!$("#cr003400").validateradiobutton()){bval=false;}}}
                    if($("#cpreg003500").css("display")!="none"){bval = bval && $("#003500").required();}
                    if($("#cpreg003600").css("display")!="none"){if(bval){if(!$("#cr003600").validateradiobutton()){bval=false;}}}
//                    if($("#cpreg003700").css("display")!="none"){bval = bval && $("#003700").required();}
//                    if($("#cpreg003800").css("display")!="none"){bval = bval && $("#003800").required();}
                    if($("#cpreg003900").css("display")!="none"){if(bval){if(!$("#cr003900").validateradiobutton()){bval=false;}}}
                    if($("#cpreg004000").css("display")!="none"){bval = bval && $("#004000").required();}
                    if($("#cpreg004100").css("display")!="none"){bval = bval && $("#004100").required();}
                    if($("#cpreg004200").css("display")!="none"){if(bval){if(!$("#cr004200").validateradiobutton()){bval=false;}}}
                    if($("#cpreg004300").css("display")!="none"){bval = bval && $("#004300").required();}
                    if($("#cpreg004400").css("display")!="none"){if(bval){if(!$("#cr004400").validateradiobutton()){bval=false;}}}
//                    if($("#cpreg004500").css("display")!="none"){bval = bval && $("#004500").required();}
//                    if($("#cpreg004600").css("display")!="none"){bval = bval && $("#004600").required();}
                    if($("#cpreg004700").css("display")!="none"){if(bval){if(!$("#cr004700").validateradiobutton()){bval=false;}}}
                    if($("#cpreg004800").css("display")!="none"){bval = bval && $("#004800").required();}
                    if($("#cpreg004900").css("display")!="none"){if(bval){if(!$("#cr004900").validateradiobutton()){bval=false;}}}
//                    if($("#cpreg005000").css("display")!="none"){bval = bval && $("#005000").required();}
//                    if($("#cpreg005100").css("display")!="none"){bval = bval && $("#005100").required();}
                    if($("#cpreg005200").css("display")!="none"){if(bval){if(!$("#cr005200").validateradiobutton()){bval=false;}}}
                    if($("#cpreg005300").css("display")!="none"){bval = bval && $("#005300").required();}
                    if($("#cpreg005400").css("display")!="none"){bval = bval && $("#005400").required();}
                    if($("#cpreg005500").css("display")!="none"){if(bval){if(!$("#cr005500").validateradiobutton()){bval=false;}}}
                    if($("#cpreg005600").css("display")!="none"){bval = bval && $("#005600").required();}
                    if($("#cpreg005700").css("display")!="none"){bval = bval && $("#005700").required();}
                    if($("#cpreg005800").css("display")!="none"){if(bval){if(!$("#cr005800").validateradiobutton()){bval=false;}}}
                    if($("#cpreg005900").css("display")!="none"){if(bval){if(!$("#cr005900").validateradiobutton()){bval=false;}}}
                    if($("#cpreg006000").css("display")!="none"){bval = bval && $("#006000").required();}
                    if($("#cpreg006100").css("display")!="none"){bval = bval && $("#006100").required();}
                    if($("#cpreg006200").css("display")!="none"){if(bval){if(!$("#cr006200").validateradiobutton()){bval=false;}}}
                    if($("#cpreg006300").css("display")!="none"){if(bval){if(!$("#cr006300").validateradiobutton()){bval=false;}}}
                    if($("#cpreg006400").css("display")!="none"){bval = bval && $("#006400").required();}
                    if($("#cpreg006500").css("display")!="none"){bval = bval && $("#006500").required();}
                    if($("#cpreg006600").css("display")!="none"){if(bval){if(!$("#cr006600").validateradiobutton()){bval=false;}}}
                    if($("#cpreg006700").css("display")!="none"){bval = bval && $("#006700").required();}
                    if($("#cpreg006800").css("display")!="none"){bval = bval && $("#006800").required();}
                    if($("#cpreg006900").css("display")!="none"){if(bval){if(!$("#cr006900").validateradiobutton()){bval=false;}}}
//                    if($("#cpreg007000").css("display")!="none"){bval = bval && $("#007000").required();}
//                    if($("#cpreg007100").css("display")!="none"){bval = bval && $("#007100").required();}
                    if($("#cpreg007200").css("display")!="none"){if(bval){if(!$("#cr007200").validateradiobutton()){bval=false;}}}
                    if($("#cpreg007300").css("display")!="none"){bval = bval && $("#007300").required();}
                    if($("#cpreg007400").css("display")!="none"){bval = bval && $("#007400").required();}
                    if(bval){
                    str = $(this).serializeArray();
                    $.get("index.php",{'controller':'Unicri','action':'save_parte1','data': str},function(data){
                        //$("#resultados").empty().append(data);
                        if(data.res=="1"){
                            $("#container").tabs({disabled:[5]});
                            $( "#container" ).tabs({selected:4});
                                }
                            else {msgerror(data.msg);}
                    },'json');
                    }
                    return false;
                });

                $(".cfam input:radio").click(function(){                    
                    name = $(this).attr("name");
                    value = $(this).val();
                    r = value.substr(4,2);
                    if(parseInt(r)=="1"){
                        cad = name.split("_");
                        n = parseFloat(cad[0])+100;                        
                        $('input[name|="00'+n+'_'+cad[1]+'"]').removeAttr("disabled");
                    }
                     else {
                        cad = name.split("_");
                        n = parseFloat(cad[0])+100;
                        //$('input[name|="00'+n+'_'+cad[1]+'"]').each(function(){$(this).removeAttr("checked");});
                        $('input[name|="00'+n+'_'+cad[1]+'"]').attr("disabled",true);
                     }
                });

                $(".clearr").click(function(){                     
                     name = $(this).attr("title");
                     $('input[name|="'+name+'"]').each(function(){$(this).removeAttr("checked");});
                     cad = name.split("_");
                     n = parseFloat(cad[0])+100;
                     //$('input[name|="00'+n+'_'+cad[1]+'"]').each(function(){$(this).removeAttr("checked");});
                     $('input[name|="00'+n+'_'+cad[1]+'"]').attr("disabled",true);
                });

                //Eventos para "Robo de Vivienda"                
                $('input[name|="002600"]').click(function(){
                   valor = $("input[name='002600']:checked").val();
                   $("#002900").attr("disabled",false);
                  if(valor!=1){
                      $("#002900,#003000").val("");
                      $("#cpreg002700,#cpreg002800,#cpreg002900,#cpreg003000").hide("slow");
                  }
                    else {$("#cpreg002700,#cpreg002800,#cpreg002900,#cpreg003000").show("slow");
                        $('input[name=002700]:radio').each(function(){$(this).removeAttr("checked");});
                        $("#cr002700").buttonset("destroy").buttonset();                        
                    }
                });
                $('input[name|="002700"]').click(function(){
                  valor = $("input[name='002700']:checked").val();
                  if(valor==1){$("#cpreg002800").hide("slow");}
                    else {$("#cpreg002800").show("slow");}
                });
                $("#002900").change(function(){
                    if($(this).val()!=0){
                    if($(this).val()==1)
                        {$("#cpreg003000").show("slow");
                        $("#003000").attr("disabled",false);}
                     else {$("#cpreg003000").hide("slow");}
                    }
                    else {$("#003000").attr("disabled",true);$("#cpreg003000").show("slow");}
                });                 
                // Eventos para Tentativa de Robo de Vivienda                
                $('input[name|="003100"]').click(function(){
                  valor = $("input[name='003100']:checked").val();
                  $("#003200").attr("disabled",false);
                  if(valor!=1){
                      $("#003200,#003300").val("");
                      $("#cpreg003200,#cpreg003300").hide("slow");
                  }
                    else {$("#cpreg003200,#cpreg003300").show("slow");}
                });
                $("#003200").change(function(){
                    if($(this).val()!=0){
                    if($(this).val()==1)
                        {$("#cpreg003300").show("slow");
                         $("#003300").attr("disabled",false);}
                     else {$("#cpreg003300").hide("slow");}
                    }
                    else {
                        $("#003300").attr("disabled",true);
                        $("#cpreg003300").show("slow");
                    }
                });                
                // Eventos para ROBO DE VEHÍCULOS AUTOMOTORES                
                $('input[name|="003400"]').click(function(){
                  valor = $("input[name='003400']:checked").val();
                  $("#003500").attr("disabled",false);
                  if(valor!=1){
                      $("#003500").val("");
                      $('input[name=003600]:radio').resetbuttonset('#cr003600');
                      $("#cpreg003500,#cpreg003600,#cpreg003700,#cpreg003800,#cpreg003900,#cpreg004000,#cpreg004100").hide("slow");}
                    else {$("#cpreg003500,#cpreg003600,#cpreg003700,#cpreg003800,#cpreg003900,#cpreg004000,#cpreg004100").show("slow");}
                });
                $('input[name|="003600"]').click(function(){
                    $("#003700").attr("disabled",false);
                  valor = $("input[name='003600']:checked").val();
                  if(valor!=1){$("#cpreg003700,#cpreg003800").hide("slow");}
                    else {$("#cpreg003700,#cpreg003800").show("slow");}
                });
                $("#003700").change(function(){
                    if($(this).val()!=0){
                    $("#003800").attr("disabled",false);                    
                    if($(this).val()==1)
                    {$("#cpreg003800").show("slow");}
                        else {$("#cpreg003800").hide("slow");}
                    }
                    else {$("#003800").attr("disabled",true);$("#cpreg003800").show("slow");}
                });
                // Eventos para ROBO DE OBJETOS EN VEHÍCULOS AUTOMOTORES                
                $('input[name|="003900"]').click(function(){
                    $("#004000").attr("disabled",false);
                   valor = $("input[name='003900']:checked").val();
                  if(valor!=1){$("#cpreg004000,#cpreg004100").hide("slow");}
                    else {$("#cpreg004000,#cpreg004100").show("slow");}
                });
                $("#004000").change(function(){
                    if($(this).val()!=0){
                    if($(this).val()==1)
                    {$("#cpreg004100").show("slow");
                        $("#004100").attr("disabled",false);
                    }
                        else {$("#cpreg004100").hide("slow");}}
                    else {$("#004100").attr("disabled",true);$("#cpreg004100").show("slow");}
                });
                // Eventos para ROBO DE MOTOCICLETAS / MOTOTAXI
               $('input[name="004200"]').click(function(){
                   $("#004300").attr("disabled",false);
                  valor = $("input[name='004200']:checked").val();
                 if(valor!=1){$("#cpreg004300,#cpreg004400,#cpreg004500,#cpreg004600").hide("slow");}
                    else {$("#cpreg004300,#cpreg004400,#cpreg004500,#cpreg004600").show("slow");}
                });
                 $('input[name|="004400"]').click(function(){
                     $("#004500").attr("disabled",false);
                   valor = $("input[name='004400']:checked").val();
                  if(valor!=1){$("#cpreg004500,#cpreg004600").hide("slow");}
                    else {$("#cpreg004500,#cpreg004600").show("slow");}
                });
                $("#004500").change(function(){
                    if($(this).val()!=0){
                    if($(this).val()==1)
                    {$("#cpreg004600").show("slow");
                     $("#004600").attr("disabled",false);}
                        else {$("#cpreg004600").hide("slow");}}
                    else {$("#004600").attr("disabled",true);$("#cpreg004600").show("slow");}
                });
                //Eventos para ROBO DE BICICLETAS
                $('input[name="004700"]').click(function(){
                    $("#004800").attr("disabled",false);
                    valor = $("input[name='004700']:checked").val();
                    if(valor!=1){$("#cpreg004800,#cpreg004900,#cpreg005000,#cpreg005100").hide("slow");}
                    else {$("#cpreg004800,#cpreg004900,#cpreg005000,#cpreg005100").show("slow");}
                });
                $('input[name="004900"]').click(function(){
                    $("#005000").attr("disabled",false);
                    valor = $("input[name='004900']:checked").val();
                    if(valor!=1){$("#cpreg005000,#cpreg005100").hide("slow");}
                    else {$("#cpreg005000,#cpreg005100").show("slow");}
                });
                $("#005000").change(function(){
                   if($(this).val()!=0){

                   if($(this).val()==1)
                    {$("#cpreg005100").show("slow");$("#005100").attr("disabled",false);}
                        else {$("#cpreg005100").hide("slow");}
                }else {$("#005100").attr("disabled",true);$("#cpreg005100").show("slow");}}
                );
                //Eventos para ROBO CON VIOLENCIA
                $('input[name="005200"]').click(function(){
                    $("#005300").attr("disabled",false);
                    valor = $("input[name='005200']:checked").val();
                    if(valor!=1){$("#cpreg005300,#cpreg005400").hide("slow");}
                    else {$("#cpreg005300,#cpreg005400").show("slow");}
                });
                $("#005300").change(function(){
                    if($(this).val()!=0){
                   if($(this).val()==1)
                    {$("#cpreg005400").show("slow");
                     $("#005400").attr("disabled",false);}
                        else {$("#cpreg005400").hide("slow");}
                    }
                    else {$("#005400").attr("disabled",true);$("#cpreg005400").show("slow");}
                    });
                //Eventos para ROBO SIN VIOLENCIA
                $('input[name="005500"]').click(function(){
                    $("#005600").attr("disabled",false);
                    valor = $("input[name='005500']:checked").val();
                    if(valor!=1){$("#cpreg005600,#cpreg005700").hide("slow");}
                    else {$("#cpreg005600,#cpreg005700").show("slow");}
                });
                $("#005600").change(function(){
                    if($(this).val()!=0){
                   if($(this).val()==1)
                    {$("#cpreg005700").show("slow");$("#005700").attr("disabled",false);}
                        else {$("#cpreg005700").hide("slow");}
                    }
                    else {
                        $("#005700").attr("disabled",true);
                        $("#cpreg005700").show("slow");
                    }
                });
                //Eventos para AMENAZAS
                $('input[name="005800"]').click(function(){
                    valor = $("input[name='005800']:checked").val();
                    valor2 = $("input[name='005900']:checked").val();                    
                    if(valor==1){
                        $("#cpreg006000").show("slow");
                        $("#cpreg006100").show("slow");
                        $("#006000").attr("disabled",false);
                    }
                    else {
                        if(valor2==1){$("#cpreg006000").show("slow");
                                        $("#cpreg006100").show("slow");
                                        $("#006000").attr("disabled",false);}
                            else {
                                if(valor2==2||valor2==3||valor2==4)
                                    {
                                        $("#cpreg006000").hide("slow");
                                        $("#cpreg006100").hide("slow");
                                    }
                                  else {$("#006000").attr("disabled","true");}
                            }
                        }
                });
                $('input[name="005900"]').click(function(){
                    valor = $("input[name='005800']:checked").val();
                    valor2 = $("input[name='005900']:checked").val();
                    if(valor==1){$("#cpreg006000").show("slow");
                        $("#cpreg006100").show("slow");
                        $("#006000").attr("disabled",false);}
                    else {
                        if(valor2==1){
                            $("#cpreg006000").show("slow");
                            $("#cpreg006100").show("slow");
                            $("#006000").attr("disabled",false);}
                            else {
                                if(valor2==2||valor2==3||valor2==4)
                                    {
                                        $("#cpreg006000").hide("slow");
                                        $("#cpreg006100").hide("slow");
                                    }
                                  else {$("#006000").attr("disabled","true");}
                            }
                        }
                });
                $("#006000").change(function(){
                    if($(this).val()!=0)
                        {
                         $("#006100").attr("disabled",false);
                         if($(this).val()==1){$("#cpreg006100").show("slow");}
                            else {$("#cpreg006100").hide("slow");}
                        }
                     else {$("#006100").attr("disabled",true);
                           $("#cpreg006100").show("slow");}
                });
                //Eventos para LESIONES
                $('input[name="006200"]').click(function(){
                    valor = $("input[name='006200']:checked").val();
                    valor2 = $("input[name='006300']:checked").val();
                    if(valor==1){
                        $("#cpreg006400").show("slow");
                        $("#cpreg006500").show("slow");
                        $("#006400").attr("disabled",false);
                    }
                    else {
                        if(valor2==1){$("#cpreg006400").show("slow");
                                        $("#cpreg006500").show("slow");
                                        $("#006400").attr("disabled",false);}
                            else {
                                if(valor2==2||valor2==3||valor2==4)
                                    {
                                        $("#cpreg006400").hide("slow");
                                        $("#cpreg006500").hide("slow");
                                    }
                                  else {$("#006400").attr("disabled","true");}
                            }
                        }
                });
                $('input[name="006300"]').click(function(){
                    valor = $("input[name='006200']:checked").val();
                    valor2 = $("input[name='006300']:checked").val();
                    if(valor==1){$("#cpreg006400").show("slow");
                        $("#cpreg006500").show("slow");
                        $("#006400").attr("disabled",false);}
                    else {
                        if(valor2==1){
                            $("#cpreg006400").show("slow");
                            $("#cpreg006500").show("slow");
                            $("#006400").attr("disabled",false);}
                            else {
                                if(valor2==2||valor2==3||valor2==4)
                                    {
                                        $("#cpreg006400").hide("slow");
                                        $("#cpreg006500").hide("slow");
                                    }
                                  else {$("#006400").attr("disabled","true");}
                            }
                        }
                });
                $("#006400").change(function(){
                    if($(this).val()!=0)
                        {
                         $("#006500").attr("disabled",false);
                         if($(this).val()==1){$("#cpreg006500").show("slow");}
                            else {$("#cpreg006500").hide("slow");}
                        }
                     else {$("#006500").attr("disabled",true);
                           $("#cpreg006500").show("slow");}
                });
                //Eventos OFENSAS SEXUALES
                $('input[name="006600"]').click(function(){
                    $("#006700").attr("disabled",false);
                    valor = $("input[name='006600']:checked").val();
                    if(valor==1){$("#cpreg006700").show("slow");
                                $("#cpreg006800").show("slow");}
                        else {$("#cpreg006700").hide("slow");
                              $("#cpreg006800").hide("slow");}
                });
                $("#006700").change(function(){
                    if($(this).val()!=0){
                        $("#006800").attr("disabled",false);
                        if($(this).val()==1){$("#cpreg006800").show("slow");}
                            else{$("#cpreg006800").hide("slow");}
                    }
                      else {$("#006800").attr("disabled",true);}
                });
                //Eventos para SECUESTRO
                 $('input[name="006900"]').click(function(){
                    $("#007000").attr("disabled",false);
                    valor = $("input[name='006900']:checked").val();
                    if(valor!=1){$("#cpreg007000,#cpreg007100").hide("slow");}
                        else {$("#cpreg007000,#cpreg007100").show("slow");}
                 });
                 $("#007000").change(function(){                     
                     if($(this).val()!=0){
                         $("#007100").attr("disabled",false);
                         if($(this).val()==1){$("#cpreg007100").show("slow");}
                            else {$("#cpreg007100").hide("slow");}
                     }
                      else {
                          $("#007100").attr("disabled",true);
                      }
                 });
                 //EVENTOS DE TENTATIVA DE SECUESTRO
                 $('input[name="007200"]').click(function(){
                      $("#007300").attr("disabled",false);
                      valor = $("input[name='007200']:checked").val();
                      if(valor==1){$("#cpreg007300,#cpreg007400").show("slow");}
                        else {$("#cpreg007300,#cpreg007400").hide("slow");}
                 });
                 $('#007300').change(function(){
                     if($(this).val()!=0){
                     if($(this).val()==1){
                        $("#007400").attr("disabled",false);
                        $("#cpreg007400").show("slow");
                    }
                        else {$("#cpreg007400").hide("slow");}
                     }
                     else {
                            $("#cpreg007400").show("slow");
                            $("#007400").attr("disabled",true);
                        }
                 });
                //Fin de document.ready
               });
function verf(id)
{
    if(!$("#"+id).attr("disabled"))
        {
            if($("#"+id).val()!=""){msg("Complete los campos");$("#")}
        }
}