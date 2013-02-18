$(function(){
    $( "#idencuesta" ).focus();
    $( "#idencuesta" ).css({'width':'450px'});
    $( "#form_parte" ).submit(function(){
        bval = true;
        bval = bval && $( "#idencuesta" ).required();
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


