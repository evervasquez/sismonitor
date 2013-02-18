var rep0078 = new  Array();var rep0080 = new  Array();var rep0082 = new  Array();var rep0083 = new  Array();
var rep0084 = new  Array();var rep0085 = new  Array();var rep0089 = new  Array();var rep0091 = new  Array();
var rep0092 = new  Array();var rep0093 = new  Array();var rep0094 = new  Array();var rep0101 = new  Array();
var rep0103 = new  Array();var rep0104 = new  Array();var rep0105 = new  Array();var rep0106 = new  Array();
var rep0111 = new  Array();var rep0113 = new  Array();var rep0114 = new  Array();var rep0115 = new  Array();
var rep0122 = new  Array();var rep0124 = new  Array();var rep0125 = new  Array();var rep0126 = new  Array();
var rep0127 = new  Array();var rep0131 = new  Array();var rep0133 = new  Array();var rep0134 = new  Array();
var rep0135 = new  Array();var rep0147 = new  Array();var rep0149 = new  Array();var rep0150 = new  Array();
var rep0151 = new  Array();var rep0152 = new  Array();var rep0160 = new  Array();var rep0162 = new  Array();
var rep0163 = new  Array();var rep0164 = new  Array();var rep0165 = new  Array();var rep0174 = new  Array();
var rep0176 = new  Array();var rep0177 = new  Array();var rep0177a = new  Array();var rep0191 = new  Array();
var rep0193 = new  Array();var rep0194 = new  Array();var rep0194a = new  Array();Array();var rep0209 = new  Array();
var rep0211 = new  Array();var rep0212 = new  Array();var rep0212a = new  Array();var rep0230 = new  Array();
var rep0232 = new  Array();var rep0233 = new  Array();var rep0116 = new  Array();var rep0136 = new  Array();
$(document).ready(function(){
    var cont0078 = 0;    var cont0080 = 0;    var cont0082 = 0;    var cont0083 = 0;
    var cont0084 = 0;    var cont0085 = 0;    var cont0089 = 0;    var cont0091 = 0;
    var cont0092 = 0;    var cont0093 = 0;    var cont0094 = 0;    var cont0101 = 0;
    var cont0103 = 0;    var cont0104 = 0;    var cont0105 = 0;    var cont0106 = 0;
    var cont0111 = 0;    var cont0113 = 0;    var cont0114 = 0;    var cont0115 = 0;
    var cont0122 = 0;    var cont0124 = 0;    var cont0125 = 0;    var cont0126 = 0;
    var cont0127 = 0;    var cont0131 = 0;    var cont0133 = 0;    var cont0134 = 0;
    var cont0135 = 0;    var cont0147 = 0;    var cont0149 = 0;    var cont0150 = 0;
    var cont0151 = 0;    var cont0152 = 0;    var cont0160 = 0;    var cont0162 = 0;
    var cont0163 = 0;    var cont0164 = 0;    var cont0165 = 0;    var cont0174 = 0;
    var cont0176 = 0;    var cont0177 = 0;    var cont0177a = 0;    var cont0191 = 0;
    var cont0193 = 0;   var cont0194 = 0;   var cont0194a = 0;  var cont0209 = 0;
    var cont0211 = 0;   var cont0212 = 0;   var cont0212a = 0;var cont0230 = 0;var cont0232 = 0;
    var cont0233 = 0;var cont0116 = 0;var cont0136 = 0;
    
    $("#cr007500,#cr007600,#cr007700,#cr008101,#cr008102,#cr008600,#cr008000,#cr008700,#cr008800,#cr008900,#cr009002").buttonset();
    $("#cr009001,#cr009600,#cr009800,#cr010100,#cr010201,#cr010202,#cr010700,#cr011100,#cr011201,#cr014300,#cr014500").buttonset();
    $("#cr011202,#cr011700,#cr012100,#cr012200,#cr012301,#cr012302,#cr012800,#cr013100,#cr013201,#cr014600,#cr014700").buttonset();
    $("#cr013202,#cr013700,#cr013000,#cr014100,#cr014801,#cr014802,#cr015300,#cr015400,#cr015500,#cr015700,#cr015800").buttonset();
    $("#cr016000,#cr016101,#cr016102,#cr016600,#cr016900,#cr017100,#cr017200,#cr017400,#cr017501,#cr017502,#cr017503").buttonset();
    $("#cr017800,#cr017900,#cr018000,#cr018100,#cr018400,#cr018600,#cr018800,#cr018900,#cr019000,#cr019100,#cr019600").buttonset();
    $("#cr019700,#cr019800,#cr019201,#cr019202,#cr019203,#cr019500,#cr020200,#cr020400,#cr020700,#cr020800,#cr020600").buttonset();
    $("#cr020900,#cr021001,#cr021002,#cr021003,#cr021300,#cr021400,#cr021700,#cr021900,#cr022000,#cr022500,#cr022600,#cr022700,#cr022800").buttonset();
    $("#cr023000,#cr023101,#cr023102,#cr022900").buttonset();

    $("#007901,#009501,#009901,#010901,#011901,#013901").datepicker({changeMonth:true,changeYear:true});
    $("#007902").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#007903").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
    $("#009502").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#009503").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
    $("#009902").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#009903").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
    $("#010902").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#010903").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
    $("#011902").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#011903").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
    $("#013902").change(function(){if($(this).val()>23 || $(this).val()<0){msg("Valor incorrecto para la hora. (De 00 a 23)");$(this).attr("value","00");}});
    $("#013903").change(function(){if($(this).val()>59 || $(this).val()<0){msg("Valor incorrecto para los minutos. (De 00 a 59)");$(this).attr("value","00");}});
      /*
       *Eventos para las preguntas tipo seleccion unica (radios)
      */
    $('input[name|="007500"]').click(function(){
                   valor = $("input[name='007500']:checked").val();                   
                  if(valor!="Si"){$("#cpreg007600").hide("slow");}
                    else {$("#cpreg007600").show("slow");
                        $('input[name=007600]:radio').resetbuttonset('#cr007600');
                    }
                });
      $('input[name|="007700"]').click(function(){
                   valor = $("input[name='007700']:checked").val();
                  if(valor!="Si"){
                        $("#007901,#007902,#007903").attr("value","");
                        $("#cpreg007800,#cpreg007900").hide("slow");
                        $("#007901,#007902,#007903").attr("value","");
                    }
                    else {$("#cpreg007800,#cpreg007900").show("slow");}
                });
      $('input[name|="008000"]').click(function(){
                   valor = $("input[name='008000']:checked").val();
                  if(valor!="Si"){
                      $('input[name=008101]:radio').resetbuttonset('#polis');
                        $('input[name=008102]:radio').resetbuttonset('#minpublic');
                      $("#t008000,#cpreg008100,#cpreg008200,#cpreg008300,#cpreg008400").hide("slow");
                      $("#cpreg008500").show("slow");
                  }
                    else {
                        $("#t008000,#cpreg008100,#cpreg008400").show("slow");
                        $("#cpreg008500").hide("slow");                        
                     }
                });
      $('input[name|="008101"]').click(function(){                
                   valor = $("input[name='008101']:checked").val();
                  if(valor=="Si"){$("#cpreg008200").hide("slow");}
                    else {$("#cpreg008200").show("slow");}
                });
      $('input[name|="008102"]').click(function(){
                   valor = $("input[name='008102']:checked").val();
                  if(valor=="Si"){$("#cpreg008300").hide("slow");}
                    else {$("#cpreg008300").show("slow");}
                });
      
      $('input[name|="008900"]').click(function(){
                   valor = $("input[name='008900']:checked").val();
                  if(valor!="Si"){
                      $("#t008900,#cpreg009000,#cpreg009100,#cpreg009200,#cpreg009300").hide("slow");
                      $("#cpreg009400").show("slow");
                  }
                    else {
                        $("#t008900,#cpreg009000,#cpreg009300").show("slow");
                        $("#cpreg009400").hide("slow");
                        $('input[name=009001]:radio').resetbuttonset('#polis90');
                        $('input[name=009002]:radio').resetbuttonset('#minpublic90');
                     }
                });
      $('input[name|="009001"]').click(function(){                
                   valor = $("input[name='009001']:checked").val();
                  if(valor=="Si"){$("#cpreg009100").hide("slow");}
                    else {$("#cpreg009100").show("slow");}
                });
      $('input[name|="009002"]').click(function(){
                   valor = $("input[name='009002']:checked").val();
                  if(valor=="Si"){$("#cpreg009200").hide("slow");}
                    else {$("#cpreg009200").show("slow");}
                });
      $('#009700').change(function(){
                   valor = $(this).val();
                  if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad")
                  {$("#cpreg010000").show("slow"); $("#cpreg010100,#cpreg010200,#cpreg010500,#cpreg010600").show("slow");}                    
                  if(valor=="En el extranjero" || valor =="NS")
                    {
                        $('input[name=010201]:radio').resetbuttonset('#polis102');
                        $('input[name=010202]:radio').resetbuttonset('#minpublic102');
                        
                        $('input[name=010100]:radio').resetbuttonset('#cpreg010100');
                        $('#010000').attr("value","");
                        $('#text010000').empty();
                        $("#cpreg010000").hide("slow");
                        
                        $("#cpreg010100,#cpreg010200,#cpreg010300,#cpreg010400,#cpreg010500,#cpreg010600").hide("slow");
                    }
                });
      $('input[name|="010100"]').click(function(){
                   valor = $("input[name='010100']:checked").val();
                  if(valor!="Si"){
                      $("#t010100,#cpreg010200,#cpreg010300,#cpreg010400,#cpreg010500").hide("slow");
                      $("#cpreg010600").show("slow");
                  }
                    else {
                        $('input[name=010201]:radio').resetbuttonset('#polis102');
                        $('input[name=010202]:radio').resetbuttonset('#minpublic102');
                        $("#t010100,#cpreg010200,#cpreg010500").show("slow");
                        $("#cpreg010600").hide("slow");
                     }
                });
      $('input[name|="010201"]').click(function(){
                   valor = $("input[name='010201']:checked").val();
                  if(valor=="Si"){$("#cpreg010300").hide("slow");}
                    else {$("#cpreg010300").show("slow");}
                });
      $('input[name|="010202"]').click(function(){
                   valor = $("input[name='010202']:checked").val();
                  if(valor=="Si"){$("#cpreg010400").hide("slow");}
                    else {$("#cpreg010400").show("slow");}
                });
      $('#010800').change(function(){
                   valor = $(this).val();
                  if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad"){$("#cpreg011000").show("slow"); $("#cpreg011100,#cpreg011200,#cpreg011500,#cpreg011600").show("slow");}
                    else {$("#cpreg011000").hide("slow");}
                  if(valor=="En el extranjero")
                    {
                        $('#011000').attr("value","");
                        $('#text011000').empty();
                        
                        $('input[name=011201]:radio').resetbuttonset('#polis112');
                        $('input[name=011202]:radio').resetbuttonset('#minpublic112');                        
                        $('input[name=011100]:radio').resetbuttonset('#cpreg011100');
                        $("#0010901,#0010902,#0010903").attr("value","");
                       $("#cpreg011100,#cpreg011200,#cpreg011500,#cpreg011600").hide("slow");
                    }
                });
      $('input[name|="011100"]').click(function(){
                   valor = $("input[name='011100']:checked").val();
                  if(valor!="Si"){
                      $("#t011100,#cpreg011200,#cpreg011300,#cpreg011400,#cpreg011500").hide("slow");
                      $("#cpreg011600").show("slow");
                  }
                    else {
                        $("#t011100,#cpreg011200,#cpreg011500").show("slow");
                        $("#cpreg011600").hide("slow");
                     }
                });
       $('input[name|="011201"]').click(function(){
                   valor = $("input[name='011201']:checked").val();
                  if(valor=="Si"){$("#cpreg011300").hide("slow");}
                    else {$("#cpreg011300").show("slow");}
                });
      $('input[name|="011202"]').click(function(){
                   valor = $("input[name='011202']:checked").val();
                  if(valor=="Si"){$("#cpreg011400").hide("slow");}
                    else {$("#cpreg011400").show("slow");}
                });
      $('#011800').change(function(){
                   valor = $(this).val();
                  if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad")
                    {$("#cpreg012000").show("slow"); $("#cpreg012200,#cpreg012300,#cpreg012600,#cpreg012700").show("slow");}
                    
                  if(valor=="En el extranjero" || valor=="NS")
                    {
                        $('#012000').attr("value","");
                        $('#text012000').empty();
                        
                       $('input[name=012301]:radio').resetbuttonset('#polis123');
                       $('input[name=012302]:radio').resetbuttonset('#minpublic123');
                       $('input[name=012200]:radio').resetbuttonset('#cpreg012200');
                       $("#cpreg012200,#cpreg012300,#cpreg012400,#cpreg012500,#cpreg012600,#cpreg012700").hide("slow");
                       $("#cpreg012000").hide("slow");
                    }
                });
       $('input[name|="012200"]').click(function(){
                   valor = $("input[name='012200']:checked").val();
                  if(valor!="Si"){
                      $("#t012200,#cpreg012300,#cpreg012400,#cpreg012500,#cpreg012600").hide("slow");
                      $("#cpreg012700").show("slow");
                  }
                    else {
                        $('input[name=012301]:radio').resetbuttonset('#polis123');
                       $('input[name=012302]:radio').resetbuttonset('#minpublic123');
                        $("#t012200,#cpreg012300,#cpreg012600").show("slow");
                        $("#cpreg012700").hide("slow");
                     }
                });
        $('input[name|="012301"]').click(function(){
                   valor = $("input[name='012301']:checked").val();
                  if(valor=="Si"){$("#cpreg012400").hide("slow");}
                    else {$("#cpreg012400").show("slow");}
                });
        $('input[name|="012302"]').click(function(){
                   valor = $("input[name='012302']:checked").val();
                  if(valor=="Si"){$("#cpreg012500").hide("slow");}
                    else {$("#cpreg012500").show("slow");}
                });
      /////////////////////////////////////////////////////////////
      $('#012900').change(function(){
                   valor = $(this).val();
                  if(valor=="En el extranjero" || valor=="NS")
                    {
                       $('input[name=013201]:radio').resetbuttonset('#polis132');
                       $('input[name=013202]:radio').resetbuttonset('#minpublic132');
                       $('input[name=013100]:radio').resetbuttonset('#cpreg013100');
                       
                       $("#cpreg013100,#cpreg013200,#cpreg013300,#cpreg013400,#cpreg013500,#cpreg013600").hide("slow");
                    }
                   else {
                       $("#cpreg013100,#cpreg013200,#cpreg013500,#cpreg013600").show("slow");
                   }
                });

       $('input[name|="013100"]').click(function(){
                   valor = $("input[name='013100']:checked").val();
                  if(valor!="Si"){
                      $('input[name=013201]:radio').resetbuttonset('#polis132');
                       $('input[name=013202]:radio').resetbuttonset('#minpublic132');
                      $("#t013100,#cpreg013200,#cpreg013300,#cpreg013400,#cpreg013500").hide("slow");
                      $("#cpreg013600").show("slow");
                  }
                    else {
                        $("#t013100,#cpreg013200,#cpreg013500").show("slow");
                        $("#cpreg013600").hide("slow");
                     }
                });
        $('input[name|="013201"]').click(function(){
                   valor = $("input[name='013201']:checked").val();
                  if(valor=="Si"){$("#cpreg013300").hide("slow");}
                    else {$("#cpreg013300").show("slow");}
                });
      $('input[name|="013202"]').click(function(){
                   valor = $("input[name='013202']:checked").val();
                  if(valor=="Si"){$("#cpreg013400").hide("slow");}
                    else {$("#cpreg013400").show("slow");}
                });

      ///////////////////////////////////////////\
      $("#013800").change(function(){
          valor = $(this).val();
           if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad")
            { $("#cpreg014000").show("slow");$("#cpreg014700,#cpreg014800,#cpreg015100,#cpreg015200").show("slow");}
              if(valor=="En el extranjero" || valor=="NS")
                {
                     $('#014000').attr("value","");
                     $('#text014000').empty();
                     
                    $('input[name=014801]:radio').resetbuttonset('#polis148');
                    $('input[name=014802]:radio').resetbuttonset('#minpublic148');
                    $('input[name=014700]:radio').resetbuttonset('#cpreg014700');
                   $("#cpreg014700,#cpreg014800,#cpreg014900,#cpreg015000,#cpreg015100,#cpreg015200").hide("slow");
                   $("#cpreg014000").hide("slow");
                }
      });
      $('input[name|="014100"]').click(function()
            {
                valor = $("input[name='014100']:checked").val();
                if(valor=="No los conocía" || valor == "No vio al / los agresor" || valor == "NS")
                    {
                      $("#014200").attr("value","");
                      $("#cpreg014200").hide("slow");
                    }
                else {
                      $("#cpreg014200").show("slow");
                    }
            }
        );
      $('input[name|="014300"]').click(function()
            {
                valor = $("input[name='014300']:checked").val();
                if(valor!="Si")
                    {
                      $("#014400").attr("value","");
                      $("#cpreg014400,#cpreg014500").hide("slow");
                    }
                 else {
                     $("#cpreg014400,#cpreg014500").show("slow");
                    }
            });
            $('input[name|="014700"]').click(function(){
                   valor = $("input[name='014700']:checked").val();
                  if(valor!="Si"){
                       $('input[name=014801]:radio').resetbuttonset('#polis148');
                       $('input[name=014802]:radio').resetbuttonset('#minpublic148');
                      $("#t014700,#cpreg014800,#cpreg014900,#cpreg015000,#cpreg015100").hide("slow");
                      $("#cpreg015200").show("slow");
                  }
                    else {
                        $("#t014700,#cpreg014800,#cpreg015100").show("slow");
                        $("#cpreg015200").hide("slow");
                     }
                });
           $('input[name|="014801"]').click(function(){
                   valor = $("input[name='014801']:checked").val();
                  if(valor=="Si"){$("#cpreg014900").hide("slow");}
                    else {$("#cpreg014900").show("slow");}
                });
        $('input[name|="014802"]').click(function(){
                   valor = $("input[name='014802']:checked").val();
                  if(valor=="Si"){$("#cpreg015000").hide("slow");}
                    else {$("#cpreg015000").show("slow");}
                });
       ///////////////////////////////////////////////////////
       $("#015600").change(function(){
          valor = $(this).val();
           if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad")
            { $("#cpreg016000,#cpreg016100,#cpreg016400,#cpreg016500").show("slow");}                    
          if(valor=="En el extranjero" || valor == "NS")
            {
                $('input[name=016101]:radio').resetbuttonset('#polis161');
                $('input[name=016102]:radio').resetbuttonset('#minpublic161');
                $('input[name=016000]:radio').resetbuttonset('#cpreg016000');
               $("#cpreg016000,#cpreg016100,#cpreg016200,#cpreg016300,#cpreg016400,#cpreg016500").hide("slow");
            }
        });
        $('input[name|="015800"]').click(function(){
                   valor = $("input[name='015800']:checked").val();
                   if(valor=="Lo conocía de vista"||valor=="Lo conocía de nombre")
                       {
                           $("#cpreg015900").show("slow");
                       }
                    else {
                        $("#015900").attr("value","");
                        $("#cpreg015900").hide("slow");
                    }
               });
        $('input[name|="016000"]').click(function(){
            valor = $("input[name='016000']:checked").val();
            if(valor!="Si")
                {
                    $('input[name=016101]:radio').resetbuttonset('#polis161');
                    $('input[name=016102]:radio').resetbuttonset('#minpublic161');
                    $("#t016000,#cpreg016100,#cpreg016200,#cpreg016300,#cpreg016400").hide("slow");
                    $("#cpreg016500").show("slow");
               }
                    else {
                        $("#t016000,#cpreg016100,#cpreg016400").show("slow");
                        $("#cpreg016500").hide("slow");
                    }
        });
         $('input[name|="016101"]').click(function(){
                   valor = $("input[name='016101']:checked").val();
                  if(valor=="Si"){$("#cpreg016200").hide("slow");}
                    else {$("#cpreg016200").show("slow");}
                });
          $('input[name|="016102"]').click(function(){
                       valor = $("input[name='016102']:checked").val();
                      if(valor=="Si"){$("#cpreg016300").hide("slow");}
                        else {$("#cpreg016300").show("slow");}
                    });
         /////////////////////////////////////////////
         $('input[name|="016900"]').click(function(){
                   valor = $("input[name='016900']:checked").val();
                   if(valor=="Lo conocía de vista"||valor=="Lo conocía de nombre")
                       {
                           $("#cpreg017000").show("slow");
                       }
                    else {
                        $("#017000").attr("value","");
                        $("#cpreg017000").hide("slow");
                    }
               });
         $('input[name|="017200"]').click(function(){
                       valor = $("input[name='017200']:checked").val();
                      if(valor!="Si"){
                          $("#017300").attr("value","");
                          $("#cpreg017300").hide("slow");
                      }
                        else {$("#cpreg017300").show("slow");}
                    });
         $("#016700").change(function(){
          valor = $(this).val();
          if(valor=="En su casa / garaje" || valor=="Cerca de su casa" || valor == "En el trabajo" || valor == "En otra parte de la ciudad")
            { $("#cpreg017400,#cpreg017500").show("slow");}
                    
          if(valor=="En el extranjero" || valor == "NS")
            {
                $('input[name=017501]:radio').resetbuttonset('#polis175');
                $('input[name=017502]:radio').resetbuttonset('#minpublic175');
                $('input[name=017503]:radio').resetbuttonset('#demuna175');
                $('input[name=017400]:radio').resetbuttonset('#cpreg017400');
               $("#cpreg017400,#cpreg017500,#cpreg017600,#cpreg017700,#cpreg01770a").hide("slow");
            }
            });
            $('input[name|="018400"]').click(function(){
                   valor = $("input[name='018400']:checked").val();
                   if(valor=="Lo conocía de vista"||valor=="Lo conocía de nombre")
                       {
                           $("#cpreg018500").show("slow");
                       }
                    else {
                        $("#018500").attr("value","");
                        $("#cpreg018500").hide("slow");
                    }
               });
        $('input[name|="018600"]').click(function(){
                       valor = $("input[name='018600']:checked").val();
                      if(valor!="Si"){
                          $("#018700").attr("value","");
                          $("#cpreg018700").hide("slow");
                      }
                        else {$("#cpreg018700").show("slow");}
                    });
         $("#018200").change(function(){
             valor = $(this).val();
             if(valor=="En el extranjero")
                    {
                        $('input[name=019201]:radio').resetbuttonset('#polis192');
                        $('input[name=019202]:radio').resetbuttonset('#minpublic192');
                        $('input[name=019203]:radio').resetbuttonset('#demuna192');
                        $('input[name=019100]:radio').resetbuttonset('#cpreg019100');
                        $("#cpreg019100,#cpreg019200,#cpreg019300,#cpreg019400,#cpreg01940a").hide("slow");
                    }
              else {
                  $("#cpreg019100,#cpreg019200").show("slow");
                }
         });
         $('input[name|="017400"]').click(function(){
                       valor = $("input[name='017400']:checked").val();
                      if(valor!="Si"){
                          $('input[name=017501]:radio').resetbuttonset('#polis175');
                          $('input[name=017502]:radio').resetbuttonset('#minpublic175');
                          $('input[name=017503]:radio').resetbuttonset('#demuna175');
                          $("#t017400,#cpreg017500,#cpreg017600,#cpreg017700,#cpreg01770a").hide("slow");
                      }
                        else {$("#t017400,#cpreg017500").show("slow");}
                    });
           $('input[name|="017501"]').click(function(){
                       valor = $("input[name='017501']:checked").val();
                      if(valor=="Si"){$("#cpreg017600").hide("slow");}
                        else {$("#cpreg017600").show("slow");}
                    });
             $('input[name|="017502"]').click(function(){
                       valor = $("input[name='017502']:checked").val();
                      if(valor=="Si"){$("#cpreg017700").hide("slow");}
                        else {$("#cpreg017700").show("slow");}});
             $('input[name|="017503"]').click(function(){
                       valor = $("input[name='017503']:checked").val();
                      if(valor=="Si"){$("#cpreg01770a").hide("slow");}
                        else {$("#cpreg01770a").show("slow");}});
            $('input[name|="019100"]').click(function(){
                       valor = $("input[name='019100']:checked").val();
                      if(valor!="Si"){
                          $('input[name=019201]:radio').resetbuttonset('#polis192');
                          $('input[name=019202]:radio').resetbuttonset('#minpublic192');
                          $('input[name=019203]:radio').resetbuttonset('#demuna192');
                          $("#t019100,#cpreg019200,#cpreg019300,#cpreg019400,#cpreg01940a").hide("slow");
                      }
                        else {$("#t019100,#cpreg019200").show("slow");}
                    });
             $('input[name|="019201"]').click(function(){
                       valor = $("input[name='019201']:checked").val();
                      if(valor=="Si"){$("#cpreg019300").hide("slow");}
                        else {$("#cpreg019300").show("slow");}})
            $('input[name|="019202"]').click(function(){
                       valor = $("input[name='019202']:checked").val();
                      if(valor=="Si"){$("#cpreg019400").hide("slow");}
                        else {$("#cpreg019400").show("slow");}})
             $('input[name|="019203"]').click(function(){
                       valor = $("input[name='019203']:checked").val();
                      if(valor=="Si"){$("#cpreg01940a").hide("slow");}
                        else {$("#cpreg01940a").show("slow");}});
            //////////////////////////////////////////////////////////////
            $('input[name|="021001"]').click(function(){
                       valor = $("input[name='021001']:checked").val();
                      if(valor=="Si"){$("#cpreg021100").hide("slow");}
                        else {$("#cpreg021100").show("slow");}})
            $('input[name|="021002"]').click(function(){
                       valor = $("input[name='021002']:checked").val();
                      if(valor=="Si"){$("#cpreg021200").hide("slow");}
                        else {$("#cpreg021200").show("slow");}})
             $('input[name|="021003"]').click(function(){
                       valor = $("input[name='021003']:checked").val();
                      if(valor=="Si"){$("#cpreg02120a").hide("slow");}
                        else {$("#cpreg02120a").show("slow");}});
             $('input[name|="020900"]').click(function(){
                 valor = $("input[name='020900']:checked").val();
                 if(valor!="Si"){
                     $('input[name=021001]:radio').resetbuttonset('#polis210');
                     $('input[name=021002]:radio').resetbuttonset('#minpublic210');
                     $('input[name=021003]:radio').resetbuttonset('#demuna210');
                     $("#t020900,#cpreg021100,#cpreg021200,#cpreg02120a").hide("slow");
                 }
                    else{$("#t020900").show("show");}
             });
             $("#019900").change(function(){
                 valor = $(this).val();
                 
                 if(valor=="En el extranjero"){
                     $('input[name=021001]:radio').resetbuttonset('#polis210');
                     $('input[name=021002]:radio').resetbuttonset('#minpublic210');
                     $('input[name=021003]:radio').resetbuttonset('#demuna210');
                     $('input[name=020900]:radio').resetbuttonset('#cpreg020900');
                     $("#cpreg020900,#cpreg021000,#cpreg021100,#cpreg021200,#cpreg02120a").hide("slow");
                 }
                 else { $("#cpreg020900,#cpreg021000").show("slow");}
             });

             $('input[name|="020200"]').click(function(){
                   valor = $("input[name='020200']:checked").val();
                   if(valor=="Lo conocía de vista"||valor=="Lo conocía de nombre")
                       {
                           $("#cpreg020300").show("slow");
                       }
                    else {
                        $("#020300").attr("value","");
                        $("#cpreg020300").hide("slow");
                    }
               });

             $('input[name|="020400"]').click(function(){
                 valor = $("input[name='020400']:checked").val();
                 if(valor!="Si"){
                     $("#020500").attr("value","");
                     $("#cpreg020500").hide("slow");
                 }
                 else {
                     $("#cpreg020500").show("slow");
                 }
             });
             /////////////////////////////////////////////////////
             $("#021500").change(function(){
                 valor = $(this).val();
                 
                 if(valor=="En el extranjero"){
                     $('input[name=023101]:radio').resetbuttonset('#polis231');
                     $('input[name=023102]:radio').resetbuttonset('#minpublic231');
                     $('input[name=023000]:radio').resetbuttonset('#cpreg023000');
                     $("#cpreg023000,#cpreg023100,#cpreg023200,#cpreg023300").hide("slow");
                 }
                    else { $("#cpreg023000,#cpreg023100").show("slow"); }
             });
             $('input[name|="021700"]').click(function(){
                   valor = $("input[name='021700']:checked").val();
                   if(valor=="Lo conocía de vista"||valor=="Lo conocía de nombre")
                       {
                           $("#cpreg021800").show("slow");
                       }
                    else {
                        $("#021800").attr("value","");
                        $("#cpreg021800").hide("slow");
                    }
               });
             $('input[name|="022000"]').click(function(){                 
                 valor = $("input[name='022000']:checked").val();                 
                 if(valor!="Si"){
                     $("#022100").attr("value","");
                     $("#cpreg022100").hide("slow");
                 }
                 else {
                     $("#cpreg022100").show("slow");
                 }
             });

             //////////////////////////////////////////////
             $('input[name|="023101"]').click(function(){
                       valor = $("input[name='023101']:checked").val();
                      if(valor=="Si"){$("#cpreg023200").hide("slow");}
                        else {$("#cpreg023200").show("slow");}})
            $('input[name|="023102"]').click(function(){
                      valor = $("input[name='023102']:checked").val();
                      if(valor=="Si"){$("#cpreg023300").hide("slow");}
                        else {$("#cpreg023300").show("slow");}});
            $('input[name|="023000"]').click(function(){
                      valor = $("input[name='023000']:checked").val();
                      if(valor!="Si"){
                          $('input[name=023101]:radio').resetbuttonset('#polis231');
                          $('input[name=023102]:radio').resetbuttonset('#minpublic231');
                          $("#t023000,#cpreg023100,#cpreg023200,#cpreg023300").hide("slow");
                        }
                        else {$("#t023000,#cpreg023100").show("slow");}}
                );
      /*
       ***************************************************
       *Eventos para las preguntas tipo seleccion multiple
       ***************************************************
      */
     $(".item18").toggle(function(){
               rep0078[cont0078] = $(this).text();
               cont0078 +=1;
               $(this).addClass("activado");
    },function(){
        cont0078 -=1;
        $(this).removeClass("activado");
    });

    $(".item80").toggle(function(){
       rep0080[cont0080] = $(this).text();
       cont0080 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis,#cpreg008200").show("slow");}
         else {$("#minpublic,#cpreg008300").show("slow");}
    },function(){
        cont0080 -=1;
        $(this).removeClass("activado");

        $('input[name=008101]:radio').resetbuttonset('#polis');
        $('input[name=008102]:radio').resetbuttonset('#minpublic');
         if($(this).text()=="Policia Nacional"){$("#polis,#cpreg008200").hide("slow");}
         else {$("#minpublic,#cpreg008300").hide("slow");}
    });

    $(".item82").toggle(function(){
               rep0082[cont0082] = $(this).text();
               cont0082 +=1;
               $(this).addClass("activado");
    },function(){
        cont0082 -=1;
        $(this).removeClass("activado");
    });

    $(".item83").toggle(function(){
               rep0083[cont0083] = $(this).text();
               cont0083 +=1;
               $(this).addClass("activado");
    },function(){
        cont0083 -=1;
        $(this).removeClass("activado");
     });

     $(".item84").toggle(function(){
               rep0084[cont0084] = $(this).text();
               cont0084 +=1;
               $(this).addClass("activado");
    },function(){
        cont0084 -=1;
        $(this).removeClass("activado");
     });

     $(".item85").toggle(function(){
               rep0085[cont0085] = $(this).text();
               cont0085 +=1;
               $(this).addClass("activado");
    },function(){
        cont0085 -=1;
        $(this).removeClass("activado");
     });

      $(".item89").toggle(function(){
       rep0089[cont0089] = $(this).text();
       cont0089 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis90,#cpreg009100").show("slow");}
         else {$("#minpublic90,#cpreg009200").show("slow");}
    },function(){
        cont0080 -=1;
        $('input[name=009001]:radio').resetbuttonset('#polis90');
        $('input[name=009002]:radio').resetbuttonset('#minpublic90');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis90,#cpreg009100").hide("slow");}
         else {$("#minpublic90,#cpreg009200").hide("slow");}
    });

     $(".item91").toggle(function(){
               rep0091[cont0091] = $(this).text();
               cont0091 +=1;
               $(this).addClass("activado");
    },function(){
        cont0091 -=1;
        $(this).removeClass("activado");
     });

     $(".item92").toggle(function(){
               rep0092[cont0092] = $(this).text();
               cont0092 +=1;
               $(this).addClass("activado");
    },function(){
        cont0092 -=1;
        $(this).removeClass("activado");
     });

     $(".item93").toggle(function(){
               rep0093[cont0093] = $(this).text();
               cont0093 +=1;
               $(this).addClass("activado");
    },function(){
        cont0093 -=1;
        $(this).removeClass("activado");
     });

     $(".item94").toggle(function(){
               rep0094[cont0093] = $(this).text();
               cont0094 +=1;
               $(this).addClass("activado");
    },function(){
        cont0094 -=1;
        $(this).removeClass("activado");
     });

     $(".item101").toggle(function(){
       rep0101[cont0101] = $(this).text();
       cont0101 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis102,#cpreg010300").show("slow");}
         else {$("#minpublic102,#cpreg010400").show("slow");}
    },function(){
        cont0101 -=1;
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis102,#cpreg010300").hide("slow");}
         else {$("#minpublic102,#cpreg010400").hide("slow");}
    });

    $(".item103").toggle(function(){
       rep0103[cont0103] = $(this).text();
       cont0103 +=1;
       $(this).addClass("activado");
    },function(){
        cont0103 -=1;
        $(this).removeClass("activado");
    });

    $(".item104").toggle(function(){
       rep0104[cont0104] = $(this).text();
       cont0104 +=1;
       $(this).addClass("activado");
    },function(){
        cont0104 -=1;
        $(this).removeClass("activado");
    });
    $(".item105").toggle(function(){
       rep0105[cont0105] = $(this).text();
       cont0105 +=1;
       $(this).addClass("activado");
    },function(){
        cont0105 -=1;
        $(this).removeClass("activado");
    });
    $(".item106").toggle(function(){
       rep0106[cont0106] = $(this).text();
       cont0106 +=1;
       $(this).addClass("activado");
    },function(){
        cont0106 -=1;
        $(this).removeClass("activado");
    });
     $(".item111").toggle(function(){
       rep0111[cont0111] = $(this).text();
       cont0111 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis112,#cpreg011300").show("slow");}
         else {$("#minpublic112,#cpreg011400").show("slow");}
    },function(){
        cont0111 -=1;
        $('input[name=011201]:radio').resetbuttonset('#polis112');
        $('input[name=011202]:radio').resetbuttonset('#minpublic112');    
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis112,#cpreg011300").hide("slow");}
         else {$("#minpublic112,#cpreg011400").hide("slow");}
    });

    $(".item113").toggle(function(){
       rep0113[cont0113] = $(this).text();
       cont0113 +=1;
       $(this).addClass("activado");
    },function(){
        cont0113 -=1;
        $(this).removeClass("activado");
    });

    $(".item114").toggle(function(){
       rep0114[cont0104] = $(this).text();
       cont0114 +=1;
       $(this).addClass("activado");
    },function(){
        cont0114 -=1;
        $(this).removeClass("activado");
    });
    $(".item115").toggle(function(){
       rep0115[cont0115] = $(this).text();
       cont0115 +=1;
       $(this).addClass("activado");
    },function(){
        cont0115 -=1;
        $(this).removeClass("activado");
    });
    
    $(".item122").toggle(function(){
       rep0122[cont0122] = $(this).text();
       cont0122 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis123,#cpreg012400").show("slow");}
         else {$("#minpublic123,#cpreg012500").show("slow");}
    },function(){
        cont0122 -=1;
        $('input[name=012301]:radio').resetbuttonset('#polis123');
        $('input[name=012302]:radio').resetbuttonset('#minpublic123');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis123,#cpreg012400").hide("slow");}
         else {$("#minpublic123,#cpreg012500").hide("slow");}
    });

    $(".item124").toggle(function(){
       rep0124[cont0124] = $(this).text();
       cont0124 +=1;
       $(this).addClass("activado");
    },function(){
        cont0124 -=1;
        $(this).removeClass("activado");
    });

    $(".item125").toggle(function(){
       rep0125[cont0125] = $(this).text();
       cont0125 +=1;
       $(this).addClass("activado");
    },function(){
        cont0125 -=1;
        $(this).removeClass("activado");
    });

    $(".item126").toggle(function(){
       rep0126[cont0126] = $(this).text();
       cont0126 +=1;
       $(this).addClass("activado");
    },function(){
        cont0126 -=1;
        $(this).removeClass("activado");
    });
    $(".item127").toggle(function(){
       rep0127[cont0127] = $(this).text();
       cont0127 +=1;
       $(this).addClass("activado");
    },function(){
        cont0127 -=1;
        $(this).removeClass("activado");
    });

     $(".item131").toggle(function(){
       rep0131[cont0131] = $(this).text();
       cont0131 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis132,#cpreg013300").show("slow");}
         else {$("#minpublic132,#cpreg013400").show("slow");}
    },function(){
        $('input[name=013201]:radio').resetbuttonset('#polis132');
        $('input[name=013202]:radio').resetbuttonset('#minpublic132');
        cont0131 -=1;
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis132,#cpreg013300").hide("slow");}
         else {$("#minpublic132,#cpreg013400").hide("slow");}
    });
    $(".item133").toggle(function(){
       rep0133[cont0133] = $(this).text();
       cont0133 +=1;
       $(this).addClass("activado");
    },function(){
        cont0133 -=1;
        $(this).removeClass("activado");
    });

    $(".item134").toggle(function(){
       rep0134[cont0134] = $(this).text();
       cont0134 +=1;
       $(this).addClass("activado");
    },function(){
        cont0134 -=1;
        $(this).removeClass("activado");
    });
    $(".item135").toggle(function(){
       rep0135[cont0135] = $(this).text();
       cont0135 +=1;
       $(this).addClass("activado");
    },function(){
        cont0135 -=1;
        $(this).removeClass("activado");
    });
    $(".item147").toggle(function(){
       rep0147[cont0147] = $(this).text();
       cont0147 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis148,#cpreg014900").show("slow");}
         else {$("#minpublic148,#cpreg015000").show("slow");}
    },function(){
        cont0147 -=1;
         $('input[name=014801]:radio').resetbuttonset('#polis148');
         $('input[name=014802]:radio').resetbuttonset('#minpublic148');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis148,#cpreg014900").hide("slow");}
         else {$("#minpublic148,#cpreg015000").hide("slow");}
    });
    $(".item149").toggle(function(){
       rep0149[cont0149] = $(this).text();
       cont0149 +=1;
       $(this).addClass("activado");
    },function(){
        cont0149 -=1;
        $(this).removeClass("activado");
    });

    $(".item150").toggle(function(){
       rep0150[cont0134] = $(this).text();
       cont0150 +=1;
       $(this).addClass("activado");
    },function(){
        cont0150 -=1;
        $(this).removeClass("activado");
    });
    $(".item151").toggle(function(){
       rep0151[cont0151] = $(this).text();
       cont0151 +=1;
       $(this).addClass("activado");
    },function(){
        cont0151 -=1;
        $(this).removeClass("activado");
    });
    $(".item152").toggle(function(){
       rep0152[cont0152] = $(this).text();
       cont0152 +=1;
       $(this).addClass("activado");
    },function(){
        cont0152 -=1;
        $(this).removeClass("activado");
    });

     $(".item160").toggle(function(){
       rep0160[cont0160] = $(this).text();
       cont0160 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis161,#cpreg016200").show("slow");}
         else {$("#minpublic161,#cpreg016300").show("slow");}
    },function(){
        cont0160 -=1;
        $('input[name=016101]:radio').resetbuttonset('#polis161');
        $('input[name=016102]:radio').resetbuttonset('#minpublic161');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis161,#cpreg016200").hide("slow");}
         else {$("#minpublic161,#cpreg016300").hide("slow");}
    });
    $(".item162").toggle(function(){
       rep0162[cont0162] = $(this).text();
       cont0162 +=1;
       $(this).addClass("activado");
    },function(){
        cont0162 -=1;
        $(this).removeClass("activado");
    });
     $(".item163").toggle(function(){
       rep0163[cont0163] = $(this).text();
       cont0163 +=1;
       $(this).addClass("activado");
    },function(){
        cont0163 -=1;
        $(this).removeClass("activado");
    });
    $(".item164").toggle(function(){
       rep0164[cont0164] = $(this).text();
       cont0164 +=1;
       $(this).addClass("activado");
    },function(){
        cont0164 -=1;
        $(this).removeClass("activado");
    });
    $(".item165").toggle(function(){
       rep0165[cont0165] = $(this).text();
       cont0165 +=1;
       $(this).addClass("activado");
    },function(){
        cont0165 -=1;
        $(this).removeClass("activado");
    });

    $(".item174").toggle(function(){
       rep0174[cont0174] = $(this).text();
       cont0174 +=1;       
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis175,#cpreg017600").show("slow");}
         else {
           if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic175,#cpreg017700").show("slow");}
            else {$("#demuna175,#cpreg01770a").show("slow");}
         }
    },function(){
        cont0174 -=1;
        $('input[name=017501]:radio').resetbuttonset('#polis175');
        $('input[name=017502]:radio').resetbuttonset('#minpublic175');
        $('input[name=017503]:radio').resetbuttonset('#demuna175');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis175,#cpreg017600").hide("slow");}
         else {
             if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic175,#cpreg017700").hide("slow");}
            else {$("#demuna175,#cpreg01770a").hide("slow");}
            }
    });
    $(".item176").toggle(function(){
       rep0176[cont0176] = $(this).text();
       cont0176 +=1;
       $(this).addClass("activado");
    },function(){
        cont0176 -=1;
        $(this).removeClass("activado");
    });
    $(".item177").toggle(function(){
       rep0177[cont0177] = $(this).text();
       cont0177 +=1;
       $(this).addClass("activado");
    },function(){
        cont0177 -=1;
        $(this).removeClass("activado");
    });
    $(".item177a").toggle(function(){
       rep0177a[cont0177a] = $(this).text();
       cont0177a +=1;
       $(this).addClass("activado");
    },function(){
        cont0177a -=1;
        $(this).removeClass("activado");
    });
    $(".item191").toggle(function(){
       rep0191[cont0191] = $(this).text();
       cont0191 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis192,#cpreg019300").show("slow");}
         else {
           if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic192,#cpreg019400").show("slow");}
            else {$("#demuna192,#cpreg01940a").show("slow");}
         }
      },function(){
        cont0191 -=1;
        $('input[name=019201]:radio').resetbuttonset('#polis192');
        $('input[name=019202]:radio').resetbuttonset('#minpublic192');
        $('input[name=019203]:radio').resetbuttonset('#demuna192');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis192,#cpreg019300").hide("slow");}
         else {
             if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic192,#cpreg019400").hide("slow");}
            else {$("#demuna192,#cpreg01940a").hide("slow");}
            }
    });

   $(".item193").toggle(function(){
       rep0193[cont0193] = $(this).text();
       cont0193 +=1;
       $(this).addClass("activado");
    },function(){
        cont0193 -=1;
        $(this).removeClass("activado");
    });
    $(".item194").toggle(function(){
       rep0194[cont0194] = $(this).text();
       cont0194 +=1;
       $(this).addClass("activado");
    },function(){
        cont0194 -=1;
        $(this).removeClass("activado");
    });
    $(".item194a").toggle(function(){
       rep0194a[cont0194a] = $(this).text();
       cont0194a +=1;
       $(this).addClass("activado");
    },function(){
        cont0194a -=1;
        $(this).removeClass("activado");
    });

    /////////////////////////////////////////
    $(".item209").toggle(function(){
       rep0209[cont0209] = $(this).text();
       cont0209 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis210,#cpreg021100").show("slow");}
         else {
           if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic210,#cpreg021200").show("slow");}
            else {$("#demuna210,#cpreg02120a").show("slow");}
         }
    },function(){
        cont0209 -=1;
        $('input[name=021001]:radio').resetbuttonset('#polis210');
        $('input[name=021002]:radio').resetbuttonset('#minpublic210');
        $('input[name=021003]:radio').resetbuttonset('#demuna210');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis210,#cpreg021100").hide("slow");}
         else {
             if($(this).text()=="Un Fiscal en el Ministerio"){$("#minpublic210,#cpreg021200").hide("slow");}
            else {$("#demuna210,#cpreg02120a").hide("slow");}
            }
    });
    $(".item211").toggle(function(){
       rep0211[cont0211] = $(this).text();
       cont0211 +=1;
       $(this).addClass("activado");
    },function(){
        cont0211 -=1;
        $(this).removeClass("activado");
    });
    $(".item212").toggle(function(){
       rep0212[cont0212] = $(this).text();
       cont0212 +=1;
       $(this).addClass("activado");
    },function(){
        cont0212 -=1;
        $(this).removeClass("activado");
    });
    $(".item212a").toggle(function(){
       rep0212a[cont0212a] = $(this).text();
       cont0212a +=1;
       $(this).addClass("activado");
    },function(){
        cont0212a -=1;
        $(this).removeClass("activado");
    });
    
    $(".item230").toggle(function(){
       rep0230[cont0230] = $(this).text();
       cont0230 +=1;
       $(this).addClass("activado");
       if($(this).text()=="Policia Nacional"){$("#polis231,#cpreg023200").show("slow");}
         else {$("#minpublic231,#cpreg023300").show("slow");}
    },function(){
        cont0230 -=1;
        $('input[name=023101]:radio').resetbuttonset('#polis231');
        $('input[name=023102]:radio').resetbuttonset('#minpublic231');
        $(this).removeClass("activado");
         if($(this).text()=="Policia Nacional"){$("#polis231,#cpreg023200").hide("slow");}
         else {$("#minpublic231,#cpreg023300").hide("slow");}
    });
    $(".item232").toggle(function(){
       rep0232[cont0232] = $(this).text();
       cont0232 +=1;
       $(this).addClass("activado");
    },function(){
        cont0232 -=1;
        $(this).removeClass("activado");
    });
    $(".item233").toggle(function(){
       rep0233[cont0233] = $(this).text();
       cont0233 +=1;
       $(this).addClass("activado");
    },function(){
        cont0233 -=1;
        $(this).removeClass("activado");
    });

    ////////////////////////////////////
    $(".item116").toggle(function(){
       rep0116[cont0116] = $(this).text();
       cont0116 +=1;
       $(this).addClass("activado");
    },function(){
        cont0116 -=1;
        $(this).removeClass("activado");
    });
    ///////////////////////////////////
    $(".item136").toggle(function(){
       rep0136[cont0136] = $(this).text();
       cont0136 +=1;
       $(this).addClass("activado");
    },function(){
        cont0136 -=1;
        $(this).removeClass("activado");
     });
     /////////////////////////////////
    ////////////////////////////////
    $("#frmpart2").submit(function(){

        bval = true;
        dat = new Object();
        
        if($("#cr007500").css("display")=="block")
            {
        bval = bval && $("#cr007500").validateradiobutton();
        if(bval && $("#cpreg007600").css("display")!="none"){bval = bval && $("#cr007600").validateradiobutton();}
        bval = bval && $("#cr007700").validateradiobutton();
        
        if(bval && $("#cpreg007800").css("display")!="none")
            {
                if(cont0078==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 78");}
                    else {dat['007800'] = rep0078;}
            }
          
        if(bval && $("#cpreg007900").css("display")!="none"){
        bval = bval && $("#007901").required();
        bval = bval && $("#007902").required();
        bval = bval && $("#007903").required();
        }
        
        bval = bval && $("#cr008000").validateradiobutton();
        
        if(bval && $("#t008000").css("display")!="none")
            {
                if(cont0080==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 80");}
                else {dat['008000'] = rep0080;}
            }        
        if(bval && $("#polis").css("display")!="none")
            {
                bval = bval && $("#cr008101").validateradiobutton();
            }
         if(bval && $("#minpublic").css("display")!="none")
            {
                bval = bval && $("#cr008102").validateradiobutton();
            }
         if(bval && $("#cpreg008200").css("display")!="none")
            {
                if(cont0082==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 82");}
                else {dat['008200'] = rep0082;}
            }
         if(bval && $("#cpreg008300").css("display")!="none")
            {
                if(cont0083==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 83");}
                else {dat['008300'] = rep0083;}
            }
         if(bval && $("#cpreg008400").css("display")!="none")
            {
                if(cont0084==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 84");}
                else {dat['008400'] = rep0084;}
            }
         if(bval && $("#cpreg008500").css("display")!="none")
            {
                if(cont0085==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 85");}
            }
         bval = bval && $("#cr008600").validateradiobutton();
         bval = bval && $("#cr008700").validateradiobutton();
         bval = bval && $("#cr008800").validateradiobutton();
         }
         /////////////////////////////////////////
         //TENTATIVA DE ROBO DE VIVIENDA
         if($("#cpreg008900").css("display")=="block") {
         bval = bval && $("#cr008900").validateradiobutton();
         if(bval && $("#t008900").css("display")!="none")
            {
                if(cont0089==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 89");}
                    else {dat['008900'] = rep0089;}
            }
         if(bval && $("#polis90").css("display")!="none")
            {
                bval = bval && $("#cr009001").validateradiobutton();
            }
         if(bval && $("#minpublic90").css("display")!="none")
            {
                bval = bval && $("#cr009002").validateradiobutton();
            }
         if(bval && $("#cpreg009100").css("display")!="none")
            {
                if(cont0091==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 91");}
                else {dat['009100'] = rep0091;}
            }
         if(bval && $("#cpreg009200").css("display")!="none")
            {
                if(cont0092==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 92");}
                else {dat['009200'] = rep0092;}
            }
          if(bval && $("#cpreg009300").css("display")!="none")
            {
                if(cont0093==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 93");}
                else {dat['009300'] = rep0093;}
            }
         if(bval && $("#cpreg009400").css("display")!="none")
            {
                if(cont0094==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 94");}
                else {dat['009400'] = rep0094;}
            }
         bval = bval && $("#009501").required();
         bval = bval && $("#009502").required();
         bval = bval && $("#009503").required();
         bval = bval && $("#cr009600").validateradiobutton();
         }
         //////////////////////////////////////
         //VICTIMAS DE ROBO DE VEHICULO AUTOMOTOR
         if($("#cpreg009700").css("display")=="block"){
         bval = bval && $("#009700").required();
         bval = bval && $("#cr009800").validateradiobutton();
         bval = bval && $("#009901").required();
         bval = bval && $("#009902").required();
         bval = bval && $("#009903").required();
         if($("#009700").val()!="En el extranjero" && $("#009700").val()!="NS")
             {
                 
                 bval = bval && $("#010000").required();
                 bval = bval && $("#cr010100").validateradiobutton();
                 if(bval && $("#t01010").css("display")!="none")
                    {
                        if(cont0101==0){bval=false; msg("Seleccione por lo menos un item de la pregunta N° 102");}
                        else {dat['010100'] = rep0101;}
                    }
                  if(bval && $("#polis102").css("display")!="none")
                    {
                        bval = bval && $("#cr010201").validateradiobutton();
                    }
                  if(bval && $("#minpublic102").css("display")!="none")
                    {
                        bval = bval && $("#cr010202").validateradiobutton();
                    }
                 if(bval && $("#cpreg010300").css("display")!="none")
                    {
                        if(cont0103==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 103");}
                        else {dat['010300'] = rep0103;}
                    }
                  if(bval && $("#cpreg010400").css("display")!="none")
                    {
                        if(cont0104==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 104");}
                        else {dat['010400'] = rep0104;}
                    }
                 if(bval && $("#cpreg010500").css("display")!="none")
                    {
                        if(cont0105==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 105");}
                        else {dat['010500'] = rep0105;}
                    }
                 if(bval && $("#cpreg010600").css("display")!="none")
                    {
                        if(cont0106==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 106");}
                        else {dat['010600'] = rep0106;}
                    }
             }             
            bval = bval && $("#cr010700").validateradiobutton();
            }
            //////////////////////////////////////
            //VICTIMAS DE ROBO DE OBJETOS DE VEHICULOS AUTOMOTOR
            if($("#cpreg010800").css("display")=="block"){
            bval = bval && $("#010800").required();
            bval = bval && $("#010901").required();
            bval = bval && $("#010902").required();
            bval = bval && $("#010903").required();
            
            if(bval && $("#cpreg011000").css("display")!="none")
                {
                    bval = bval && $("#011000").required();                    
                }
            if(bval && $("#010800").val()!="En el extranjero" && $("#011800").val()!="NS")
             {
                bval = bval && $("#cr011100").validateradiobutton();
                if(bval && $("#t011100").css("display")!="none"){
                    if(cont0111==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 111");}
                    else {dat['011100'] = rep0111;}
                }
                if(bval && $("#polis112").css("display")!="none")
                    {
                        bval = bval && $("#cr011201").validateradiobutton();
                    }
                if(bval && $("#minpublic112").css("display")!="none")
                   {
                    bval = bval && $("#cr011202").validateradiobutton();
                   }

                 if(bval && $("#cpreg011300").css("display")!="none")
                    {
                        if(cont0113==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 113");}
                        else {dat['011300'] = rep0113;}
                    }
                  if(bval && $("#cpreg011400").css("display")!="none")
                    {
                        if(cont0114==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 114");}
                        else {dat['011400'] = rep0114;}
                    }
                 if(bval && $("#cpreg011500").css("display")!="none")
                    {
                        if(cont0115==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 115");}
                        else {dat['011500'] = rep0115;}
                    }
                 if(bval && $("#cpreg011600").css("display")!="none")
                    {
                        if(cont0116==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 116");}
                        else {dat['011600'] = rep0116;}
                    }

             }
             bval = bval && $("#cr011700").validateradiobutton();
            }
            ///////////////////////////////////////////
            //VICTIMAS DE ROBO DE MOTOCICLETAS MOTOTAXIS
            if($("#cpreg011800").css("display")=="block"){
             bval = bval && $("#011800").required();
             bval = bval && $("#011901").required();
             bval = bval && $("#011902").required();
             bval = bval && $("#011903").required();
             if(bval && $("#011800").val()!="En el extranjero" && $("#011800").val()!="NS")
             {
                bval = bval && $("#012000").required();
                bval = bval && $("#cr012200").validateradiobutton();
                if(bval && $("#t012200").css("display")!="none"){
                    if(cont0122==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 122");}
                    else {dat['012200'] = rep0122;}
                }
                if(bval && $("#polis123").css("display")!="none")
                    {
                        bval = bval && $("#cr012301").validateradiobutton();
                    }
                if(bval && $("#minpublic123").css("display")!="none")
                   {
                    bval = bval && $("#cr012302").validateradiobutton();
                   }

                 
                  if(bval && $("#cpreg012400").css("display")!="none")
                    {
                        if(cont0124==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 124");}
                        else {dat['012400'] = rep0124;}
                    }
                 if(bval && $("#cpreg012500").css("display")!="none")
                    {
                        if(cont0125==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 125");}
                        else {dat['012500'] = rep0125;}
                    }
                 if(bval && $("#cpreg012600").css("display")!="none")
                    {
                        if(cont0126==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 126");}
                        else {dat['012600'] = rep0126;}
                    }
                 if(bval && $("#cpreg012700").css("display")!="none")
                    {
                        if(cont0127==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 127");}
                        else {dat['012700'] = rep0127;}
                    }

             }
         bval = bval && $("#cr012100").validateradiobutton();
         bval = bval && $("#cr012800").validateradiobutton();
            }
         ///////////////////////////////////////////////
         ///VICTIMAS DE ROBO DE BICICLETAS
         if($("#cpreg012900").css("display")=="block"){
         bval = bval && $("#012900").required();
         bval = bval && $("#cr013000").validateradiobutton();
         if(bval && $("#012900").val()!="En el extranjero" && $("#012900").val()!="NS")
             {
                 
                bval = bval && $("#cr013100").validateradiobutton();
                if(bval && $("#t013100").css("display")!="none"){
                    if(cont0131==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 131");}
                    else {dat['013100'] = rep0131;}
                }
                if(bval && $("#polis132").css("display")!="none")
                    {
                        bval = bval && $("#cr013201").validateradiobutton();
                    }
                if(bval && $("#minpublic132").css("display")!="none")
                   {
                    bval = bval && $("#cr013202").validateradiobutton();
                   }

                 if(bval && $("#cpreg013300").css("display")!="none")
                    {
                        if(cont0133==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 133");}
                        else {dat['013300'] = rep0133;}
                    }
                  if(bval && $("#cpreg013400").css("display")!="none")
                    {
                        if(cont0134==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 134");}
                        else {dat['013400'] = rep0134;}
                    }
                 if(bval && $("#cpreg013500").css("display")!="none")
                    {
                        if(cont0135==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 135");}
                        else {dat['013500'] = rep0135;}
                    }
                 if(bval && $("#cpreg013600").css("display")!="none")
                    {
                        if(cont0136==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 136");}
                        else {dat['013600'] = rep0136;}
                    }                 
             }
             bval = bval && $("#cr013700").validateradiobutton();
             }
             ////////////////////////////////////////
             //ROBO CON VIOLENCIA
             if($("#cpreg013800").css("display")=="block"){
             bval = bval && $("#013800").required();
             bval = bval && $("#013901").required();
             bval = bval && $("#013902").required();
             bval = bval && $("#013903").required();
             if(bval && $("#cpreg014000").css("display")!="none"){
                 bval = bval && $("#014000").required();
             }             
             bval = bval && $("#cr014100").validateradiobutton();
             if(bval && $("#cpreg014200").css("display")!="none"){
                 bval = bval && $("#014200").required();
             }
             bval = bval && $("#cr014300").validateradiobutton();
             if(bval && $("#cpreg014400").css("display")!="none"){
                 bval = bval && $("#014400").required();
             }
             if(bval && $("#cpreg014500").css("display")!="none"){
                 bval = bval && $("#cr014500").validateradiobutton();
             }
             bval = bval && $("#cr014600").validateradiobutton();
             if(bval && $("#cpreg014700").css("display")!="none"){
                 bval = bval && $("#cr014700").validateradiobutton();
             }
             //
             if(bval && $("#t014700").css("display")!="none" && $("#cpreg014700").css("display")!="none"){
                    if(cont0147==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 147");}
                    else {dat['014700'] = rep0147;}
                }
             if(bval && $("#polis148").css("display")!="none")
                {
                    bval = bval && $("#cr014801").validateradiobutton();
                }
              if(bval && $("#minpublic148").css("display")!="none")
                {
                   bval = bval && $("#cr014802").validateradiobutton();
                }

             if(bval && $("#cpreg014900").css("display")!="none")
                {
                    if(cont0149==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 149");}
                    else {dat['014900'] = rep0149;}
                }
              if(bval && $("#cpreg015000").css("display")!="none")
                {
                    if(cont0150==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 150");}
                    else {dat['015000'] = rep0150;}
                }
             if(bval && $("#cpreg015100").css("display")!="none")
                {
                    if(cont0151==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 151");}
                    else {dat['015100'] = rep0151;}
                }
             if(bval && $("#cpreg015200").css("display")!="none")
                {
                    if(cont0152==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 152");}
                    else {dat['015200'] = rep0152;}
                }
             bval = bval && $("#cr015300").validateradiobutton();
             bval = bval && $("#cr015400").validateradiobutton();
             bval = bval && $("#cr015500").validateradiobutton();
             }
             //////////////////////////////////////////////////
             //ROBOS SIN VIOLENCIA
             if($("#cpreg015600").css("display")=="block")
             {
                 bval = bval && $("#015600").required();
                 bval = bval && $("#cr015700").validateradiobutton();
                 bval = bval && $("#cr015800").validateradiobutton();
                 if(bval && $("#cpreg015900").css("display")!="none")
                    {
                        bval = bval && $("#015900").required();
                    }
                 if(bval && $("#cpreg016000").css("display")!="none")
                    {
                        bval = bval && $("#cr016000").validateradiobutton();
                    }
                 if(bval && $("#t016000").css("display")!="none" && $("#cpreg016000").css("display")!="none"){
                    if(cont0160==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 160");}
                    else {dat['016000'] = rep0160;}
                }
                  if(bval && $("#polis161").css("display")!="none")
                    {
                        bval = bval && $("#cr016101").validateradiobutton();
                    }
                  if(bval && $("#minpublic161").css("display")!="none")
                    {
                       bval = bval && $("#cr016102").validateradiobutton();
                    }

                 if(bval && $("#cpreg016200").css("display")!="none")
                    {
                        if(cont0162==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 162");}
                        else {dat['016200'] = rep0162;}
                    }
                  if(bval && $("#cpreg016300").css("display")!="none")
                    {
                        if(cont0163==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 163");}
                        else {dat['016300'] = rep0163;}
                    }
                 
                 if(bval && $("#cpreg016400").css("display")!="none")
                    {
                        if(cont0164==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 164");}
                        else {dat['016400'] = rep0164;}
                    }
                 if(bval && $("#cpreg016500").css("display")!="none")
                    {
                        if(cont0165==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 165");}
                        else {dat['016500'] = rep0165;}
                    }
                  bval = bval && $("#cr016600").validateradiobutton();                  
             }
             ///////////////////////////////////////
             //AMENAZAS
             if($("#cpreg016700").css("display")=="block")
                {
                    bval = bval && $("#016700").required();
                    bval = bval && $("#016800").required();
                    bval = bval && $("#cr016900").validateradiobutton();
                    
                    if( bval &&  $("#cpreg017000").css("display")!="none")
                        {
                            
                            bval = bval && $("#017000").required();
                        }
                    
                    bval = bval && $("#cr017100").validateradiobutton();
                    bval = bval && $("#cr017200").validateradiobutton();
                    if( bval &&  $("#cpreg017300").css("display")!="none")
                        {
                            bval = bval && $("#017300").required();
                        }
                    if(bval && $("#cpreg017400").css("display")!="none")
                        {
                            bval = bval && $("#cr017400").validateradiobutton();
                        }                    
                    if(bval && $("#t017400").css("display")!="none"&& $("#cpreg017400").css("display")!="none")
                        {
                            if(cont0174==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 174");}
                            else {dat['017400'] = rep0174;}
                        }
                     if(bval && $("#polis175").css("display")!="none")
                        {
                            bval = bval && $("#cr017501").validateradiobutton();
                        }
                      if(bval && $("#minpublic175").css("display")!="none")
                        {
                           bval = bval && $("#cr017502").validateradiobutton();
                        }
                      if(bval && $("#demuna175").css("display")!="none")
                        {
                           bval = bval && $("#cr017503").validateradiobutton();
                        }
                     if(bval && $("#cpreg017600").css("display")!="none")
                        {
                            if(cont0176==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 176");}
                            else {dat['017600'] = rep0176;}
                        }
                      if(bval && $("#cpreg017700").css("display")!="none")
                        {
                            if(cont0177==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 177");}
                            else {dat['017700'] = rep0177;}
                        }
                     if(bval && $("#cpreg01770a").css("display")!="none")
                        {
                            if(cont0177a==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 177a");}
                            else {dat['01770a'] = rep0177a;}
                        }
                        
                      bval = bval && $("#cr017800").validateradiobutton();
                      bval = bval && $("#cr017900").validateradiobutton();
                      bval = bval && $("#cr018000").validateradiobutton();
                      bval = bval && $("#cr018100").validateradiobutton();                    
                }
                /////////////////////////////////////////////
                //LESIONES
                if($("#cpreg018200").css("display")=="block")
                {
                    bval = bval && $("#018200").required();
                    bval = bval && $("#018300").required();
                    bval = bval && $("#cr018400").validateradiobutton();
                    if( bval &&  $("#cpreg018500").css("display")!="none")
                        {
                            bval = bval && $("#018500").required();
                        }
                    bval = bval && $("#cr018600").validateradiobutton();
                    if( bval &&  $("#cpreg018700").css("display")!="none")
                        {
                            bval = bval && $("#018700").required();
                        }
                     bval = bval && $("#cr018800").validateradiobutton();
                     bval = bval && $("#cr018900").validateradiobutton();
                     bval = bval && $("#cr019000").validateradiobutton();

                     if(bval && $("#cpreg019100").css("display")!="none")
                        {
                            bval = bval && $("#cr019100").validateradiobutton();
                        }
                    if(bval && $("#t019100").css("display")!="none"&& $("#cpreg019100").css("display")!="none")
                        {
                            if(cont0191==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 191");}
                            else {dat['019100'] = rep0191;}
                        }
                     if(bval && $("#polis192").css("display")!="none")
                        {
                            bval = bval && $("#cr019201").validateradiobutton();
                        }
                      if(bval && $("#minpublic192").css("display")!="none")
                        {
                           bval = bval && $("#cr019202").validateradiobutton();
                        }
                      if(bval && $("#demuna192").css("display")!="none")
                        {
                           bval = bval && $("#cr019203").validateradiobutton();
                        }
                     if(bval && $("#cpreg019300").css("display")!="none")
                        {
                            if(cont0193==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 193");}
                            else {dat['019300'] = rep0193;}
                        }
                      if(bval && $("#cpreg019400").css("display")!="none")
                        {
                            if(cont0194==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 194");}
                            else {dat['019400'] = rep0194;}
                        }
                     if(bval && $("#cpreg01940a").css("display")!="none")
                        {
                            if(cont0194a==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 194a");}
                            else {dat['01940a'] = rep0194a;}
                        }
                     bval = bval && $("#cr019500").validateradiobutton();
                     bval = bval && $("#cr019600").validateradiobutton();
                     bval = bval && $("#cr019700").validateradiobutton();
                     bval = bval && $("#cr019800").validateradiobutton();
                }
                if($("#cpreg019900").css("display")=="block")
                    {
                        bval = bval && $("#019900").required();
                        bval = bval && $("#020000").required();
                        bval = bval && $("#020100").required();
                        bval = bval && $("#cr020200").validateradiobutton();
                        if( bval &&  $("#cpreg020300").css("display")!="none")
                        {
                            bval = bval && $("#020300").required();
                        }
                        bval = bval && $("#cr020400").validateradiobutton();
                        if( bval &&  $("#cpreg020500").css("display")!="none")
                        {
                            bval = bval && $("#020500").required();
                        }
                        bval = bval && $("#cr020600").validateradiobutton();
                        bval = bval && $("#cr020700").validateradiobutton();
                        bval = bval && $("#cr020800").validateradiobutton();
                        
                        if(bval && $("#cpreg020900").css("display")!="none")
                        {
                            bval = bval && $("#cr020900").validateradiobutton();
                        }
                        if(bval && $("#t020900").css("display")!="none"&& $("#cpreg020900").css("display")!="none")
                            {
                                if(cont0209==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 209");}
                                else {dat['020900'] = rep0209;}
                            }
                         if(bval && $("#polis210").css("display")!="none")
                            {
                                bval = bval && $("#cr021001").validateradiobutton();
                            }
                          if(bval && $("#minpublic210").css("display")!="none")
                            {
                               bval = bval && $("#cr021002").validateradiobutton();
                            }
                          if(bval && $("#demuna210").css("display")!="none")
                            {
                               bval = bval && $("#cr021003").validateradiobutton();
                            }
                         if(bval && $("#cpreg021100").css("display")!="none")
                            {
                                if(cont0211==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 211");}
                                    else {dat['021100'] = rep0211;}
                            }
                          if(bval && $("#cpreg021200").css("display")!="none")
                            {
                                if(cont0212==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 212");}
                                else {dat['021200'] = rep0212;}
                            }
                         if(bval && $("#cpreg02120a").css("display")!="none")
                            {
                                if(cont0212a==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 212a");}
                                else {dat['02120a'] = rep0212a;}
                            }
                         bval = bval && $("#cr021300").validateradiobutton();
                         bval = bval && $("#cr021400").validateradiobutton();
                      }
                    /////////////////////////////
                    //Secuestro
                   if($("#cpreg021500").css("display")=="block")
                    {
                        bval = bval && $("#021500").required();
                        bval = bval && $("#021600").required();                        
                        bval = bval && $("#cr021700").validateradiobutton();
                        if( bval &&  $("#cpreg021800").css("display")!="none")
                        {
                            bval = bval && $("#021800").required();
                        }
                        bval = bval && $("#cr021900").validateradiobutton();
                        bval = bval && $("#cr022000").validateradiobutton();
                        if( bval &&  $("#cpreg022100").css("display")!="none")
                        {
                            bval = bval && $("#022100").required();
                        }
                        bval = bval && $("#022300").required();
                        bval = bval && $("#022400").required();
                        bval = bval && $("#cr022500").validateradiobutton();
                        bval = bval && $("#cr022600").validateradiobutton();
                        bval = bval && $("#cr022700").validateradiobutton();
                        bval = bval && $("#cr022800").validateradiobutton();
                        bval = bval && $("#cr022900").validateradiobutton();

                        if(bval && $("#cpreg023000").css("display")!="none")
                        {
                            bval = bval && $("#cr023000").validateradiobutton();
                        }
                        if(bval && $("#t023000").css("display")!="none"&& $("#cpreg023000").css("display")!="none")
                            {
                                if(cont0230==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 230");}
                                else {dat['023000'] = rep0230;}
                            }
                     if(bval && $("#polis231").css("display")!="none")
                        {
                            bval = bval && $("#cr023101").validateradiobutton();
                        }
                      if(bval && $("#minpublic231").css("display")!="none")
                        {
                           bval = bval && $("#cr023102").validateradiobutton();
                        }
                      if(bval && $("#cpreg023200").css("display")!="none")
                        {
                            if(cont0232==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 232");}
                            else {dat['023200'] = rep0232;}
                        }
                      if(bval && $("#cpreg023300").css("display")!="none")
                        {
                            if(cont0233==0){ bval=false; msg("Seleccione por lo menos un item de la pregunta N° 233");}
                            else {dat['023300'] = rep0233;}
                        }
                        
                    }
             
        if(bval){
            str = $(this).serializeArray();
            $.get("index.php",{'controller':'Unicri','action':'save','data': str},function(data){
              $("#repppp").empty().append(data);
               if(data.res=="1"){
                      $.get("index.php",{'controller':'Unicri','action':'save_multi','data':dat},function(data){
                         if(data.res=="1"){$( "#container" ).tabs({enabled:[5]});
                                           $( "#container" ).tabs({selected:5});}
                               else {
                                   msgerror(data.msg);
                               }
                     },'json');}
                 else {msgerror(data.msg)}
          },'json');

        }
        
        return false;
    })
   });

