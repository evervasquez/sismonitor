$(function() {
    $( "#form_alternativa" ).submit(function(){
        bval = true;
        bval = bval && $( "#descripcion" ).required();
        bval = bval && $( "#fecha" ).required();
        bval = bval && $( "#descripcion_a" ).required();
        bval = bval && $( "#ponderado" ).required();
        if ( bval ) 
        {
            var peso=$( "#peso").val();
            var ponderado=$( "#ponderado").val();
            if(parseInt(ponderado)>parseInt(peso))
            {
                alert("El ponderado de la alternativa debe ser menor que  "+peso);
                $( "#ponderado").focus();
                return false;
            }
            return true;
        }
        return false;
    });
    $(".btn_other").button();
});