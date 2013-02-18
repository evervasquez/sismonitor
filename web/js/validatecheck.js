/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){

  $.fn.validatecheck = function() {
    var n = 0;
    var id = $(this).attr("id");
    var firts = "";
    $.each( $("#" + id + " input[type=checkbox]"),function(i){
        if(i==0){
            firts = $(this).attr("id");
        }
        if($(this).attr("checked")){
            n = n + 1;
        }
    });

    if(n>0){
        return true;
    }
    else {        
        $("#"+firts).focus();        
        pregunta = $(this).parent().parent().find(".npreg").text();
        msg("Debe marcar por lo menos 1 item de la lista de la pregunta N° <b>"+pregunta+"</b>");
        return false;
    }
  };
})( jQuery );

