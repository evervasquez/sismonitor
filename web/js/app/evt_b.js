$(function(){
    $("#deb").buttonset(); 
    $(".checks_").buttonset();
    $('input[type="radio"]').change( function(data) {
    var att=$(this).attr("name");
    switch (att) { 
   	case 'PB[2][0]':
      	  if (isEq( att, '1')){        

                show_("#P2_1,#P2_2",true);
                
            } else 
            {  
                show_("#P2_1,#P2_2",false);
            }
      	 break; 
   	case 'PB[3][0]':
            if (isEq( att, '1')){        
                show_("#PB3_1",true);
            } else 
            {  
                show_("#PB3_1",false);
            }
      	 break; 
   	case 'PB[4][0]':
            if (isEq( att, '1')){        
                show_("#PB4_1,#PB5",true);
            } else 
            {  
                show_("#PB4_1,#PB5",false);
            }      	 
      	 break; 
         case 'PB[6][0]':
            if (isEq( att, '1')){        
                show_("#PB6_1",true);
                show_("#PB6_2",false);
            } 
            if(isEq( att, '2'))
            {  
                show_("#PB6_1",false);
                show_("#PB6_2",true);
            }  
            if(isEq( att, '98'))
                {
                show_("#PB6_1",false);
                show_("#PB6_2",false);
                }
      	 break; 
        case 'PB[12][1]':
            if(isEq( att, '2'))
            {  
                show_("#PB12_1",true);
            }
            else
            {
                show_("#PB12_1",false);
            }
            
      	 break; 
         case 'PB[13][1]':
            if(isEq( att, '1'))
            {  
                show_("#PB13_1,#PB13_2,#PB14,#PB15",true);
            
            }
            else
            {
                show_("#PB13_1,#PB13_2,#PB14,#PB15",false);
            }
      	 break; 
         case 'PB[13][1]':
            if(isEq( att, '1'))
            {  
                show_("#PB13_1,#PB13_2,#PB14,#PB15",true);
            
            }
            else
            {
                show_("#PB13_1,#PB13_2,#PB14,#PB15",false);
            }
      	 break; 
         case 'PB[16][0]':
            if(isEq( att, '1'))
            {  
                show_("#PB16_1",true);
            
            }
            else
            {
                show_("#PB16_1",false);
            }
      	 break; 
         
   	default: 
      	
} 
        if ($("#PPO1:checked").val() == '1'){        
            show_("#P2_1,#P2_2",true);
        } else 
        {  
            show_("#P2_1,#P2_2",false);
        }
    });
    
    
    
    
    
    
    
    
    $("#btn_pp2_1").click(function(e){
        e.preventDefault();
        add_rows_("hijos");
    });
        
    $("#btn_add_5").click(function(){
       p5_add("#tb_p5",$("#p5_val").val());
    });
    $("#btn_odd_5").click(function(){
       p5_odd($("#p5_val").val());
    });
    $(".btn_other").button();
    $( "#dialog" ).dialog({autoOpen: false ,
                        draggable: true,
                    modal:true,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false,
                    buttons: {
                        Ok: function(){
                            $( this ).dialog( "close" );
                        }
                    }
            });
    $("#btn_pp2_1").click(function(e){
        e.preventDefault();
        add_rows_("hijos");
    });
    $( "#RDE1" ).change(function(){
            var n = $( this ).val();
            if (Number(n) >= 12){
                $( "#msgdialog" ).text('Solo se necesita información de 12 personas.');
                $( "#dialog" ).dialog("open");
            }
            $.ajax({
                type: "GET",
                url: "index.php",
                data: "controller=Activa&action=Rde2&p=" + n,
                success: function(data){
                    $("#listde2").empty().append(data);
                }
            });
        
    });
    $( "#RDE7" ).change(function(){
       $( "#RDE8 , #RDE10 , #RDE11 " ).attr("selectedIndex", 0);
       $( "#RDE9" ).val("");
       $( "#DDE8,#DDE9,#DDE10,#DDE11" ).show("slow");
       if ( $(this).val() == "1" ) {
           $( "#DDE8" ).hide("blind");
       }
       if ( $(this).val() == "2" ) {
           $( "#DDE8,#DDE9,#DDE10,#DDE11" ).hide("slow");
       }
    });
    $( "#RDE8" ).change(function(){
       if ( $(this).val() == "2" ) {
           $( "#DDE9,#DDE10" ).hide("slow");
       }
    });
    $("#debs2").click(function(){
        $( "#DDE9,#DDE10" ).hide("slow");
    });
    $("#debs1").click(function(){
       $( "#DDE9" ).val("")
       $( "#RDE10" ).attr("selectedIndex", 0);
       $( "#DDE9,#DDE10" ).show("blind");
    });
    $( "#RDE10" ).change(function(){
       $( "#RDE11" ).attr("selectedIndex", 0);
       $( "#DDE11" ).hide("slow");
       if ( $(this).val() == "" ) {
           $( "#DDE11" ).show("slow");
       }
    });
    $( "#RDE12" ).change(function(){
       $( "#RDE13" ).val( "" );
       $( "#RDE12-1" ).val( "" );
       $( "#RDE12-1" ).hide("slow");
       $( "#DDE13" ).show("slow");
       if ( $(this).val() == "2" ) {
           $( "#RDE12-1" ).show("slow");
       }
       if ( $(this).val() == "1" ) {
           $( "#DDE13" ).hide("slow");
       }

    });
    $( "#RDE14" ).change(function(){
            $( "#DDE15" ).show( "slow" );
            $( "#RDE15" ).attr("selectedIndex", 0);
        if ( $(this).val() == "8" || $(this).val() == "9"  ) {
            $( "#DDE15" ).hide( "slow" );
        }
    });
    $( "#RDE21" ).change(function(){
            $( "#DDE22" ).show( "slow" );
            $( "#RDE22" ).attr("selectedIndex", 0);
        if ( $(this).val() == "1") {
            $( "#DDE22" ).hide( "blind" );
        }
    });
    $( "#formde" ).submit(function(){        
        bval = true;
        bval = bval && $( "#RDE1" ).required();
        $('input[name|="citas[]"]').each(function(){
            bval = bval && $( this ).required();
        });
        $('select[name|="parentesco[]"]').each(function(){
            bval = bval && $( this ).required();
        });
        $('select[name|="sexo[]"]').each(function(){
            bval = bval && $( this ).required();
        });
        $('input[name|="edad[]"]').each(function(){
            bval = bval && $( this ).required();
        });
        $('select[name|="nivel[]"]').each(function(){
            bval = bval && $( this ).required();
        });
        $('select[name|="ingreso[]"]').each(function(){
            bval = bval && $( this ).required();
        });

        bval = bval && $( "#RDE3" ).required();
        bval = bval && $( "#RDE4" ).required();
        bval = bval && $( "#RDE5" ).required();
        bval = bval && $( "#RDE6" ).required();
        bval = bval && $( "#RDE7" ).required();
        if ( $( "#RDE7" ).val()== 1 ) {
            bval = bval && $( "#RDE9" ).required();
            bval = bval && $( "#RDE10" ).required();
        }
        if ( $( "#RDE7" ).val()== 3 ) {
            bval = bval && $("#dedbs1").validateradiobutton();
        }
        if ( $( "#debs1" ).attr("checked") ) {
            bval = bval && $( "#RDE9" ).required();
            bval = bval && $( "#RDE10" ).required();
        }
        if ( $( "#debs2" ).attr("checked") ) {
            bval = bval && $( "#RDE11" ).required();
        }
        bval = bval && $( "#RDE12" ).required();
        if ( $( "#RDE12" ).val()== 2 ) {
            bval = bval && $( "#RDE12-1-id" ).required();
            bval = bval && $( "#RDE13" ).required();
        }
        bval = bval && $( "#RDE14" ).required();
        if ( Number($( "#RDE14" ).val()) <= 8 ) {
            bval = bval && $( "#RDE15" ).required();
        }
        bval = bval && $( "#RDE16" ).required();
        bval = bval && $( "#RDE17" ).required();
        bval = bval && $( "#RDE18" ).required();
        bval = bval && $( "#RDE19" ).required();
        bval = bval && $( "#RDE20" ).required();
        bval = bval && $( "#RDE21" ).required();
        if ( Number($( "#RDE21" ).val()) > 1 ) {
            bval = bval && $( "#RDE22" ).required();
        }
        if(bval){
            bval = $( "#debs1" ).attr("checked") || $( "#debs2" ).attr("checked");            
            if (!bval){
                $( "#debs1" ).attr("checked",true);
                $( "#debs1" ).val('');
            }
            str = $( "#formde" ).serializeArray();
            substr = $( 'input[name|="citas[]"]' ).serialize() + '&' +
              $('select[name|="parentesco[]"]').serialize() + '&' +
              $('select[name|="sexo[]"]').serialize() + '&' +
              $('input[name|="edad[]"]').serialize() + '&' +
              $('select[name|="nivel[]"]').serialize() + '&' +
              $('select[name|="ingreso[]"]').serialize();
            $.ajax({
                type: "GET",
                url: "index.php",
                data: 'controller=Activa&action=Saveactiva&'+ substr ,
                dataType: "json",
                success: function(data){
                    if(data.res=="1"){
                    $.ajax({
                        type: "GET",
                        url: "index.php",
                        dataType: "json",
                        data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                        success: function(data){
                            if ( data.res == 1 ) {                                
                                $( "#container" ).tabs("select",2);
                            }
                            else {
                                msgerror(data.msg);
                            }
                        }
                    });
                    } else {
                      msgerror(data.msg);
                    }
                }
            });
        }
        return false;
    });    
   
     $(document).ready(function(){
        loadData2();
    });
    
});
function agregar_(id_,nrow_)
{ 
    var next_=(nrow_+1);
        var row_ ='<td style="width:40px;" >'+next_+'</td>';
        row_=row_+'<td><input type="text" class="input_text_" name="HIJOS['+ next_ +'][0]" style="width:150px" ><input type="text" class="input_text_" style="width:150px" name=HIJOS['+ next_ +'][1] ></td>';
        row_=row_+'<td><input type="text" class="input_text_" name="HIJOS['+next_+'][2]" style="width:50px"> </td>';
        row_=row_+'<td><div  id="chk_'+next_ +'" >';
        row_=row_+'<input  type="radio" id="PP2_1_2_row_'+ next_ +'_1" name="HIJOS['+next_ +'][3]" value="1"  /><label for="PP2_1_2_row_'+ next_ +'_1" >Si</label>';
        row_=row_+'<input  type="radio" id="PP2_1_2_row_'+ next_ +'_2" name="HIJOS['+next_+'][3]" value="2" /><label for="PP2_1_2_row_'+ next_ +'_2" >No</label>';
        row_=row_+'</div></td>';
        row_=row_+'<td><a href="javascript:eliminar_(\'hijos\','+next_+')" class="btn_other" id="btn_'+id_+'_'+next_+'"> Eliminar </a>  </td>';
        row_='<tr id="'+id_+'_rw_'+ next_ +'" >'+row_ +'</tr>';
        $("#tb_"+id_).append(row_);
        $("#chk_"+(nrow_+1)).buttonset();
        $(".btn_other").button();
        $("#btn_"+id_+"_"+nrow_).hide("slow");
        
}
function add_rows_(id)
{
    var ct=parseInt($("#"+id+"_ctr").val());
    agregar_(id,ct);
    ct=ct+1;
    $("#"+id+"_ctr").attr("value",ct);
    $("#preg_1_1").attr("value",ct);
    
}
function eliminar_(id_,nrow_)
{
    $("#"+id_+"_rw_"+nrow_).remove();
    var ct=parseInt($("#"+id_+"_ctr").val());
    ct=ct-1;
    $("#"+id_+"_ctr").attr("value",ct);
    $("#preg_1_1").attr("value",ct);
    $("#btn_"+id_+"_"+ct).show();
}

