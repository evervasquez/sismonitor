/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var n_item_observacion=0;
$(function(){
    //*****************************
    //$("#btn_enca_id").css("display", "none");
    $("#btn_doc_id_entrevistado").css("display", "none");

    var obj= new efectos();
        obj.aparecer("#enca_id","#btn_enca_id");
        obj.desaparecer("#btn_enca_id","#btn_enca_id");
        
        obj.aparecer("#set_doc_id_entrevistado","#btn_doc_id_entrevistado");
        obj.desaparecer("#btn_doc_id_entrevistado","#btn_doc_id_entrevistado");
    //*****************************
    
    
    
    $("#dep_id").bind('blur click',function(){
        var dep_id = $(this).val();
        cmbLoadAjax("index.php","#prov_id",{
            controller:'Instrumento',
            action:'getListaProvincias',
            id:dep_id
        });
        set_cookie("dep",dep_id);
    });
    $("#prov_id").bind('blur click',function(){
        var pov_id = $(this).val();
        cmbLoadAjax("index.php","#dist_id",{
            controller:'Instrumento',
            action:'getListaDistritos',
            id:pov_id
        });
        
        if(pov_id!=null){
            set_cookie("prov",pov_id);
        }
    });
     
    $("#dist_id").bind('blur click',function(){
        var dist_id = $(this).val();
        if(!isNaN(dist_id)){
            set_cookie("dist",dist_id);
        }
    });
    
    $("#tipo_escuela").change(function (){
        var tip_id= $(this).val();
       
        if(tip_id=='U')
        {
            $(".is_uni").attr('disabled', 'disabled');
            $(".is_uni").attr('background-color', '#ccc');
        }
        else
        {
            $('.is_uni').removeAttr('disabled');
            $(".is_uni").attr('background-color', 'white');
        }
    });
     
    $("#alt-PREGUNTA[63]").addClass("all");
    $("#enca_fecha" ).datepicker({
        changeYear:true, 
        changeMonth:true
    });
    $("#enca_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    }); 
    $("#enca_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    }); 
    
    $("#frm_instrumento_send").submit(function(e){
        e.preventDefault();
        
        var bval = true;
//        bval = bval && $( "#enca_id").required();
//        bval = bval && $( "#inst_id").required();
//        bval = bval && $( "#enca_grado").required();
//        bval = bval && $( "#seccion").required();
//        bval = bval && $( "#enca_nivel").required();
//        bval = bval && $( "#enca_total_est").required();
//        bval = bval && $( "#lugar").required();
//        bval = bval && $( "#inst_id").required();
//        bval = bval && $( "#set_doc_id_entrevistado").required();
//        bval = bval && $( "#set_doc_id_entrevistadord").required();
//        bval = bval && $( "#enca_ini").required();
//        bval = bval && $( "#enca_fin").required();
//        bval = bval && $( "#enca_fecha").required();
//        var isChecked;                
//        var groups = {}
//        $("#frm_instrumento_send input:radio").each(function () {
//            groups[this.name] = true;
//        });
//        $(".ui-state-error set").remove();
//
//        for (group in groups) {
//            var radioButttons = $(":radio[name=" + group + "]").is(':checked');
//            isChecked = radioButttons;
//            var b_= group.split('_');
//            var c_= b_[1];
//            $("#error_"+c_+"").remove();
//            if (!isChecked) {
//                var a_=$("<tr class='ui-state-error set' id='error_"+c_+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
//                $("#alt_"+c_+"").append(a_);
//            }
//            else {
//
//            }
//        }
         
	
         
        if(bval){
            var data_ = $("#frm_instrumento_send").serializeArray();
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType:"json",
                data: {
                    controller:'Instrumento',
                    action:'save_encavezado',
                    data:data_
                },
                beforeSend:function (data){
                    msg_alert_a("Guardando ... ", 120);
              
                },
                success: function(data_){
                    $("#pop_msg_").dialog("close").remove();
                 
                    if($("#action").val()=="create"){  
                      
                  
                        if(data_.result==true)
                        {
                      
                            msg_alert_a("Se registro datos del instrumento correctamente con el ID : <strong>"+data_.id_+"</strong>", 120);
                            location.href="index.php?controller=Instrumento&action=show&id="+$( "#ins_id").val();
                        }
                        else
                        {
                            msg_alert_a("Los datos no fueron guardados, por favor intente nuevamente ", 120);
                        }
                    }
                    else
                    {
                      
                        if(data_.result==true)
                        {
                            msg_alert_a("Se actualizo datos del instrumento correctamente con el ID : <strong>"+data_.id_+"</strong>", 120);
                        }
                        location.href="index.php?controller=Instrumento&action=show&id="+$( "#ins_id").val();
                      
                      
                    }
                  
                  
                  
                }
                ,
                error:function(data)
                {
                    $("#pop_msg_").dialog("close").remove();
                    msg_alert_a("Los datos no fueron guardados, por favor intente nuevamente", 120);
                }
            });
        }
        else
        {
            msg_alert_a("Debe llenar todos los campos del formulario",120);
        }
    });
    
    //bacan para autocompletar textos;
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_insituciones'
        },
        beforeSend:function (data){
        
        },
        success: function(data_){
           

            $( "#inst-nombre" ).autocomplete({
                minLength: 0,
                source: data_,
                focus: function( event, ui ) {
                $( "#inst-nombre" ).val( ui.item.label );
                return false;
                },
                select: function( event, ui ) {
                $( "#inst-nombre" ).val( ui.item.label );
                $( "#inst_id" ).val( ui.item.value );
                $( "#inst-descripcion" ).val( ui.item.desc );
                $("#lugar").val(ui.item.lug);
                return false;
                }
                })
            .data( "autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
                .appendTo( ul );
            };
        }
    });
        
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_docentes'
        },
        beforeSend:function (data){
        
        },
        success: function(data_){
           

            $( "#set_doc_id_entrevistado" ).autocomplete({
                minLength: 0,
                source: data_,
                focus: function( event, ui ) {
                $( "#set_doc_id_entrevistado" ).val( ui.item.label );
                return false;
                },
                select: function( event, ui ) {
                $( "#set_doc_id_entrevistado" ).val( ui.item.label );
                $( "#doc_id_entrevistado" ).val( ui.item.value );
				
                return false;
                }
                })
            .data( "autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.label +"- "+ item.desc + "</a>" )
                .appendTo( ul );
            };
               
        }
    });
    
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_list_facilitador'
        },
        beforeSend:function (data){
        
        },
        success: function(data_){
           

            $( "#set_doc_id_entrevistador" ).autocomplete({
                minLength: 0,
                source: data_,
                focus: function( event, ui ) {
                $( "#set_doc_id_entrevistador" ).val( ui.item.label );
                return false;
                },
                select: function( event, ui ) {
                $( "#set_doc_id_entrevistador" ).val( ui.item.label );
                $( "#doc_id_entrevistador" ).val( ui.item.value );
				
                return false;
                }
                })
            .data( "autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.label +"- "+ item.desc + "</a>" )
                .appendTo( ul );
            };
               
        }
    });
    
    
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_lugares'
        },
        beforeSend:function (data){
        
        },
        success: function(data_){
            $( "#lugar" ).autocomplete({
                minLength: 0,
                source: data_,
                        
                focus: function( event, ui ) {
                $( "#lugar" ).val( ui.item.label );
                                
                return false;
                },
                select: function( event, ui ) {
                $( "#lugaar" ).val( ui.item.label );
                $( "#enca_lugar" ).val( ui.item.value );
				
                return false;
                },
                change: function( event, ui ) {
                if( ui.item==null)
                {
                $( "#enca_lugar" ).val( -1);
                }
                return false;
                }
                })
            .data( "autocomplete" )._renderItem = function( ul, item ) {
                return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.label +"- "+ item.desc + "</a>" )
                .appendTo( ul );
            };
        }
    });
    setValue_("#dep_id", get_cookie("dep"));
    $("#dep_id").trigger("change");
    setValue_("#prov_id",get_cookie("prov"));
    $("#dep_id").trigger("change");
    setValue_("#dist_id",get_cookie("dist"));
    //$("#enca_fecha").mask("99/99/9999");
    $("#enca_ini").mask("99:99 aa");
    $("#enca_fin").mask("99:99 aa");
        
    var action_= $("action").val();
       
    if(action_=="create")
    {
        var id_ = $("#ins_id").val();
        $.ajax({
            type: "GET",
            url: "index.php",
            dataType:"json",
            data: {
                controller:'Instrumento',
                action:'get_data',
                id:id_
            },
            beforeSend:function (data){
            
            },
            success: function(data_){
            
            }
        });  
    }
        
});

