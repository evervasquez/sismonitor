$(function(){
    $("#deb").buttonset(); 
    $(".checks_").buttonset();
    $('input[type="radio"]').change( function(data) {
    var att=$(this).attr("name");
    switch (att) { 
   	case 'PB[5][0]':
      	  if (isEq( att, '1')||isEq( att, '2')){        

                show_("#P5_1,#P6",true);
                
            } else 
            {  
                show_("#P5_1,#P6",false);
            }
      	 break; 
   	 case 'PB[13][0]':
      	  if (isEq( att, '1')){        

                show_("#PB13_1",true);
                
            } else 
            {  
                show_("#PB13_1",false);
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
        
    $("#btn_add_5").click(function(e){
       p5_add("#tb_p5",$("#p5_val").val());
    });
    $("#btn_odd_5").click(function(e){
       e.preventDefault();
       p5_odd($("#p5_val").val());
    });
      $("#btn_add_p6").click(function(e){
       p6_add("#tb_p6",$("#p6_val").val());
    });
    $("#btn_odd_p6").click(function(e){
       e.preventDefault();
       p6_odd($("#p6_val").val());
    });
    $("#btn_add_p9").click(function(e){
        e.preventDefault();
       p9_add("#tb_p9",$("#p9_val").val());
    });
    $("#btn_odd_p9").click(function(){
       p9_odd($("#p9_val").val());
    });
    
    $("#btn_add_p13_1").click(function(e){
        e.preventDefault();
       p13_1_add("#tb_p13_1",$("#p13_1_val").val());
    });
    $("#btn_odd_p13_1").click(function(){
       p13_1_odd($("#p13_1_val").val());
    });
    
    
    $("#btn_add_p12").click(function(e){
        e.preventDefault();
       p12_add("#tb_p12",$("#p12_val").val());
    });
    $("#btn_odd_p12").click(function(){
       p12_odd($("#p12_val").val());
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
   
    
    
});


function eliminar_(id_,nrow_)
{
    $("#"+id_+"_rw_"+nrow_).remove();
    var ct=parseInt($("#"+id_+"_ctr").val());
    ct=ct-1;
    $("#"+id_+"_ctr").attr("value",ct);
    $("#preg_1_1").attr("value",ct);
    $("#btn_"+id_+"_"+ct).show();
}

function p9_add(id,index_)
{
    index_= parseInt(index_)+1;
    var lista_="";
         lista_ += '<td height="19"><input type="text" name="PRODUCTO['+index_+'][0]" class="input_text_" style="width:240px;" /></td>';
         lista_ += '<td><input type="text" name="PRODUCTO['+index_+'][1]" class="input_text_" onkeypress="return permite(event,\'num\')" style="width:60px"/></td>'
         lista_ += '<td><input type="text" name="PRODUCTO['+index_+'][2]" class="input_text_" onkeypress="return permite(event,\'num\')" style="width:60px"/></td>';
         lista_ += '<td><input type="text" name="PRODUCTO['+index_+'][3]" class="input_text_" onkeypress="return permite(event,\'num\')" style="width:60px"/></td>';
        $(id).append("<tr id='PA9_"+index_ +"' >"+lista_ +"</tr>");
        $("#p9_val").attr("value",index_ );
}
function p9_odd(index_)
{

    $("#PA9_"+index_).remove();
   if(parseInt(index_)>0)
   {
    index_= parseInt(index_)-1;
    $("#p9_val").attr("value",index_ );
   }
   
}
function p6_add(id,index_)
{
    index_= parseInt(index_)+1;
    var lista_="";
         
         lista_ += '<td >'+index_+'</td>';
         lista_ += '<td><input type="text" class="input_text_"  name="PB6['+index_+'][0]" style="width:180px;" /></td>';																
         
        $(id).append("<tr id='PB6_"+index_ +"' >"+lista_ +"</tr>");
        $("#p6_val").attr("value",index_ );
}
function p6_odd(index_)
{

    $("#PB6_"+index_).remove();
   if(parseInt(index_)>0)
   {
    index_= parseInt(index_)-1;
    $("#p6_val").attr("value",index_ );
   }
   
}

function p12_add(id,index_)
{
    index_= parseInt(index_)+1;
    var lista_="";
         lista_ +='<td >';
         lista_ +='<input type="text" name="FINANCIERA['+index_+'][0]"  class="input_text_" style="width:250px"/></td>';
         lista_ +='<td><input type="text" name="FINANCIERA['+index_+'][1]" class="input_text_" style="width:80px" onkeypress="return permite(event,\'num\')" /></td>',

        $(id).append("<tr id='PB12_"+index_ +"' >"+lista_ +"</tr>");
        $("#p12_val").attr("value",index_ );
}
function p12_odd(index_)
{

   $("#PB12_"+index_).remove();
   if(parseInt(index_)>0)
   {
    index_= parseInt(index_)-1;
    $("#p12_val").attr("value",index_ );
   }
   
}
function p13_1_add(id,index_)
{
    index_= parseInt(index_)+1;
    var lista_="";
        lista_ +='<td>';
        lista_ +='<input type="text" name="FONDOS['+index_+'][0]"  class="input_text_" style="width:250px" /></td>';
        lista_ +='<td><input type="text" name="FONDOS['+index_+'][1]" class="input_text_" style="width:80px" onkeypress="return permite(event,\'num\')" /></td>';
        $(id).append("<tr id='PB13_1_"+index_ +"' >"+lista_ +"</tr>");
        $("#p13_1_val").attr("value",index_ );
}
function p13_1_odd(index_)
{

   $("#PB13_1_"+index_).remove();
   if(parseInt(index_)>0)
   {
    index_= parseInt(index_)-1;
    $("#p13_1_val").attr("value",index_ );
   }
   
}