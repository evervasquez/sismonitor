<script type="text/javascript" src="js/app/evt_instrumento_1.js"></script>
<script type="text/javascript">
    $(function(){
        $(".btn_other").button();
        $( "#enca_id" ).focus();
        //-->ocultamos los botones
        $("#btn_codigo_modular").css("display", "none");
        $("#btn_num_escuela").css("display", "none");
        $("#btn_nombre_escuela").css("display", "none");
        //<--

        //codigo_modular
        var obj= new efectos();
        obj.aparecer("#codigo_modular","#btn_codigo_modular");
        obj.desaparecer("#btn_codigo_modular","#btn_codigo_modular");
        //obj.aparecer("#btn_codigo_modular","#btn_codigo_modular");
        //obj.desaparecer("#codigo_modular", "#btn_codigo_modular")
        
        //numero escuela
        obj.desaparecer("#btn_num_escuela", "#btn_num_escuela");
        obj.aparecer("#num_escuela", "#btn_num_escuela");
        
        //nombre de la escuela
        obj.desaparecer("#btn_nombre_escuela","#btn_nombre_escuela");
        obj.aparecer("#nombre_escuela","#btn_nombre_escuela");
        
        var validator = $("#validado").kendoValidator().data("kendoValidator"),status = $(".status");
        
        $("#todo").click(function() {
            if (validator.validate()) {
                //status.text("Hooray! Your tickets has been booked!").addClass("valid");
                var isChecked; 
                var c1=0;
                var c2=0;
                for (var i=1 ; i<=12;i++) {
                    var isChecked =$("input[name=T5_"+i+"]:checked");
                    $("#error_"+i).remove();
                    if (isChecked.val()) {
                        var d1= $("input[name=T5_"+i+"]").closest('.tabla1').attr('id');
                        var c = d1.split('_');
                        if(c==1){
                            c1=c1+1;
                        }else{
                            c2=c2+1;
                        }
                    }
                    else {
                        var d2= $("input[name=T5_"+i+"]").closest('.tabla1').attr('id');
                        var d3 = d2.split('_');
                        //alert(d3[1]);
                        if(!$("#error_"+d3[1]).length){
                            var a_=$("<tr class='ui-state-error set' id='error_"+d3[1]+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
                            $("#ins1_"+d3[1]+"").append(a_);
                                
                        }         
                    }
                }
                if(c2==12){ 
                
                    var bval = true;
                    var num;
                    switch ($("#tipo_escuela").val()) { 
                        case 'M2': num =2; break; 
                        case 'M3': num =3; break; 
                        case 'M4': num =4; break; 
                        case 'M5': num =5; break; 
                        case 'P': num =6; break; 
                        case 'U': num =1; break; 
                    }
                    var contador=0;
                    for(var i=1; i<=num+1;i++){
                        if ($("#personal_"+i+"_0").length){
                            //Ejecutar si existe el elemento
                            contador = contador +1;    }   
                    }
                                 
                    if(contador>=num){                     
                        for(var i=1; i<=num+1;i++){
                            bval = bval && $("#personal_"+i+"_0").required();
                            bval = bval && $("#personal_"+i+"_10").required();
                            bval = bval && $("#personal_"+i+"_11").required();
                        }
                        if(bval){
                            $("#frm_instrumento_send").submit();
                        }else{
                            msg_alert_a("<span style='color:red;'>Error!!, Porfavor Complete los campos sugeridos.</span>");
                            //return;
                        }
                    }else{                   
                        msg_alert_a("<span style='color:red;'>Debe Ingresar como minimo "+num+" docentes al personal</span>");     
                    }    
                
                }
                else{
                    msg_alert_a("<span style='color:red;'>Error!!, Porfavor Complete los campos sugeridos.</span>");
                    
                }
            }else {    
                var isChecked;
                var v1=0,v2=0;
                for (var i=1 ; i<=12;i++) {
                    var isChecked =$("input[name=T5_"+i+"]:checked");
                    $("#error_"+i).remove();
                    if (isChecked.val()) {
                        var d1= $("input[name=T5_"+i+"]").closest('.tabla1').attr('id');
                        var c = d1.split('_');
                        //$("#error_"+c[1]).remove();
                        if(c==1){
                            v1=v1+1;
                        }else{
                            v2=v2+1;  
                        }
                    }
                    else {
                        var d2= $("input[name=T5_"+i+"]").closest('.tabla1').attr('id');
                        var d3 = d2.split('_');
                        //alert(d3[1]);
                        if(!$("#error_"+d3[1]).length){
                            var a_=$("<tr class='ui-state-error set' id='error_"+d3[1]+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
                            $("#ins1_"+d3[1]+"").append(a_);  
                        }
                    }
                }
                //                        
                                
                var bval = true;
                var num;
                switch ($("#tipo_escuela").val()) { 
                    case 'M2': num =2; break; 
                    case 'M3': num =3; break; 
                    case 'M4': num =4; break; 
                    case 'M5': num =5; break; 
                    case 'P': num =6; break; 
                    case 'U': num =1; break; 
                }
                            
                for(var i=1; i<=num+1;i++){
                    bval = bval && $("#personal_"+i+"_0").required();        
                    bval = bval && $("#personal_"+i+"_10").required();
                    bval = bvaal && $("#personal_"+i+"_11").required();
                }
                if(bval){
                    msg_alert_a("<span style='color:red;'>Error !!, Porfavor Complete los campos sugeridos.</span>");
                }
                            
            }
        });
    });

    function cierre(){
        $("#fondooscuro").fadeOut(500);
        $("#codigo_modular").focus();
    }
    
</script>
<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<?php
if ($edicion == true) {
    echo '<script type="text/javascript" src="js/app/evt_instrumento_set_1.js"></script>';
}
?>

<style>

    #frmtotal{
        padding:20px;
        color: black;
        position: fixed;
        left: 24.5%;
        top: 25%;
        z-index: 1000;
        text-align: center;
        background-color: white;
        border: 1px solid black;
        width: 700px;
    }
    .anulado{
        border: solid 1px red;
        background-color: red;
        /*padding-left: 20px;*/
        width: 150px;
        height: 70px;
        padding-bottom: 13px;
        border-radius: 10px;
        padding-right: 10px;
    }
    input[type="radio"] {
        visibility: hidden;
        width: 0px;
        height: 0px;
        padding: 0px;
        margin: 0px;
    }
    label.enunciado {
        padding: 0;
    }
    .chk_estado{
        color: #000;
        font-size: 13px;
        font-weight:bold;
        background: red;

    }
    input[type="radio"] + label{
        background: url("images/fuglychecks.png") 0 0 no-repeat;
    }
    input[type="radio"]:focus + label{
        background-position: 0 -16px;
    }
    input[type="radio"]:checked + label{
        background-position: 0 -32px;
    }
    input[type="radio"]:checked:focus + label{
        background-position: 0 -48px;
    }


    input[type="checkbox"] {
        visibility: hidden;
        width: 0px;
        height: 0px;
        padding: 0px;
        margin: 0px;
    }
    label {
        padding-left: 20px;
        height: 16px;
    }

    input[type="checkbox"] + label{
        background: url("images/fuglychecks.png") 0 0 no-repeat;
    }
    input[type="checkbox"]:focus + label{
        background-position: 0 -16px;
    }
    input[type="checkbox"]:checked + label{
        background-position: 0 -32px;
    }
    input[type="checkbox"]:checked:focus + label{
        background-position: 0 -48px;
    }
    td{
        padding: 0;
    }
    span.k-invalid-msg{
        margin-left: 5px;
    }
    .invalid{
        color: red;
    }
</style>
<div class="div_container"  style="min-height:850px; " >
    <div id="ins_name">INSTRUMENTO N°<?php echo $n_ . ": " . $instrumento; ?></div>

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
    <div class="contain_"  style="min-height:800px; ">
        <div style=" margin:0 auto 0 auto; width: 100%; margin-bottom: 10px;margin-top: 30px;min-height:800px; ">

            <div style="min-height:800px; ">
                <form id="frm_instrumento_send" >

                    <div id="cabecera_all">
                        <div id="contenido_1" style="font-size:12px; width: 96%; margin-left:2%; float: left;" >

                            <div id="tabs">
                                <ul>
                                    <li><a href="#tabs-1">I. DATOS GENERALES: </a></li>
                                    <li><a href="#tabs-2">II. UBICACIÓN: </a></li>
                                    <li><a href="#tabs-3">III. TIPOLOGÍA:</a></li>
                                    <li><a href="#tabs-4">IV. POBLACIÓN ESTUDIANTIL ACTUALMANTE ATENDIDA:</a></li>
                                    <li><a href="#tabs-5">V. PARTICIPACIÓN COMUNITARIA:</a></li>
                                    <li><a href="#tabs-6">VI. AMBIENTE FÍSICO:</a></li>
                                    <!--        <li><a href="#tabs-7">VII. PROYECTOS, MÓDULOS Y GUIAS DE APRENDIZAJE: </a></li>-->
                                    <li><a href="#tabs-8">VIII. DATOS INFORMATIVOS DEL PERSONAL: </a></li>
                                    <li><a href="#tabs-9">IX. OBSERVACIONES: </a></li>
                                </ul>
                                <div id="validado">
                                    <div id="tabs-1">

                                        <table id="prueba" style="font-size:12px; width:100%; text-align: left;">
                                            <tr><td colspan="5"><input type="hidden"  name="action" value="<?php echo $action; ?>" /></td></tr>
                                            <tr>
                                                <td style="width: 18%"><label class="enunciado" for="enca_id">N° Encabezado</label></td>
                                                <td colspan="2" style="width: 48%"> 
                                                    <input type="text" id="enca_id" name="enca_id" required class="input_text" value="<?php echo $enca_id; ?>"/>
                                                </td>

                                                <td style="width: 13%" class='chk_dir' ><div id="anulado"><input type='checkbox' name="inst_estado" id="inst_estado" value="1" />
                                                        <label style=" font-size: 14"id="check_estado" for="inst_estado">ANULADO</label></div>
                                                </td>
                                                <td style="width: 21%"><span class="k-invalid-msg" data-for="enca_id"></span></td>
                                            </tr>
                                            <tr style="height: 10px; padding: 0">
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr style="height: 40px; padding: 0">                                            
                                                <td><label class="enunciado"  for="nombre_apellido_facilitador">1.1 Nombre de facilitador:</label></td>
                                                <td>
                                                    <input  style="width:280px" required class="input_text" id="nombre_apellido_facilitador" name="nombre_apellido_facilitador" value="<?php echo $facilitador['nombre']; ?>"  />
                                                    <input type="hidden"  id="faci_id" name="faci_id" value="<?php echo $facilitador['id_']; ?>"/>
                                                </td>
                                                <td style="width: 120px">
                                                    <span class="k-invalid-msg" data-for="nombre_apellido_facilitador"></span>
                                                </td>
                                                <td><label class="enunciado" for="enca_fecha">1.2 Fecha:</label></td>
                                                <td><input type="text" style="width:100px; " required class="input_text"  name="enca_fecha" id="enca_fecha" maxlength="8"/>

                                            </tr>

                                            <tr>
                                                <td ><label class="enunciado" for="grup_intervencion">1.3 Grupo de Intervención:</label></td>
                                                <td colspan="3" >
                                                    <select name="grup_intervencion" id="grup_intervencion"  style="width:110px; margin:2px;padding:1px;margin-left:5px;" required >
                                                        <option value="">Seleccione...</option>
                                                        <option value="52">52 San Martin</option>
                                                        <option value="57">57 Ucayali</option>
                                                        <option value="73">73 Ucayali</option>
                                                    </select>
                                                    <span class="k-invalid-msg" data-for="grup_intervencion"></span></td>
                                                <td><span class="k-invalid-msg" data-for="enca_fecha"></span></td>    
                                            </tr>
                                            <tr style="height: 10px; padding: 0">
                                                <td colspan="5"></td>
                                            </tr>
                                            <tr>
                                                <td><label class="enunciado" for="num_escuela">1.4 Número y nombre de la I.E:</label></td>
                                                <td colspan="2" ><input type="text" style="width:100px" required class="input_text" id="num_escuela" name="num_escuela" onkeypress="return soloNumeros(event)"/>                                               
                                                <!--<span><a href="javascript:instrumento_search_escuela()" class="btn_other" id="btn_num_escuela">Buscar</a></span>-->

                                                    <input type="text" style="text-transform: uppercase;" required class="input_text" id="nombre_escuela" name="nombre_escuela">
                                                    <a href="javascript:inicio_popup()" class="btn_other" id="btn_nombre_escuela" >Buscar</a>

                                                </td>                                                
                                                <td><label class="enunciado" for="codigo_modular">1.5 Código Modular de la I.E:</label></td>
                                                <td><input type="text" style="width: 80px" required class="input_text" maxlength="7" id="codigo_modular" name="codigo_modular" value="<?php echo $cod_modular; ?>"/>
                                                    <a href="javascript:instrumento_search()" class="btn_other" id="btn_codigo_modular">Buscar</a>

                                                </td>
                                            </tr> 
                                            <tr style="height: 21px; padding: 0">
                                                <td></td>
                                                <td colspan="2" ><span class="k-invalid-msg" data-for="num_escuela"></span>
                                                    <span class="k-invalid-msg" data-for="nombre_escuela"></span></td>
                                                <td></td>
                                                <td><span class="k-invalid-msg" data-for="codigo_modular"></span></td>
                                            </tr>
                                            <tr>                                            
                                                <td ><label class="enunciado" >1.6 Año de ingreso de la escuela al Proyecto AprenDes/SUMA:</label></td>
                                                <td colspan="4" ><select name="ano_ingreso" id="ano_ingreso"  style="width:110px; margin:2px;padding:1px;margin-left:5px;">
                                                        <option value="">Seleccione...</option>     
                                                        <option value="2004">2004</option>
                                                        <option value="2005">2005</option>
                                                        <option value="2006">2006</option>
                                                        <option value="2007">2007</option>
                                                        <option value="2008">2008</option>
                                                        <option value="2009">2009</option>
                                                        <option value="2010">2010</option>
                                                        <option value="2011">2011</option>
                                                        <option value="2012">2012</option>
                                                    </select></td>
                                            </tr>
                                            <tr style="height: 10px; padding: 0">
                                                <td colspan="5"></td>
                                            </tr>

                                            <!---------------                                            
                                                                                        <tr>
                                                                                     
                                                                                            <td><label>¿La escuela se encuentra bajo la intervención de algun otro Proyecto y programa:</label></td>
                                                                                            <td colspan="3"><input type="radio" id="1-1-si" value="1" name="intervencion_otro" />
                                                                                                <label for="1-1-si">Si</label>
                                                                                                <input type="radio" id="1-1-no" value="2" name="intervencion_otro" />
                                                                                                <label for="1-1-no">No</label>
                                                                                            </td>
                                            
                                                                                        </tr>
                                                                                        <tr>
                                            
                                                                                            <td > Nombre del Proyecto/Programas(s)</td>
                                                                                            <td colspan="3"><input type="text" style="width:340px" class="input_text"  id="nombre_proyecto_otro" name="nombre_proyecto_otro"/>
                                                                                            </td>
                                            
                                                                                        </tr>
                                                                                        <tr>
                                            
                                                                                            <td > Año de Ingreso de la escuela a Proyecto/Programa:</td>
                                                                                            <td colspan="3"><input type="text" style="width:130px" class="input_text" maxlength="4" onKeyPress="return soloNumeros(event)" id="ano_ingreso_otro" name="ano_ingreso_otro"   /></td>
                                            
                                                                                        </tr>
                                                                                      
                                                                                        <tr>
                                                                                      -------->
                                            <td><label class="enunciado" >1.12 Telefono comunitario:</label></td>
                                            <td colspan="4">
                                                <input type="text" style="width:110px" class="input_text"  maxlength="12" id="telefono_comunitario"  name="telefono_comunitario"/>
                                            </td>


                                            </tr>
                                        </table>

                                        <div style="width: 100%;height: 200px;" >
                                            <table  style="float:left;" >
                                                <tr class="matriz_header_" >
                                                    <td colspan="4" > Turnos en los que atiende:</td>
                                                </tr>
                                                <tr>

                                                    <td  style="text-align:right">Mañana:</td>
                                                    <td>De:<span style="text-align:right">
                                                            <input type="text" style="width:70px" class="input_text" id="turno_manana_ini" name="turno_manana_ini"/>
                                                            a
                                                            <input type="text" style="width:70px" class="input_text" id="turno_manana_fin" name="turno_manana_fin"/>
                                                        </span></td>
                                                </tr>
                                                <tr>

                                                    <td  style="text-align:right">Tarde:</td>
                                                    <td>De:
                                                        <input type="text" style="width:70px" class="input_text"  id="turno_tarde_ini" name="turno_tarde_ini"/>
                                                        a
                                                        <input type="text" style="width:70px" class="input_text"  id="turno_tarde_fin" name="turno_tarde_fin"/>
                                                    </td>
                                                </tr>

                                            </table>
                                            <table style="float: left;">
                                                <tr class="matriz_header_">
                                                    <td colspan="2"  >Duración del</td>
                                                </tr>
                                                <tr>
                                                    <td  style="text-align:right">Desayuno:</td>
                                                    <td>De:<span style="text-align:right">
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_desayuno_ini" name="duracion_desayuno_ini"/>
                                                            a
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_desayuno_fin" name="duracion_desayuno_fin"/>
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td  style="text-align:right">Recreo:</td>
                                                    <td>De:<span style="text-align:right">
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_recreo_ini" name="duracion_recreo_ini"/>
                                                            a
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_recreo_fin" name="duracion_recreo_fin"/>
                                                        </span></td>
                                                </tr>
                                                <tr>
                                                    <td  style="text-align:right">Almuerzo:</td>
                                                    <td>De:<span style="text-align:right">
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_almuerzo_ini" name="duracion_almuerzo_ini"/>
                                                            a
                                                            <input type="text" style="width:70px" class="input_text"  id="duracion_almuerzo_fin" name="duracion_almuerzo_fin"/>
                                                        </span></td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="tabs-2">
                                        <table style="width:850px;"  >
                                            <tr style="height: 22px;">
                                                <td width="146"></td>
                                                <td colspan="5"><span class="k-invalid-msg" data-for="dep_id"></span></td>  
                                            </tr>
                                            <tr>
                                                <td width="146" >Departamento:</td>
                                                <td width="147">
                                                    <select name="dep_id" id="dep_id" required style="width:130px; margin:2px;padding:1px;margin-left:5px;">
                                                        <option value="" selected="Selected">Seleccione...</option>
                                                        <?php echo $regiones; ?>
                                                    </select></td>
                                                <td width="109" >Provincia:</td>
                                                <td width="131">
                                                    <select name="prov_id" id="prov_id" style="width:130px; margin:2px;padding:1px;margin-left:5px;">
                                                    </select>
                                                </td>
                                                <td width="146" >Distrito:</td>
                                                <td width="130">
                                                    <select name="dist_id" id="dist_id" style="width:130px; margin:2px;padding:1px;margin-left:5px;"></select>
                                                </td>

                                            </tr>

                                            <tr style="height: 45px;">
                                                <td>Comunidad:</td>
                                                <td colspan="4">
                                                    <input  id="lugar" name="lugar" style="width:170px;text-transform: uppercase;" required class="input_text_" value="<?php echo $lugar['lug_descripcion']; ?>"  /> 
                                                    <input type="hidden" name="lugar_id" id="lugar_id" value="<?php echo $lugar['lug_id'] ?>" />
                                                </td>
                                                <td><span class="k-invalid-msg" data-for="lugar_id"></span></td>
                                            </tr>
                                            <tr>
                                                <td >Datos de ubicación geográfica </td>
                                                <td colspan="3"><input type="text"  id="punto_referencial" name="punto_referencial" style="width:400px;" required class="input_text_" /></td>
                                                <td><span class="k-invalid-msg" data-for="punto_referencial"></span></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td >Accesibilidad: </td>
                                                <td>
                                                    <input type="text" style="width:70px" required class="input_text_"  id="enca_distancia" name="enca_distancia" onKeyPress="return soloNumeros(event)" /> Km.
                                                </td>
                                                <td>Tiempo en minutos:</td>
                                                <td colspan="2"><input type="text" style="width:70px" class="input_text_"  id="tiempo_minutos" name="tiempo_minutos" onKeyPress="return soloNumeros(event)"/></td>

                                                <td><span class="k-invalid-msg" data-for="enca_distancia"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Forma de transporte :</td>
                                                <td colspan="3">
                                                    <select name="form_transporte" id="form_transporte" style="width:110px; margin:2px;padding:1px;margin-left:5px;" required>
                                                        <option value="">Seleccione...</option>
                                                        <option value="0">A pie</option>
                                                        <option value="1">A caballo</option>
                                                        <option value="2">En motocar</option>
                                                        <option value="3">En auto</option>
                                                        <option value="4">En bote</option>
                                                        <option value="5">En moto</option>
                                                    </select>
                                                </td>
                                                <td><span class="k-invalid-msg" data-for="for_transporte"></span></td>
                                                <td></td>
                                            </tr>
                                        </table>
                                    </div>

                                    <div id="tabs-3">
                                        <div style="width:100%;height:30px;vertical-align:middle;font-size:12px;font-weight:bold;">
                                            <p>Distribución de las aulas (Marque con un aspa los grados que se encuentran en cada aula)</p>
                                        </div>
                                        <table  style="width:650px;" ce cellspacing="0" border="1">

                                            <tr class="matriz_header_" >
                                                <td width="150">AMBIENTE FÍSICO</td>
                                                <td width="73">1er Grado</td>
                                                <td width="73">2do Grado</td>
                                                <td width="81">3er Grado</td>
                                                <td width="81">4to Grado</td>
                                                <td width="88">5to Grado</td>
                                                <td width="88">6to Grado</td>
                                            </tr>

                                            <?php
                                            $n_aulas = 10;
                                            $rw_ = '';
                                            for ($i = 1; $i <= $n_aulas; $i++) {

                                                $rw_.='<tr>';
                                                $rw_.='<td>Aula ' . $i . '</td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_1" value="1" name="T2_' . $i . '_1"  /><label for="aula_' . $i . '_1"></label></td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_2" value="2" name="T2_' . $i . '_2"  /><label for="aula_' . $i . '_2"></label></td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_3" value="3" name="T2_' . $i . '_3" /><label for="aula_' . $i . '_3"></label></td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_4" value="4" name="T2_' . $i . '_4"  /><label for="aula_' . $i . '_4"></label></td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_5" value="5" name="T2_' . $i . '_5"  /><label for="aula_' . $i . '_5"></label></td>';
                                                $rw_.='<td><input type="checkbox" id="aula_' . $i . '_6" value="6" name="T2_' . $i . '_6"  /><label for="aula_' . $i . '_6"></label></td>';
                                                $rw_.='</tr>';
                                            }
                                            echo $rw_;
                                            ?>
                                        </table>
                                        <input type="hidden"  id="numaulas"  name="numaulas" value="10" />
                                        <table id="miTabla" style="margin-top:20px;"> 
                                            <tr>
                                                <td> Tipo de Escuela</td>
                                                <td>
                                                    <select name="tipo_escuela" id="tipo_escuela" required >
                                                        <option value="">Seleccione...</option>
                                                        <?php echo $tipo_escuela; ?>
                                                    </select>
                                                </td>
                                                <td><span class="k-invalid-msg" data-for="tipo_escuela"></span></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div id="tabs-4">
                                        <table width="384" style="margin-top:20px;" cellspacing="0" border="0"> 
                                            <tr class="matriz_header_">
                                                <td width="76">Grado</td>
                                                <td width="70">Hombres</td>
                                                <td width="75">Hombres_d</td>
                                                <td width="105">Total Hombres</td>
                                                <td width="106">Mujeres</td>
                                                <td width="106">Mujeres_d</td>
                                                <td width="105">Total Mujeres</td>
                                                <td width="77">TOTAL</td>
                                            </tr>
                                            <?php
                                            $rw = "";
                                            $list = "";
                                            for ($i_1 = 1; $i_1 <= 6; $i_1++) {
                                                $list.='<tr>
	              		<td>' . $i_1 . '°</td>
	              		<td><input type="text" style="width:90px" class="input_text_1 " id="poblacion_' . $i_1 . '_1" name="T1_' . $i_1 . '_1" onKeyPress="return soloNumeros(event)"/></td>
	              		<td><input type="text" style="width:90px" class="input_text_2 " id="poblacion_' . $i_1 . '_2" name="T1_' . $i_1 . '_2" onKeyPress="return soloNumeros(event)"/></td>
	              		<td><input type="text" readonly="readonly" style="width:90px" class="input_text_3 " id="poblacion_' . $i_1 . '_3" name="T1_' . $i_1 . '_3" onKeyPress="return soloNumeros(event)"/></td>
                                <td><input type="text" style="width:90px" class="input_text_4 " id="poblacion_' . $i_1 . '_4" name="T1_' . $i_1 . '_4" onKeyPress="return soloNumeros(event)"/></td>
                                <td><input type="text" style="width:90px" class="input_text_5 " id="poblacion_' . $i_1 . '_5" name="T1_' . $i_1 . '_5" onKeyPress="return soloNumeros(event)"/></td>
                                <td><input type="text" readonly="readonly" style="width:90px" class="input_text_6 " id="poblacion_' . $i_1 . '_6" name="T1_' . $i_1 . '_6" onKeyPress="return soloNumeros(event)"/></td>
                                <td><input type="text" readonly="readonly" style="width:90px" class="input_text_7 " id="poblacion_' . $i_1 . '_7" name="T1_' . $i_1 . '_7" onKeyPress="return soloNumeros(event)"/></td>
	              	</tr>';
                                            }
                                            echo $list;
                                            ?>

                                            <tr>
                                                <td>TOTAL</td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_1" /></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_2"/></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_3"/></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_4"/></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_5"/></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_6"/></td>
                                                <td><input type="text" style="width:90px" class="input_text_" id="poblacion_t_7"/></td>
                                            </tr>

                                        </table>
                                    </div>
                                    <div id="tabs-5">
                                        <!-- SE MODIFICO 05/03/2013 -->
                                        <div style="width:100%;height:30px;font-weight:bold">
                                            <p>5.1 Número de asociados y asociadas(padres/madres de familia):</p></div>
                                        <table width="384" style="margin-top:20px" cellspacing="0" border="0"> 
                                            <tr class="matriz_header_">
                                                <td></td>
                                                <td width="76">CD</td>
                                                <td width="70">SD</td>             
                                                <td width="77">TOTAL</td>
                                            </tr>                
                                            <tr>
                                                <td>Padres de Familia</td>
                                                <td><input type="text" style="width:90px" class="input_t_1 " id="numero_padres_d" name="numero_padres_d" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" style="width:90px" class="input_t_1 " id="numero_padres" name="numero_padres" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" readonly="readonly" style="width:90px" class="input_t_1 " id="total_padres" name="total_padres" onKeyPress="return soloNumeros(event)"/></td>
                                            </tr>;

                                            <tr>
                                                <td>Madres de Familia</td>
                                                <td><input type="text" style="width:90px" class="input_t_1 " id="numero_madres_d" name="numero_madres_d" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" style="width:90px" class="input_t_1 " id="numero_madres" name="numero_madres" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" readonly="readonly" style="width:90px" class="input_t_1 " id="total_madres" name="total_madres" onKeyPress="return soloNumeros(event)"/></td>
                                            </tr>;

                                            <tr>
                                                <td>SUB TOTAL</td>
                                                <td><input type="text" readonly="readonly" style="width:90px" class="input_t_1 " id="total_CD" name="total_CD" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" readonly="readonly" style="width:90px" class="input_t_1 " id="total_SD" name="total_SD" onKeyPress="return soloNumeros(event)"/></td>
                                                <td><input type="text" readonly="readonly" style="width:90px" required class="input_t_1 " id="numero_padres_t" name="numero_padres_t" onKeyPress="return soloNumeros(event)"/></td>
                                            </tr>                                             
                                        </table>
                                        <span class="k-invalid-msg" data-for="numero_padres_t"></span>
                                        <!--   <div style="width:100%;height:30px;font-weight:bold">
                                               <p>5.1 Número de asociados (padres/madres de 
                                                   <input type="text" readonly="readonly" name="numero_padres_t" disable id="numero_padres_t" class="input_text" /> familia):</p>
                                           </div>
                                           <div style="width:100%;height:30px;font-weight:bold">
                                               <label>a.-Número de Padres</label> 
                                               <input type="text" name="numero_padres" id="numero_padres" required class="input_text" onkeypress="return soloNumeros(event)"/>
                                               <span class="k-invalid-msg" data-for="numero_padres"></span>
                                           </div>
                                           <div style="width:100%;height:30px;font-weight:bold">
                                               <label>b.-Número de Padres Discapacitados</label>
                                               <input type="text" name="numero_padres_d" id="numero_padres_d" required class="input_text" onkeypress="return soloNumeros(event)"/>
                                               <span class="k-invalid-msg" data-for="numero_padres_d"></span>
                                           </div>
                                           <div style="width:100%;height:30px;font-weight:bold">
                                               <label>c.-Número de Madres</label>
                                               <input type="text" name="numero_madres" id="numero_madres" required class="input_text" onkeypress="return soloNumeros(event)"/>
                                               <span class="k-invalid-msg" data-for="numero_madres"></span>
                                           </div>
                                           <div style="width:100%;height:30px;font-weight:bold">
                                               <label>d.-Número de Madres discapacitadas</label>
                                               <input type="text" name="numero_madres_d" id="numero_madres_d" required class="input_text" onkeypress="return soloNumeros(event)"/>
                                               <span class="k-invalid-msg" data-for="numero_madres_d"></span>
                                           </div>
                                        -->
                                        <div style="width:100%;height:40px;font-weight:bold;">
                                            <br/>
                                            <p>5.2 Miembros de Municipio Escolar:</p>
                                        </div>
                                        <table cellspacing="0" style="width:900px;" border="0">
                                            <tr class="matriz_header_">
                                                <td width="202">CARGO</td>
                                                <td width="350">APELLIDOS, NOMBRES </td>
                                                <td width="118">SEXO</td>
                                                <td width="50">EDAD</td>
                                                <td width="70">GRADO</td>
                                                <td width="70">DISCAPACIDAD</td>
                                            </tr>
                                            <?php
                                            $tabla = "T3";
                                            for ($i_1 = 0; $i_1 < count($cargos_1); $i_1++) {
                                                echo '<tr>
                        <td>' . ($i_1 + 1) . '. ' . $cargos_1[$i_1]['descripcion'] . '<input type="hidden" value="' . $cargos_1[$i_1]['cargoid'] . '" name="' . $tabla . '_' . ($i_1 + 1) . '_0" /></td>
                        <td><input type="text"  id="miembros_escolar_' . ($i_1 + 1) . '_1" name="' . $tabla . '_' . ($i_1 + 1) . '_1" style="width:350px;" class="input_text_" /></td>
                        <td>
                        <input type="radio" id="miembros_escolar_' . ($i_1 + 1) . '_2_1" name="' . $tabla . '_' . ($i_1 + 1) . '_2" value="M"/><label for="miembros_escolar_' . ($i_1 + 1) . '_2_1">M</label>
                        <input type="radio" id="miembros_escolar_' . ($i_1 + 1) . '_2_2" name="' . $tabla . '_' . ($i_1 + 1) . '_2" value="F"/><label for="miembros_escolar_' . ($i_1 + 1) . '_2_2">F</label>
                        </td>
                        <td><input type="text" id="' . $tabla . '_' . ($i_1 + 1) . '_3" name="' . $tabla . '_' . ($i_1 + 1) . '_3" class="input_text_" style="width:50px" /></td>
                        <td><input type="text" id="' . $tabla . '_' . ($i_1 + 1) . '_4" name="' . $tabla . '_' . ($i_1 + 1) . '_4" class="input_text_" style="width:70px"/></td>
                            <td>
                        <input type="radio" id="miembros_escolar_' . ($i_1 + 1) . '_5_1" name="' . $tabla . '_' . ($i_1 + 1) . '_5" value="1"/><label for="miembros_escolar_' . ($i_1 + 1) . '_5_1">SI</label>
                        <input type="radio" id="miembros_escolar_' . ($i_1 + 1) . '_5_2" name="' . $tabla . '_' . ($i_1 + 1) . '_5" value="0"/><label for="miembros_escolar_' . ($i_1 + 1) . '_5_2">NO</label>
                        </td>
                      </tr>';
                                            }
                                            //0 = sin discapacidad
                                            //1 = con discapacidad
                                            ?>





                                        </table>
                                        <div style="width:100%;height:40px;font-weight:bold">
                                            <br/>
                                            <p>5.3 Miembros del CONEI:</p>
                                        </div>
                                        <table width="900" cellspacing="0" border="0">
                                            <tr class="matriz_header_">
                                                <td width="208">CARGO</td>
                                                <td width="350"> APELLIDOS, NOMBRES</td>
                                                <td width="132">SEXO</td>
                                                <td width="102">DNI</td>
                                                <td width="70">DISCAPACIDAD</td>
                                            </tr>


                                            <?php
                                            $tabla = "T4";
                                            for ($i_1 = 0; $i_1 < count($cargos_2); $i_1++) {

                                                echo '<tr><td>' . ($i_1 + 1) . '. ' . $cargos_2[$i_1]['descripcion'] . '<input type="hidden" value="' . $cargos_2[$i_1]['cargoid'] . '" name="' . $tabla . '_' . ($i_1 + 1) . '_0" id="' . $tabla . '_' . ($i_1 + 1) . '_0"/></td>
                           <td><input type="text" name="' . $tabla . '_' . ($i_1 + 1) . '_1" id="' . $tabla . '_' . ($i_1 + 1) . '_1" style="width:350px" class="input_text_" /></td>
                           <td><input type="radio" id="miembros_conei_' . ($i_1 + 1) . '_2_1" name="' . $tabla . '_' . ($i_1 + 1) . '_2" value="M"/><label for="miembros_conei_' . ($i_1 + 1) . '_2_1">M</label>
                              <input type="radio" id="miembros_conei_' . ($i_1 + 1) . '_2_2" name="' . $tabla . '_' . ($i_1 + 1) . '_2" value="F"/><label for="miembros_conei_' . ($i_1 + 1) . '_2_2">F</label>
                           </td>
                           <td><input type="text" name="' . $tabla . '_' . ($i_1 + 1) . '_3" id="' . $tabla . '_' . ($i_1 + 1) . '_3" style="width:100px" class="input_text_" maxlength="12" /></td>
                               <td><input type="radio" id="miembros_conei_' . ($i_1 + 1) . '_4_1" name="' . $tabla . '_' . ($i_1 + 1) . '_4" value="1"/><label for="miembros_conei_' . ($i_1 + 1) . '_4_1">SI</label>
                              <input type="radio" id="miembros_conei_' . ($i_1 + 1) . '_4_2" name="' . $tabla . '_' . ($i_1 + 1) . '_4" value="0"/><label for="miembros_conei_' . ($i_1 + 1) . '_4_2">NO</label>
                           </td>
                           </tr>';
                                            }
                                            ?>

                                        </table>
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>5.4 El CONEI de la institución educativa cuenta con:</p>
                                        </div>
                                        <table class="tabla1" rel="1" width="452" cellspacing="0" border="1" id="ins1_1">
                                            <tr  class="matriz_header_">
                                                <td width="307"></td>
                                                <td width="67">SI</td>
                                                <td width="64">NO</td>
                                            </tr>
                                            <tr>
                                                <td>1. Resolución directoral de la IE</td>
                                                <td><input class="radio_1" type="radio" id="conei_cuenta_2_1" name="T5_2" value='1'/><label for="conei_cuenta_2_1">Si</label></td>
                                                <td><input class="radio_1" type="radio" id="conei_cuenta_2_2" name="T5_2" value='0'/><label for="conei_cuenta_2_2">No</label></td>
                                            </tr>

                                            <tr>
                                                <td>2. Reconocimiento de la UGEL</td>
                                                <td><input class="radio_1" type="radio" id="conei_cuenta_1_1" name="T5_1" value='1'/><label for="conei_cuenta_1_1">Si</label></td>
                                                <td><input class="radio_1" type="radio" id="conei_cuenta_1_2" name="T5_1" value='0'/><label for="conei_cuenta_1_2">No</label></td>
                                            </tr>

                                        </table>
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>5.5 La Institución educativa cuenta con:</p>
                                        </div>
                                        <table class="tabla1" rel="2" width="452" cellspacing="0" border="1" id="ins1_2">
                                            <tr  class="matriz_header_">
                                                <td width="301">&nbsp;</td>
                                                <td width="72">SI</td>
                                                <td width="53">NO</td>
                                            </tr>
                                            <tr>
                                                <td>1. PEI</td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_3_1" name="T5_3" value='1'/><label for="conei_cuenta_3_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_3_2" name="T5_3" value='0'/><label for="conei_cuenta_3_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>2. PEI en proceso de elaboración<br>(marcar el avance)</td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_4_1" name="T5_4" value='1'/><label for="conei_cuenta_4_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_4_2" name="T5_4" value='0'/><label for="conei_cuenta_4_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>2.1. Identidad</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_5_1" name="T5_5" value='1'/><label for="conei_cuenta_5_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_5_2" name="T5_5" value='0'/><label for="conei_cuenta_5_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>2.2. Diagnóstico</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_6_1" name="T5_6" value='1'/><label for="conei_cuenta_6_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_6_2" name="T5_6" value='0'/><label for="conei_cuenta_6_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>2.3. Propuesta pedagógica</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_7_1" name="T5_7" value='1'/><label for="conei_cuenta_7_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_7_2" name="T5_7" value='0'/><label for="conei_cuenta_7_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>2.4. Propuesta de gestión</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_8_1" name="T5_8" value='1'/><label for="conei_cuenta_8_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_8_2" name="T5_8" value='0'/><label for="conei_cuenta_8_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>3. PCI</td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_9_1" name="T5_9" value='1'/><label for="conei_cuenta_9_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_9_2" name="T5_9" value='0'/><label for="conei_cuenta_9_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>3.1. Solo cuenta con PCI</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_10_1" name="T5_10" value='1'/><label for="conei_cuenta_10_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_10_2" name="T5_10" value='0'/><label for="conei_cuenta_10_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>4. PAT</td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_11_1" name="T5_11" value='1'/><label for="conei_cuenta_11_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_11_2" name="T5_11" value='0'/><label for="conei_cuenta_11_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td><label>4.1 Solo cuenta con PAT</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_12_1" name="T5_12" value='1'/><label for="conei_cuenta_12_1">Si</label></td>
                                                <td><input class="radio_2" type="radio" id="conei_cuenta_12_2" name="T5_12" value='0'/><label for="conei_cuenta_12_2">No</label></td>
                                            </tr>
                                        </table>

                                        <!-- agregado por ever-->           
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>5.6 Autoridades de la Comunidad</p>
                                        </div>
                                        <table class="tabla1" rel="1" width="630" cellspacing="0" border="0" id="ins1_4">
                                            <tr  class="matriz_header_">
                                                <td style="width: 80px">CARGO</td>
                                                <td colspan="2" >GOBERNADOR</td>
                                                <td colspan="2" >TENIENTE<br>GOBERNADOR</td>
                                                <td colspan="2" >AGENTE<br>MUNICIPAL</td>
                                                <td colspan="2">OTROS(*)</td>
                                                <td>TOTAL</td>
                                            </tr>
                                            <tr class="matriz_header_">
                                                <td>SEXO</td>
                                                <td>CD</td>
                                                <td>SD</td>
                                                <td>CD</td>
                                                <td>SD</td>
                                                <td>CD</td>
                                                <td>SD</td>
                                                <td>CD</td>
                                                <td>SD</td>
                                                <td colspan="2"></td>
                                            </tr>
                                            <tr>
                                                <td>HOMBRES</td>
                                                <td><input type="text" name="autoridades_1_1" id="autoridades_1_1" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_2" id="autoridades_1_2" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_3" id="autoridades_1_3" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_4" id="autoridades_1_4" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_5" id="autoridades_1_5" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_6" id="autoridades_1_6" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_7" id="autoridades_1_7" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_1_8" id="autoridades_1_8" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td colspan="2"><input type="text" readonly="readonly" name="autoridades_h" id="autoridades_h" style="width:80px" class="input_text_" /></td>
                                            </tr>
                                            <tr>
                                                <td>MUJERES</td>
                                               <td><input type="text" name="autoridades_2_1"  id="autoridades_2_1" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_2" id="autoridades_2_2" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_3" id="autoridades_2_3" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_4" id="autoridades_2_4" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_5" id="autoridades_2_5" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_6" id="autoridades_2_6" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_7" id="autoridades_2_7" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td><input type="text" name="autoridades_2_8" id="autoridades_2_8" style="width:40px" class="input_text_" onkeypress="return soloNumeros(event)"/></td>
                                                <td colspan="2"><input type="text" readonly="readonly" name="autoridades_m" id="autoridades_m" style="width:80px" class="input_text_" /></td>
                                            </tr>
                                            <tr>
                                                <td>SUB TOTAL</td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_1" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_2" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_3" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_4" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_5" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_6" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_7" style="width:40px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="autoridades_3_8" style="width:40px" class="input_text_" /></td>
                                                <td colspan="2"><input type="text" readonly="readonly" name="autoridades_total" id="autoridades_total" style="width:80px" class="input_text_" /></td>
                                            </tr>
                                        </table>
                                        <!-- hasta aquí-->                                              
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>5.7 Instituciones Gubernamentales y no Gubernamentales que intervienen en la comunidad</p>
                                        </div>
                                        <table class="tabla1" rel="1" width="600" cellspacing="0" border="0" id="ins1_5">
                                            <tr  class="matriz_header_">
                                                <td style="width: 20px">N°</td>
                                                <td style="width: 240px">NOMBRE</td>
                                                <td style="width: 120px">GUBERNAMENTALES</td>
                                                <td style="width: 120px">NO<br>GUBERNAMENTALES<br>GOBERNADOR</td>
                                            </tr>
                                            <tr>
                                                <th>1</th>
                                                <td><input type="text" name="gubernamentales1_1" id="gubernamentales1_1" style="width:240px" class="input_text_" /></td>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_1" name="gubernamentales_1" value='1'/><label for="gubernamentales_1">Si</label></th>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_1_3" name="gubernamentales_1" value='0'/><label for="gubernamentales_1_3">No</label></th>
                                            </tr>
                                            <tr>
                                                <th>2</th>
                                                <td><input type="text" name="gubernamentales1_2" id="gubernamentales1_2" style="width:240px" class="input_text_" /></td>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_2" name="gubernamentales_2" value='1'/><label for="gubernamentales_2">Si</label></th>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_2_3" name="gubernamentales_2" value='0'/><label for="gubernamentales_2_3">No</label></th>
                                            </tr>
                                            <tr>
                                                <th>3</th>
                                                <td><input type="text" name="gubernamentales1_3" id="gubernamentales1_3" style="width:240px" class="input_text_" /></td>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_3" name="gubernamentales_3" value='1'/><label for="gubernamentales_3">Si</label></th>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_3_3" name="gubernamentales_3" value='0'/><label for="gubernamentales_3_3">No</label></th>
                                            </tr>
                                            <tr>
                                                <th>4</th>
                                                <td><input type="text" name="gubernamentales1_4" id="gubernamentales1_4" style="width:240px" class="input_text_" /></td>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_4" name="gubernamentales_4" value='1'/><label for="gubernamentales_4">Si</label></th>
                                                <th><input class="radio_2" type="radio" id="gubernamentales_4_3" name="gubernamentales_4" value='0'/><label for="gubernamentales_4_3">No</label></th>
                                            </tr>
         <!--                                   <tr>
                                                <td></td>
                                                <td>TOTAL</td>
                                                <td><input type="text"  readonly="readonly" id="gubernamentales_5_1" style="width:150px" class="input_text_" /></td>
                                                <td><input type="text"  readonly="readonly" id="gubernamentales_5_2" style="width:150px" class="input_text_" /></td>
                                            </tr>-->
                                        </table>
                                        <!-- otra tabla por ever-->
                                    </div>




                                    <!-- -->
                                    <div id="tabs-6">
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>6.1 Existencia de servicios en la escuela:</p>
                                        </div>
                                        <table width="448" cellspacing="0">
                                            <tr class="matriz_header_">
                                                <td width="291">&nbsp;</td>
                                                <td colspan="2" style="text-align:center">¿Existe?</td>
                                            </tr>
                                            <tr>
                                                <td>1. Luz eléctrica </td>
                                                <td width="69"><input type="radio" id="servicios_1_1" name="T6_1" value='1'/><label for="servicios_1_1">Si</label></td>
                                                <td width="59"><input type="radio" id="servicios_1_2" name="T6_1" value='0'/><label for="servicios_1_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>2. Agua potable(o entubada)</td>
                                                <td><input type="radio" id="servicios_2_1" name="T6_2" value='1'/><label for="servicios_2_1">Si</label></td>
                                                <td><input type="radio" id="servicios_2_2" name="T6_2" value='0'/><label for="servicios_2_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>3. Desagüe </td>
                                                <td><input type="radio" id="servicios_3_1" name="T6_3" value='1'/><label for="servicios_3_1">Si</label></td>
                                                <td><input type="radio" id="servicios_3_2" name="T6_3" value='0'/><label for="servicios_3_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>4. Relleno sanitario</td>
                                                <td><input type="radio" id="servicios_4_1" name="T6_4" value='1'/><label for="servicios_4_1">Si</label></td>
                                                <td><input type="radio" id="servicios_4_2" name="T6_4" value='0'/><label for="servicios_4_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>5. Servicios higiénicos con pozo séptio</td>
                                                <td><input type="radio" id="servicios_5_1" name="T6_5" value='1'/><label for="servicios_5_1">Si</label></td>
                                                <td><input type="radio" id="servicios_5_2" name="T6_5" value='0'/><label for="servicios_5_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>6. Servicios higiénicos con letrina/ silo</td>
                                                <td><input type="radio" id="servicios_6_1" name="T6_6" value='1'/><label for="servicios_6_1">Si</label></td>
                                                <td><input type="radio" id="servicios_6_2" name="T6_6" value='0'/><label for="servicios_6_2">No</label></td>
                                            </tr>
                                            <tr>
                                                <td>7. Servicio telefónico</td>
                                                <td><input type="radio" id="servicios_7_1" name="T6_7" value='1'/><label for="servicios_7_1">Si</label></td>
                                                <td><input type="radio" id="servicios_7_2" name="T6_7" value='0'/><label for="servicios_7_2">No</label></td>
                                            </tr>
                                        </table>
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>6.2 Ambientes:</p>
                                        </div>
                                        <table cellspacing="0" style="width:650px">
                                            <tr class="matriz_header_">
                                                <td width="236">&nbsp;</td>
                                                <td colspan="2">¿Tiene?</td>
                                                <td width="39">Bueno</td>
                                                <td width="51">Regular</td>
                                                <td width="32">Malo</td>
                                            </tr>

                                            <?php
                                            $list = "";
                                            for ($i = 0; $i < count($ambientes); $i++) {
                                                $list.= '<tr>
            	  <td>' . $ambientes[$i]['tipo_ambienteid'] . ". " . $ambientes[$i]['descripcion'] . '</td>
            	  <td width="46"><input type="radio" id="ambientes_' . $ambientes[$i]['tipo_ambienteid'] . '_1" name="T7_' . $ambientes[$i]['tipo_ambienteid'] . '_1" value="1"/><label for="ambientes_' . $ambientes[$i]['tipo_ambienteid'] . '_1">Si</label></td>
            	  <td width="51"><input type="radio" id="ambientes_' . $ambientes[$i]['tipo_ambienteid'] . '_2" name="T7_' . $ambientes[$i]['tipo_ambienteid'] . '_1" value="0"/><label for="ambientes_' . $ambientes[$i]['tipo_ambienteid'] . '_2">No</label></td>
            	  <td><input type="text" name="T7_' . $ambientes[$i]['tipo_ambienteid'] . '_2" style="width:60px;" class="num_" /></td>
            	  <td><input type="text" name="T7_' . $ambientes[$i]['tipo_ambienteid'] . '_3" style="width:60px;" class="num_" /></td>
            	  <td><input type="text" name="T7_' . $ambientes[$i]['tipo_ambienteid'] . '_4" style="width:60px;" class="num_" /></td>
                </tr>';
                                            }
                                            echo $list;
                                            ?>



                                        </table>
                                    </div>



                                    <!--        <div id="tabs-7">
                                              <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                                      <br/>
                                                      <p>7.1 Comunicación Integral (CI)</p>
                                                  </div>
                                              <table border="0" cellspacing="0" style="width:650px">
                                                    <tr class="matriz_header_">
                                                      <td width="352" rowspan="2" valign="top"><p><strong>1. PROYECTOS DE PRIMER GRADO</strong></p></td>
                                                      <td width="76" rowspan="2" valign="top"><p align="center"><strong>¿Cuántos hay en la escuela?</strong></p></td>
                                                      <td colspan="3" valign="top"><p align="center"><strong>Estado en que se encuentran </strong><br />
                                                        <u>(Colocar    cantidad por cada estado)</u><strong> </strong></p></td>
                                                    </tr>
                                                    <tr class="matriz_header_">
                                                      <td width="70" valign="top"><p align="center"><strong>Bueno   </strong></p></td>
                                                      <td width="70" valign="top"><p align="center"><strong>Regular   </strong></p></td>
                                                      <td width="70" valign="top"><p align="center"><strong>Malo </strong></p></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="352" valign="top"><p>Proyecto 1: Mi nombre</p></td>
                                                      <td width="76" valign="top"><p align="center"><input type="text" style="width:70px;" /></p></td>
                                                      <td width="72" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_1_1" id="proyect_1_1" />
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_1_2" id="proyect_1_2" />
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_1_3" id="proyect_1_3" />
                                                      </p></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="352" valign="top"><p>Proyecto 2: Nuestras fiestas</p></td>
                                                      <td width="76" valign="top"><p align="center">
                                                        <input type="text" style="width:70px;"  />
                                                      </p></td>
                                                      <td width="72" valign="top"><p>
                                                        <input type="text" style="width:70px;"name="T8_2_1" id="proyect_2_1" />
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_2_2" id="proyect_2_2" />
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;"  name="T8_2_2" id="proyect_2_2"/>
                                                      </p></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="352" valign="top"><p>Proyecto 3: Nosotros y la naturaleza</p></td>
                                                      <td width="76" valign="top"><p align="center">
                                                        <input type="text" style="width:70px;" />
                                                      </p></td>
                                                      <td width="72" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_3_1" id="proyect_3_1"/>
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_3_2" id="proyect_3_2" />
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_3_3" id="proyect_3_3"/>
                                                      </p></td>
                                                    </tr>
                                                    <tr>
                                                      <td width="352" valign="top"><p>Proyecto 4: La bodega</p></td>
                                                      <td width="76" valign="top"><p align="center">
                                                        <input type="text" style="width:70px;" />
                                                      </p></td>
                                                      <td width="72" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_4_1" id="proyect_4_1"/>
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_4_2" id="proyect_4_2"/>
                                                      </p></td>
                                                      <td width="70" valign="top"><p>
                                                        <input type="text" style="width:70px;" name="T8_4_3" id="proyect_4_3"/>
                                                      </p></td>
                                                    </tr>
                                                  </table>
                                    
                                            <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                                      <br/>
                                                      <p>&nbsp;</p>
                                                </div>
                                            <table border="0" cellspacing="0"  style="width:650px">
                                              <tr class="matriz_header_">
                                                <td width="357" rowspan="2" valign="top"><p align="left"><strong>1. MÓDULOS  DE PRIMER GRADO</strong></p></td>
                                                <td width="70" rowspan="2" valign="top"><p align="center"><strong>¿Cuántos hay en la escuela?</strong></p></td>
                                                <td colspan="3" valign="top"><p align="center"><strong>Estado en que se encuentran </strong><br />
                                                  <u>(Colocar    cantidad por cada estado)</u><strong> </strong></p></td>
                                              </tr>
                                              <tr class="matriz_header_">
                                                <td width="70" valign="top"><p align="center"><strong>Bueno   </strong></p></td>
                                                <td width="70" valign="top"><p align="center"><strong>Regular   </strong></p></td>
                                                <td width="73" valign="top"><p align="center"><strong>Malo </strong></p></td>
                                              </tr>
                                              <tr>
                                                <td width="357" valign="top"><p>Módulo    1</p></td>
                                                <td width="70" valign="top"><p align="center">
                                                  <input type="text" style="width:70px;" />
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_1_1" id="modulo_1_1"/>
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_1_2" id="modulo_1_2"/>
                                                </p></td>
                                                <td width="73" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_1_3" id="modulo_1_3"/>
                                                </p></td>
                                              </tr>
                                              <tr>
                                                <td width="357" valign="top"><p>Módulo 2</p></td>
                                                <td width="70" valign="top"><p align="center">
                                                  <input type="text" style="width:70px;" />
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_2_1" id="modulo_2_1" />
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_2_2" id="modulo_2_2"/>
                                                </p></td>
                                                <td width="73" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_2_3" id="modulo_3_3" />
                                                </p></td>
                                              </tr>
                                              <tr>
                                                <td width="357" valign="top"><p>Módulo    3</p></td>
                                                <td width="70" valign="top"><p align="center">
                                                  <input type="text" style="width:70px;" />
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_3_1" id="modulo_3_1" />
                                                </p></td>
                                                <td width="70" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_3_2" id="modulo_3_2"/>
                                                </p></td>
                                                <td width="73" valign="top"><p>
                                                  <input type="text" style="width:70px;" name="T10_3_3" id="modulo_3_3"/>
                                                </p></td>
                                              </tr>
                                            </table>
                                            <br/>
                                    
                                            </div>-->
                                    <div id="tabs-8">
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">
                                            <br/>
                                            <p>I</p>
                                        </div> 

                                        <table width="930" border="0" cellspacing="0" id="datos_informativos">
                                            <tr>
                                                <td colspan='12'><a href="javascript:void(0);" id="agregar_8" class="btn_other">Agregar</a></td>
                                            </tr>
                                            <tr class='matriz_header_'>
                                                <td colspan="5">&nbsp;</td>
                                                <td colspan="4">Año de ingreso del<br> docente al Proyecto</td>
                                                <td colspan="4">Tiempo de experiencia<br>(Indicar en Años y Meses, AA-MM)</td>
                                                <td colspan="3">&nbsp;</td>
                                            </tr>
                                            <tr class='matriz_header' style="font-size:11px;">
                                                <td width="14">&nbsp;</td>
                                                <td width="179">Nombres y Apellidos completos</td>
                                                <td width="35">Sexo</td>
                                                <td width="25">Discapacidad</td>
                                                <td width="140">Grados a los que enseña</td>
                                                <td>AprenDes</td>
                                                <td>SUMA</td>
                                                <td>PIP</td>
                                                <td>CEPCO</td>                                                
                                                <td width="38">Como<br> director</td>
                                                <td width="48">Como<br> docente</td>
                                                <td width="44">En<br> esta<br> II.EE.</td>
                                                <td width="66">En el<br> Proyecto<br> AprenDes<br> / SUMA /<br>PIP/<br>CEPCO</td>
                                                </td>
                                                <td width="39">Acción</td>
                                            </tr>


                                        </table>
                                        <br/>
                                        <p><b>Códigos: </b>Sexo: 1: Femenino   2: Masculino Estado Civil: 1: Soltero(a)   2: Casado(a)   3: Conviviente   4: Divorciado(a)     5: Viudo(a)
                                        </p>
                                        <br/>
                                        <div style="width:100%;height:40px;font-size:12px;font-weight:bold">

                                            <p>II</p>
                                        </div>
                                        <table width="880" border="0" cellspacing="0" id="datos_informativos_2" >
                                            <tr>
                                                <td colspan='10'></td>
                                            </tr>
                                            <tr  class='matriz_header' style="font-size:11px;" >
                                                <td width="4" >&nbsp;</td>
                                                <td width="92">Condición Laboral</td>
                                                <td width="97">Fecha de Nacimiento</td>
                                                <td width="58">DNI</td>
                                                <td width="155">Lugar de Nacimiento(provincia y departamento) </td>
                                                <td width="104">Vive en la comunidad de la escuela</td>
                                                <td width="192">Lugar de residencia y<br> dirección</td>                                                
                                                <td width="86">Correo electrónico</td>
                                                <td width="74">Teléfono</td>
                                            </tr>

                                        </table>	
                                        <br/>
                                        <p><b>Códigos:</b> Condición Laboral:  <br/>  
                                            1: Nombrado (con contrato permanente)  <br/>  
                                            2: Contratado (con contrato a ser actualizado anualmente <br/>  
                                            3: Destacado (que por necesidad personal o de servicio solicita cambio a otra IE) <br/>  
                                            4: Reasignado (que solicita un cambio definitivo de plaza por interés personal, familiar, salud) <br/>                    
                                            5: Reubicado (excedente que lo destinan a una IE por necesidad de servicio)                                     


                                        </p>		
                                    </div>
                                    <div id="tabs-9"> 
                                        <div  id="observaciones_all">  
                                            <table id="tb_observaciones" cellspacing="0" cellpading="0" style="margin-left:5%;width:90%;">
                                                <tr  >

                                                    <td style="font-size: 12px;" colspan="3"><strong>OBSERVACIONES  ADICIONALES DE LA   APLICACIÓN DE ESTE INSTRUMENTO:</strong></td>
                                                    <td width="119"><a href="javascript:agregar_observacion()" class="btn_other">Agregar</a></td>
                                                </tr>
                                                <tr class="matriz_header">
                                                    <td width="78">Item</td>
                                                    <td width="902">Descripcion</td>
                                                    <td colspan="2">Acciones</td>
                                                </tr>

                                            </table>

                                        </div>

                                    </div>

                                </div>
                            </div>
                            <?php echo $guardar; ?>      


                        </div>

                    </div>

                </form>
                <div style="clear:both"></div>
            </div>

        </div>

    </div>
    <?php echo $pag; ?>

</div>
<div id="fondooscuro"></div>
<div id="buscar_i"></div>