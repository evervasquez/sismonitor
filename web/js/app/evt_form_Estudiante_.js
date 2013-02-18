$(function() {
    $( "#form_estudiante" ).submit(function(){
        bval = true;
        bval = bval && $( "#nombre" ).required();
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#escuela" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
    $(".btn_other").button();
});


function devolver_escuela(escuela_id,escuela,tipo_escuela)
{
    opener.document.getElementById("escuela_id").value=escuela_id;
    opener.document.getElementById("escuela").value=escuela;
    opener.document.getElementById("tipo_escuela").value=tipo_escuela;
    window.close();
}