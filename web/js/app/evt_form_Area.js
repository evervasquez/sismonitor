$(function() {
    $( "#idparte" ).focus();
    $( "#idparte" ).css({'width':'450px'});
    $( "#form_area" ).submit(function(){
        bval = true;
        bval = bval && $( "#area" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
});


