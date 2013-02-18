$(function(){
    $("#vidbs1,#vidbs2,#vidbs3,#vidbs4,#vidbs5,#vidbs6,#vidbs7,#vidbs8,#vidbs9,#vidbs10,#vidbs11,#vidbs12,#vidbs13,#vidbs14").buttonset();
    $( "#dialog" ).dialog({autoOpen: false ,
                        draggable: true,
                    modal:true,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false ,
                    buttons: {
                        Ok: function(){
                            $( this ).dialog( "close" );
                        }
                    }});
    $( "#formvi" ).submit(function(){
        bval = true;
        bval = bval && $( 'input[name|="RVI1-1"]' ).required();
        bval = bval && $( 'input[name|="RVI2-1"]' ).required();
        bval = bval && $( 'input[name|="RVI3-1"]' ).required();
        bval = bval && $( 'input[name|="RVI4-1"]' ).required();
        bval = bval && $( 'input[name|="RVI5-1"]' ).required();
        bval = bval && $( 'input[name|="RVI6-1"]' ).required();
        bval = bval && $( 'input[name|="RVI7-1"]' ).required();
        bval = bval && $( 'input[name|="RVI8-1"]' ).required();
        bval = bval && $( 'input[name|="RVI9-1"]' ).required();
        bval = bval && $( 'input[name|="RVI10-1"]' ).required();
        bval = bval && $( 'input[name|="RVI11-1"]' ).required();
        bval = bval && $( 'input[name|="RVI12-1"]' ).required();
        bval = bval && $( 'input[name|="RVI13-1"]' ).required();
        bval = bval && $( 'input[name|="RVI14-1"]' ).required();
        bval = bval && $("#formvi").validateradio({'number':14});
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",14);
                        $( "#container" ).tabs("select",14);
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
        $( '#vibs2' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI1-1"]' ).val("0");
            }
        });
        $( '#vibs4' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI2-1"]' ).val("0");
            }
        });
        $( '#vibs6' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI3-1"]' ).val("0");
            }
        });
        $( '#vibs8' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI4-1"]' ).val("0");
            }
        });
        $( '#vibs10' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI5-1"]' ).val("0");
            }
        });
        $( '#vibs12' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI6-1"]' ).val("0");
            }
        });
        $( '#vibs14' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI7-1"]' ).val("0");
            }
        });
        $( '#vibs16' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI8-1"]' ).val("0");
            }
        });
        $( '#vibs18' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI9-1"]' ).val("0");
            }
        });
        $( '#vibs20' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI10-1"]' ).val("0");
            }
        });
        $( '#vibs22' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI11-1"]' ).val("0");
            }
        });
        $( '#vibs24' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI12-1"]' ).val("0");
            }
        });
        $( '#vibs26' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI13-1"]' ).val("0");
            }
        });
        $( '#vibs28' ).click(function(){
            if ( $(this).attr("checked") ) {
                $( 'input[name|="RVI14-1"]' ).val("0");
            }
        });
});


