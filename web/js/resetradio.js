/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.resetradio = function() {
    var id = $(this).attr('id');
    $.each( $("#" + id + " input:radio"),function(){
        $( this ).removeAttr("checked");
    });
  };
})( jQuery );

