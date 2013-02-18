$(document).ready(function(){    
    $("#cr023400,#cr023500,#cr023700,#cr023900,#cr024000,#cr024100,#cc024200,#cr024301,#cr024302,#cc024400").buttonset();
    $("#cc024500,#cr024800,#cr025900,#cr026000,#cc026100,#cc026200,#cc026300,#cc026400,#cr026500,#cr026600,#cr026700").buttonset();
    $("#cr026800,#cr026900,#cr027000,#cc027600,#cc027700,#cc027800,#cr028000,#cc028100,#cc028200,#cr028300").buttonset();
    $("#cr024601,#cr024602,#cr024603,#cr024604,#cr024605,#cr024606,#cr024607,#cr024608,#cr024609,#cr024610,#cr024611,#cr024612").buttonset();
    $("#cr024701,#cr024702,#cr024703,#cr025000,#cr024900,#cr025700,#cr025800").buttonset();
    $("#cr027101,#cr027102,#cr027103,#cr027104,#cr027105,#cr027106,#cr027107").buttonset();
    $("#cr027301,#cr027302,#cr027303,#cr024201,#cr024202,#cr027201,#cr027202,#cr027203").buttonset();

    $('input[name|="023400"]').click(function(){
            valor = $("input[name='023400']:checked").val();
            if (valor!="1")
            {
                $('input[name=023500]:radio').resetbuttonset('#cr023500');
                $("#023600").val("");
                $("#cpreg023500,#cpreg023600").hide("slow");
            }
            else {
                
                $("#cpreg023500,#cpreg023600").show("slow");
            }
        });

    $('input[name|="023500"]').click(function(){
            valor = $("input[name='023500']:checked").val();
            if (valor!="1")
            {
                $("#023600").val("");
                $("#cpreg023600").hide("slow");
            }
            else {

                $("#cpreg023600").show("slow");
            }
        });
    
    $('input[name|="023700"]').click(function(){
            valor = $("input[name='023700']:checked").val();
            if (valor!="1")
            {
                $('input[name=023900]:radio').resetbuttonset('#cr023900');
                $('input[name=024000]:radio').resetbuttonset('#cr024000');
                $("#023800").val("");
                $("#cpreg023800,#cpreg023900,#cpreg024000").hide("slow");
            }
            else
            {
                $("#cpreg023800,#cpreg023900,#cpreg024000").show("slow");
            }
        });

    $('input[name|="024100"]').click(function(){
            valor = $("input[name='024100']:checked").val();
            if (valor!="1")
            {
                
                $('#cc024400').resetbuttonset_check();
                $('#cc024500').resetbuttonset_check();
                $("#cpreg024200,#cpreg024300,#cpreg024400,#cpreg024500").hide("slow");
            }
            else
            {
                $('input[name=024201]:radio').resetbuttonset('#cr024201');
                $('input[name=024202]:radio').resetbuttonset('#cr024202');

                $('input[name=024301]:radio').resetbuttonset('#cr024301');
                $('input[name=024302]:radio').resetbuttonset('#cr024302');
                
                $("#cpreg024200,#cpreg024300,#cpreg024400,#cpreg024500").show("slow");
            }
        });

       $("#l024200").toggle(function(){
            $(this).fadeOut(function(){
                $(this).empty().append("Click aqui si es que SI se denunció");
                $(this).removeClass("link-no");
                $(this).addClass("link-si");
                $(this).fadeIn();
            });
            $('#cc024200').resetbuttonset_check();
            $('#cc024400').resetbuttonset_check();
            $('#cc024500').resetbuttonset_check();

            $('input[name=024201]:radio').resetbuttonset('#cr024201');
            $('input[name=024202]:radio').resetbuttonset('#cr024202');

            $('input[name=024301]:radio').resetbuttonset('#cr024301');
            $('input[name=024302]:radio').resetbuttonset('#cr024302');
            
            $("#t024200,#cpreg024300,#cpreg024400,#cpreg024500").hide("slow");

        },function(){
            $(this).fadeOut(function(){
                $(this).empty().append("Click aqui si es que NO se denunció");
                $(this).removeClass("link-si");
                $(this).addClass("link-no");
                $(this).fadeIn();
            });
             $("#t024200,#cpreg024300,#cpreg024400,#cpreg024500").show("slow");
        });

    $('input[name|="024201"]').click(function(){
            valor = $("input[name='024201']:checked").val();
            if(valor!="1"){$("#polis243").hide("slow");}
                else {$("#polis243").show("slow");}
        });

    $('input[name|="024202"]').click(function(){
            valor = $("input[name='024202']:checked").val();
            if(valor!="1"){$("#minpublic243").hide("slow");}
                else {$("#minpublic243").show("slow");}
        });

   $('input[name|="024301"]').click(function(){
            valor = $("input[name='024301']:checked").val();
           if(valor=="1"){
                $('#cc024400').resetbuttonset_check();
                $("#cpreg024400").hide("slow");
           }
           else { $("#cpreg024400").show("slow"); }
        });
    $('input[name|="024302"]').click(function(){
            valor = $("input[name='024302']:checked").val();
           if(valor=="1"){
                $('#cc024500').resetbuttonset_check();
                $("#cpreg024500").hide("slow");
           }
           else { $("#cpreg024500").show("slow"); }
        });

    $("#025300").change(function(){
        valor = $(this).val();
        if(valor!="1" && valor!="3")
            {
                $("#025400").val("");
                $("#cpreg025400").hide("slow");
            }
         else {
             $("#cpreg025400").show("slow");
         }
    });

    $('input[name|="025900"]').click(function(){
            valor = $("input[name='025900']:checked").val();
            if(valor!="2"){
                $('#cc026100').resetbuttonset_check();
                $("#cpreg026100").hide("slow");
            }
            else {$("#cpreg026100").show("slow");}
        });

    $('input[name|="026000"]').click(function(){
            valor = $("input[name='026000']:checked").val();
            if(valor!="2"){
                $('#cc026200').resetbuttonset_check();
                $("#cpreg026200").hide("slow");
            }
            else {$("#cpreg026200").show("slow");}
        });

    $('input[name|="027201"]').click(function(){
        $("input[name='027203']").resetbuttonset("#cr027203");
            valor = $("input[name='027201']:checked").val();
            if(valor!="1"){
                $("input[name='027301']").resetbuttonset("#cr027301");
                $("#27301").hide("slow");
            }
            else{
                $("#27301").show("slow");
                }
        });
      $('input[name|="027202"]').click(function(){
          $("input[name='027203']").resetbuttonset("#cr027203");
            valor = $("input[name='027202']:checked").val();
            if(valor!="1"){
                $("input[name='027302']").resetbuttonset("#cr027302");
                $("#27302").hide("slow");
            }
            else{
                $("#27302").show("slow");
                }
        });
   
         $('input[name|="027203"]').click(function(){
            valor = $("input[name='027203']:checked").val();
            if(valor!="1"){               
                
            }
            else{
                $("input[name='027301']").resetbuttonset("#cr027301");
                $("input[name='027302']").resetbuttonset("#cr027302");
                $("input[name='027201']").resetbuttonset("#cr027201");
                $("input[name='027202']").resetbuttonset("#cr027202");
                $("#27301,#27302").hide("slow");
                }
        });

        $("#027400").change(function(){
            valor = $(this).val();
            if(valor=="2"){
                $("#cpreg027500").show("slow");
            }
            else {
                $("#027500").val("");
                $("#cpreg027500").hide("slow");
            }
        });


        $('input[name|="028000"]').click(function(){
          valor = $("input[name='028000']:checked").val();
          if(valor!="1"){
            $("#cc028100").resetbuttonset_check();
            $("#cc028200").resetbuttonset_check();
            $("#cpreg028100,#cpreg028200").hide("slow");
          }
          else {
            $("#cpreg028100,#cpreg028200").show("slow");
          }
          
        });

    $("#frmpart3").submit(function(){

        bval = true;
        bval = bval && $("#cr023400").validateradiobutton();
        if($("#cpreg023500").css("display")!="none"){
            bval = bval && $("#cr023400").validateradiobutton();
        }
        if($("#cpreg023600").css("display")!="none"){
            bval = bval && $("#023600").required();
        }
        
        bval = bval && $("#cr023700").validateradiobutton();
        if($("#cpreg023800").css("display")!="none"){
            bval = bval && $("#023800").required();
        }
        if($("#cpreg023900").css("display")!="none"){
            bval = bval && $("#cr023900").validateradiobutton();
        }
        if($("#cpreg024000").css("display")!="none"){
            bval = bval && $("#cr024000").validateradiobutton();
        }
        
        bval = bval && $("#cr024100").validateradiobutton();

        if($("#t024200").css("display")!="none")
        {
            bval = bval && $("#cr024201").validateradiobutton();
            bval = bval && $("#cr024202").validateradiobutton();
        }

        if($("#polis243").css("display")!="none")
        {
            bval = bval && $("#cr024301").validateradiobutton();
        }

        if($("#minpublic243").css("display")!="none")
        {
            bval = bval && $("#cr024302").validateradiobutton();
        }

        if($("#cpreg024400").css("display")!="none")
            {
                bval = bval && $("#cc024400").validatecheck();
            }
        if($("#cpreg024500").css("display")!="none")
            {
                bval = bval && $("#cc024500").validatecheck();
            }
            
        bval = bval && $("#cr024601").validateradiobutton();
        bval = bval && $("#cr024602").validateradiobutton();
        bval = bval && $("#cr024603").validateradiobutton();
        bval = bval && $("#cr024604").validateradiobutton();
        bval = bval && $("#cr024605").validateradiobutton();
        bval = bval && $("#cr024606").validateradiobutton();
        bval = bval && $("#cr024607").validateradiobutton();

        bval = bval && $("#cr024701").validateradiobutton();
        bval = bval && $("#cr024701").validateradiobutton();
        bval = bval && $("#cr024701").validateradiobutton();

        bval = bval && $("#cr024800").validateradiobutton();
        bval = bval && $("#cr024900").validateradiobutton();
        bval = bval && $("#cr025000").validateradiobutton();

        bval = bval && $("#025100").required();
        bval = bval && $("#025200").required();
        bval = bval && $("#025300").required();
        bval = bval && $("#025400").required();
        bval = bval && $("#025500").required();
        bval = bval && $("#025600").required();

        bval = bval && $("#cr025700").validateradiobutton();
        bval = bval && $("#cr025800").validateradiobutton();
        bval = bval && $("#cr025900").validateradiobutton();
        bval = bval && $("#cr026000").validateradiobutton();

        if($("#cpreg026100").css("display")!="none")
            {
                 bval = bval && $("#cc026100").validatecheck();
            }

        if($("#cpreg026200").css("display")!="none")
            {
                 bval = bval && $("#cc026200").validatecheck();
            }

        bval = bval && $("#cc026300").validatecheck();
        bval = bval && $("#cc026400").validatecheck();


        bval = bval && $("#cr026500").validateradiobutton();
        bval = bval && $("#cr026600").validateradiobutton();
        bval = bval && $("#cr026700").validateradiobutton();
        bval = bval && $("#cr026800").validateradiobutton();
        bval = bval && $("#cr026900").validateradiobutton();
        bval = bval && $("#cr027000").validateradiobutton();

        bval = bval && $("#cr027101").validateradiobutton();
        bval = bval && $("#cr027102").validateradiobutton();
        bval = bval && $("#cr027103").validateradiobutton();
        bval = bval && $("#cr027104").validateradiobutton();
        bval = bval && $("#cr027105").validateradiobutton();
        bval = bval && $("#cr027106").validateradiobutton();
        bval = bval && $("#cr027107").validateradiobutton();

        $('input[name|="027203"]').click(function(){
          valor = $("input[name='027203']:checked").val();
            if(valor!="1")
                {
                    bval = bval && $("#cr027201").validateradiobutton();
                    bval = bval && $("#cr027202").validateradiobutton();
                }
        });

        if($("#27301").css("display")!="none")
            {
                bval = bval && $("#cr027301").validateradiobutton();
            }

        if($("#27302").css("display")!="none")
            {
                bval = bval && $("#cr027302").validateradiobutton();
            }

        bval = bval && $("#027400").required();
        if($("#cpreg027500").css("display")!="none"){
            bval = bval && $("#027500").required();
        }

        bval = bval && $("#cc027600").validatecheck();
        bval = bval && $("#cc027700").validatecheck();
        bval = bval && $("#cc027800").validatecheck();

        bval = bval && $("#027900").required();

        bval = bval && $("#cr028000").validateradiobutton();
        
        if($("#cpreg028100").css("display")!="none")
            {
                bval = bval && $("#cc028100").validatecheck();
            }

        if($("#cpreg028200").css("display")!="none")
            {
                bval = bval && $("#cc028200").validatecheck();
            }
            
        bval = bval && $("#cr028300").validateradiobutton();

        if(bval){
        str = $(this).serializeArray();
            $.get("index.php",{'controller':'Unicri','action':'save','data': str},function(data){
                $("#resultados").empty().append(data);
            });
        }
         return false;
    });
  });


