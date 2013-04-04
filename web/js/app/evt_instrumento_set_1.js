

function esnulo(v){
    if(isNaN(v)){
        return 0;
             
    }else{
        return v;
    }
}

$(function(){
    var flag= true;
    var id_=$("#codigo_modular").val();
    $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        async:false,
        data: {
            controller:'Instrumento',
            action:'get_instrumento_one',
            id:id_
        },
        beforeSend:function (data){
            msg_alert_a("Buscado ... ", 120);
        },
        success: function(data_){
            $("#pop_msg_").dialog("close").remove();
            if(data_.result==true)
            {
                // setValue_("#enca_id", data_.ecabezado.enca_id);
            
                if(data_.encabezado!=null)
                {
                    if(data_.encabezado.enca_fecha!=null)
                    {
                        var fech=data_.encabezado.enca_fecha.split("-");
                        setValue_("#enca_fecha",fech[2]+"/"+fech[1]+"/"+fech[0]);
                    }
                
                }
                //            if(data_.institucion.estado===null)
                //                    {
                //                        data_.institucion.estado=0;
                //                    }
           
            
                setValue_("#grup_intervencion",data_.institucion.idgrupo_intervencion );
                setValue_("#num_escuela", data_.institucion.inst_nro_escuela);
            
                setValue_("#nombre_escuela", data_.institucion.inst_nombre);
                setValue_("#ano_ingreso", data_.institucion.inst_anio_ingreso);
                //setValue_("intervencion_otro", data_.institucion.inst_pip);
                //setValue_("#nombre_proyecto_otro", data_.institucion.inst_nombre_pip);
                //setValue_("#ano_ingreso_otro", data_.institucion.inst_anio_ingreso_pip);
                setValue_("#telefono_comunitario", data_.institucion.inst_telefono_comu);
                setValue_("#turno_manana_ini", data_.institucion.inst_md);
                setValue_("#turno_manana_fin", data_.institucion.inst_ma);
                setValue_("#turno_tarde_ini", data_.institucion.inst_td);
                setValue_("#turno_tarde_fin", data_.institucion.inst_ta);
            
                setValue_("#duracion_desayuno_ini", data_.institucion.inst_dd);
                setValue_("#duracion_desayuno_fin", data_.institucion.inst_da);
            
                setValue_("#duracion_recreo_ini", data_.institucion.inst_rd);
                setValue_("#duracion_recreo_fin", data_.institucion.inst_ra);
            
                setValue_("#duracion_almuerzo_ini", data_.institucion.inst_ad);
                setValue_("#duracion_almuerzo_fin", data_.institucion.inst_aa);
            
                var ubi_id=""+(data_.institucion.ubi_id)+"";
                setValue_("#dep_id", ubi_id.substr(0, 2)+"0000");
                $("#dep_id").trigger("change");
                setValue_("#prov_id", ubi_id.substr(0, 4)+"00");
                $("#prov_id").trigger("change");
                setValue_("#dist_id", ubi_id+"");
            
                setValue_("#punto_referencial", data_.institucion.inst_datosubigeo);
                setValue_("#enca_distancia", data_.institucion.inst_distkm);
                setValue_("#tiempo_minutos", data_.institucion.inst_tiempomin);
                setValue_("#form_transporte", data_.institucion.forma_transporteid);
                setValue_("#tipo_escuela", data_.institucion.inst_tipo);
            
                if( data_.lugar!=null)
                {
                    setValue_("#lugar_id", data_.lugar.lug_id);
                    setValue_("#lugar", data_.lugar.lug_descripcion);
                }
                if(data_.institucion.inst_distribucion_aulas!==null)
                {
                    var  distrib  = data_.institucion.inst_distribucion_aulas.split(";");
                }

                for(var i in distrib)
                {
                    var posi=distrib[i];
                    var pp= posi.split(",");
                    $("#aula_"+pp[0]+"_"+pp[1]).attr("checked", true);
                }
            
                var poblacion_estudiantil= data_.poblacion_estudiantil;
                for(var i in poblacion_estudiantil)
                {
                    var pob= poblacion_estudiantil[i];
                    setValue_("#poblacion_"+pob.grado+"_1", pob.hombres);
                    setValue_("#poblacion_"+pob.grado+"_2", pob.hombres_d);
                    setValue_("#poblacion_"+pob.grado+"_3",(esnulo(parseInt(pob.hombres))+ esnulo(parseInt(pob.hombres_d))));
                    setValue_("#poblacion_"+pob.grado+"_4", pob.mujeres);
                    setValue_("#poblacion_"+pob.grado+"_5", pob.mujeres_d);
                    setValue_("#poblacion_"+pob.grado+"_6",(esnulo(parseInt(pob.mujeres))+ esnulo(parseInt(pob.mujeres_d))));
                    setValue_("#poblacion_"+pob.grado+"_7",(esnulo(parseInt(pob.hombres))+ esnulo(parseInt(pob.hombres_d))+esnulo(parseInt(pob.mujeres))+ esnulo(parseInt(pob.mujeres_d))));
                }
                $("#poblacion_6_1").trigger("keyup");
                $("#poblacion_6_2").trigger("keyup");
                $("#poblacion_6_4").trigger("keyup");
                $("#poblacion_6_5").trigger("keyup");
                 
                //setValue_("#numero_padres_t", data_.institucion.inst_nro_asociados);
                setValue_("#numero_padres", data_.institucion.nro_padres);
                setValue_("#numero_padres_d", data_.institucion.nro_padres_d);
                setValue_("#total_padres", (esnulo(parseInt(data_.institucion.nro_padres)) + esnulo(parseInt(data_.institucion.nro_padres_d))));
                setValue_("#numero_madres", data_.institucion.nro_madres);
                setValue_("#numero_madres_d", data_.institucion.nro_madres_d);
                setValue_("#total_madres", (esnulo(parseInt(data_.institucion.nro_madres)) + esnulo(parseInt(data_.institucion.nro_madres_d))));
                setValue_("#total_CD", (esnulo(parseInt(data_.institucion.nro_padres_d)) + esnulo(parseInt(data_.institucion.nro_madres_d))));
                setValue_("#total_SD", (esnulo(parseInt(data_.institucion.nro_padres)) + esnulo(parseInt(data_.institucion.nro_madres))));
                setValue_("#numero_padres_t",data_.institucion.inst_nro_asociados);
              
                var municipio_escolar= data_.municipio_escolar;
                for(var i in municipio_escolar)
                {
                    var pobl  =  municipio_escolar[i];
                    var id_= parseInt(i)+1;
                    setValue_("T3_"+id_+"_1", pobl.nombres_apell);
                    setValue_("T3_"+id_+"_2", pobl.sexo);
                    setValue_("T3_"+id_+"_3", pobl.edad);
                    setValue_("T3_"+id_+"_4",pobl.grado);
                    setValue_("T3_"+id_+"_5",pobl.discapacidad);
                } 
           
                var conei= data_.conei;
                for(var i in conei)
                {
                    var con  =  conei[i];
                    var id__= parseInt(i)+1;
                    setValue_("T4_"+id__+"_1", con.nombres);
                    setValue_("T4_"+id__+"_2", con.sexo);
                    setValue_("T4_"+id__+"_3", con.dni)
                    setValue_("T4_"+id__+"_4", con.discapacidad);
                        
                }
                setValue_("T5_1", data_.institucion.inst_conei_rec_ugel);   
                setValue_("T5_2", data_.institucion.inst_conei_res_direc);
                setValue_("T5_3", data_.institucion.inst_pei);
                setValue_("T5_4", data_.institucion.inst_pei_a);
                setValue_("T5_5", data_.institucion.inst_ident);
                //setValue_("T5_4", data_.institucion.inst_vision);
                //setValue_("T5_5", data_.institucion.inst_mision);
                setValue_("T5_6", data_.institucion.inst_diagnostico);
                setValue_("T5_7", data_.institucion.inst_prop_pedagogica);
                setValue_("T5_8", data_.institucion.inst_prop_gestion);
                setValue_("T5_9", data_.institucion.inst_pci);
                setValue_("T5_10", data_.institucion.inst_pci_solo);
                setValue_("T5_11", data_.institucion.inst_pat);
                setValue_("T5_12", data_.institucion.inst_pat_solo);
             
             
                setValue_("T6_1", data_.institucion.inst_luz_electrica);   
                setValue_("T6_2", data_.institucion.inst_agua_potable);
                setValue_("T6_3", data_.institucion.inst_desague);
                setValue_("T6_4", data_.institucion.inst_relleno_sanitario);
                setValue_("T6_5", data_.institucion.inst_sshh_pozo_septico);
                setValue_("T6_6", data_.institucion.inst_sshh_letrina_silo);
                setValue_("T6_7", data_.institucion.inst_telefono);
                if(data_.institucion.estado==1){
                    $("#check_estado").addClass('chk_estado');
                    $("#anulado").addClass('anulado');
                    setValue_("inst_estado", data_.institucion.estado);
                }else{
                    data_.institucion.estado=0;
                //setValue_("inst_estado", data_.institucion.estado);
                }
                
                var gubernamentales = data_.gubernamentales;
                var cont =1;
                for(var i in gubernamentales)
                {
                    var gube= gubernamentales[i];
                    if(gube.nombre!=""){
                    setValue_("gubernamentales1_"+cont+"", gube.nombre);
                    setValue_("gubernamentales_"+cont+"", gube.guber);
                    cont= cont+1;
                    }
                }
                
                var autoridades = data_.autoridades;
                var auto  =  autoridades[0];
                if(auto){
                
                setValue_("#autoridades_1_1", esnulo(parseInt(auto.gob_cd_h)));
                setValue_("#autoridades_1_2", esnulo(parseInt(auto.gob_sd_h)));
                setValue_("#autoridades_1_3", esnulo(parseInt(auto.ten_cd_h)));
                setValue_("#autoridades_1_4", esnulo(parseInt(auto.ten_sd_h)));
                setValue_("#autoridades_1_5", esnulo(parseInt(auto.age_cd_h)));
                setValue_("#autoridades_1_6", esnulo(parseInt(auto.age_sd_h)));
                setValue_("#autoridades_1_7", esnulo(parseInt(auto.otro_cd_h)));
                setValue_("#autoridades_1_8", esnulo(parseInt(auto.otro_sd_h)));
                
                setValue_("#autoridades_2_1", esnulo(parseInt(auto.gob_cd_m)));
                setValue_("#autoridades_2_2", esnulo(parseInt(auto.gob_sd_m)));
                setValue_("#autoridades_2_3", esnulo(parseInt(auto.ten_cd_m)));
                setValue_("#autoridades_2_4", esnulo(parseInt(auto.ten_sd_m)));
                setValue_("#autoridades_2_5", esnulo(parseInt(auto.age_cd_m)));
                setValue_("#autoridades_2_6", esnulo(parseInt(auto.age_sd_m)));
                setValue_("#autoridades_2_7", esnulo(parseInt(auto.otro_cd_m)));
                setValue_("#autoridades_2_8", esnulo(parseInt(auto.otro_sd_m)));
                }
                $("#autoridades_1_1").trigger("keyup");
                $("#autoridades_1_2").trigger("keyup");
                $("#autoridades_1_3").trigger("keyup");
                $("#autoridades_1_4").trigger("keyup");
                $("#autoridades_1_5").trigger("keyup");
                $("#autoridades_1_6").trigger("keyup");
                $("#autoridades_1_7").trigger("keyup");
                $("#autoridades_1_8").trigger("keyup");
                
                $("#autoridades_2_1").trigger("keyup");
                $("#autoridades_2_2").trigger("keyup");
                $("#autoridades_2_3").trigger("keyup");
                $("#autoridades_2_4").trigger("keyup");
                $("#autoridades_2_5").trigger("keyup");
                $("#autoridades_2_6").trigger("keyup");
                $("#autoridades_2_7").trigger("keyup");
                $("#autoridades_2_8").trigger("keyup");
                //setValue_("#autoridades_1_9", data_.institucion.autoridades_1_2);
                
                //setValue_("#numero_padres", data_.institucion.nro_padres);
                // setValue_("#numero_padres", data_.institucion.nro_padres);
                
                
                var ambiente= data_.ambiente;
                for(var i in ambiente)
                {
                    var amb  =  ambiente[i];
                    var idt_= parseInt(i)+1;
                    setValue_("T7_"+idt_+"_1", amb.tiene);
                    setValue_("T7_"+idt_+"_2", amb.bueno);
                    setValue_("T7_"+idt_+"_3", amb.regular);
                    setValue_("T7_"+idt_+"_4", amb.malo);

                }
                var personal= data_.personal;
                for(var i in personal)
                {
                    agregar_personal();
                    var pers  =  personal[i];
                    var ide_= parseInt(i)+1;
                    setValue_("personal_"+ide_+"_0", pers.pers_nombres+" "+pers.pers_apellido_p+" "+pers.pers_apellido_m);
                    setValue_("personal_"+ide_+"_1", pers.pers_grado_ensena.split("-"));
                    //setValue_("personal_"+ide_+"_2", pers.pers_ano_ingreso_proyecto);
                    setValue_("personal_"+ide_+"_4", pers.pers_experiencia_director);
                    setValue_("personal_"+ide_+"_5", pers.pers_experiencia_docente);
                    setValue_("personal_"+ide_+"_6", pers.pers_experiencia_escuela);
                    setValue_("personal_"+ide_+"_3", pers.pers_experiencia_proyecto);
                    setValue_("personal_"+ide_+"_7", pers.pers_sexo);
                    //setValue_("personal_"+ide_+"_8", pers.pers_estado_civil);
                    setValue_("personal_"+ide_+"_9", pers.pers_condicion_lab);
                    
                    var fech_=pers.pers_fecha_nac.split("-");
                    fech_= fech_[2]+"/"+fech_[1]+"/"+fech_[0];
                    
                    setValue_("personal_"+ide_+"_10",fech_ );
                    setValue_("personal_"+ide_+"_11", pers.pers_dni);
                    setValue_("personal_"+ide_+"_12", pers.Nombre);
                    setValue_("personal_"+ide_+"_13", pers.pers_lugar_nac);
                    setValue_("personal_"+ide_+"_14", pers.pers_domicilio);
                    setValue_("personal_"+ide_+"_15", pers.pers_comunidad_escuela); 
                    setValue_("personal_"+ide_+"_16", pers.pers_correo);
                    setValue_("personal_"+ide_+"_17", pers.pers_telefono);
                    if(pers.pers_es_director==null)
                    {
                        pers.pers_es_director=0;
                    }
                    if(pers.pers_discapacidad==null)
                    {
                        pers.pers_discapacidad=0;
                    }
                    //                   if($("personal_"+ide_+"_18").length){
                    setValue_("personal_"+ide_+"_18", pers.pers_es_director);
                    setValue_("personal_"+ide_+"_19", pers.pers_discapacidad);
                    setValue_("personal_"+ide_+"_20", pers.pers_ano_aprendes);
                    setValue_("personal_"+ide_+"_21", pers.pers_ano_suma);
                    setValue_("personal_"+ide_+"_22", pers.pers_ano_pip);
                    setValue_("personal_"+ide_+"_23", pers.pers_ano_cepco);
                    //                   }
                    pers =null;
                } 
            
                var observacion=data_.observacion;
                for(var i in observacion)
                {
                    agregar_observacion( observacion[i].obs_descripcion);
                }
           
            
            }
            else
            {
                msg_alert_a("No se encontro escuela con Cod. Modular: <strong>"+id_+ "</strong>",120);
         
            }
        
        }
    }); 
    
});
