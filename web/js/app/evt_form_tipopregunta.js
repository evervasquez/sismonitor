$(function() {
    $( "#idparte" ).focus();
    $( "#idparte" ).css({'width':'450px'});
    $( "#form_tipopregunta" ).submit(function(){
        bval = true;
        bval = bval && $( "#idparte" ).required();
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


