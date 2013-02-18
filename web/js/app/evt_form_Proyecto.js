$(function() 
{
    $( "#form_proyecto" ).submit(function(){
        bval = true;
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#proyecto" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
	$("#fecha").datepicker(
    {
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "-20:+0"
        /*minDate: '-65Y',
        maxDate: '-15Y'*/
    });
	$(".btn_other").button();
});

function devolver_proyecto(proyecto_id,proyecto)
{
    opener.document.getElementById("proyecto_id").value=proyecto_id;
    opener.document.getElementById("proyecto").value=proyecto;
    window.close();
}


