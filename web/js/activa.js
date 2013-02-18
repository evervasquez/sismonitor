/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
        $('#container').tabs({
		ajaxOptions: {
                    error: function(xhr, status, index, anchor) {
		    $(anchor.hash).html();
                    }
		   }
		,
            fx: {opacity: 'toggle'},
            spinner: 'Cargando...'}
           );
           $( "#search_id" ).click(function(){
            $.ajax({
                type: "GET",
                url: "index.php",
                beforeSend: function(){
                  $( "#ld_1" ).show();
                },
                    dataType: "json",
                    data: {'controller':'C1','action':'search_id','id': $( "#IDNUMBER").val()},
                    success: function(data){
                            $( "#ld_1" ).hide();
                            $('#container').tabs( "destroy" );
                            $('#container').tabs({
                                    ajaxOptions: {
                                        error: function(xhr, status, index, anchor) {
                                        $(anchor.hash).html();
                                        }
                                       }
                                    ,
                                fx: {opacity: 'toggle'},
                                spinner: 'Cargando...'}
                               );
                        if ( data.bval ) {
                                if ( $( "#msgerror" ).css('display') != 'none'  ){
                                    $( "#msgerror" ).hide('blind');
                                }
                        } else {
                                    $( "#msgerror" ).show('blind');
                                }
                    }
            });
              return false;
           });
});
