$(function() 
{
    $( "#form_area" ).submit(function(){
        bval = true;
        bval = bval && $( "#area_id" ).required();
        bval = bval && $( "#fecha" ).required();
        if ( bval ) 
        {
            return true;
        }
        return false;
    });
    $("#fecha").datepicker(
    {
        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "-25:+0"
        /*minDate: '-65Y',
        maxDate: '-15Y'*/
    });
    $(".btn_other").button();
});/*
    function add_rows_(id)
    {
        var ct=parseInt($("#"+id+"_ctr").val());
        agregar_(id,ct);
        ct=ct+1;
        $("#"+id+"_ctr").attr("value",ct);
        $("#preg_1_1").attr("value",ct);

    }
    
    function agregar_(id_,nrow_)
    { 
        var next_=(nrow_+1);
        var row_ ='<td style="width:10%;" >'+next_+'</td>';
            row_=row_+'<td><input type="text" class="input_text_" name="descripcion_a['+ next_ +'][0]" style="width:60%" ></td>';
            row_=row_+'<td><input type="text" class="input_text_" name="ponderado['+next_+'][1]" style="width:20%"> </td>';
            row_=row_+'<td><a href="javascript:eliminar_(\'alternativa\','+next_+')" class="btn_other" id="btn_'+id_+'_'+next_+'"> Eliminar </a>  </td>';
            row_='<tr id="'+id_+'_rw_'+ next_ +'" >'+row_ +'</tr>';
            $("#tb_"+id_).append(row_);
            $(".btn_other").button();
            $("#btn_"+id_+"_"+nrow_).hide("slow");

    }
    
    function eliminar_(id_,nrow_)
    {
        $("#"+id_+"_rw_"+nrow_).remove();
        var ct=parseInt($("#"+id_+"_ctr").val());
        ct=ct-1;
        $("#"+id_+"_ctr").attr("value",ct);
        $("#preg_1_1").attr("value",ct);
        $("#btn_"+id_+"_"+ct).show();
    }


*/