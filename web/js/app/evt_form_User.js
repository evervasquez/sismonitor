$(function() {
    $("#div_activo").buttonset();
    $( "#save" ).click(function(){
        bval = true;
        bval = bval && $( "#idusuario" ).required();
        bval = bval && $( "#idperfil" ).required();
        bval = bval && $( "#nombres" ).required();
        bval = bval && $( "#apellidos" ).required();
        bval = bval && $( "#login" ).required();
        bval = bval && $( "#password" ).required();
        
        if ( bval ) {
            $("#frm").submit();
        }
        return false;
    });

    $( "#delete" ).click(function(){
          if(confirm("Confirmar Eliminacion de Registro"))
              {
                  $("#frm").submit();
              }
    });
    $(".btn_other").button();
        
//    $("#frm").bind("submit",function(e){
//            var data_= $(this).serialize();
//                 e.preventDefault();
//                 $.get("index.php", data_, function (data){alert;});
//        
//    });  
});