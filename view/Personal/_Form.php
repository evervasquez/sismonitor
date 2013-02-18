<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<script type="text/javascript" >
    $(function()
    {
     $( "#form_Personal" ).submit(function(){
        bval = true;
        bval = bval && $( "#inst_nombre" ).required();
        bval = bval && $( "#pers_nombres" ).required();
        bval = bval && $( "#pers_apellido_p" ).required();
        bval = bval && $( "#pers_dni" ).required();
        if ( bval ) {
            return true;
        }
        return false;
    });
        $(".btn_other").button();
               $.ajax({
        type: "GET",
        url: "index.php",
        dataType:"json",
        data: {
            controller:'Instrumento',
            action:'get_insituciones'
        },
        beforeSend:function (data){
        
        },
        success: function(data_){
           

		$( "#inst_nombre" ).autocomplete({
			minLength: 0,
			source: data_,
			focus: function( event, ui ) {
				$( "#inst_nombre" ).val( ui.item.label );
				return false;
			},
			select: function( event, ui ) {
				$( "#inst_nombre" ).val( ui.item.label );
				$( "#inst_id" ).val( ui.item.value );
				
				return false;
			}
		})
		.data( "autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li></li>" )
				.data( "item.autocomplete", item )
				.append( "<a>" + item.label + "<br>" + item.desc + "</a>" )
				.appendTo( ul );
		};
        }
    });
    
	$("#pers_fecha_nac").datepicker(
    {
        
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        yearRange: "-80:+0"
        /*minDate: '-65Y',
        maxDate: '-15Y'*/
    });
    
     $("#lugar").click(function()
      {
                    var id_= $(this).attr("id");
                    $("#select_departamento").dialog("open");
                    $("#dist_id").attr("value",id_ );
      });
      
      
      
      $("#select_departamento").dialog({
        autoOpen:false,
        width:300,
        height:170,
        resizable:false,
        buttons: [
                    { text:"Cancelar",click: function() { $(this).dialog("close"); } },
                    { text:"Seleccionar",click: function() {
                            
                            
                            var id_= $("#dist_id_ option:selected").val();
                            var idd= $("#dist_id_select").val();
                            var part= idd.split('_');
                            $("#dist_id").attr("value",id_);
                            var name_1=$("#dep_id_ option:selected").text();
                            var name_2= $("#prov_id_ option:selected").text();
                            var name_3= $("#dist_id_ option:selected").text();
                            $("#lugar").attr("value",name_1+'-'+name_2+'-'+name_3);
                            $(this).dialog("close"); 
                        } }
                ]
    });
      
     $("#dep_id_").bind('blur click',function(){
       var dep_id = $(this).val();
       cmbLoadAjax("index.php","#prov_id_",{controller:'Instrumento',action:'getListaProvincias',id:dep_id});
       set_cookie("dep",dep_id);
     });
    $("#prov_id_").bind('blur click',function(){
       var pov_id = $(this).val();
        cmbLoadAjax("index.php","#dist_id_",{controller:'Instrumento',action:'getListaDistritos',id:pov_id});
        
        if(pov_id!=null){
        set_cookie("prov",pov_id);
        }
    });
     
    $("#dist_id_").bind('blur click',function(){
       var dist_id = $(this).val();
       if(!isNaN(dist_id)){
        set_cookie("dist",dist_id);
       }
    });
    
    $("#pers_fecha_nac").mask("99/99/9999");
        
    });
    
    
    
</script>

<div class="div_container">
<h4 class="ui-widget-header" >Registro de Docente</h4>
<div id="select_departamento" style="display:none;font-size:12px !important;">
<input type="hidden" id="dist_id_select" />
<table>
	<tr>
		<td>Departamentos:</td>
		<td><select id="dep_id_" style="width:130px; margin:2px;padding:1px;margin-left:5px;"> <?php echo $regiones; ?> </select></td>
	</tr>
	<tr>
		<td>Provincia</td>
		<td><select id="prov_id_" style="width:130px; margin:2px;padding:1px;margin-left:5px;">  </select></td>
	</tr>
	<tr>
		<td>Distrito</td>
		<td><select id="dist_id_"  style="width:130px; margin:2px;padding:1px;margin-left:5px;">  </select></td>
	</tr>
