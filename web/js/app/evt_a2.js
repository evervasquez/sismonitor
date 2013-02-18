/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
          $( "#encuestador" ).autocomplete({
			minLength: 0,
			source: "index.php?controller=Encuestador&action=Search",
			focus: function( event, ui ) {
				$( "#encuestador" ).val( ui.item.name );
				return false;
			},
			select: function( event, ui ) {
				$( "#encuestador" ).val( ui.item.name );
				$( "#encuestador-id" ).val( ui.item.id );
				return false;
			}
		});
                //.data( "autocomplete" )._renderItem = function( ul, item ) {
		//	return $( "<li></li>" )
		//		.data( "item.autocomplete", item )
		//		.append( "<a>" + item.name + "</a>" )
		//		.appendTo( ul );
		//};

    $( "#container" ).tabs({});
    $( "#encuestador" ).change(function(){
       if ($( this ).val() == "" ) {
            $( "#encuestador-id" ).val("");
       }
    });
      
    $('input[type="radio"]').change( function(data) {
    var att=$(this).attr("name");
    switch (att) { 
   	case 'PA[2][0]':
      	  if (isEq( att, '1')){        

                show_("#P2_1,#P3,#P4",true);
                
            } else 
            {  
                show_("#P2_1,#P3,#P4",false);
            }
      	 break;
         case 'PA[4][0]':
      	  if (isEq( att, '1')){        

                show_("#P4_1",true);
                
            } else 
            {  
                show_("#P4_1",false);
            }
      	 break;
         case 'PA[6][0]':
      	  if (isEq( att, '1')){        

                show_("#P6_1,#P7",true);
                
            } else 
            {  
                show_("#P6_1,#P7",false);
            }
      	 break;
         case 'PA[10][0]':
      	  if (isEq( att, '1')||isEq( att, '2')){        

                show_("#P11",true);
                
            } else 
            {  
                show_("#P11",false);
            }
      	 break;
         case 'PA[16][0]':
      	  if (isEq( att, '1')){        

                show_("#P16_1",true);
                
            } else 
            {  
                show_("#P16_1",false);
            }
      	 break;
     }
 });  
      
      
      
    
    //#INIT 01: Manejo de eventos combo    
    $("#departamento_id").bind('change blur click',function(){
       var dep_id = $(this).val();
       $("#PA1_0").attr('value',dep_id.substr(0, 2));
       cmbLoadAjax("index.php","#provincia_id",{controller:'C1',action:'getListaProvincias',id:dep_id});
     });
    $("#provincia_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#PA1_1").attr('value',pov_id.substr(2, 2));
        cmbLoadAjax("index.php","#distrito_id",{controller:'C1',action:'getListaDistritos',id:pov_id});
    });
    $("#distrito_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#PA1_2").attr('value',pov_id.substr(4, 2));
       cmbLoadAjax("index.php","#localidad_id",{controller:'C1',action:'getListaLocalidades',id:pov_id});
    });
     $("#localidad_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#PA1_3").attr('value',pov_id.substr(6, 4));
      });
      $("#zona_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#PA1_4").attr('value',pov_id);
      });
      //#END 01

    
    $( "#fecha" ).datepicker();
    $( "#formcab" ).submit(function(){
        str = $( this ).serialize();
        bval = true;
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#municipio" ).required();
        if (!bval) {return false;}
        bval = bval && $( "#encuestador-id" ).required();        
        if (!$( "#encuestador-id" ).required()){
            $( "#encuestador" ).addClass('ui-state-error').focus();
        } else {
            $( "#encuestador" ).removeClass('ui-state-error');
        }
        bval = bval && $( "#oficina" ).required();
        bval = bval && $( "#campo" ).required();
        bval = bval && $( "#codificacion" ).required();
        bval = bval && $( "#digitacion" ).required();
        bval = bval && $( "#observaciones" ).required();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType:"json",
                data: 'controller=Activa&action=Saveactivaencabezado&' + str ,
                success: function(data){
                    var ID = data.id;
                    var IDS = ID.toString();
                    var code = '';
                    for (i = 0; i < (10-IDS.length); i++) {
                        code = code + '0';
                    }
                    $( "#IDNUMBER" ).val(code + IDS);

                    if ( data.res == 1 ) {

                        $( "#container" ).tabs("enable",1)
                        $( "#container" ).tabs("select",1);                        
                        $("#submit-cab").hide();
                    }
                    else {
                        msgerror(data.error);
                    }
                }
            });
        }
        return false;
    });
    $(".btn_other").button();
    $(".checks_").buttonset();
    
    //#INIT 01: Manejo de eventos buttons agregar /quitar */
    $("#btn_add_p2").bind("click",function(e){
        e.preventDefault();
         p2_add("#tb_p2 tbody",$("#p2_val").attr("value"));
        
    });
    $("#btn_odd_p2").bind("click",function(e){
         e.preventDefault();
        var i_=  $("#p2_val").attr("value");
        p2_odd(i_);
    });
    $("#btn_add_p24").bind("click",function(e){
        e.preventDefault();
         p24_add("#tb_p24",$("#p24_val").attr("value"));
        
    });
    $("#btn_odd_p24").bind("click",function(e){
         e.preventDefault();
        var i_=  $("#p24_val").attr("value");
        p24_odd(i_);
    });
      //#END 01   
    $("#PA_4_1_1,#PA_4_1_2").bind("keyup",function(e){
        p4_1_plus();
    });
    
    $(document).ready(function(){
        loadDataC2();
    });
   
});
/**
 * Comment
 */
