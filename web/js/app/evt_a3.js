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
        
    $("#departamento_id").change(function(){
       var dep_id = $(this).val();
       $("#PRA1_1").attr('value',dep_id.substr(0, 2));
       cmbLoadAjax("index.php","#provincia_id",{controller:'C1',action:'getListaProvincias',id:dep_id});
     });
    $("#provincia_id").change(function(){
       var pov_id = $(this).val();
        $("#PRA1_3").attr('value',pov_id.substr(2, 2));
       cmbLoadAjax("index.php","#distrito_id",{controller:'C1',action:'getListaDistritos',id:pov_id});
    });
    $("#distrito_id").change(function(){
       var pov_id = $(this).val();
        $("#PRA1_2").attr('value',pov_id.substr(4, 2));
       cmbLoadAjax("index.php","#localidad_id",{controller:'C1',action:'getListaLocalidades',id:pov_id});
    });
     $("#localidad_id").change(function(){
       var pov_id = $(this).val();
        $("#PRA1_4").attr('value',pov_id.substr(6, 4));
       
    });
    $("#zona_id").change(function(){
       var pov_id = $(this).val();
        $("#PRA2").attr('value',pov_id);
       
    });
     $("#PP3_6").change(function(){
       
        if($("#PP3_6:checked").val())
        {
            $("#dni_id").attr("value",'97');
            $("#dni_id").prop('disabled', true);
        }
        else
        {
            $("#dni_id").attr("value",'');
            $("#dni_id").prop('disabled', false);
        }
       
    });
    
    
    
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
    
    $("#btn_sl_supervisor").click(function(){
        $('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
        $("#obj_1").attr("value","PAR5_2");
        $("#obj_2").attr("value","PAR5_2_");
        search_('personal',1);
        
    });
    $("#btn_sl_entrevistador").click(function(){
       $('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
       $("#obj_1").attr("value","PAR5_1");
       $("#obj_2").attr("value","PAR5_1_");
        search_('personal',1);
    });
    
});
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

