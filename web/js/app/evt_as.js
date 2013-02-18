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
                    }
                    });
    $( "#formas" ).submit(function(){
        str = $( this ).serializeArray();
        bval = true;
        bval = bval && $( "#RAS1" ).required();
        bval = bval && $( "#RAS2" ).required();
        bval = bval && $( "#RAS3" ).required();
        bval = bval && $( "#RAS4" ).required();
        bval = bval && $( "#RAS5" ).required();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",4);
                        $( "#container" ).tabs("select",4);
                    }
                    else {  }
                }
            });
        } 
        return false;
    });
});


