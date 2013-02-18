$(function() 
    {
        
        //anular enter
        $('form').keypress(function(e){   
            if(e == 13){
                return false;
            }
        });

        $('input').keypress(function(e){
            if(e.which == 13){
                return false;
            }
        });
    
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

//*****
function cargar_datos(a){
    $('#buscar_i').load(a, function(){
        $('#buscar_i').show("slow")
        $('#q').focus();
    })
}
function buscar_inst(a){
    var condicion= jQuery("#q").val();
    condicion =condicion.replace(/\s/g,'');
    var p= jQuery("#p").val();
    cargar_datos(a+'&q='+condicion+'&p='+p);
}
function devolver_institucion(proyecto_id)
{
    document.getElementById("codigo_modular").value=proyecto_id;
    $("#buscar_i").fadeOut(600);
    cierre();
    
}
/////*************salir con la tecla escape
document.onkeydown = function(evt) {
    evt = evt || window.event;
    if (evt.keyCode == 27) {
        $("#buscar_i").fadeOut(500);
        cierre();
    }
};
       
