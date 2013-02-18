$(function() {
    $( "#form_detalle_proyecto" ).submit(function(){
        bval = true;
        bval = bval && $( "#proyecto" ).required();
        bval = bval && $( "#area" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
    $(".btn_other").button();
});