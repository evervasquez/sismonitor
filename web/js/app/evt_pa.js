$(function(){
    $("#padbs1").buttonset();
    $( "#RPA1" ).change(function(){
       $( "#RPA2" ).val("");
       $( 'input[name=RPA3]:radio' ).resetbuttonset('#padbs1');
       $( "#DPA2, #DPA3 , #TPA " ).show("blind");
       if ($( this ).val() == "0" ) {
           $( "#DPA2 , #DPA3 , #TPA " ).hide("blind");
           $( "#TPA" ).resetradio();
       }
    });
    $( "#pabs2" ).click(function(){
           $( "#TPA " ).hide("blind");
           $( "#TPA" ).resetradio();
    });
    $( "#pabs1" ).click(function(){
       $( "#TPA " ).show("blind");
    });
    $( "#formpa" ).submit(function(){        
        bval = true;
        bval = bval && $( "#RPA1" ).required();
        if ($( "#RPA1" ).val() > 0) {
            bval = bval && $( "#RPA2" ).required();
            bval = bval && $("#padbs1").validateradiobutton();
            if($("#pabs1").attr("checked"))
            {
                bval = bval && $("#TPA").validateradio({'number':6});
            }
        }

        if (bval){
            bval = $( "#pabs1" ).attr("checked") || $( "#pabs2" ).attr("checked");
            if (!bval){
                $( "#pabs1" ).attr("checked",true);
                $( "#pabs1" ).val('');
            }
            bval = false;
            $('input[name|="RPA4"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA4"]:eq(0)').attr('checked',true);$('input[name|="RPA4"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RPA5"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA5"]:eq(0)').attr('checked',true);$('input[name|="RPA5"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RPA6"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA6"]:eq(0)').attr('checked',true);$('input[name|="RPA6"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RPA7"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA7"]:eq(0)').attr('checked',true);$('input[name|="RPA7"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RPA8"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA8"]:eq(0)').attr('checked',true);$('input[name|="RPA8"]:eq(0)').val("");}
            bval = false;
            $('input[name|="RPA9"]').each(function(){
              if ($( this ).attr("checked"))
              {
                bval = true;
              }
            });
            if (!bval) {$('input[name|="RPA9"]:eq(0)').attr('checked',true);$('input[name|="RPA9"]:eq(0)').val("");}
            str = $( "#formpa" ).serializeArray();
            $.ajax({
                type: "GET",
                url: "index.php",
                    dataType: "json",
                    data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                    success: function(data){
                        if ( data.res == 1 ) {
                            $( "#container" ).tabs("enable",12);
                            $( "#container" ).tabs("select",12);
                        }
                        else {
                            msgerror(data.msg);
                        }
                    }
            });
        }else {
            msg('Todos los datos son requeridos.');
        }
        return false;
    });
});