function p2_add(id,index_) {
    var index  = parseInt(index_,10)+1;
    
    var line_="";
    			line_ +='<tr id="rw_p2_'+index+'">';
			line_ +='<td>'+index+'</td>';
			line_ +='<td>';
			line_ +='<input type="text" class="input_text__" id="PA2_'+index+'_1" style="width:95px;" name="PA2['+index+'][0]"  title="Nombre(s)"/>';
			line_ +='<input type="text" class="input_text__" id="PA2_'+index+'_2" style="width:110px;"name="PA2['+index+'][1]" title="Apellidos" />';
                        line_ +='</td>';
			line_ +='<td>'
			line_ +='<div id="PP1T1_'+index+'_" class="checks_'+index+'">';
			line_ +='<input type="radio" id="PP2T1_'+index+'_1" value="1" name="PA2['+index+'][2]">';
			line_ +='<label for="PP2T1_'+index+'_1" style="width:25px">M</label>';
			line_ +='<input type="radio" id="PP2T1_'+index+'_2" value="2" name="PA2['+index+'][2]">';
			line_ +='<label for="PP2T1_'+index+'_2" style="width:25px">F</label>';
                        line_ +='</div>';
			line_ +='</td>',
                        line_ +='<td><input type="text" class="input_text_" id="PA2_'+index+'_3" name="PA2['+index+'][3]" style="width:30px;" onkeypress="return permite(event,\'num\')" title="EN AÑOS CUMPLIDOS" /></td>';
                        line_ +='<td><select name="PA2['+index+'][4]"  class="input_text" style="width:100px" >';
			line_ +='<option value=""  >::Seleccione::</option>';
			line_ +='<option value="1" >CASADO</option>';
			line_ +='<option value="2" >CONVIVIENTE</option>';
			line_ +='<option value="3" >SOLTERO</option>';
			line_ +='<option value="4" >VIUDO</option>';
                        line_ +='</select></td>';
			line_ +='<td><div id="PP1T2_'+index+'_" class="checks_'+index+'">';
			line_ +='<input type="radio" id="PP2T2_'+index+'_1" value="1" name="PA2['+index+'][5]" />';
			line_ +='<label for="PP2T2_'+index+'_1" style="width:25px">Si</label>';
                        line_ +='<input type="radio" id="PP1T2_'+index+'_2" value="2" name="PA2['+index+'][5]" />';
			line_ +='<label for="PP1T2_'+index+'_2" style="width:25px">No</label></div></td>';
			line_ +='<td><input type="text" class="input_text_" id="PA2_'+index+'_4" name="PA2['+index+'][6]" style="width:30px;" onkeypress="return permite(event,\'num\')"/></td>';
                        line_ +='<td><select name="PA2['+index+'][7]" id="PA2_'+index+'_4" class="input_text" style="width:160px" >';
			line_ +='<option value=""  >::Seleccione::</option>';
			line_ +='<option value="1" >EDUCACION INICIAL</option>';
			line_ +='<option value="2" >PRIMARIA INCOMPLETA</option>';
			line_ +='<option value="3" >PRIMARIA COMPLETA</option>';
			line_ +='<option value="4" >SECUNDARIA</option>';
			line_ +='<option value="5" >SECUNDARIA</option>';
                        line_ +='<option value="6" >SUPERIOR</option>';
			line_ +='<option value="4" >SUPERIOR COMPLETA</option>';
                        line_ +='</select></td>'
			line_ +='<td>';
                        line_ +='<div id="PP1T3_'+index+'_" class="checks_'+index+'">';
			line_ +='<input type="radio" id="PP1T3_'+index+'_1" value="1" name="PA2['+index+'][8]" />';
			line_ +='<label for="PP1T3_'+index+'_1" style="width:25px">Si</label>';
			line_ +='<input type="radio" id="PP1T3_'+index+'_2" value="2" name="PA2['+index+'][8]" />';
			line_ +='<label for="PP1T3_'+index+'_2" style="width:25px">No</label>'; 
			line_ +='</div>';
                        line_ +='</td>';
                        line_ +='</tr>';
                        $(id).append( line_);
                        
                        $("#p2_val").attr("value",index);
                        $(".checks_"+index).buttonset();
}   
function p2_odd(index) {
    
    $("#rw_p2_"+index).remove();
    index=parseInt(index);
    if(index>0){
    index=index-1;
    $("#p2_val").attr("value",index);
    }
}

