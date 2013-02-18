$(function(){
    $( "#dialog" ).dialog({autoOpen: false ,
                        draggable: true,
                    modal:true,
                    position:'center',
                    title: 'Mensaje',
                    resizable: false ,
                    buttons: {
                        Ok: function(){
                            $( this ).dialog( "close" );
                        }
                    }});
    $( "#formin" ).submit(function(e){
        e.preventDefault();
        str = $( this ).serializeArray();
        if (bval){
            $.ajax({
                type: "GET",
                url: "index.php",
                dataType: "json",
                data: {'controller':'Activa','action':'Saveactivadetail','data': str},
                success: function(data){
                    if ( data.res == 1 ) {
                        $( "#container" ).tabs("enable",3);
                        $( "#container" ).tabs("select",3);
                    }
                    else {
                        msgerror(data.msg);
                    }
                }
            });
        } else {
            msg('Todos los datos son requeridos.');
        }
        return false;
    });
    $(".btn_other").button();
    $(".input_text_").bind('keyup ',function (){
       var id_= $(this).attr("id");
       var to_= parseInt(id_.length )-1;
       var indx_='#'+id_.substr(0,to_);
       var a_=parseFloat($(indx_+'1').attr("value"));
       var b_=parseFloat($(indx_+'2').attr("value"));
       var nn= a_*b_;
       $(indx_+'3').attr("value", nn );
    });




    $(".input_text_").bind('keypress ',function (e){
       return permite(e,'num');
    });
    $(document).ready(function(){
        loadData3();
    });
});

function loadData3() {
    if( $("#IDNUMBER").attr("value")!="")
    {
    var id_= $("#IDNUMBER").attr("value");
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'C1',
            action:'fill_data_c',
            id:id_
        },
        beforeSend:function (data){
        
        },
        success: function(data){
          var idn_=0;
           $.each(data.row,function(indx,value){
               var idn_= value.idTipoInversion;
               var idx_= value.idInversion-1;
               setValue_("C"+idn_+"["+idx_+"][0]", value.Jornales );
               setValue_("C"+idn_+"["+idx_+"][1]", value.PrecioUnitario );
               setValue_("C"+idn_+"["+idx_+"][2]", (value.Jornales *value.PrecioUnitario  ));
           });
        }
    });
}
}