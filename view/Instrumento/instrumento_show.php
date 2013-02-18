<script type="text/javascript">
    $(function(){
        $(".btn_other").button();
        $( "#q" ).focus();
        var validator = $("#contenido_").kendoValidator().data("kendoValidator"),status = $(".status");
        $("#todo").click(function() {
            var isCheckedRadio;
//******************************            
            var isChecked;                
            var groups = {}
            var contador=0;
            $("#frm_instrumento_send input:radio").each(function () {
                groups[this.name] = true;
            });
            $(".ui-state-error set").remove();
            for (group in groups) {
                var radioButttons = $(":radio[name=" + group + "]").is(':checked');
                isChecked = radioButttons;
                var b_= group.split('_');
                var c_= b_[1];
                $("#error_"+c_+"").remove();
                if (!isChecked) {
                    var a_=$("<tr class='ui-state-error set' id='error_"+c_+"'><td colspan='4'>Por favor debe seleccionar una alternativa </td></tr>");
                    $("#alt_"+c_+"").append(a_);
                    contador=contador+1;
                }
                else {

                }
            }
//****************************
            if (validator.validate() && contador==0) {
                $("#frm_instrumento_send").submit();
            }else{
                msg_alert_a("<span style='color:red;'>Error!!, Porfavor Complete los campos sugeridos.</span>");
            }
        });
    });
 
    function cierre2(){
        $("#fondooscuro").fadeOut(600);
        $("#enca_id").focus();
    }
</script>
<script type="text/javascript" src="js/app/evt_instrumento.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<?php
if ($edicion == true) {
    echo '<script type="text/javascript" src="js/app/evt_instrumento_set.js"></script>';
}
?>
<style>
    
     #frmtotal{
	padding:20px;
	color: black;
	position: fixed;
	left: 17.5%;
	top: 25%;
	z-index: 1000;
	text-align: center;
	background-color: white;
	border: 1px solid black;
        width: 850px;
    }
    
    input[type="radio"] {
        visibility: hidden;
        width: 0px;
        height: 0px;
        padding: 0px;
        margin: 0px;
        margin-top:-5px;

    }
    label {
        padding-left: 40px;
        padding-bottom: 16px;
        height: 64px;
        width:64px;
        margin-bottom:-10px;
    }

    input[type="radio"] + label{
        background: url("images/fuglychecks_.png") 0 0 no-repeat;

    }
    input[type="radio"]:focus + label{
        background-position: 0 -16px;
    }
    input[type="radio"]:checked + label{
        background-position: 0 -64px;
    }
    input[type="radio"]:checked:focus + label{
        background-position: 0 -96px;
    }
    .rw_rpta
    {
        height:46px;	
    }
