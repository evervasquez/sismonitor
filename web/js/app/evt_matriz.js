 function save(id,meta,item_meta)
 {// alert('ok');
	   if(parseInt(document.getElementById("item_meta"+id).value)>meta)
	   {
			 alert("no puedes poner un numero mayor a la meta");
			 document.getElementById("item_meta"+id).focus();
			 return false;
	   }else{
		    item_meta=parseInt(document.getElementById("item_meta"+id).value);
			str='id='+id;
			str+='&item_meta='+item_meta;
			if(meta!=0){
			var por=(item_meta/meta)*100;
			if(por>=0 && por<=33)
						  {
						   color="#d74937";
						  }
						  if(por>=34 && por<=65)
						  {
						   color="#e5c43b";
						  }
                       if(por>=66 && por<=100)
						  {
						   color="#0a8430";
						  }						  
			$("#color"+id).css("background", color);
			}
			   $.ajax({
                type: "POST",
                url: "index.php",
                data: 'controller=matrizi&action=save&'+str,
                dataType: "json",
                success: function(data){
                   
                            if ( data.rep=="1") {  
                               //  alert(data.msg);								 
                              //  $( "#container" ).tabs("select",1);
                            }
                        } 
            });
		}
 }
 function muestra_subhijo(id)
 { 
    var id=id;
	var item=document.getElementsByName("subhijo"+id);
		for(var i=0;i<item.length;i++)
		{
			  if(item[i].style.display=='none')
			  {
				 $(".subhijo"+id).slideDown();
				 document.getElementById('a_hijo'+id).innerHTML='<img src="images/menos.jpg" width="19" height="19"/>';
			  }else
			  {
			   $(".subhijo"+id).slideUp();
				document.getElementById('a_hijo'+id).innerHTML='<img src="images/mas.jpg" width="19" height="19"/>';
			  }
			  break;
		}
 }
  function muestra_hijo(id)
 { var id=id;
	var item=document.getElementsByName("hijo"+id);
		for(var i=0;i<item.length;i++)
		{
		  
			  if(item[i].style.display=='none')
			  {
				 $(".hijo"+id).slideDown();
				 //document.getElementById('a'+id).innerHTML='[-]';
				 document.getElementById('a'+id).innerHTML='<img src="images/menos.jpg" width="19" height="19"/>';
			  }else
			  {
			   $(".hijo"+id).slideUp();
				document.getElementById('a'+id).innerHTML='<img src="images/mas.jpg" width="19" height="19"/>';
			  }
			  break;
		}
 }
 function ver_grid(t,idd)
 { 
    str='idd='+t;
    str+='&id='+idd;
	if(t!=""){
    cuteLittleWindow = window.open("index.php?controller=Matrizi&action=trimestre&"+str, "littleWindow","location=no,width=650,height=200,top=80,left=400,scrollbars=yes");
	}
	return false;
	
 }
 $(function()
 {
   $("#save_trimestre").click(function()
   {
     var id_indicador=$("#indi_id").val();
     var tiempo_id=$("#tiempo_id").val();
     var metatotal=$("#meta").val();
     var meta_detalle=$("#meta_detalle").val();
     var ejecutado=$("#ejecutado").val();
     var avance_t=$("#avance_t").val();
	 var mayor;
	 //alert(metatotal);
	// alert(avance_t);
	 if(avance_t=="")
	 {
	   mayor=parseInt(metatotal);
	   msq="la meta del trimestre supera a la meta total";
	 }else
	 {
	   mayor=parseInt((metatotal-avance_t));
	   msq="la meta del trimestre supera  a la cantidad de meta restante";
	 }
	 //alert(mayor+" avance: "+avance_t);
	
			 if(parseInt(meta_detalle)>mayor)
			 {
				  alert(msq);
				  return false;
			 }else if(parseInt(ejecutado)>parseInt(meta_detalle))
			 {
				   alert('el ejecutado supera a la meta del trimestre');
				   return false;
			 }else 
			 {
			  document.getElementById("save_trimestre").style.display='none';
			  // alert('todo bien');
			  
			  str=$("#_frm").serialize();
			 // alert(str);
			   $.post('index.php','controller=Matrizi&action=save_trimestre&'+str,function(data)
					{
										   
							if (data.rep=="1") 
							{
											strr='idd='+tiempo_id;
                                            strr+='&id='+id_indicador;
											
										//alert(strr);
											$.post('index.php','controller=Matrizi&action=devolver_trimestre&'+strr,function(datos)
											{
											//   alert("%tr"+datos.por_trimestre+" av "+datos.avance+"por"+datos.porpryecto);
												document.getElementById("avance_detalle").innerHTML=datos.por_trimestre;
												document.getElementById("avance").innerHTML=datos.avance;
												document.getElementById("por").innerHTML=datos.porpryecto;
												if(datos.metas_periodo==datos.avance)
												{
												document.getElementById("msg").innerHTML='ya se completo el total de la meta establecido';
												}
												
											},'json');	
											
                                   }											
					},'json');	
				
			 }
   
   });
   $("#tiempo_id").change(function()
   {
      vv = $(this).val();
	  if(vv!="")
	  {  
	   /* $('#dialog').dialog(
			{
				draggable: false,
				show:'fade',
				autoOpen: false,
				modal:true,
				position:'center',
				width: 900,
				height:'auto',
				title: 'reporteria',
				resizable: false,
				buttons:{}
			});
			$( "#dialog" ).dialog("open");
			$("#dialog").load("../view/matrizi/prueba.php","",function(data){$("#dialog").empty().append(data);/*show_me();$.getScript('web/js/evnt/val_login.js');});*/
			window.open("../view/_Excel_matriz.php?tiempo_id="+vv);
			
	  }
	  return false;
   
   }); 
$('#container').tabs({
		ajaxOptions: {
                    error: function(xhr, status, index, anchor) {
		    $(anchor.hash).html();
                    }
		   }
		,
            fx: {opacity: 'toggle'},
            spinner: 'Cargando...'}
           );   
 });
 function show_me()
{
   $( "#dialog" ).dialog( "open" );
}