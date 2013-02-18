$(function(){
    $( "#RNF1" ).change(function(){
       $( "#DNF2" ).show("blind");
       $( "#RNF2" ).attr("selectedIndex", 0);
       if ( $(this).val() == "1" ) {
           $( "#DNF2" ).hide("blind");
       }
    });
    $( "#formnf" ).submit(function(){
        str = $( this ).serializeArray();
        bval = true;
        bval = bval && $( "#RNF1" ).required();
        if ( Number($( "#RNF1" ).val()) > 1 ) {
            bval = bval && $( "#RNF2" ).required();
        }        
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",10);
                        $( "#container" ).tabs("select",10);
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


