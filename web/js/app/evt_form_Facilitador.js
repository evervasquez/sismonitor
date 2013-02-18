$(function() {
    $( "#idparte" ).focus();
     
    $( "#idparte" ).css({'width':'450px'});
    $( "#form_Facilitador" ).submit(function(){
        bval = true;
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
	$("#fecha_nac").datepicker(
    {
        
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "-80:+0"
        /*minDate: '-65Y',
        maxDate: '-15Y'*/
    });

});

function devolver_facilitador(facilitador_id,facilitador)
{
    opener.document.getElementById("facilitador_id").value=facilitador_id;
    opener.document.getElementById("facilitador").value=facilitador;
    window.close();
}


