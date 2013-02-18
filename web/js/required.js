/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
(function( $ ){
  $.fn.required = function() {
    if (( $(this).val() == '' ) ) {
        $(this).addClass('ui-state-error');
        $(this).focus();
        return false;
    }else {
        $(this).removeClass('ui-state-error');
        return true;
    }
  };
})( jQuery );

//****************
function efectos(){
    efectos.prototype.aparecer = function(a,b){
        $(a).focus(function(){
            $(b).fadeIn();
        })  
    }
    
    efectos.prototype.desaparecer = function(a,b){
        $(a).blur(function(){
            $(b).fadeOut();
        })
    }
    
}
//****************