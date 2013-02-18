
(function($) {
    $.fn.setValue_ = function(optionValue) {
    var sel= $(this); 
    var tag_= sel.attr("id");
    $("select[id='"+tag_+"'] option[value="+ optionValue +" ]").attr("selected", true);
};})(jQuery);


function permite(elEvento, permitidos) {
// Variables que definen los caracteres permitidos

var numeros = "0123456789.,";
var caracteres = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ-/";
var numeros_caracteres = numeros + caracteres;
var teclas_especiales = [8, 37, 39, 46, 13];
// 8 = BackSpace, 46 = Supr, 37 = flecha izquierda, 39 = flecha derecha
// Seleccionar los caracteres a partir del parámetro de la función
  switch(permitidos) {
    case 'num':
    permitidos = numeros;
    break;
    case 'car':
    permitidos = caracteres;
    break;
    case 'num_car':
    permitidos = numeros_caracteres;
    break;
}
// Obtener la tecla pulsada
var evento = elEvento || window.event;
var codigoCaracter = evento.charCode || evento.keyCode;
var caracter = String.fromCharCode(codigoCaracter);
// Comprobar si la tecla pulsada es alguna de las teclas especiales
// (teclas de borrado y flechas horizontales)
var tecla_especial = false;
for(var i in teclas_especiales) {
    if(codigoCaracter == teclas_especiales[i]) {
    tecla_especial = true;
    break;
  }
}
// Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
// o si es una tecla especial
return permitidos.indexOf(caracter) != -1 || tecla_especial;
}

//Funcion que nos permite escribir una fecha 
//de una manera rapida
function formafecha(campo)
{
	if (campo.value.length==2 || campo.value.length==5)
	{	
		campo.value = campo.value+"/";
		return false;
	}
}

//Funcion que elimina los espacios en blaco o saltos de linea
//al principio de una cadena
function ltrim(s) {
	return s.replace(/^\s+/, "");
}

//Funcion que elimina los espacios en blaco o saltos de linea
//al final de una cadena
function rtrim(s) {
	return s.replace(/\s+$/, "");
}

//Funcion que elimina los espacios en blanco o saltos de linea
//al comienzo y al final de una cadena
function trim(s) {
	return rtrim(ltrim(s));
}






//Funcion que permite, que cuando se preciona enter se vaya
//al siguien campo de texto del formulario
function handleEnter(field, event) {

	var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
			if (keyCode == 13) {
				var i;
				for (i = 0; i < field.form.elements.length; i++)
					if (field == field.form.elements[i])
						break;
				i = (i + 1) % field.form.elements.length;
				field.form.elements[i].focus();
				return false;
			} 
			else
			return true;
		}
//Funciones que permiten usar cache en memoria
function set_cookie(c_name,value)
			{
				var expiredays = 999;
				var exdate=new Date();exdate.setDate(exdate.getDate()+expiredays);document.cookie=c_name+"="+escape(value)+
((expiredays==null)?"":";expires="+exdate.toUTCString());
			}
			function get_cookie(c_name)
			{
                            var c_start;
                            var c_end;
				if(document.cookie.length>0)
				{c_start=document.cookie.indexOf(c_name+"=");if(c_start!=-1)
				{c_start=c_start+c_name.length+1;c_end=document.cookie.indexOf(";",c_start);if(c_end==-1)c_end=document.cookie.length;return unescape(document.cookie.substring(c_start,c_end));}}
				return"";
			}

function msg(text)
{
    str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-alert" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");
}

function msgok(text)
{
  str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-check" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");
}

function msgerror(text)
{
    str = '<p style="margin-top:10px"><span class="ui-icon ui-icon-closethick" style="float: left; margin: 0pt 7px 50px 0pt;"></span>'+text+'</p>';
    $("#msgdialog").empty().append(str);
    $("#dialog").dialog("open");

}
function popup(url,width,height){cuteLittleWindow = window.open(url,"littleWindow","location=no,width="+width+",height="+height+",top=50,left=550,scrollbars=yes");}

function cmbLoad( id,data)
{
    var opti;
    $.each(data, function(i,item){
      opti =opti + ('<option  value="'+item.id+'">'+item.value+'</option>');
    });
    $(id).html(opti);
}


