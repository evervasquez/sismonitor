$(function() {
    $( "#descripcion" ).focus();
    $( "#form_encuesta" ).submit(function(){
        bval = true;
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


