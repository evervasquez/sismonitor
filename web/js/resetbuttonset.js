/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.resetbuttonset = function(div) {
        $( this ).each(function(){
            $(this).removeAttr("checked");
        });
        $(div).buttonset("destroy").buttonset();
  };
})( jQuery );

