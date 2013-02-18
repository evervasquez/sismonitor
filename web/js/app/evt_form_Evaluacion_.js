$(function() {
    $( "#form_Evaluacion" ).submit(function(){
        bval = true;
        bval = bval && $( "#anexo" ).required();
        bval = bval && $( "#proyecto" ).required();
        bval = bval && $( "#estudiante" ).required();
        bval = bval && $( "#descripcion_a[]" ).required();
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
        yearRange: "-25:+0"
        /*minDate: '-65Y',
        maxDate: '-15Y'*/
    });
    $(".btn_other").button();
});


function devolver_prueba(detalle_proyecto_id,proyecto,area,fecha)
{
    opener.document.getElementById("prueba_id").value=detalle_proyecto_id;
    opener.document.getElementById("proyecto").value=proyecto;
    opener.document.getElementById("area").value=area;
    opener.document.getElementById("fecha_p").value=fecha;
    $.post("index.php","controller=Evaluacion&action=get_pregunta&id="+detalle_proyecto_id,function(data)
    {
       // alert(data);
	//	$("#_prueba").append(data);
		opener.document.getElementById("_prueba").innerHTML=data;
          window.close();
    });
 
}

function devolver_estudiante(estudiante_id,estudiante,escuela,tipo_escuela)
{
    opener.document.getElementById("estudiante_id").value=estudiante_id;
    opener.document.getElementById("estudiante").value=estudiante;
    opener.document.getElementById("escuela").value=escuela;
    opener.document.getElementById("tipo_escuela").value=tipo_escuela;
    window.close();
}