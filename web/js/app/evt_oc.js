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
    $( "#formoc" ).submit(function(){
        bval = $("#formoc").validateradio({'number':4});
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",13);
                        $( "#container" ).tabs("select",13);
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