function p5_add(id,index_)
{
     var b="<input type='text' class='input_text_' style='width:200px' name='PA[5]["+index_+"]'>";
     $(id).append("<tr id='PA5_"+index_ +"' ><td>"+index_ +"</td><td>"+b +"</td></tr>");
    index_= parseInt(index_)+1;
     $("#p5_val").attr("value",index_ );
}
function p5_odd(index_)
{

    $("#PA5_"+index_).remove();
   if(parseInt(index_)>0)
   {
    index_= parseInt(index_)-1;
    $("#p5_val").attr("value",index_ );
   }
   
}

function loadData2() {
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
           var cultivo="";
           if(data_[0].idCultivo)
           {
               cultivo="CAFE";
           }
           else
           {
               cultivo="CACAO";
           }
           setValue_("#PP1",data_[0].idEstadoCivil);
           setValue_("PB[2][0]",data_[0].SiHijos);
           if(data_[0].SiHijos==1)
               {
                   var i=0;
                   i= parseInt(i);
                  // $("#P2_1").show("slow");
                  // $("#P2_2").show("slow");
                   for(i=1;i<=data_[0].NroHijos;i++)
                       {
                          add_rows_("hijos");
                          setValue_("HIJOS["+i+ "][0]",data_[0].ListaHijos[i-1].Nombres);
                          setValue_("HIJOS["+i+ "][2]",data_[0].ListaHijos[i-1].Edad);
                          setValue_("HIJOS["+i+ "][3]",parseInt(data_[0].ListaHijos[i-1].Asiste));
                           
                       }
                   
               }
        
            setValue_("PB[3][0]",data_[0].EsAsociado);
            setValue_( "PB[3][1]",data_[0].orgAsociacion[0].Nombre);
            setValue_("PB[4][0]",data_[0].RecibeAsistencia);  
            setValue_("PB[4][1]",data_[0].orgAsistencia[0].Nombre);  
            setValue_(".cultivo",cultivo);
            var list_apr="";
            $.each(data_[0].detalleAprendio,function(indx,value){
               list_apr+= "<td>"+indx+ "</td><td>"+value.Descripcion+"</td>";
            });
            $("#tb_p5").append(list_apr);
            setValue_("PB[6][0]",data_[0].DispuestoPagar);
            setValue_("PB[6][1]",data_[0].Cuanto);
            setValue_("PB[7][0]",data_[0].CtsTerrenosTiene);
            setValue_("PB[7][1]",data_[0].CuantasHas);
            setValue_("PB[8][0]",data_[0].CuantosCC);
            setValue_("PB[8][1]",data_[0].CuantasProduccion);
            setValue_("PB[8][2]",data_[0].CuantasCrecimiento);
            setValue_("PB[8][3]",data_[0].CuantasOtras);
            
            setValue_("PB[9][0]",data_[0].AreaCosechada);
            setValue_("PB[9][1]",data_[0].CantidadCosechada);
            setValue_("PB[9][2]",data_[0].EdadPlantacion);
            setValue_("PB[9][3]",data_[0].NPlantAC);
            setValue_("PB[9][4]",data_[0].NoCosecho);
            
            setValue_("PB[10][0]",data_[0].CantidadVendida);
            setValue_("PB[10][1]",data_[0].NoVendio);
          
            $.each(data_[0].detComprador,function(idx,value)
            {
                setValue_("PRESUPUESTO["+ idx+"][0]",value.detComprador[0].Cantidad);
                setValue_("PRESUPUESTO["+ idx+"][1]",value.detComprador[0].Precio);
            }); 
            
            setValue_("PB[12][1]",data_[0].EsSuficiente);
            setValue_("PB[12][2]",data_[0].PorqueNoSuf);
            
            setValue_("PB[13][1]",data_[0].FamiliarRecibioCredito);
            setValue_("PB[13][2]",data_[0].financiera[0].Descripcion);
           
           
            var lista_ = new Array(); 
            $.each(data_[0].detUsoCredito, function(index_, value){
                    lista_[index_]=value.idUsoDeCredtio;
            });
            setValue_("PB[13][3]",lista_);
            setValue_("PB[14][0]",data_[0].FormaCredito);
            setValue_("PB[15][0]",data_[0].GarantiaPresentada);
            setValue_("PB[16][0]",data_[0].DocPropiedadGarantia);
            setValue_("PB[16][1]",data_[0].EspecificarDocumento);
         $(".checks_").buttonset("destroy").buttonset();
            
        }
    });
    }
}