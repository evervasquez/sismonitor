$(function(){
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
    $( "#dialog-end" ).dialog(
                        {title:'Fin',autoOpen: false, resizable: false , draggable: true, position:'center', modal:true,
                            buttons: {
                            Ok: function() {
                                $( this ).dialog( "close" );
                                window.location = "index.php?controller=Activa&action=Resumen_Activa";
                                $.ajax({
                                    type: "GET",
                                    url: "index.php",
                                    data: {'controller':'Activa','action':'Destroy_ID' },
                                    success: function(data){
                                    }
                                });
                            }
                        },
                        close: function(){
                            window.location = "index.php?controller=Activa&action=Resumen_Activa";
                                $.ajax({
                                    type: "GET",
                                    url: "index.php",
                                    data: {'controller':'Activa','action':'Destroy_ID' },
                                    success: function(data){
                                    }
                                });
                        }
                    });
    $( "#formop" ).submit(function(){
        bval = true;
        bval =  bval && $("#formop").validateradio({'number':9});
        bval = bval && $( 'input[name|="ROP10-1"]' ).required();
        bval = bval && $( 'input[name|="ROP10-2"]' ).required();
        bval = bval && $( 'input[name|="ROP10-3"]' ).required();
        bval = bval && $( 'input[name|="ROP11-1"]' ).required();
        bval = bval && $( 'input[name|="ROP11-2"]' ).required();
        bval = bval && $( 'input[name|="ROP11-3"]' ).required();
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#dialog-end" ).dialog("open");
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