function p24_add(id,index_) {
    var index  = parseInt(index_,10)+1;
    
    var line_="";
    			line_ +='<tr id="rw_p24_'+index+'">';
                        line_ +='<td>'+ index +'</td>';
                        line_ +='<td><input type="text" name="PA24['+index+'][0]" class="input_text_" /></td>';
                        line_ +='<td><input type="text" name="PA24['+index+'][1]" class="input_text_" style="width:200px" /></td>';
                        line_ +='<td><input type="text" name="PA24['+index+'][2]" class="input_text_" style="width:200px"/></td>';
                        line_ +='<td><input type="text" name="PA24['+index+'][3]" class="input_text_" onkeypress="return permite(event,\'num\')" style="width:60px" /></td>';
                        line_ +='<td><input type="text" name="PA24['+index+'][4]" class="input_text_" onkeypress="return permite(event,\'num\')" style="width:60px" /></td>';
                        line_ +='</tr>';               
                        $(id).append( line_);
                        $("#p24_val").attr("value",index);
                        $(".checks_"+index).buttonset();
}   
function p24_odd(index) {
    
    $("#rw_p24_"+index).remove();
    index=parseInt(index);
    if(index>0){
    index=index-1;
    $("#p24_val").attr("value",index);
    }
}
function p4_1_plus()
{
    var a_=  parseInt( $("#PA_4_1_1").attr("value"))+parseInt($("#PA_4_1_2").attr("value"));
    $("#PA_4_1_3").attr("value",a_);
}

/**
 * Comment
 */
function sl_entrevistador() {
$('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
        $("#obj_1").attr("value","PA_26_1_");
        $("#obj_2").attr("value","PA_26_1");
        search_('personal',1);
}
function sl_supervisor() {
$('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
        $("#obj_1").attr("value","PA_26_2_");
        $("#obj_2").attr("value","PA_26_2");
        search_('personal',1);
}
function search_(id,page,put){
   getTable_(id, "index.php", "C1", "get_personal", $("#srh_tex").val(),page);
}
function add_(put){
    var a= $("#obj_1").val();
    var b= $("#obj_2").val();
    $("#"+a).attr("value",put);
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'C1',
            action:'get_personal_id',
            q:put
        },
        beforeSend:function (data){
            
        },
        success: function(data){
           $("#"+b).attr("value",data.obj.Nombres);
        }
        });
}

function loadDataC2() {
    
    if( $("#IDNUMBER").attr("value")!="")
    {
    
    var id_= $("#IDNUMBER").attr("value");
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'C2',
            action:'fill_data_c2a',
            id:id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){
           var data_ = data.row;  
           
        setValue_("#departamento_id",data_[0].idDepartamento);          
        cmbLoadAjax_("index.php","#provincia_id",{controller:'C1',action:'getListaProvincias',id:data_[0].idDepartamento},data_[0].idProvincia);    
        cmbLoadAjax_("index.php","#distrito_id",{controller:'C1',action:'getListaDistritos',id:data_[0].idProvincia},data_[0].idDistrito);
        cmbLoadAjax_("index.php","#localidad_id",{controller:'C1',action:'getListaLocalidades',id:data_[0].idDistrito},data_[0].idLocalidad);
        setValue_("#zona_id",data_[0].idZona);
        setValue_("#PAR3_1", data_[0].participante[0].Nombre );
        setValue_("#PAR3_2", data_[0].participante[0].ApePaterno + ' ' +data_[0].participante[0].ApeMaterno );
        setValue_("#PAR3_3",data_[0].participante[0].Dni);
        setValue_("PA[3][3]",data_[0].participante[0].Sexo);
        setValue_("PA[3][4]",data_[0].idCultivo);
        setValue_("#PAR4_1",data_[0].Fecha.substr(0,10));
        setValue_("#PAR4_2",data_[0].Hora)
        setValue_("#PAR4_3",data_[0].Resultado);
        
        $(".checks_").buttonset("destroy").buttonset();
        }
    });
    }
}