$(function() 
{
    $( "#form_Escuela" ).submit(function()
    {
        bval = true;
        bval = bval && $( "#escuela" ).required();
        bval = bval && $( "#tipo_escuela_id" ).required();
        bval = bval && $( "#cod_modular" ).required();
        bval = bval && $( "#nro_escuela" ).required();
        bval = bval && $( "#categoria_id" ).required();
        bval = bval && $( "#departamento" ).required();
        bval = bval && $( "#provincia" ).required();
        bval = bval && $( "#distrito" ).required();
        bval = bval && $( "#comunidad" ).required();
        //bval = bval && $( "#facilitador" ).required();
        if ( bval )
        {
            return true;
        }
        return false;
    });
	$(".btn_other").button();
});


