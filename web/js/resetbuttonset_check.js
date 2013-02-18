/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.resetbuttonset_check = function() {
        $('#'+$(this).attr("id")+' input[type=checkbox]').each(function(){
            $(this).removeAttr("checked");            
        });
        $('#'+$(this).attr("id")).buttonset("destroy").buttonset();
  };
})( jQuery );