</table>
</div>
<form id="form_Personal" action="index.php" method="POST">
    <input type="hidden" name="controller" value="Personal" />
    <input type="hidden" name="action" value="save" />
    <table border="0" style="margin:10px auto;font-size:12px !important;" >
        <tbody>
            <tr>
                <td width="163" >CODIGO:</td>
                <td width="266"><input id="pers_id" name="pers_id"style="width:70px;"class="input_text_" value="<?php echo $personal[0]['pers_id']; ?>" maxlength="0" /></td>
            </tr>  
            <tr>
                <td>Institución</td>
                <td><input id="inst_nombre" style="width:250px;"class="input_text_" value="<?php echo $institucion[0][0]; ?>" />
           	  <input  type="hidden" id="inst_id" name="inst_id" value="<?php echo $personal[0]['inst_id'];  ?>" /></td>
            </tr>
                  
			<tr>
                <td >Nombres</td>
                <td><input  type="text" id="pers_nombres"  name="pers_nombres" class="input_text_" style="width:250px;" value="<?php echo $personal[0]['pers_nombres'];  ?>" /></td>
            </tr>
			<tr>
                <td  >Apellido paterno</td>
                <td><input  type="text" name="pers_apellido_p"  id="pers_apellido_p" class="input_text_" style="width:250px;" value="<?php echo $personal[0]['pers_apellido_p'];  ?>" /></td>
            </tr>
            <tr>    
                <td  >Apellido materno</td>
                <td><input  type="text" name="pers_apellido_m" id="pers_apellido_m" class="input_text_" style="width:250px;" value="<?php echo $personal[0]['pers_apellido_m'];  ?>" /></td>
            </tr>
            <tr>
              <td>Sexo</td>
              <td>
              <select id="pers_sexo" name="pers_sexo" style="margin-left:3px">
               <?php echo $sexo; ?>
              </select>
              </td>
            </tr>
             <tr>
              <td>DNI</td>
              <td><input type="text" id="pers_dni"  name="pers_dni"class="input_text_" style="width:120px;" maxlength="12" value="<?php echo $personal[0]['pers_dni'];  ?>"    /></td>
            </tr>
            <tr>
              <td>Fecha de nacimiento</td>
              <td><input type="text" id="pers_fecha_nac"  name="pers_fecha_nac" class="input_text_" style="width:120px;" value="<?php echo $personal[0]['pers_fecha_nac'];  ?>"   /></td>
            </tr>
            <tr>
              <td>Lugar nacimiento Reg./Prov./Dist.</td>
              <td><input type="text" style="width:90%" id="lugar" class="input_text_" value="<?php echo $lugar['departamento']."-".$lugar['provincia']."-".$lugar['distrito'] ?>"/><input type="hidden" id="dist_id" name="dist_id" value="<?php echo $personal[0]['pers_lugar_nac'];  ?>"  />   </td>
            </tr>
            <tr>
              <td>Dirección domiciliaria</td>
              <td><input type="text" style="width:90%" id="pers_domicilio" name="pers_domicilio"  class="input_text_" value="<?php echo $personal[0]['pers_domicilio'];  ?>"  /></td>
            </tr>
            <tr>
              <td>Vive en la comunidad de la escuela</td>
              <td>
              <select name="pers_comunidad_escuela" id="pers_comunidad_escuela" style="margin-left:3px;width:170px;padding:2px" value="<?php echo $personal[0]['pers_comunidad_escuela'];  ?>"  > 
               <option value="1">SI </option>
               <option value="0">NO</option>
              </select>
              </td>
            </tr>
            <tr>
              <td>Correo electrónico</td>
              <td><input type="text" style="width:90%" id="pers_correo" name="pers_correo"  class="input_text_"  value="<?php echo $personal[0]['pers_correo'];  ?>" /></td>
            </tr>
            <tr>
              <td>Teléfono</td>
              <td><input type="text" style="width:90%" id="pers_telefono" name="pers_telefono"  class="input_text_"  value="<?php echo $personal[0]['pers_telefono'];  ?>" /></td>
            </tr>
             
            
              <tr>
              <td>Estado Civil</td>
              <td>
              <select name="pers_estado_civil" id="pers_estado_civil" style="margin-left:3px;width:170px;padding:2px" >  
              <?php echo $estado_civil; ?>
              </select>
              </td>
            </tr>
            <tr>
              <td>Codición laboral</td>
              <td>
              <select name="pers_condicion_lab"  id="pers_condicion_lab" style="margin-left:3px;width:170px;padding:2px">
              
              <?php echo $condicion_laboral; ?>
              </select>
              
              </td>
            </tr>
            <tr>
              <td>Es director</td>
              <td>
              <select id="pers_es_director" name="pers_es_director" style="margin-left:3px">
               <?php echo $pers_es_director; ?>
              </select>
              </td>
            </tr>
            
            <tr>
                <td>Año de ingreso a proyecto</td>
                <td><input  type="text"  name="pers_ano_ingreso_proyecto" id="pers_ano_ingreso_proyecto"  class="input_text_" value="<?php echo $personal[0]['pers_ano_ingreso_proyecto'];  ?>"  /></td>
            </tr>
            
            
            
            <tr>
                <td>Grados que enseña</td>
                <td><input  type="text"  name="pers_grado_ensena" id="pers_grado_ensena" class="input_text_" value="<?php echo $personal[0]['pers_grado_ensena'];  ?>" /></td>
            </tr>
            <tr>
              <td colspan="2"> Tiempo de Experiencia Años-meses </td>
              
            </tr>
            <tr>
              <td>Como Director</td>
              <td><input  type="text" name="pers_experiencia_director" id="pers_experiencia_director" class="input_text_" value="<?php echo $personal[0]['pers_experiencia_director'];  ?>"  /></td>
            </tr>
            <tr>
              <td>Como Docente</td>
              <td><input  type="text"  name="pers_experiencia_docente" id="pers_experiencia_docente" class="input_text_" value="<?php echo $personal[0]['pers_experiencia_docente'];  ?>" /></td>
            </tr>
            
            <tr>
              <td>En esta escuela</td>
              <td><input  type="text"  name="pers_experiencia_escuela" id="pers_experiencia_escuela" class="input_text_" value="<?php echo $personal[0]['pers_experiencia_escuela'];  ?>" /></td>
            </tr>
            <tr>
              <td>En el proyecto AprenDes/SUMA</td>
              <td><input  type="text"  name="pers_experiencia_proyecto" id="pers_experiencia_proyecto" class="input_text_" value="<?php echo $personal[0]['pers_experiencia_proyecto'];  ?>" /></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>
              <input type="submit" value="Guardar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover" />
              <a href="index.php?controller=Personal" class="btn_other"> Cancelar </a></td>
            </tr>
            
            
            
        </tbody>
    </table>
</form>
</div>