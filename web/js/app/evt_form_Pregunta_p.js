$(function() {
    $( "#form_pregunta" ).submit(function(){
        bval = true;
        bval = bval && $( "#area" ).required();
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#tipopreg_id" ).required();
        bval = bval && $( "#peso" ).required();
        bval = bval && $( "#descripcion" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
    $(".btn_other").button();
});


function devolver_prueba(prueba_id,area,fecha)
{
    opener.document.getElementById("prueba_id").value=prueba_id;
    opener.document.getElementById("area").value=area;
    opener.document.getElementById("fecha").value=fecha;
    window.close();
}

function devolver_pregunta(pregunta_id,descripcion,descripcion_p,peso)
{
    opener.document.getElementById("pregunta_id").value=pregunta_id;
    opener.document.getElementById("descripcion").value=descripcion;
    opener.document.getElementById("descripcion_p").value=descripcion_p;
    opener.document.getElementById("peso").value=peso;
    window.close();
}