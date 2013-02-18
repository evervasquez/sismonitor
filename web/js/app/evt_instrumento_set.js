$(function(){
    
   $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_data',
            id:$("#enca_id").val()
        },
        beforeSend:function (data){
        
        },
        success: function(data){
            //setValue_("#enca_grado",data[0].enca_grado);
            
            
            setValue_("#enca_ini",data.encabezado.enca_ini);
            setValue_("#enca_fin",data.encabezado.enca_fin);
            setValue_("#enca_seccion",data.encabezado.enca_seccion);
            setValue_("#enca_total_est",data.encabezado.enca_total_est);
            setValue_("#enca_total_est",data.encabezado.enca_total_est);
           
            
            setValue_("enca_grado",data.encabezado.enca_grado.split("-"));
           
           setValue_("#enca_seccion",data.encabezado.enca_seccion);
            var ubi_id=""+(data.encabezado.ubi_id)+"";
            setValue_("#dep_id", ubi_id.substr(0, 2)+"0000");
            $("#dep_id").trigger("change");
            setValue_("#prov_id", ubi_id.substr(0, 4)+"00");
             $("#prov_id").trigger("change");
            setValue_("#dist_id", ubi_id+"");
            var f_=data.encabezado.enca_fecha.split("-");
            setValue_("#enca_fecha",f_[2]+"/"+f_[1]+"/"+f_[0]);
            var respuestas= data.respuestas; 
            for (var i = 0; i < respuestas.length; i++) {
              var rw=  respuestas[i];
              if(rw.niv_id=="-1")
              {
                  rw.nivl_id="si";
              }
              if(rw.niv_id=="-2")
              {
                  rw.nivl_id="no"
              }              
              var val_=rw.item_id+"-"+rw.ind_id+"-"+rw.nivl_id;
              var name_="PREGUNTA_"+rw.item_id;
              setValue_(name_,val_);
        }
        
        for( i = 0; i <  data.observaciones.length; i++){
          var rw_=  data.observaciones[i];
          agregar_observacion(rw_.obs_descripcion);
        }
         
            
        }
    });
});