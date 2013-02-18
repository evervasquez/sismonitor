$(function() {
    $( "#idtipo_pregunta" ).focus();
    $( "#idtipo_pregunta" ).css({'width':'450px'});
    $( "#form_pregunta" ).submit(function(){
        bval = true;
        bval = bval && $( "#idtipo_pregunta" ).required();
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