function cmbLoadAjax(url_,id,data_)
{
     $.ajax({
                type: "GET",
                url: url_,
                async:false,

                dataType:"json",
                data: data_,
                success:function (data__)
                {
                    var opti="";
                    $.each(data__, function(i,item){
                    opti =opti + ('<option  value="'+item.id+'">'+item.value+'</option>');
                    });
                    $(id).html(opti);
                    
                }
       });
}
function cmbLoadAjax_b(url_,id,data_,id_)
{
     $.ajax({
                type: "GET",
                url: url_,
                dataType:"json",
                data: data_,
                success:function (data__)
                {
                    var opti="";
                    $.each(data__, function(i,item){
                    opti =opti + ('<option  value="'+item.id+'">'+item.value+'</option>');
                    });
                    $(id).html(opti);
                    $(id_).trigger("change");
                }
       });
}
function cmbLoadAjax_(url_,id,data_,option_)
{
     $.ajax({
                type: "GET",
                url: url_,
                dataType:"json",
                data: data_,
                success:function (data__)
                {
                    var opti="";
                    $.each(data__, function(i,item){
                    opti =opti + ('<option  value="'+item.id+'">'+item.value+'</option>');
                    });
                    $(id).html(opti);
                    setValue_(id,option_);
                }
       });
}
function show_(id,st_)
{
    if(st_==true){
         $(id).show("slow");
    }
    else
    {
        $(id).hide("slow");
    }
}
function getTable_(id,url,controller,action,param,pag) {
    $.getJSON(url+'?controller='+controller+'&action='+action+'&q='+param+'&p='+pag , function(data) {
    var tbl_body = "";
    var tbl_head ="";
    var hd_row_ = "";  
    var tr_act_="";
       
    $.each(data.rowspag, function(k , v) {
           tr_act_ += "<a class='btn_other'>"+v.value+"</a>";  
    })
    
     $.each(data.columns, function(k , v) {
           hd_row_ += "<th>"+v+"</th>";  
    })
    tbl_head="<tr>"+hd_row_+"</tr>";
    $.each( data.rows, function() {
        var tbl_row = "";
        var rw_id;
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
            if(k==data.id)
               {
                   rw_id= v;
               }
        });
        tbl_body += "<tr>"+tbl_row+ bldAction(rw_id,data.actions )+ "</tr>";    
        
    });
    $("#"+ id+" thead").html(tbl_head);
    $("#"+ id+" tbody").html(tbl_body);
 $("#"+id+"_srh_foot").paginate({
				count                   : data.nrows,
				start                   : 1,
				display                 : 5,
				border			: false,
				border_color		: '#BEF8B8',
				text_color  		: '#68BA64',
				background_color    	: '#E3F2E1',	
				border_hover_color	: '#68BA64',
				text_hover_color  	: 'black',
				background_hover_color	: '#CAE6C6', 
				images			: false,
				mouse                   : 'press',
				onChange     : function(page){
                                    $('._current','#'+id+'_srh_foot').removeClass('_current').hide();
                                    $('#p'+page).addClass('_current').show();
                                    search_(id,page);
                            }
    });
});
}
function bldAction(id,param )
{
    var add_="";
    $.each(param, function(i, v){
                add_ += "<td><img src='"+ v.image+"'/><a href='javascript:"+v.func+"("+id +")' class='"+ v.class_+"'>"+ v.label+"</a></td>";
     })
     return add_;
}

function isEq(name,val)
{
    if($('input[name="'+ name +'"]:checked').val() == val)
        {
            return true;
        }
        return false;
        
}




(function($) {
$.fn.generaMenu_ = function(menu) {

      var capaMenu = $(this);
      //creo e inserto la lista principal
      var ul1 = $('<ul></ul>');
      capaMenu.append(ul1);
      //enlaces principales
      //recorro los elementos del menú
      jQuery.each(menu, function() {
         //ahora en this tengo cada uno de los elementos.
         var li1 = $('<li></li>');    
         //creo el enlace e inserto
         var href1 = $('<a title="'+this.texto+'" href="' + this.url + '"><span>' + this.texto + '</span></a>');
         li1.append(href1);
         ul1.append(li1);
         //guardo la capa submenu en el elemento href1
         //creo una lista para poner los enlaces
         var ul2 = $('<ul class="fmtdDrpDwn"></ul>');
         //añado la lista a capaMenu
         //para cada elace asociado
         jQuery.each(this.enlaces, function() {
            //en this tengo cada uno de los enlaces
            //creo el elemento de la lista del submenú actual
          
            //meto el elemento de la lista en la lista
            
            //creo el enlace
            var li2 = $('<li></li>');
            var href2 = $('<a title="" href="' + this.url + '">' + this.texto + '</a>');
            li2.append(href2);
            ul2.append(li2);
            //cargo el enlace en la lista
            var ul3 = $('<ul></ul>');
            jQuery.each(this.enlaces, function() {
                        var li3 = $('<li></li>');
                        //meto el elemento de la lista en la lista
                        //creo el enlace
                        var href3 = $('<a title="" href="' + this.url + '">' + this.texto + '</a>');
                        li3.append(href3);
                        ul3.append(li3);
             });
            if(this.enlaces.length>0)
            {
             li2.append(ul3);
            }
         
         });
         if(this.enlaces.length>0){
             li1.append(ul2);
         }
         
         
         //inserto la capa del submenu en el cuerpo de la página
      });
   return this;
};

})(jQuery);

