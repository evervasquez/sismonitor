$(function(){
    $("#nidbs1,#nidbs2").buttonset();
    $( "#dialog" ).dialog({ autoOpen: false ,
                        draggable: true,
                    modal:true,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false ,
                    buttons: {
                        Ok: function(){
                            $( this ).dialog( "close" );
                        }
                    } });
    $("#nibs1").click(function(){
        $( "#RNI2,#RNI3,#RNI4,#RNI5,#RNI6,#RNI9" ).val("");
        $( "#RNI8" ).attr("selectedIndex", 0);
        $( 'input[name=RNI7]:radio' ).resetbuttonset('#nidbs2');
        $( "#DNI2,#DNI3,#DNI4,#DNI5,#DNI6,#DNI7,#DNI8,#DNI9,#TNI" ).show("blind");
    });
    $("#nibs2").click(function(){
        $( "#DNI2,#DNI3,#DNI4,#DNI5,#DNI6,#RNI9" ).val("");
        $( "#RNI8" ).attr("selectedIndex", 0);
        $( 'input[name=RNI7]:radio' ).resetbuttonset('#nidbs2');
        $("#TNI").resetradio();
        $( "#DNI2,#DNI3,#DNI4,#DNI5,#DNI6,#DNI7,#DNI8,#DNI9,#TNI" ).hide("blind");
    });
    $( "#RNI5" ).change(function(){
        if ( $( "#RNI4" ).val() == '' ) {
            $( "#RNI4" ).addClass('ui-state-error');
            $( this ).val('');
        } else {
            $( "#RNI4" ).removeClass('ui-state-error');
        }
    });
    $( "#formni" ).submit(function(){
        bval = true;
        bval = bval && $("#nidbs1").validateradiobutton();
        if($("#nibs1").attr("checked"))
        {
            bval = bval && $( "#RNI2" ).required();
            bval = bval && $( "#RNI3" ).required();
            bval = bval && $( "#RNI4" ).required();
            bval = bval && $( "#RNI5" ).required();
            bval = bval && $( "#RNI6" ).required();
            bval = bval && $("#nidbs2").validateradiobutton();            
            bval = bval && $( "#RNI8" ).required();
            bval = bval && $( "#RNI9" ).required();
            bval = bval && $("#TNI").validateradio({'number':4});
        }
                
        if (bval){
            bval = $( "#nibs3" ).attr("checked") || $( "#nibs4" ).attr("checked");
            if (!bval){
                $( "#nibs3" ).attr("checked",true);
                $( "#nibs3" ).val('');
            }
            bval = false;
            $('input[name|="RNI10"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RNI10"]:eq(0)').attr('checked',true);$('input[name|="RNI10"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RNI11"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RNI11"]:eq(0)').attr('checked',true);$('input[name|="RNI11"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RNI12"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RNI12"]:eq(0)').attr('checked',true);$('input[name|="RNI12"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RNI13"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RNI13"]:eq(0)').attr('checked',true);$('input[name|="RNI13"]:eq(0)').val("");}
            str = $( "#formni" ).serializeArray();            
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",11);
                        $( "#container" ).tabs("select",11);
                    }
                    else {
                        msgerror(data.msg);
                    }
                }
            });
        } else {
            msg('Todos los datos son requeridos.');
        }
        return false;
    });
});


