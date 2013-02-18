$(function(){
    tabs = new Array(1,2,3,4,5);
    $( "#container" ).tabs({disabled:tabs});
    nro = $("#num").val();    
    $.get("index.php","controller=Unicri&action=verifica&nro="+nro,function(data){
        
            if(data.res=="1")
                {
                    
                    $("#zona").attr("value",data.zona);
                    $("#num").attr("value",nro);
                    $("#divnro").show("slow");
                    $("#nencuenta").attr("value",nro);
                    $("#nameencuestador1").attr("value",data.encuestador);
                    $("#codeencuestador1").attr("value",data.idencuestador);
                    $("#fecha").attr("value",data.fecha);
                    $("#nameentrevistado").attr("value",data.encuestado);
                    $("#manzana").val(data.manzana);
                    $("#direccion").attr("value",data.direccion);
                    $("#telefono").attr("value",data.telefono);
                    $("#fielconf").css("display","none");
                    $("#tipo_zona").val(data.tipo_zona);
                    $("#tipo_vivienda").val(data.tipo_vivienda);
                    $("#rechazos").val(data.rechazos);
                    $("#perdidas").val(data.perdidas)
                    $("#motivacion").val(data.motivaciones);
                    $("#supervisor").val(data.supervisor);
                    $("#idsupervisor").val(data.idsupervisor);
                }
              else {
                    $("#fielconf").css("display","block");
                    $("#zona").attr("value","");
                    $("#num").attr("value","");
                    $("#divnro").hide("slow");                    
                    $("#nameencuestador1").attr("value","");
                    $("#codeencuestador1").attr("value","");
                    $("#fecha").attr("value","");
                    $("#nameentrevistado").attr("value","");
                    $("#direccion").attr("value","");
                    $("#telefono").attr("value","");
                    
                     $("#tipo_zona").val("");
                    $("#tipo_vivienda").val("");
                    $("#rechazos").val("");
                    $("#perdidas").val("")
                    $("#motivacion").val("");
                    $("#supervisor").val("");
                    $("#idsupervisor").val("");
                }

              $.get("index.php","controller=Unicri&action=loadTabs",function(tabs)
                    {
                       
                        finaltab = 0;                        
                        $.each(tabs, function(i,j){
                            $( "#container" ).tabs("enable",j);                          
                            finaltab = j;                            
                        });      
                        
                        if(finaltab<5)
                            {
                                if(finaltab>0){
                                nro = $("#num").val();                                  
                                if(nro!=""){                    
                                    $("#container").tabs("enable",(finaltab+1));
                                    $("#container").tabs({selected:(finaltab+1)});               

                                    }
                                }
                                else {
                                    if(nro!=""){ 
                                        $("#container").tabs("enable",(finaltab+1));
                                        $("#container").tabs({selected:(finaltab+1)});  
                                     }
                                  }
                                
                            }
                         else {
                             $("#container").tabs({selected:finaltab});}                        
                    },'json')

        },'json');
        
    $("#nencuenta").change(function(){
        nro = $(this).val();
        $.get("index.php","controller=Unicri&action=verifica&nro="+nro,function(data){
            
            if(data.res=="1")
                {
                    $("#zona").attr("value",data.zona);
                    $("#num").attr("value",nro);
                    $("#divnro").show("slow");
                    $("#nameencuestador1").attr("value",data.encuestador);
                    $("#codeencuestador1").attr("value",data.idencuestador);
                    $("#fecha").attr("value",data.fecha);
                    $("#nameentrevistado").attr("value",data.encuestado);
                    $("#direccion").attr("value",data.direccion);
                    $("#telefono").attr("value",data.telefono);
                    $("#manzana").val(data.manzana+"K");
                    $("#fielconf").css("display","none");
                        $("#tipo_zona").val(data.tipo_zona);
                    $("#tipo_vivienda").val(data.tipo_vivienda);
                    $("#rechazos").val(data.rechazos);
                    $("#perdidas").val(data.perdidas)
                    $("#motivacion").val(data.motivaciones);
                    $("#supervisor").val(data.supervisor);
                    $("#idsupervisor").val(data.idsupervisor);
                }
             else {$("#fielconf").css("display","block");
                    $("#zona").attr("value","");
                    $("#num").attr("value","");
                    $("#divnro").hide("slow");                    
                    $("#nameencuestador1").attr("value","");
                    $("#codeencuestador1").attr("value","");
                    $("#fecha").attr("value","");
                    $("#nameentrevistado").attr("value","");
                    $("#direccion").attr("value","");
                    $("#telefono").attr("value","");
                    $("#tipo_zona").val("");
                    $("#tipo_vivienda").val("");
                    $("#rechazos").val("");
                    $("#perdidas").val("")
                    $("#motivacion").val("");
                    $("#supervisor").val("");
                    $("#idsupervisor").val("");
                }

                $.get("index.php","controller=Unicri&action=loadTabs",function(tabs)
                    {
                        
                        finaltab = 0;
                        $.each(tabs, function(i,j){
                            $( "#container" ).tabs("enable",j);
                            finaltab = j;
                        });
                        if(finaltab<5)
                            {
                              nro = $("#num").val();   
                                if(nro!=""){                                
                                $("#container").tabs("enable",(finaltab+1));
                                $("#container").tabs({selected:(finaltab+1)});
                                }
                            }
                         else {
                             $("#container").tabs({selected:finaltab});
                         }

                    },'json');

        },'json');
    });
    
     $('#dialog').dialog({
                    draggable: true,
                    modal:true,
                    autoOpen: false,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false,
                    buttons: {"Ok": function() {
				$(this).dialog("close");
                         }
                    }
                });
    $("#container").tabs(
                        {ajaxOptions: { error: function(xhr, status, index, anchor) { $(anchor.hash).html();}}},
                        {fx: {opacity: 'toggle'}},
                        {spinner: 'Cargando...'}
                    );   
     
     
     
   $( "#nameencuestador1" ).autocomplete({
			minLength: 0,
			source: "index.php?controller=Encuestador&action=Search_u",
			focus: function( event, ui ) {
				$( "#nameencuestador1" ).val( ui.item.name );
				return false;
			},
			select: function( event, ui ) {
				$( "#nameencuestador1" ).val( ui.item.name );
				$( "#codeencuestador1" ).val( ui.item.id );
				return false;
			}
		}).data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.name + "</a>" )
				.appendTo( ul );
		};
                
    
       $( "#supervisor" ).autocomplete({
			minLength: 0,
			source: "index.php?controller=Encuestador&action=Search_s",
			focus: function( event, ui ) {
				$( "#supervisor" ).val( ui.item.name );
				return false;
			},
			select: function( event, ui ) {
				$( "#supervisor" ).val( ui.item.name );
				$( "#idsupervisor" ).val( ui.item.id );
				return false;
			}
		}).data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.name + "</a>" )
				.appendTo( ul );
		};
    
    
   $("#fecha").datepicker({dateFormat: 'dd/mm/yy'});
   
   $("#Grabar").click(function(){        
        str = $("#frm").serializeArray();
        bval = true;
        bval = bval && $("#nencuenta").required();
        bval = bval && $("#fecha").required();
        bval = bval && $("#nameentrevistado").required();
        bval = bval && $("#direccion").required();
        bval = bval && $("#telefono").required();
        bval = bval && $("#departamento").required();
        bval = bval && $("#provincia").required();
        bval = bval && $("#distrito").required();
        bval = bval && $("#zona").required();
        bval = bval && $("#manzana").required();
        bval = bval && $("#codeencuestador1").required();
        bval = bval && $("#tipo_zona").required();
        bval = bval && $("#tipo_vivienda").required();
        bval = bval && $("#motivacion").required();
        bval = bval && $("#idsupervisor").required();
        if(bval){
        $.get("index.php",{'controller':'Unicri','action':'save_cabecera','data': str},function(data){           
            $("#response").empty().append(data);
          if(data.res=='1'){
              $("#num").attr("value",data.nro);
              $("#divnro").show("slow");
              //$("#seccion1").append('<div class="ui-widget-overlay" style="z-index: 1001; width: 877px; height: 95%; top: 33px "></div>');
              $( "#container" ).tabs({disabled:[2,3,4,5]});
              $( "#container" ).tabs({selected:1});              
          }
                else {msgerror(data.msg)}
            },'json');
        }
   });
    $('#departamento').change(function(){
            val = $(this).val();
            val = val.substring(0,2);
            $("#provincia").empty();
            $("#distrito").empty();
            $.get("index.php","controller=Unicri&action=ajax_provincia&query=" + val,function(data){
                $("#provincia").append(data);                
            });
            return false;
        });        
    $("#provincia").change(function(){
        val = $(this).val();
        val = val.substring(0,4);        
        $.get("index.php","controller=Unicri&action=ajax_distritos&query="+val,function(data){            
                $("#distrito").empty().append(data);
            });
            return false;
    });
   
   

});