</style>
<div class="div_container" >
    <h6 class="ui-widget-header"><?php echo $titulo; ?></h6>
    <div class="contain_">
        <div style=" margin:0 auto 0 auto; width: 100%; margin-bottom: 10px;margin-top: 30px; ">

            <div>
                <form id="frm_instrumento_send" >
                    <div id="cabecera_all">
                        <div id="contenido_" style="font-size:12px;width: 90%; margin-left:5%;float: left;" >
                            <div id="ins_name">INSTRUMENTO N°<?php echo $n_ . ": " . $instrumento; ?></div>
                            <table style="font-size:12px;width: 95%; padding-left: 25px; ">
                                <tr style="height:22px;">
                                    <td colspan="6"></td>
                                    <td style="width: 110px"><span class="k-invalid-msg" data-for="grup_id"></span></td>
                                </tr>
                                <tr>                
                                    <td style="width: 150px;">N° Encabezado</td>
                                    <td colspan="4"><input type="text" id="enca_id" required name="enca_id" autofocus style="width:275px; margin:2px;padding:1px;" value="<?php echo $enca_id; ?>" />
                                        <a href="javascript:instrumento_search()" class="btn_other" id="btn_enca_id">Buscar</a><input type="hidden" id="ins_id"  name="ins_id"    value="<?php echo $ins_id; ?>"  >
                                        <span class="k-invalid-msg" data-for="enca_id"></span>
                                    </td>
                                    <td>Grupo </td>
                                    <td style="width: 100px"><select id="grup_id" name="grup_id" required>
                                            <option value="">Seleccione...</option><?php echo $grupo_acompanamiento; ?></select>
                                        <input type="hidden"  name="action" value="<?php echo $action; ?>" />
                                    </td>

                                </tr>
                                <tr>
                                    <td>Institución Educativa</td>
                                    <td colspan="3">
                                        <input  style="width:80%; margin:2px;padding:1px;text-transform: uppercase" class="input_text" required id="inst-nombre" name="inst-nombre" value="<?php echo $institucion[0]['inst_nombre'] ?>" />
                                       
                                        <input type="hidden" id="inst_id" name="inst_id" value="<?php echo $institucion[0]['inst_id'] ?>" />
                                        <span><input id="inst-descripcion" style="width:50px; margin:2px;padding:1px;" value="<?php echo $institucion[0]['inst_id'] ?>"/></span>
                                    </td>


                                    <td style="width: 280px;"><span class="k-invalid-msg" data-for="inst-nombre"></span></td>
                                    <td>Grado y Sección</td>
                                    <td style="width: 110px">


                                        <input type="checkbox" name="enca_grado" id="enca_grado_1" value="1">1°
                                        <input type="checkbox" name="enca_grado" id="enca_grado_2" value="2">2°
                                        <input type="checkbox" name="enca_grado" id="enca_grado_3" value="3">3°
                                        <input type="checkbox" name="enca_grado" id="enca_grado_4" value="4">4°
                                        <input type="checkbox" name="enca_grado" id="enca_grado_5" value="5">5°
                                        <input type="checkbox" name="enca_grado" id="enca_grado_6" value="6">6°

                                        <select id="enca_seccion" name="enca_seccion" style="width:70px; margin:2px;padding:1px;" >
                                            <option value="-">-</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                            <option value="E">E</option>
                                            <option value="F">F</option>
                                            <option value="G">G</option>
                                            <option value="H">H</option>
                                            <option value="I">I</option>
                                            <option value="J">J</option>
                                            <option value="K">K</option>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Docente Observado</td>
                                    <td colspan="3"><input required style="width:97%; margin:2px" name="set_doc_id_entrevistado" id="set_doc_id_entrevistado" value="<?php echo $docente[0]['nombre']; ?>"/><input type="hidden" id="doc_id_entrevistado"  name="doc_id_entrevistado" value="<?php echo $docente[0]['id_']; ?>">
                                    <td colspan="3" style="width: 110px"><a href="javascript:inicio_popup2()" class="btn_other" id="btn_doc_id_entrevistado">Buscar</a><span class="k-invalid-msg" data-for="set_doc_id_entrevistado"></span></td> 
                                    </td>
                                    
                                </tr>
                                <tr>
                                    <td>Nivel educativo</td>
                                    <td><select name="enca_nivel" id="enca_nivel" style="width:110px; margin:2px;padding:1px;">

                                            <option value="1">Primaria</option>
                                            <option value="2">Secundaria</option>
                                            <option value="0">Inicial</option>
                                        </select></td>
                                    <td width="192">Total Estudiantes</td>
                                    <td ><input type="text" style="width: 160px;"required name="enca_total_est" id="enca_total_est"  onKeyPress="return soloNumeros(event)" /></td>
                                    <td style="width: 390px;"><span class="k-invalid-msg" data-for="enca_total_est"></span></td>
                                    <td style="text-align:left">Lugar</td>
                                    <td><input style="width: 185px;margin:2px;padding:1px;text-transform: uppercase" id="lugar" name="lugar"  value="<?php echo $lugar['lug_descripcion']; ?>" /><input type="hidden" name="enca_lugar" id="enca_lugar" value="<?php echo $lugar['lug_id']; ?>"/></td>
                                </tr>
                                <tr>
                                    <td>Región</td>
                                    <td>
                                        <select name="dep_id" id="dep_id" style="width:110px; margin:2px;padding:1px;" required> 
                                            <?php echo $regiones; ?>
                                        </select>
                                    </td>
                                    <td style="text-align:left">Provincia</td>
                                    <td><select name="prov_id" id="prov_id" style="width:160px; margin:2px;padding:1px;">
                                            <?php echo $provincias; ?>
                                        </select></td>
                                        <td></td>
                                    <td style="text-align:left">Distrito</td>
                                    <td ><select name="ubi_id" id="dist_id" style="width:190px; margin:2px;padding:1px;">
                                            <?php echo $distritos; ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td>Docente Observador</td>
                                    <td colspan="5"><input style="width:518px; margin:2px;padding:1px;margin-left:" name="set_doc_id_entrevistador" required id="set_doc_id_entrevistador" value="<?php echo $facilitador[0]['nombre']; ?>"/><input type="hidden" id="doc_id_entrevistador"  name="doc_id_entrevistador" value="<?php echo $facilitador[0]['id_']; ?>"></td>
                                    <td style="width: 110px"><span class="k-invalid-msg" data-for="set_doc_id_entrevistador"></span></td>
                                </tr>
                                <tr>
                                    <td>Tiempo de Observacion</td>
                                    <td colspan="2">De 
                                        <input type="text" style="width:55px; margin:2px;padding:1px;" id="enca_ini" name="enca_ini" maxlength="0" /> a <input type="text" style="width:55px; margin:2px;padding:1px;" name="enca_fin" id="enca_fin" maxlength="0" />
                                    </td>
                                    <td style="text-align: right">Fecha</td>
                                    <td colspan="2"><input type="text" width="70" style="width:152px; margin:2px;padding:1px;" required name="enca_fecha" id="enca_fecha" maxlength="0"/></td>
                                    <td><span class="k-invalid-msg" data-for="enca_fecha"></span></td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div id="enca_indicaciones"><strong><em>INSTRUCIONES</em></strong><em>: </em>
                                            <p><?php echo $instrucciones; ?></p>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div id="respuestas_all">
                        <?php echo $preguntas; ?>

                    </div>
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
                        <?php echo $guardar; ?>
                    </div>

                    <div style='clear: both'></div>    
                </form>
            </div>
        </div>

    </div>
    <?php echo $pag; ?>

</div>
<div id="fondooscuro"></div>
<div id="buscar_i"></div>