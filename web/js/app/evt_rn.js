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
    $( "#formrn" ).submit(function(){
        bval = $("#formrn").validateradio({'number':3});
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",8);
                        $( "#container" ).tabs("select",8);
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


