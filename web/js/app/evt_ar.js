$(function(){
    $( "#dialog" ).dialog({ autoOpen: false ,
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
    $("#ardbs1,#ardbs3,#ardbs4").buttonset();
    $("#arbs1").click(function(){
        $( "#RNI2,#RNI3,#RNI4,#RNI5,#RNI6,#RNI9" ).val("");
        $( "#RAR2" ).attr("selectedIndex", 0);
        $( "#DAR2,#DAR3,#DAR4" ).show("blind");
    });
    $("#arbs2").click(function(){
        $( "#DNI2,#DNI3,#DNI4,#DNI5,#DNI6,#RNI9" ).val("");
        $( "#RAR2" ).attr("selectedIndex", 0);
        $( 'input[name=RAR3]:radio' ).resetbuttonset('#ardbs3');
        $( 'input[name=RAR4]:radio' ).resetbuttonset('#ardbs4');
        $( "#DAR2,#DAR3,#DAR4" ).hide("blind");
    });
    $( "#formar" ).submit(function(){
        bval = true;
        bval = bval && $("#ardbs1").validateradiobutton();
        if($("#arbs1").attr("checked"))
        {
            bval = bval && $( "#RAR2" ).required();
            bval = bval && $("#ardbs3").validateradiobutton();
            bval = bval && $("#ardbs4").validateradiobutton();
        }
        
        if (bval){            
            bval = $( "#arbs3" ).attr("checked") || $( "#arbs4" ).attr("checked");
            if (!bval){
                $( "#arbs3" ).attr("checked",true);
                $( "#arbs3" ).val('');
            }
            bval = $( "#arbs5" ).attr("checked") || $( "#arbs6" ).attr("checked");
            if (!bval){
                $( "#arbs5" ).attr("checked",true);
                $( "#arbs5" ).val('');
            }
            
            str = $( "#formar" ).serializeArray();
            $.ajax({
                type: "GET",
                url: "index.php",
                    dataType: "json",
                    data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                    success: function(data){
                        if ( data.res == 1 ) {
                            $( "#container" ).tabs("enable",15);
                            $( "#container" ).tabs("select",15);
                        }
                        else {
                            msgerror(data.msg);
                        }
                    }
            });
        }
        return false;
    });
});


