<script type="text/javascript" src="js/app/evt_instrumentoreport.js"></script>

<div style="margin: 0 auto; width: 660px; margin-bottom: 10px;">
Codigo Modular de la escuela:
        <input type="text" style="width:130px;margin-left: 5px;" class="input_text_" maxlength="7" id="codigo_modular" name="codigo_modular"/>
       <input id='btn_buscar' type="button" value="Buscar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only ui-state-hover"   />
</div>
<div style="margin-left:1%;font-size:13px;" width='90%'>
		<fieldset ><legend><b>I. DATOS GENERALES</b></legend>
		<table width="858" border="0" cellspacing="2" cellpadding="2">
		  <tr>
			<td width="276">1.1Nombre del facilitador</td>
			<td width="208"><?php ?></td>
			<td width="209">1.2 fecha</td>
			<td width="139"><?php ?></td>
		  </tr>
		  <tr>
			<td>1.3 Grupo de intervencion</td>
			<td colspan='3'><?php ?></td>
		  </tr>
		  <tr>
			<td>1.4 N&uacute;mero de la escuela</td>
			<td><?php ?></td>
			<td>1.5 Nombre de la escuela</td>
			<td><?php ?></td>
		  </tr>
		  <tr>
			<td colspan='2'>1.6 A&ntilde;o de ingreso de la escuela al Proyecto AprenDes/SUMA</td>
			<td colspan='2'><?php ?></td>
		  </tr>
		  <tr>
			<td colspan='2'>1.7 La escuela se encuentra bajo la intervencion de algun otro proyecto o programa?</td>
			<td colspan='2'><?php ?></td>
		  </tr>
		  <tr>
			<td colspan='2'>1.8 Nombre del Proyecto/Programa</td>
			<td colspan='2'><?php ?></td>
		  </tr>
		  <tr>
			<td >1.9 A&ntilde;o de ingreso de la escuela al Proyecto/Programa</td>
			<td ><?php ?></td>
			<td >1.10 Codigo Modular de la Escuela</td>
			<td ><?php ?></td>
		  </tr>
		  <tr>
		  <td rowspan="3">1.11 Turnos en los que atiende</td>
		  <td>Ma&ntilde;ana de: a:</td>
		  <td rowspan="3">1.12 Duraci&oacute;n del :</td>
		  <td>Desayuno de: a:</td>
		  </tr>
		  <tr>
		  <td>Tarde de: a:</td>
		  <td>Recreo de: a:</td>
		  </tr>
		   <tr>
			<td>&nbsp;</td>
			<td >Almuerzo de: a:</td>
		  </tr>
		  <tr>
			<td colspan='2'>1.13 Telefono comunitario</td>
			<td colspan='2'><?php ?></td>
		  </tr>
		</table>
		</fieldset>
		<fieldset><legend><b>II. UBICACI&Oacute;N</b></legend>
		<table width="858" border="0" cellspacing="2" cellpadding="2">
			<tr>
				<td>2.1 Departamento:</td>
				<td><?php ?></td>
				<td>2.2 Provincia:</td>
				<td><?php ?></td>
				<td>2.3 Distrito:</td>
				<td><?php?></td>
			</tr>
			<tr>
				<td>2.4 Comunidad</td>
				<td colspan='5'></td>
			</tr>
			<tr>
			 <td colspan='3'>2.5 Datos de su ubicacion geografica(consignar puntos referenciales):</td>
			 <td colspan='3'><?php?></td>
			</tr>
			<tr>
			 <td colspan='2'>2.6 Accesibilidad: Dsitancia en Km. a la capital de distrito</td>
			 <td><?php?></td>
			 <td colspan='2'>2.7 Tiempo en minutos</td>
			 <td><?php?></td>
			</tr>
			<tr>
			 <td >2.8 Forma de trasporte:</td>
			 <td colspan='5'><?php?></td>
			</tr>
		</table>
		
		</fieldset>
		<fieldset><legend><b>III. TIPOLOGIA</b></legend>
		<table  style="width:650px;" ce cellspacing="0" border="0">
              	<tr>
				 <td colspan='2'>3.1 Distribucion de las aulas(Marque con una aspa los grados que se encuentran en cada aula)</td>
				 </tr>
				 <tr>
				 <td width='20px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				 <td>
					<table  style="width:650px;" ce cellspacing="0" border="0">
						<tr class="matriz_header_">
						  <td width="150">AMBIENTE F&Iacute;SICO</td>
						  <td width="73">1er Grado</td>
						  <td width="73">2do Grado</td>
						  <td width="81">3er Grado</td>
						  <td width="81">4to Grado</td>
						  <td width="88">5to Grado</td>
						  <td width="88">6to Grado</td>
						</tr>
						
						<?php
						$n_aulas=10;
						$rw_='';
						for ($i = 1;$i <= $n_aulas; $i++) {

						$rw_.='<tr>';
						$rw_.='<td>Aula '.$i.'</td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_1" value="1" name="T2_'.$i.'_1"  /><label for="aula_'.$i.'_1"></label></td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_2" value="2" name="T2_'.$i.'_2"  /><label for="aula_'.$i.'_2"></label></td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_3" value="3" name="T2_'.$i.'_3" /><label for="aula_'.$i.'_3"></label></td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_4" value="4" name="T2_'.$i.'_4"  /><label for="aula_'.$i.'_4"></label></td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_5" value="5" name="T2_'.$i.'_5"  /><label for="aula_'.$i.'_5"></label></td>';
						$rw_.='<td><input type="checkbox" id="aula_'.$i.'_6" value="6" name="T2_'.$i.'_6"  /><label for="aula_'.$i.'_6"></label></td>';
						$rw_.='</tr>';
						}
						echo $rw_;
						?>
						
					  </table>
				 </td>
				</tr>
				<tr>
				 <td colspan='2'>3.2 Tipo de escuela<?php ?></td>
				 </tr>
              </table>
		</fieldset>
		<fieldset><legend><b>IV. POBLACION ESTUDIAL ACTUALMENTE ATENDIDA:</b></legend>
			<table width="650px"  cellspacing="0" border="0"> 
					<tr class="matriz_header_">
						<td width="76">Grado</td>
						<td width="105">Hombres</td>
						<td width="106">Mujeres</td>
						<td width="77">TOTAL</td>
					</tr>
					<?php
					$rw="";
					$list="";
					for($i_1=1;$i_1<=6;$i_1++)
					{
						 $list.='<tr>
							<td>'.$i_1.'�</td>
							<td></td>
							<td></td>
							<td></td>
							</tr>';
					}
					echo $list;
					?>
					
					
					  <td>TOTAL</td>
					  <td></td>
					  <td></td>
					  <td></td>
					  </tr>
					
				  </table>
				
		</fieldset>
		<fieldset><legend><b>V. PARTICIPACION COMUNITARIA:</b></legend>
			<table width='650px'>
			 <tr>
			 <td colspan='2'>5.1 Numero de asociados(padre/madre de<?php ?> familia):</td>
			 </tr>
			 <tr>
			  <td colspan='2'>5.2 Miembros del Municipio Escolar:</td>
			 </tr>
			  <tr>
				 <td width='20px'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				 <td>
					<table cellspacing="0" style="width:800px;" border="0">
							  <tr class="matriz_header_">
								<td width="202">CARGO</td>
								<td width="350">NOMBRES Y APELLIDOS</td>
								<td width="118">SEXO</td>
								<td width="50">EDAD</td>
								<td width="70">GRADO</td>
							  </tr>
						  <?php
						  $tabla="T3";
							  for ($i_1 = 0; $i_1 < count($cargos_1); $i_1++) {
									echo '<tr>
									<td>'.($i_1+1).'. '.$cargos_1[$i_1]['descripcion'].'<input type="hidden" value="'.$cargos_1[$i_1]['cargoid'].'" name="'.$tabla.'_'.($i_1+1).'_0" /></td>
									<td></td>
									<td>
									<input type="radio" id="miembros_escolar_'.($i_1+1).'_2_1" name="'.$tabla.'_'.($i_1+1).'_2" value="M"/><label for="miembros_escolar_'.($i_1+1).'_2_1">M</label>
									<input type="radio" id="miembros_escolar_'.($i_1+1).'_2_2" name="'.$tabla.'_'.($i_1+1).'_2" value="F"/><label for="miembros_escolar_'.($i_1+1).'_2_2">F</label>
									</td>
									<td></td>
									<td></td>
								  </tr>';
									
							  }
						  ?>
					  
					  
					  
					  
					  
					</table>
				 </td>
			  <tr>
			   <td colspan='2'>5.3 Miembros del CONEI:</td>
			 </tr>
			 </tr>
			</table>
		</fieldset> 
</div>