$(function(){
    $( "#dialog" ).dialog({ autoOpen: false ,
                        draggable: true,
                    modal:true,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false });
    $( "#formac" ).submit(function(){
        bval = $("#formac").validateradio({'number':11});
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",6);
                        $( "#container" ).tabs("select",6);
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


