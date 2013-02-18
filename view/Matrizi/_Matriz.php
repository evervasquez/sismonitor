<script type="text/javascript" src="js/app/evt_matriz.js"></script>
<style>
a 
{
 text-decoration:none;
}
.button {
    border: 1px solid rgba(0, 0, 0, 0.1);
    -moz-border-radius: 2px; 
    -webkit-border-radius: 2px; 
    border-radius: 2px;
    
    text-decoration: none;
    text-transform: uppercase;
    color: #666;
    
    font-family: Arial, sans-serif;
    font-size: 12px;
    font-weight: bold;
    
    margin: 0 3px;
    padding: 7px 12px;
    
    background: #f1f1f1;
    background-image: -webkit-gradient(linear, 0% 40%, 0% 70%, from(#f5f5f5), to(#f1f1f1));
    background-image: -webkit-linear-gradient(top, #f5f5f5, #f1f1f1); 
    background-image: -moz-linear-gradient(top, #f5f5f5, #f1f1f1); 
    background-image: -ms-linear-gradient(top, #f5f5f5, #f1f1f1); 
    background-image: -o-linear-gradient(top, #f5f5f5, #f1f1f1); 
    background-image: linear-gradient(top, #f5f5f5, #f1f1f1);
    
    -moz-transition: border-color .218s;
    -o-transition: border-color .218s;
    -webkit-transition: border-color .218s;
    -ms-transition: border-color .218s;
    transition: border-color .218s;
}
.button:hover {
    -moz-transition: border-color .218s;
    -o-transition: border-color .218s;
    -webkit-transition: border-color .218s;
    -ms-transition: border-color .218s;
    transition: border-color .218s;
    
    -moz-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);
    -webkit-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);
    border-color: #939393;
    color: #333;
}
</style>
<form action="" id="formcab">
  
<div style="clear: both"></div>
        <div class="cpreg" id="PA1" >
            
            <div class="">
                <div class="respuesta__">
                <table class="ui-widget ui-widget-content" style="width: 900px; margin: 0 auto;font-size:11px; " >
				 <thead class="ui-widget ui-widget-content">
               	   <tr  style="background:#dadada;" height="20">
				       <th width="28">&nbsp;</th>
                        <th width="7">N</th>
                        <th width="150">Indicadores</th>
                        <th width="150">Definicion</th>
                        <th width="30" >Resultados desagregados</th>
                        <th width="60">Metas para el periodo</th>
                        <th width="50">trimestres</th>
                        <th width="60">Metodo de recopilacion de datos</th>
                        <th width="50">Frecuencia para anunciar</th>
                        <th width="60">personal/Equipo</th>
                        <th width="10">&nbsp;</th>
                        <th width="35">Accion</th>
                    </tr>
               	   </thead>
                    <tbody >
					<?php
 $d = 0;
					  $c=0;
					   foreach($mod as $valor)
					   {
					      $por=round(($valor['item_meta']/$valor['metas_periodo'])*100,0);
						  if($por>=0 && $por<=33)
						  {
						   $color="#d74937";
						  }
						  if($por>=34 && $por<=65)
						  {
						   $color="#e5c43b";
						  }  
						  if($por>=66 && $por<=100)
						  {
						   $color="#0a8430";
						  }
						  
						   $c=$c+1;
						?> <tr >
						   <?php if($valor['estado']==1){?> <td width="28"><a href="javascript:void(0);"  onclick="muestra_hijo('<?php echo $c;?>');" id='a<?php echo $c;?>'><img src="images/mas.jpg" width="19" height="19"/></a></td><?php } ?>
						   <?php if($valor['estado']==0){ ?><td width="7">&nbsp;</td>
							<?php } ?>
							<th width="10" style="background:#dadada;"><?php echo $valor['numero'];?><input type="hidden" id="indi_id[]" name="indi_id[]" value="<?php echo $valor['indi_id'];?>"/></th>
							<td width="150" ><?php echo $valor['indicadores'];?></td>
							<td width="150"><?php echo $valor['definicion'];?></td>
							<td width="30"><?php echo $valor['resultados'];?></td>
							<td width="60" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $valor['metas_periodo'];?>" type="text" size="3" name="metas_periodo[]" id="metas_periodo[]"/></td>
							<!--<td width="50" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $valor['item_meta'];?>" type="text" size="3" name="item_meta<?php echo $valor['indi_id'];?>" id="item_meta<?php echo $valor['indi_id'];?>"/></td>-->
							<td><select name="_trimestre" onchange="ver_grid(this.value,'<?php echo $valor['indi_id'];?>');">
							<option value="" > ::Seleccione:: </option>
							    <?php foreach($trimestres as $key=>$t)
								{?>
								<option value="<?php echo $t[0];?>"><?php echo $t[1];?></option>
								<?php }
								?>
							   </select>
							
							</td>
							<td width="60"><?php echo $valor['metodo_recopilacion'];?></td>
							<td width="50">&nbsp;&nbsp;<?php echo $valor['frecuencia_anunciar'];?></td>
							<td width="60"><?php echo $valor['personal'];?></td>
							<td width="10"  style="background:<?php echo $color;?>" id="color<?php echo $valor['indi_id'];?>">&nbsp;</td>
							<!--<td width="35"><a class="button" onclick="save('<?php echo $valor['indi_id'];?>','<?php echo $valor['metas_periodo'];?>','<?php echo $valor['item_meta'];?>');" href="javascript:void(0);">Grabar</a></td>-->
							 </tr>
							
							 
							 <?php 
							 
							 foreach($valor['enlaces'] as $v)
							  {
							   $por=round(($v['item_meta']/$v['metas_periodo'])*100,0);
								  if($por>=0 && $por<=33)
								  {
								   $color="#d74937";
								  }
								  if($por>=34 && $por<=65)
								  {
								   $color="#e5c43b";
								  }  
								  if($por>=66 && $por<=100)
								  {
								   $color="#0a8430";
								  }
							  $d++;
							   ?>
									<tr name='hijo<?php echo $c;?>' style='display:none;' class='hijo<?php echo $c;?>' ><!--visibility:hidden;-->
								   <?php if($v['estado']==1){?> <td width="28"><a href="javascript:void(0);"  onclick="muestra_subhijo('<?php echo $d;?>');" id='a_hijo<?php echo $d;?>'><img src="images/mas.jpg" width="19" height="19"/></a></td><?php } ?>
								   <?php if($v['estado']==0){?><td width="7">&nbsp;</td>
									<?php } ?>
									<th width="10" style="background:#dadada;">&nbsp;<?php echo $v['numero']; ?><input type="hidden" id="indi_id[]" name="indi_id[]" value="<?php echo $v['indi_id'];?>"/></th>
									<td width="150" ><?php echo $v['indicadores'];?></td>
									<td width="150"><?php echo $v['definicion'];?></td>
									<td width="30"><?php echo $v['resultados'];?></td>
									<td width="60" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $v['metas_periodo'];?>" type="text" size="3" name="metas_periodo[]" id="metas_periodo[]"/></td>
									<!--<td width="50" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $v['item_meta'];?>" type="text" size="3" name="item_meta<?php echo $v['indi_id'];?>" id="item_meta<?php echo $v['indi_id'];?>"/></td>
									-->
									<td><select name="_trimestre" onchange="ver_grid(this.value,'<?php echo $v['indi_id'];?>');">
										<option value="" > ::Seleccione:: </option>
											<?php foreach($trimestres as $key=>$t)
											{?>
											<option value="<?php echo $t[0];?>"><?php echo $t[1];?></option>
											<?php }
											?>
										   </select>
										
										</td>
									<td width="60"><?php echo $v['metodo_recopilacion'];?></td>
									<td width="50">&nbsp;&nbsp;<?php echo $v['frecuencia_anunciar'];?></td>
									<td width="60"><?php echo $v['personal'];?></td>
									<td width="10"  style="background:<?php echo $color;?>" id="color<?php echo $v['indi_id'];?>">&nbsp;</td>
									<!--<td width="35"><a class="button" onclick="save('<?php echo $v['indi_id'];?>','<?php echo $v['metas_periodo'];?>','<?php echo $v['item_meta'];?>');" href="javascript:void(0);">Grabar</a></td>-->
									 </tr>
									 <?php
									  foreach($v['enlaces'] as $vi)
									  { 
									  if($vi['metas_periodo']!=0){
										 $por=round(($vi['item_meta']/$vi['metas_periodo'])*100,0);
										 }
										  if($por>=0 && $por<=33)
										  {
										   $color="#d74937";
										  }
										  if($por>=34 && $por<=65)
										  {
										   $color="#e5c43b";
										  }  
										  if($por>=66 && $por<=100)
										  {
										   $color="#0a8430";
										  }
														  ?>
										 <tr name='subhijo<?php echo $d;?>' style='display:none' class='subhijo<?php echo $d;?>' ><!--visibility:hidden;-->
									   <?php if($vi['estado']==1){?> <td width="28"><a href="javascript:void(0);" onclick="muestra_subhijo('<?php echo $d;?>');" name='a_subhijo<?php echo $d;?>'><img src="images/mas.jpg" width="19" height="19"/></a></td><?php } ?>
									   <?php if($vi['estado']==0){?><td width="7">&nbsp;</td>
										<?php } ?>
										<th width="10" style="background:#dadada;">&nbsp;&nbsp;<?php echo $vi['numero']; ?><input type="hidden" id="indi_id[]" name="indi_id[]" value="<?php echo $vi['indi_id'];?>"/></th>
										<td width="150" ><?php echo $vi['indicadores'];?></td>
										<td width="150"><?php echo $vi['definicion'];?></td>
										<td width="30"><?php echo $vi['resultados'];?></td>
										<td width="60" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $vi['metas_periodo'];?>" type="text" size="3" name="metas_periodo[]" id="metas_periodo[]"/></td>
										<!--<td width="50" >&nbsp;&nbsp;&nbsp;&nbsp;<input value="<?php echo $vi['item_meta'];?>" type="text" size="3" name="item_meta<?php echo $vi['indi_id'];?>" id="item_meta<?php echo $vi['indi_id'];?>"/></td>-->
										<td><select name="_trimestre" onchange="ver_grid(this.value,'<?php echo $vi['indi_id'];?>');">
										<option value="" > ::Seleccione:: </option>
											<?php foreach($trimestres as $key=>$t)
											{?>
											<option value="<?php echo $t[0];?>"><?php echo $t[1];?></option>
											<?php }
											?>
										   </select>
										
										</td>
										
										<td width="60"><?php echo $vi['metodo_recopilacion'];?></td>
										<td width="50">&nbsp;&nbsp;<?php echo $vi['frecuencia_anunciar'];?></td>
										<td width="60"><?php echo $vi['personal'];?></td>
										<td width="10"  style="background:<?php echo $color;?>" id="color<?php echo $vi['indi_id'];?>">&nbsp;</td>
									<!--	<td width="35"><a class="button" onclick="save('<?php echo $vi['indi_id'];?>','<?php echo $vi['metas_periodo'];?>','<?php echo $vi['item_meta'];?>');"href="javascript:void(0);">Grabar</a></td>-->
										 </tr>
										 <?php 
									   }
									 ?>
							   <?php 
							  }
							 ?>
							 <tr >
							 <td colspan='12' >&nbsp;</td>
							 </tr>
					<?php
                        }
						?>
					</tbody >
                </table>
                </div>
                
             </div>
        </div>
<div class="cpreg" id="PA2" style="display:none;" >
            
            <div class="preg"><span class="head_row_" >  </span><br />
            <div class="respuesta__">
              <button class="btn_other" id="btn_guardar1">Guardar</button>
            </div>
                
  </div>
</div>




<div style="clear: both"></div>    
</form>
<div style="display:none;" id="frm_pop">
<div class="srh_head" style="height:30px;">
    <span><input type="text" id="srh_tex" class="input_text" style="width:300px;" /></span><span>  <a class="btn_other" href="javascript:search_('personal',1)" >Buscar</a></span>
</div>
<div class="srh_middle">
	<table id="personal" class="itable" style="border-spacing:0px;width:400px;"   >
	<thead></thead>
	<tbody></tbody>
	</table>
</div>
<div id="personal_srh_foot" class="srh_foot" style="width:300px;" >
	
</div>
<input type="hidden" id="obj_1" />
<input type="hidden" id="obj_2" />
</div>
