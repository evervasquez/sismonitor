$(function() {
    $( "#form_TipoPreg" ).submit(function(){
        bval = true;
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


