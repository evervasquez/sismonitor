/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

var max_id_pregunta=0;
var ini_id_pregunta=0;
var max_id_numero=0;
var flag_1=0;
$(function()
{
     $.ajax({
            type: "GET",
            url: "index.php",
            dataType:"json",
            data: {
                controller:'Instrumento',
                action:'get_preg_id'
            },
            beforeSend:function (data){
            
            },
            success: function(data){
              var id_=  parseInt(data.id);
               max_id_pregunta= id_;
               ini_id_pregunta=id_;
            }
        });
    
    bld_add();

    
    
  $("#var_id").bind('change click',function(){
      var var_id = $(this).attr("value");
      if(flag_1==0){
       cmbLoadAjax_b("index.php","#comp_id",{controller:'Instrumento',action:'list_componente',id:var_id},"#comp_id");
      }
  });
  $("#comp_id").bind('change blur click',function(){
      if(flag_1==0){
      var comp_id = $(this).val();
       cmbLoadAjax("index.php","#ind_id",{controller:'Instrumento',action:'list_indicador',id:comp_id});
      }
      
  });

$("lista_preguntas_all").submit(function(e)
{
    e.preventDefault();
});
     
});




function bld_add()
{
         $("#frm_preguntas").dialog("destroy");
         $("#frm_preguntas").dialog({
                    title:'Formulario de Registro de Encuestas',
                    width:539,
                    modal:true,
                    resizable:false,
                    autoOpen:false,
                    buttons:
                        [
                          {
                              text: "Cancelar",
                              click: function() { $(this).dialog("close"); }
                          },
                          {
                              text: "Agregar",
                              click: function() { 
                                  
                                 var bval = true;
                                  bval = bval && $( "#det_numero").required();
                                  bval = bval && $( "#var_id").required();
                                  bval = bval && $( "#comp_id").required();
                                  bval = bval && $( "#ind_id").required();
                                  bval = bval && $( "#det_pregunta" ).required();
                                 var ind_id = $( "#ind_id option:selected").val();
                                  bval = bval && !isNaN(ind_id);
                                  
                                  if(bval){
                                    var preg_id_=$("#preg_id").attr("value");
                                    preg_add(preg_id_,$("#det_numero").attr("value"));
                                    setValue_("#ind_id-id-"+preg_id_,$("#ind_id").attr("value"));
                                    $(this).dialog("close");
                                  }
                                  
                           }
                          }

                      ]
                 });
}



function bld_edit()
{
       
         $("#frm_preguntas").dialog("destroy").dialog({
                    title:'Formulario de Registro de Encuestas',
                    width:539,
                    modal:true,
                    resizable:false,
                    autoOpen:false,
                    buttons:
                        [
                          {
                              text: "Cancelar",
                              click: function() { $(this).dialog("close"); }
                          },
                          {
                              text: "Guardar",
                              click: function() { 
                                  var preg_id_=$("#preg_id").attr("value");
                                  preg_set(preg_id_,$("#det_numero").attr("value"));
                                  setValue_("#ind_id-id-"+preg_id_,$("#ind_id").attr("value"));
                                  $(this).dialog("close");
                                  
                           }
                          }

                      ]
                 });
}
function add_pregunta()
{
 
  $("#preg_id").attr("value",up_id_pregunta());  
  $("#det_numero").attr("value",up_id_numero());  
  $("#frm_preguntas").dialog("open");
   
}
function up_id_pregunta()
{
    
    var max=0;
    var actual=0;
    if($(".preg_id_all").length==0){
        max_id_pregunta=ini_id_pregunta;
        return max_id_pregunta;
    }
    $(".preg_id_all").each(function()
    {
      actual= parseInt( $(this).attr("value"));
      if(!isNaN(actual))
      {
          if(actual>max)
          {
              max=actual;
          }
      }
    }
    );
    max_id_pregunta=max;
    return (max_id_pregunta+1);
}

function up_id_numero()
{
    
    var max=0;
    var actual=0;
    $(".n_item").each(function()
    {
      actual=parseInt($(this).attr("value"));
      if(!isNaN(actual))
      {
          if(actual>max)
          {
              max=actual;
          }
      }
    }
    );
    max_id_numero=max;
    return (max_id_numero+1);
}

function down_id_pregunta(id_)
{
     var id_preg= id_;  
   if(max_id_pregunta==id_preg)
   {
       max_id_pregunta=max_id_pregunta-1;
   }
}
function down_id_numero(id_)
{
   var id_numero= id_;  
   if(id_numero==max_id_numero)
   {
       max_id_numero=max_id_numero-1;
   }
}
function preg_set(id_,n_)
{
    var list="";
    
   
    list+='<td ><input type="checkbox" id="n-'+id_+'" class="preg_id_all"   value="'+id_+'" /><input type="text" style="width:40px;margin-left:10px;" name="PREGUNTA['+id_+'][0]" id="n_item-id-'+id_+'"  class="n_item" value="'+n_+'" /></td>';
    list+='<td><div id="div-prg_detalle-id-'+id_+'">'+ $("#det_pregunta").attr("value")+'</div><input type="hidden" id="prg_detalle-id-'+id_+'" name="PREGUNTA['+id_+'][1]" value="'+$("#det_pregunta").attr("value")+'" /></td>';
    list+='<td><div class="ind_id" id="txt_id-id-'+id_+'"  >  </div><input type="hidden" id="ind_id-id-'+id_+'" name="PREGUNTA['+id_+'][2]"  /></td>';
    list+='<td><div class="ind_id" id="txt_id_tipo-'+id_+'"  >  </div><input type="hidden" id="id_tipo-'+id_+'" name="PREGUNTA['+id_+'][3]"  /> </td>';
    list+='<td><a href="javascript:preg_edit('+id_+')" class="btn_other_a">Editar</a></td>';
    list+='<td><a href="javascript:preg_del('+id_+')" class="btn_other_b">Quitar</a></td>';
    $("#rw-id-"+id_+"").html(list);
    $("#txt_id-id-"+id_).html($("#ind_id option:selected").text());
    $("#txt_id_tipo-"+id_).html($("#det_tipo option:selected").text());
    $("#id_tipo-"+id_).val($("#det_tipo option:selected").val());
}

