/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.resetcheckbox = function() {
    var id = $(this).attr('id');
    $.each( $("#" + id + " input:checkbox"),function(){
        $( this ).removeAttr("checked");
    });
  };
})( jQuery );