function getiTable_(id,url,controller,action,param,pag,hasAction,hasHead,hasPaginate) {
    $(".cargando").show();
    $.getJSON(url+'?controller='+controller+'&action='+action+'&q='+param+'&p='+pag , function(data) {
    var tbl_body = "";
    var tbl_head ="";
    var hd_row_ = "";  
    var tr_act_="";
       
    $.each(data.rowspag, function(k , v) {
           tr_act_ += "<a class='btn_other'>"+v.value+"</a>";  
    })
    
     $.each(data.columns, function(k , v) {
           hd_row_ += "<th>"+v+"</th>";  
    })
    tbl_head="<tr>"+hd_row_+"</tr>";
    $.each( data.rows, function() {
        var tbl_row = "";
        var rw_id;
        $.each(this, function(k , v) {
            tbl_row += "<td>"+v+"</td>";
            if(k==data.id)
               {
                   rw_id= v;
               }
        });
        if(hasAction==true){
        tbl_body += "<tr>"+tbl_row+ bldAction(rw_id,data.actions )+ "</tr>";    
        }
        else
        {
             tbl_body += "<tr>"+tbl_row+"</tr>";  
        }
        
    });
    
    $(".cargando").hide();
    if(hasHead==true){
        $("#"+ id+" thead").html(tbl_head);
    }
    
 
 $("#"+ id+" tbody").html(tbl_body);
 if(hasPaginate==true){
 $("#"+id+"_srh_foot").paginate({
				count                   : data.nrows,
				start                   : 1,
				display                 : 5,
				border			: false,
				border_color		: '#BEF8B8',
				text_color  		: '#68BA64',
				background_color    	: '#E3F2E1',	
				border_hover_color	: '#68BA64',
				text_hover_color  	: 'black',
				background_hover_color	: '#CAE6C6', 
				images			: false,
				mouse                   : 'press',
				onChange     : function(page){
                                    $('._current','#'+id+'_srh_foot').removeClass('_current').hide();
                                    $('#p'+page).addClass('_current').show();
                                    search_(id,page);
                            }
    });
    }
});
}
function  setValue_(id_,optionValue) {
    var idt_= "";
    var name_="";
    var tagName=""; 
    var type_="";
    if((id_.substr(0,1)=="#")||(id_.substr(0,1)=="."))
    {
       idt_= $(id_).attr("id");
       //alert(id_);
       tagName= $(id_).get(0).tagName;
       name_=$(id_).attr("name");
       type_=$(id_).attr("type");
        if(type_=="text")
        {
            $(id_).attr("value",optionValue);
            return true;
        }
        if(type_=="hidden")
        {
            $(id_).attr("value",optionValue);
            return true;
        }
        if(tagName=="SELECT"){
            $("select[id='"+idt_+"'] option[value="+ optionValue +" ]").attr("selected", true);
            $("select[id='"+idt_+"'] ").trigger("click");
            return true;
        }
        
        $(id_).attr("value",optionValue);
    }
    else
    {
       
       name_=id_;
       type_=$("input[name='"+id_+"']").attr("type");
        if (type_=="hidden") 
       {
                $("input[name='"+id_+"']").attr("value",optionValue);
               return true;
               
       }   
       if (type_=="text") 
       {
                $("input[name='"+id_+"']").attr("value",optionValue);
               return true;
               
       }
       else
       {
          
           try{
               tagName=$("[name='"+id_+"']").get(0).tagName;
           }
           catch(e)
           {
               return false;
           }           
       }
    }
    
   
    
    switch (tagName) { 
   	case 'SELECT':
            
            $("select[name='"+name_+"'] option[value="+ optionValue +" ]").attr("selected", true);
            $("select[name='"+name_+"'] ").trigger("click");
      	 break ;
   	case 'INPUT':
            if(type_=="radio"){
           
                //$("input:radio[name='"+id_+"']:eq("+ optionValue +")").attr("checked", true);
                $("input:radio[name='"+id_+"']").each(function()
            {
              if( $(this).attr("value")==optionValue)
                  {
                      $(this).attr("checked", true);
                  }
            });
                $("input:radio[name='"+id_+"']").trigger("change");
                break;
            }
            if(type_=="checkbox"){
             
             if(optionValue.propertyIsEnumerable(0)==true)
             {
                 $("input[name='"+ name_ +"']").each(function(){
                     this.checked=false;
                    }
                 );  
                for(var i in optionValue)
                {
                   
                   $("input[name='"+ name_ +"']").each(function(){
                     if($(this).val()==optionValue[i]){
                        $(this).attr("checked", true);
                     }
                   });
                }
             }
             else
             {
                $("input[name='"+name_+"']:eq("+ optionValue +")").attr("checked", true);
             }
             break;
            }
      	 break 
   	default: 
      	
    }    
    return true;
}


function msg_alert_a(msg_,height_,func_)
{
    var a_=  $('<div id="pop_msg_"><label class="msg_error" >'+msg_+'</label></div>');
    $("body").append(a_);
    $("#pop_msg_").dialog({
        title:'Alerta!',
        modal:true,
        resizable:false,
        width:400,
        height:height_,
        buttons: { "Ok": function() { $(this).dialog("close"); } },
        close:function(){
          $("#pop_msg_").remove();   
          if(func_!="")
          {
              //location.href=func_;
          }
    }});

}
function ifNaN(n_){
    if(isNaN(n_))
    {
        n_=0;
    }
    return parseInt( n_);
}