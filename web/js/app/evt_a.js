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
    //#INIT 01: Manejo de eventos combo    
    $("#departamento_id").bind('change blur click',function(){
       var dep_id = $(this).val();
       $("#box_departamento_id,#PRA1_1").attr('value',dep_id.substr(0, 2));
       cmbLoadAjax("index.php","#provincia_id",{controller:'C1',action:'getListaProvincias',id:dep_id});
     });
    $("#provincia_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#box_provincia_id,#PRA1_3").attr('value',pov_id.substr(2, 2));
        cmbLoadAjax("index.php","#distrito_id",{controller:'C1',action:'getListaDistritos',id:pov_id});
    });
    $("#distrito_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#box_distrito_id,#PRA1_2").attr('value',pov_id.substr(4, 2));
       cmbLoadAjax("index.php","#localidad_id",{controller:'C1',action:'getListaLocalidades',id:pov_id});
    });
     $("#localidad_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#box_localidad_id,#PRA1_4").attr('value',pov_id.substr(6, 4));
      });
      $("#zona_id").bind('change blur click',function(){
       var pov_id = $(this).val();
        $("#PRA2").attr('value',pov_id);
      });
      //#END 01
      
      
    $("#PAR3_4").change(function(){
       
        if($("#PAR3_4:checked").val())
        {
            $("#PAR3_3").attr("value",'97');
            $("#PAR3_3").prop('disabled', true);
        }
        else
        {
            $("#PAR3_3").attr("value",'');
            $("#PAR3_3").prop('disabled', false);
        }
       
    });
    
    $("#btn_sl_supervisor").click(function(){
        $('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
        $("#obj_1").attr("value","PAR5_2");
        $("#obj_2").attr("value","PAR5_2_t");
        search_('personal',1);
        
    });
    $("#btn_sl_entrevistador").click(function(){
       $('#frm_pop').dialog({size:'auto',resizable:false,width:500,height:250});
       $("#obj_1").attr("value","PAR5_1");
       $("#obj_2").attr("value","PAR5_1_t");
        search_('personal',1);
    });
    
    $("#PAR4_1" ).datepicker({changeYear:true, changeMonth:true});
    $("#PAR4_2").timepicker({ampm:true,timeOnlyTitle:'Seleccione el tiempo',currentText: 'Ahora',
	closeText: 'Cerrar'});

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
     
    
    $("#formcab").ready(function(){
        loadData1();
        
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

function add_row1()
{
   var n_= $("#n1").attr("value");
   n_=parseInt(n_)+1;
    var rw_="";
  rw_ += '<tr id="rw'+n_+'">';
  rw_ += '<td id="rw1_'+n_+'" class="crt_cell" > <input type="text" /></td>'; 
  rw_ += '<td id="rw2_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '<td id="rw3_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '<td id="rw4_'+n_+'" class="crt_cell"> <input type="text" /></td>'; 
  rw_ += '<td id="rw5_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '</tr>';
  $("#tb_all").append(rw_);
  $("#n1").attr("value",n_);
}
function add_row2()
{
   var n_= $("#n1").attr("value");
   
   var nb_=n_;
   n_=parseInt(n_)+1;
   
    var rw_="";
  rw_ += '<tr id="rw'+n_+'">';
  rw_ += '<td id="rw2_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '<td id="rw3_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '<td id="rw4_'+n_+'" class="crt_cell"> <input type="text" /></td>'; 
  rw_ += '<td id="rw5_'+n_+'" class="crt_cell"> <input type="text" /></td>';
  rw_ += '</tr>';
  $("#tb_all").append(rw_);
  
  var nrw_=$("#rw1_"+nb_+"").attr("rowspan");
  if(isNaN(nrw_))
      {
          nrw_=1;
      }
  var nrwb_= parseInt(nrw_)+1;
  $("#rw1_"+nb_+"").attr("rowspan",nrwb_);
}

function color(el,tt){
    if($(el).hasClass('crt_cell')==true){
        $(el).removeClass();$(el).addClass('crt_cell'+tt);
    }else{
        $(el).removeClass();$(el).addClass('crt_cell');
    }
}

function set_actual(actual)
{
    $("#n6").attr("value",$(actual).attr("id"));
}

function add_row6()
{
  var a=  $("#n6").attr("value");
 var b= a.substr(4,(a.length-1));//row
 var c= parseInt(a.substr(2,2));//col
var rw_ ="";
    rw_ += '<tr id="rw'+b+'">';
  if(c<1){
  rw_ += '<td id="rw1_'+b+'" class="crt_cell"> <input type="text" /></td>';
   }
  
   if(c<2){
  rw_ += '<td id="rw2_'+b+'" class="crt_cell"> <input type="text" /></td>';
   }
   
    if(c<3){
  rw_ += '<td id="rw3_'+b+'" class="crt_cell"> <input type="text" /></td>';
    }
   if(c<4){
       rw_ += '<td id="rw4_'+b+'" class="crt_cell"> <input type="text" /></td>'; 
   }
   
  
    if(c<5){
  rw_ += '<td id="rw5_'+b+'" class="crt_cell"> <input type="text" /></td>';
    }
  rw_ += '</tr>';
 
  $("#rw"+b).after(rw_);
   c= parseInt(c)-1;
   var s= parseInt($("#"+a).attr("rowspan"))+1;
   $("#"+a).atrr("rowspan",s );
}
function odd_row6()
{
  
  var a=  $("#n6").attr("value");
 var b= a.substr(4,(a.length-1));
 var c= a.substr(2,2);
 $("#rw"+b+"").remove();
  b= parseInt(b)-1;
  c= parseInt(c)-1;
  var s= $("#rw"+c+"_"+b+"").attr("rowspan")-1;
   $("#rw1_"+b+"").attr("rowspan",s );
  
}

/**
 * Comment
 */
function loadData1() {
    
    if( $("#IDNUMBER").attr("value")!="")
    {
    
    var id_= $("#IDNUMBER").attr("value");
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'C1',
            action:'fill_data',
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