function preg_add(id_,n_)
{
    var list="";
    
    list+='<tr id="rw-id-'+id_+'">';
    list+='<td ><input type="checkbox" id="n-'+id_+'" class="preg_id_all"   value="'+id_+'" /><input type="text" style="width:40px;margin-left:10px;" name="PREGUNTA['+id_+'][0]" id="n_item-id-'+id_+'" class="n_item" value="'+n_+'" /></td>';
    list+='<td><div id="div-prg_detalle-id-'+id_+'">'+ $("#det_pregunta").attr("value")+'</div><input type="hidden" id="prg_detalle-id-'+id_+'" name="PREGUNTA['+id_+'][1]" value="'+$("#det_pregunta").attr("value")+'" /></td>';
    list+='<td><div class="ind_id" id="txt_id-id-'+id_+'"  >  </div><input type="hidden" id="ind_id-id-'+id_+'" name="PREGUNTA['+id_+'][2]"  /></td>';
    list+='<td><div class="ind_id" id="txt_id_tipo-'+id_+'"  >  </div><input type="hidden" id="id_tipo-'+id_+'" name="PREGUNTA['+id_+'][3]"  /> </td>';
    list+='<td><a href="javascript:preg_edit('+id_+')" class="btn_other_a">Editar</a></td>';
    list+='<td><a href="javascript:preg_del('+id_+')" class="btn_other_b">Quitar</a></td>';
    list+='</tr>';
    
    $(".preg_list").append(list);
    max_id_pregunta=max_id_pregunta+1;
    max_id_numero=max_id_numero+1;
    $("#txt_id-id-"+id_).html($("#ind_id option:selected").text());
    $("#txt_id_tipo-"+id_).html($("#det_tipo option:selected").text());
    $("#id_tipo-"+id_).val($("#det_tipo option:selected").val());
}

function preg_del(id_)
{
    $("#rw-id-"+id_+"").remove();
}
function preg_edit(id_)
{
  
 var ind_id_ = $('#ind_id-id-'+id_+'').val();
 var det_numero_ = $('#n_item-id-'+id_+'').val();
 var det_pregunta_ = $('#prg_detalle-id-'+id_+'').attr("value");
 $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_ind_list',
            id:ind_id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){           
           
           setValue_("#var_id", data.var_id);
           cmbLoadAjax_("index.php","#comp_id",{controller:'Instrumento',action:'list_componente',id:data.var_id},data.comp_id);  
           
           cmbLoadAjax_("index.php","#ind_id",{controller:'Instrumento',action:'list_indicador',id:data.comp_id},ind_id_);   
           setValue_("#det_numero",det_numero_);
           setValue_("#preg_id",id_);
           $("#det_pregunta").attr("value",det_pregunta_);
         
        }
    });
 
 bld_edit();
 $("#frm_preguntas").dialog("open");
       
}
function save_instrumento()
{
    var id_= $("#ins_id").val();
   var bval = true;
   bval = bval && $( "#ins_id").required();
   bval = bval && $( "#ins_nombre").required();
   bval = bval && $( "#ins_instrucciones").required();
   if(bval){
   var data_=$("#frm_instrumento").serializeArray();
   $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'save',
            data:data_,
            id:id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){
            if($.trim(data)==''){
                msg_alert_a("Los cambios se han guardado correctamente ");
                location.href="index.php?controller=Instrumento&action=edit&id="+$("#ins_id").val();
            }
            else
           {
               msg_alert_a("Sus datos no se actualizaron correcta ");
           }
        }
    });
   }
}

function guardar_detalle_instrumento()
{
      var data_=$("#lista_preguntas_all").serializeArray();
      var id_=$("#ins_id").val();
   $.ajax({
        type: "GET",
        url: "index.php",
       
        data: {
            controller:'Instrumento',
            action:'save_detalle_pregunta',
            data:data_,
            id:id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){
            if(data==''){
                msg_alert_a("Los cambios se han guardado correctamente ");
            }
            else
           {
               msg_alert_a("Sus datos no se actualizaron correctamente ");
           }
        },
        error:function(data)
        {
            msg_alert_a("Sus datos no se actualizaron correctamente ");
        }
    });
}
function delete_instrumento(id_){
    $.ajax({
        type: "GET",
        url: "index.php",
        
        data: {
            controller:'Instrumento',
            action:'delete',
            id:id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){
            
            if(data==''){
                msg_alert_a("Se elimino el instrumento correctamente", 120);
                location.href="index.php?controller=Instrumento&action=listar";
            }
            else{
                 msg_alert_a("No se pudo eliminar el instrumento",120);
            }
        },
        error:function()
        {
             msg_alert_a("No se pudo eliminar el instrumento",120);
        }
    });
 
}