function save_instrumento(){
    $("#frm_instrumento_send").submit();
 
}
//****

function inicio_popup2(){
    //mi_popup=window.open('index.php?controller=Personal&action=mostrar_personal_enca','Nombres de Docentes','resizable=yes,width=800,height=300, directories=no');
    //mi_popup.
    //mi_popup.moveTo(330, 180);
     $('#buscar_i').load('index.php?controller=Personal&action=mostrar_personal_enca', function(){
         $('#buscar_i').show("slow")
         $('#q').focus();
    })
    $("#fondooscuro").fadeIn(300);
}

function soloNumeros(evt){
    evt = (evt) ? evt : event; //Validar la existencia del objeto event
    var charCode = (evt.charCode) ? evt.charCode : ((evt.keyCode) ? evt.keyCode : ((evt.which) ? evt.which : 0)); //Extraer el codigo del caracter de uno de los diferentes grupos de codigos
    var respuesta = true; //Predefinir como valido
    if(charCode>31&&(charCode<48||charCode>57)){
        respuesta = false;
    }
    return respuesta;
}
//*****
function agregar_observacion(text_)
{
    search_val();
    n_item_observacion+=1;
    var list_="<tr id='item_"+n_item_observacion+"'><td>"+ n_item_observacion + "<input type='hidden' class='item_observ' value='"+n_item_observacion+ "' />  </td><td><textarea class='text_observacion' id='OBSERVACION_"+ n_item_observacion+"' name='OBSERVACION_"+ n_item_observacion+"' cols='10'>"+text_+"</textarea></td><td>-</td><td><a href='javascript:del_observacion("+n_item_observacion+")' class='btn_edit_'>Eliminar</a></td></tr>";
    var a_= $(list_);
    $("#tb_observaciones").append(a_);
}
function del_observacion(id_)
{
    var max=0;
    $("#item_"+id_+"").remove();
}
function search_val()
{
    var max=0;
    $(".item_observ").each(function(){
        var act= parseInt($(this).val());
        if(act>max){
            max=act;
        }
    });
    n_item_observacion= parseInt(max);
}
function instrumento_search()
{
    var id_=  $("#enca_id").attr("value");
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'search',
            id:id_
        },
        beforeSend:function (data){
            msg_alert_a("Buscando ...");
        },
        success: function(data_){
            $("#pop_msg_").dialog("close").remove();
            if(data_.find==true){
                location.href="index.php?controller=Instrumento&action=editar&id="+id_+"";
            }
            else
            {
                msg_alert_a("Documento de ID:<strong>"+id_+"</strong>, no encontrado");
            }
            
        }
    });  
  
  
}