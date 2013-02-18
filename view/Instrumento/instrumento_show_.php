<script type="text/javascript">
    $(function(){
		$(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<script type="text/javascript" src="js/app/evt_instrumento.js"></script>
<script type="text/javascript" src="js/jquery.maskedinput-1.3.min.js"></script>
<?php
if($edicion==true)
{
    echo '<script type="text/javascript" src="js/app/evt_instrumento_set.js"></script>';
}
?>
<style>
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
    <div id="ins_name">INSTRUMENTO N°<?php echo $n_.": ".$instrumento; ?></div>
      <table  style="font-size:12px;width: 100%; ">
      <tr>
          <td style="text-align:right">N° Encabezado</td>
          <td style="width: 300px;"><input type="text" id="enca_id" name="enca_id" style="width:95px; margin:2px;padding:1px;" value="<?php echo $enca_id; ?>" /><a href="javascript:instrumento_search()" class="btn_other" >Buscar</a><input type="hidden" id="ins_id"  name="ins_id"    value="<?php echo $ins_id; ?>"  ></td>
          <td style="visibility: hidden">Tipo de Escuela</td><td colspan="2"><select name="tipo_escuela" id="tipo_escuela" style="visibility: hidden" ><?php echo $tipo_escuela;?></select>
              <input type="hidden"  name="action" value="<?php echo $action;?>" />
          </td>
      </tr>
      <tr>
      	<td width="191" style="text-align:right">Institución Educativa</td>
        <td colspan="3"><input  width="70" style="width:70%; margin:2px;padding:1px;" id="inst-nombre" name="inst-nombre" value="<?php echo $institucion[0]['inst_nombre']?>" /><input type="hidden" id="inst_id" name="inst_id" value="<?php echo $institucion[0]['inst_id']?>" /><input id="inst-descripcion" style="width:50px; margin:2px;padding:1px;" value="<?php  echo $institucion[0]['inst_id'] ?>"/>
        </td><td >Grado y Sección</td><td>
            
 
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
        <td style="text-align:right">Docente Observado</td>
        <td colspan="5"><input width="70" style="width:100%; margin:2px;padding:1px;" id="set_doc_id_entrevistado" value="<?php echo $docente[0]['nombre']; ?>"/><input type="hidden" id="doc_id_entrevistado"  name="doc_id_entrevistado" value="<?php echo $docente[0]['id_']; ?>"></td>
      </tr>
      <tr>
        <td style="text-align:right">Nivel educativo</td>
        <td width="250"><select name="enca_nivel" id="enca_nivel" style="width:110px; margin:2px;padding:1px;"  >
          <option value="1">Primaria</option>
          <option value="2">Secundaria</option>
          <option value="0">Inicial</option>
        </select></td>
        <td width="192" style="text-align:right">Total Estudiantes</td><td width="187"><input type="text" name="enca_total_est" id="enca_total_est" style="width:90px; margin:2px;padding:1px;" onkeypress="return permite(event,'num')" /></td>
        <td width="161" style="text-align:right">Lugar</td><td width="247"><input  width="70" style="width:100%; margin:2px;padding:1px;text-transform: uppercase" id="lugar" name="lugar"  value="<?php echo $lugar['lug_descripcion'];?>" /><input type="hidden" name="enca_lugar" id="enca_lugar" value="<?php echo $lugar['lug_id']; ?>"/></td>
      </tr>
      <tr>
        <td style="text-align:right">Región</td>
        <td>
          <select name="dep_id" id="dep_id" style="width:160px; margin:2px;padding:1px;">
          <?php echo $regiones;?>
          </select>
          </td>
        <td style="text-align:right">Provincia</td>
        <td><select name="prov_id" id="prov_id" style="width:160px; margin:2px;padding:1px;">
                <?php echo $provincias;?>
          </select></td>
        <td style="text-align:right">Distrito</td>
        <td><select name="ubi_id" id="dist_id" style="width:160px; margin:2px;padding:1px;">
                <?php echo $distritos;?>
        </select></td>
      </tr>
      <tr>
        <td style="text-align:right">Docente Observador</td>
        <td colspan="5"><input  width="70" style="width:100%; margin:2px;padding:1px;margin-left:" id="set_doc_id_entrevistador" value="<?php  echo $facilitador[0]['nombre'];?>"/><input type="hidden" id="doc_id_entrevistador"  name="doc_id_entrevistador" value="<?php echo $facilitador[0]['id_']; ?>"></td>
      </tr>
      <tr>
        <td style="text-align:right">Tiempo de Observacion</td>
        <td>De 
        <input type="text" style="width:55px; margin:2px;padding:1px;" id="enca_ini" name="enca_ini" maxlength="0" /> a <input type="text" style="width:55px; margin:2px;padding:1px;" name="enca_fin" id="enca_fin" maxlength="0" />
        </td>
        <td>Fecha</td>
        <td colspan="3"><input type="text" width="70" style="width:160px; margin:2px;padding:1px;" name="enca_fecha" id="enca_fecha" maxlength="0"/></td>
      </tr>
      <tr>
        <td colspan="6">
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
