/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
var n_item_observacion=0;
var item=0;
var item_2=0;
var _item=0;

//*********


//****************
function esnulo(v){
    if(isNaN(v)){
        return 0;
    }else{
        return v;
    }
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

function inicio_popup(){
    //mi_popup=window.open('index.php?controller=Institucion&action=mostrar_instituciones','Nombres de Escuelas','resizable=yes,width=720,height=300, directories=no');
    //mi_popup.
    $('#buscar_i').load('index.php?controller=Institucion&action=mostrar_instituciones', function(){
        $('#buscar_i').show("slow")
        $('#q').focus();
    })
    //mi_popup.moveTo(330, 180);
    $("#fondooscuro").fadeIn(400);
}

//*****************
$(function(){
    $("#select_departamento").dialog({
        autoOpen:false,
        width:300,
        height:170,
        resizable:false,
        buttons: [
        {
            text:"Cancelar",
            click: function() {
                $(this).dialog("close");
            }
        },

        {
            text:"Seleccionar",
            click: function() {


                var id_= $("#dist_id_ option:selected").val();
                var idd= $("#dist_id_select").val();
                var part= idd.split('_');
                $("#"+part[0]+'_'+part[1]+'_13').attr("value",id_);

                var name_3= $("#dist_id_ option:selected").text();
                $("#"+part[0]+'_'+part[1]+'_12').attr("value",name_3);
                $(this).dialog("close");
            }
        }
        ]
    });
    $("#tabs").tabs({
        collapsible: true
    });
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
    $("#dep_id_").bind('blur click',function(){
        var dep_id = $(this).val();
        cmbLoadAjax("index.php","#prov_id_",{
            controller:'Instrumento',
            action:'getListaProvincias',
            id:dep_id
        });
    //set_cookie("dep",dep_id);
    });
    $("#prov_id_").bind('blur click',function(){
        var pov_id = $(this).val();
        cmbLoadAjax("index.php","#dist_id_",{
            controller:'Instrumento',
            action:'getListaDistritos',
            id:pov_id
        });

        if(pov_id!=null){
            set_cookie("prov",pov_id);
        }
    });

    $("#dist_id_").bind('blur click',function(){
        var dist_id = $(this).val();
        if(!isNaN(dist_id)){
            set_cookie("dist",dist_id);
        }
    });


    //AGREGADO***********************************
    $("#numero_padres_d").keyup(function(){
        var n_2;
        n_2=parseInt($(this).val()) + esnulo(parseInt($('#numero_padres').val()));
        $('#total_padres').attr('value' ,ifNaN(n_2));
        $('#total_CD').attr('value',esnulo(parseInt($(this).val()))+esnulo(parseInt($('#numero_madres_d').val())));
        $('#total').attr('value', esnulo(parseInt($('#total_CD').val()))+esnulo(parseInt($('#total_SD').val())));
    })

    $("#numero_padres").keyup(function(){
        var n_1,n_2;
        n_1=esnulo(parseInt($(this).val()));
        n_2=esnulo(parseInt($('#numero_padres_d').val()));
        $('#total_padres').attr('value' ,n_1 + n_2);
        $('#total_SD').attr('value',n_1+esnulo(parseInt($('#numero_madres').val())));
        $('#total').attr('value', esnulo(parseInt($('#total_CD').val()))+esnulo(parseInt($('#total_SD').val())));
    })

    $("#numero_madres_d").keyup(function(){
        var n_2;
        n_2=parseInt($(this).val()) + esnulo(parseInt($('#numero_madres').val()));
        $('#total_madres').attr('value' ,esnulo(n_2));
        $('#total_CD').attr('value',esnulo(parseInt($('#numero_padres_d').val())) + esnulo(parseInt($(this).val())));
        $('#total').attr('value', esnulo(parseInt($('#total_CD').val()))+esnulo(parseInt($('#total_SD').val())));
    })

    $("#numero_madres").keyup(function(){
        var n_1,n_2;
        n_1=esnulo(parseInt($(this).val()));
        n_2=esnulo(parseInt($('#numero_madres_d').val()));
        $('#total_madres').attr('value' ,n_1 + n_2);
        $('#total_SD').attr('value',n_1+esnulo(parseInt($('#numero_padres').val())));
        $('#total').attr('value', esnulo(parseInt($('#total_CD').val()))+esnulo(parseInt($('#total_SD').val())));
    })



    //**********************

    $(".input_text_1").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'1').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'2').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'3').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_1").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_1").attr("value",total);

        $("#poblacion_t_3").attr("value", ifNaN( $("#poblacion_t_1").val())+ ifNaN($("#poblacion_t_2").val()));
    });

    $(".input_text_2").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'1').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'2').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'3').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_2").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_2").attr("value",total)

        $("#poblacion_t_3").attr("value", ifNaN( $("#poblacion_t_1").val())+ ifNaN($("#poblacion_t_2").val()));
    });

    //******************************
    $(".input_text_4").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'4').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'5').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'6').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_4").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_4").attr("value",total);

        $("#poblacion_t_6").attr("value", ifNaN( $("#poblacion_t_4").val())+ ifNaN($("#poblacion_t_5").val()));
    });

    $(".input_text_5").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'4').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'5').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'6').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_5").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_5").attr("value",total)

        $("#poblacion_t_6").attr("value", ifNaN( $("#poblacion_t_4").val())+ ifNaN($("#poblacion_t_5").val()));
    });

    //**************TOTAL********************
    $(".input_text_2").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'3').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'6').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'7').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_3").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_3").attr("value",total);

        $("#poblacion_t_7").attr("value", ifNaN( $("#poblacion_t_3").val())+ ifNaN($("#poblacion_t_6").val()));
    });

    $(".input_text_5").keyup(function(){
        var id_= $(this).attr("id");
        var n_=id_.split("_");
        var d_=parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'3').val()) + parseInt($('#'+n_[0]+'_'+n_[1]+'_'+'6').val());
        $('#'+n_[0]+'_'+n_[1]+'_'+'7').attr('value' ,ifNaN(d_));
        var total=0;
        $(".input_text_6").each( function(){
            total+=ifNaN(parseInt($(this).attr("value")));
        });
        $("#poblacion_t_6").attr("value",total)

        $("#poblacion_t_7").attr("value", ifNaN( $("#poblacion_t_3").val())+ ifNaN($("#poblacion_t_6").val()));
    });


    //***************************************

    $("#enca_fecha" ).datepicker({
        changeYear:true,
        changeMonth:true,
        yearRange: "-80:+0"

    });
    $("#turno_manana_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#turno_manana_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#turno_tarde_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#turno_tarde_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_desayuno_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_desayuno_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_recreo_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_recreo_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_almuerzo_ini").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });
    $("#duracion_almuerzo_fin").timepicker({
        ampm:true,
        timeOnlyTitle:'Seleccione el tiempo',
        currentText: 'Ahora',
        closeText: 'Cerrar'
    });

    //validaciones



    $("#frm_instrumento_send").submit(function(e){
        e.preventDefault();

        var bval = true;
        //        var num;
        //        switch ($("#tipo_escuela").val()) {
        //        case 'M2': num =2; break;
        //        case 'M3': num =3; break;
        //        case 'M4': num =4; break;
        //        case 'M5': num =5; break;
        //        case 'P': num =6; break;
        //        case 'U': num =1; break;
        //        default:
        //            msg_alert_a("<span style='color:red;'>Escoja un Tipo de Escuela en la Pestaña TIPOLOGÍA</span>");return;
        //        }
        //
        //        for(var i=1; i<=num+1;i++){
        //            bval = bval && $("#personal_"+i+"_0").required();
        //            bval = bval && $("#personal_"+i+"_10").required();
        //            bval = bval && $("#personal_"+i+"_10").required();
        //        }
        //bval = bval && $( "#enca_id").required();
        //bval = bval && $( "#nombre_apellido_facilitador").required();
        //bval = bval && $( "#enca_fecha").required();
        //bval = bval && $( "#grup_intervencion").required();
        //bval = bval && $( "#num_escuela").required();
        //        bval = bval && $( "#nombre_escuela").required();
        //        bval = bval && $( "#ano_ingreso").required();
        //         bval = bval && $( "#nombre_proyecto_otro").required();
        //        bval = bval && $( "#ano_ingreso_otro").required();
        //bval = bval && $( "#codigo_modular").required();
        //         bval = bval && $( "#turno_manana_ini").required();
        //         bval = bval && $( "#turno_manana_fin").required();
        //         bval = bval && $( "#turno_tarde_ini").required();
        //         bval = bval && $( "#turno_tarde_fin").required();
        //         bval = bval && $( "#duracion_desayuno_ini").required();
        //         bval = bval && $( "#duracion_desayuno_fin").required();
        //         bval = bval && $( "#duracion_recreo_ini").required();
        //         bval = bval && $( "#duracion_recreo_fin").required();
        //         bval = bval && $( "#duracion_almuerzo_ini").required();
        //         bval = bval && $( "#duracion_almuerzo_fin").required();
        //        bval = bval && $( "#telefono_comunitario").required();
        //bval = bval && $( "#dist_id").required();
        //bval = bval && $( "#lugar_id").required();
        //       bval = bval && $( "#punto_referencial").required();
        //       bval = bval && $( "#enca_distancia").required();
        //       bval = bval && $( "#tiempo_minutos").required();
        //       bval = bval && $( "#form_transporte").required();
        //        bval = bval && $( "#numero_padres").required();
        //
        //var isChecked;
        //                 var groups = {}
        //                        $("#frm_instrumento_send input:radio").each(function () {
        //                        groups[this.name] = true;
        //                            });
        //                    $("#error_one_"+c_+"").remove();
        //                    for (group in groups) {
        //                        var radioButttons = $(":radio[name=" + group + "]").is(':checked');
        //                        isChecked = radioButttons;
        //
        //                         var b_= group.split('_');
        //                         var c_= b_[1];
        //
        //                         $("#error_one_"+c_+"").remove();
        //                        if (!isChecked) {
        //                           //var a_=$("<tr class='ui-state-error set' id='error_"+c_+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
        //                            $("#ins1_"+c_).append("<tr class='ui-state-error set' id='error_one_"+c_+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
        //                        }
        //                        else {
        //                            alert("estoy chekeado");
        //                        }
        //                    }
        if(bval){

            var data_ = $("#frm_instrumento_send").serializeArray();

            $.ajax({
                type: "POST",
                url: "index.php",
                data: {
                    controller:'Instrumento',
                    action:'save_encavezado_1',
                    data:data_
                },
                beforeSend:function (data){
                    msg_alert_a("Guardando ... ", 120);

                },
                success: function(data){
                    $("#pop_msg_").dialog("close").remove();
                    //                    if($.trim(data)=="")
                    //                    {
                    msg_alert_a("<span style='color:green;'>Se registro datos del instrumento correctamente</span>", 120);
                    location.href="index.php?controller=Instrumento&action=show&id=I1";
                //                    }
                //                    else
                //                    {
                //                        msg_alert_a("Los datos no fueron guardados, por favor intente nuevamente", 120);
                //                    }
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





    //setValue_("#dep_id", get_cookie("dep"));
    $("#dep_id").trigger("change");
    setValue_("#prov_id",get_cookie("prov"));
    $("#dep_id").trigger("change");
    setValue_("#dist_id",get_cookie("dist"));
    //$(".itm_nn").mask("9999-99");
    // $("#enca_fecha").mask("99/99/9999");

    //$("#codigo_modular").mask("9999999");
    $(".num_").keypress(function (e){
        return permite(e,'num')
    });

    $("#agregar_8").click(function()
    {
        agregar_personal();
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


            $( "#nombre_apellido_facilitador" ).autocomplete({
                minLength: 0,
                source: data_,
                focus: function( event, ui ) {
                $( "#nombre_apellido_facilitador" ).val( ui.item.label );

                return false;
                },
                select: function( event, ui ) {
                $( "#nombre_apellido_facilitador" ).val( ui.item.label );
                $( "#faci_id" ).attr("value", ui.item.value );

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
                $( "#lugar_id" ).val( ui.item.value );

                return false;
                },
                change: function( event, ui ) {
                if( ui.item==null)
                {
                $( "#luga_id" ).val( -1);
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
    //PARTE DE REPORTERIA DE INSTRUMENTO NUERMO UNO
    $("#btn_buscar").click(function()
    {
        alert('ok')
    /* var bval = true;
            bval = bval && $( "#codigo_modular").required();
			if(bval)
			{
			  $.post("index.php","controller=Instrumento&action=report_one&id="+$('#codigo_modular').val(),function(data)
			  {


			  });

			} */
    });
});

function del_8(id)
{
    var id_= $("#personal_"+id+"_11").attr("value");
    $("#"+id).remove();
    $("#item_8_2"+id).remove();
    //item--;
    //id--;

    $.ajax({
        type: "GET",
        url: "index.php",
        data: {
            controller:'Instrumento',
            action:'set_personal_out',
            id:id_
        },
        beforeSend:function (data){

        },
        success: function(data_){
            alert("Eliminado");
        }
    });
}

function save_instrumento(){
    $("#frm_instrumento_send").submit();
}

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

function agregar_personal()
{
    var num;
    switch ($("#tipo_escuela").val()) {
        case 'M2':
            num =2;
            break;
        case 'M3':
            num =3;
            break;
        case 'M4':
            num =4;
            break;
        case 'M5':
            num =5;
            break;
        case 'P':
            num =6;
            break;
        case 'U':
            num =1;
            break;
        default:
            msg_alert_a("<span style='color:red;'>Escoja un Tipo de Escuela en la Pestaña TIPOLOGÍA</span>");
            return;
    }
    item+=1;
    _item+=1;
    if(item > num+1 && num!=6){
        alert("No puedes agregar más");
        return;
    }else{
        if(item == num+1){
            $("#agregar_8").hide();
        }
    }
    var str="<tr id='"+item+"' class='rw_nn'>";
    str+="<td height='84'>"+item+"</td>";
    str+="<td>&nbsp;<input type='text' name='personal_"+item+"_0' id='personal_"+item+"_0' size='19' maxlength='100' style='text-transform: uppercase' ></td>";
    //**
    str+="<td class='chk_dir' ><div > <input type='checkbox' name='personal_"+item+"_19' id='personal_"+item+"_19' value='1' /><label for='personal_"+item+"_19'> </label></div></td>";
    //**
    str+="<td>";
    str+="<p class='chk_itm'>";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+_item+"'   value='1' /><label for='personal_"+item+"_"+_item+"'>1° </label> ";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+(_item+1)+"' value='2'  /><label for='personal_"+item+"_"+(_item+1)+"'>2° </label>";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+(_item+2)+"' value='3'  /><label for='personal_"+item+"_"+(_item+2)+"'>3° </label>";
    str+="</br>";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+(_item+3)+"' value='4' /><label for='personal_"+item+"_"+(_item+3)+"'>4° </label>";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+(_item+4)+"' value='5' /><label for='personal_"+item+"_"+(_item+4)+"'>5° </label>";
    str+="<input type='checkbox' name='personal_"+item+"_1' id='personal_"+item+"_"+(_item+5)+"' value='6' /><label for='personal_"+item+"_"+(_item+5)+"'>6° </label>";
    str+="</p>";
    str+="</td>";
    str+="<td class='chk_dir' ><div > <input type='checkbox' name='personal_"+item+"_18' id='personal_"+item+"_18' value='1' /><label for='personal_"+item+"_18'> </label></div></td>";
    str+="<td><input name='personal_"+item+"_2' id='personal_"+item+"_2' size='4' type='text' maxlength='4'/></td>";
    str+="<td><input type='text' name='personal_"+item+"_3' id='personal_"+item+"_3' size='6' maxlength='6' class='itm_nn' /></td>";
    str+="<td><input type='text' name='personal_"+item+"_4' id='personal_"+item+"_4' size='6' maxlength='6' class='itm_nn'/></td>";
    str+="<td><input type='text' name='personal_"+item+"_5' id='personal_"+item+"_5' size='6' maxlength='6' class='itm_nn'/></td>";
    str+="<td><input type='text' name='personal_"+item+"_6' id='personal_"+item+"_6' size='6' maxlength='6' class='itm_nn'/></td>";
    str+="<td><select name='personal_"+item+"_7' id='personal_"+item+"_7' ><option value='1'>F</option><option value='2'>M</option></select></td>";
    str+="<td><select name='personal_"+item+"_8' id='personal_"+item+"_8' >";
    str+="<option value='1'>Soltero</option>";
    str+="<option value='2'>Casado</option>";
    str+="<option value='3'>Conviviente</option>";
    str+="<option value='4'>Divorciado</option>";
    str+="<option value='5'>Viudo</option>";
    str+="</select></td>";
    str+="<td style='font-size:10px;'><a href='javascript:del_8("+item+")'  class='btn_edit_'>Eliminar</a></td>";
    str+="</tr>";
    var _datos= $(str);
    $("#datos_informativos").append(_datos);
    //alert('ok');
    item_2+=1;
    var str_2="<tr id='item_8_2"+item_2+"'>";
    str_2+="<td>"+item_2+"</td>";
    str_2+="<td>";
    str_2+="<select name='personal_"+item_2+"_9' id='personal_"+item_2+"_9' >";
    str_2+="<option value='1' >Nombrado</option>";
    str_2+="<option value='2' >Contratado</option>";
    str_2+="<option value='3' >Destacado</option>";
    str_2+="<option value='4' >Reasignado </option>";
    str_2+="<option value='5' >Publico</option>";
    str_2+="</select ></td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_10' id='personal_"+item_2+"_10' class='fecha' size='6' maxlength='6' /></td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_11' id='personal_"+item_2+"_11'  size='10' maxlength='10'  /></td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_12' id='personal_"+item_2+"_12'  style='width:115px' maxlength='100' class='distrito_set' />";
    str_2+="<input type='hidden' name='personal_"+item_2+"_13' id='personal_"+item_2+"_13' />";
    str_2+="</td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_14' id='personal_"+item_2+"_14'  size='20' maxlength='100'/></td>";
    str_2+="<td><select name='personal_"+item_2+"_15' id='personal_"+item_2+"_15' ><option value='1'>Si</option><option value='2'>No</option></select></td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_16' id='personal_"+item_2+"_16'  size='20' maxlength='100'/></td>";
    str_2+="<td><input type='text' name='personal_"+item_2+"_17' id='personal_"+item_2+"_17'  size='10' maxlength='20' /></td>";
    str_2+="";
    str_2+="</tr>";
    var _datos_2= $(str_2);
    $("#datos_informativos_2").append(_datos_2);
    $(".fecha").datepicker({

        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "-80:+0"
    /*minDate: '-65Y',
		maxDate: '-15Y'*/
    });
    //$(".itm_nn").mask("999",{placeholder:" "});
    $(".distrito_set").click(function()
    {
        var id_= $(this).attr("id");
        $("#select_departamento").dialog("open");
        $("#dist_id_select").attr("value",id_ );
    });

    $(".fecha").mask("99/99/9999");

}




// hacer otro igual
function instrumento_search()
{
    var id_;
    id_=  $("#codigo_modular").attr("value");
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
                location.href="index.php?controller=Instrumento&action=editar_&id="+id_+"";
            }
            else
            {
                msg_alert_a("Documento de ID:<strong>"+id_+"</strong>, no encontrado");
            }

        }
    });


}

///****************************************
function instrumento_search_escuela()
{
    var id_=  $("#num_escuela").attr("value");
    //msg_alert_a("ID:<strong>"+id_+"</strong>, no encontrado");
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'search_escuela',
            nro:id_
        },
        beforeSend:function (data){
            msg_alert_a("Buscando ...");
        },
        success: function(data_){
            $("#pop_msg_").dialog("close").remove();
            if(data_.find==true){
                location.href="index.php?controller=Instrumento&action=editar_e&nro="+id_+"";
            }
            else
            {
                msg_alert_a("Documento de ID:<strong>"+id_+"</strong>, no encontrado");
            }

        }
    });
}
