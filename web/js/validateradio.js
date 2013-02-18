/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.validateradio = function(options) {
    var nr = 0;
    var id = $(this).attr('id');    
    $.each( $("#" + id + " input:radio"),function(){
        if($(this).attr("checked")){
            nr = nr + 1;
           // tr = $(this).parent().parent().index();
           // $('#'+id+' table tbody tr:eq('+tr+')').css({"color":"black"});
         }
         else {
             
            }
    });
    if (options.number == nr){
        return true;
    }else {
       return false;
    }
  };
})( jQuery );

