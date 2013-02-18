<script type="text/javascript" src="js/app/evt_matriz.js"></script>
<?php
$por="";
$porr="";
$disabled="";
$msg="";
$oper=0;
 if(isset($objd->id_detalle))
 {
  $por=round(($objd->ejecutado/$objd->meta)*100,0);
  $disabled="readonly='readonly'";
  $oper=1;
 }
 if($suma->avance==$obji->metas_periodo)
 {
   $oper=1;
   $msg="ya se completo el total de la meta establecido";
 }
 if($obji->metas_periodo!=0 || isset($suma->avance))
 {
   $porr=round(($suma->avance/$obji->metas_periodo)*100,0);
 }
?>
<div class="text-login"  id="msg" style="width: 100%; background: #6EAD28; font-size: 11px; font-weight: bold; padding-bottom: 2px; padding-top: 2px; color:#fff; text-align: center; font-family: arial; border-bottom: 1px solid #57962B;">
                <?php echo $msg;?>
            </div>
<form name="_frm" method="post" id="_frm" action="">
<input type="hidden" id="tiempo_id" name="tiempo_id" value="<?php echo $objt->tiempo_id;?>"/>
<input type="hidden" id="indi_id" name="indi_id" value="<?php echo $obji->indi_id;?>"/>
<input type="hidden" id="id_detalle" name="id_detalle" value="<?php echo $objd->id_detalle;?>"/>
  <table width="600" border="0" class="ui-widget ui-widget-content">
    <tr class="ui-widget-header">
      <th colspan="5">Registro de <?php echo $objt->descripcion;?></th>
    </tr>
    <tr class="ui-widget-header">
      <td width="128" align="center">&nbsp;Meta para trimestre</td>
      <td width="96" align="center">&nbsp;ejecutados</td>
      <td width="113" align="center">&nbsp;% avance trim.</td>
      <td width="126" align="center">&nbsp;avance proyecto</td>
      <td width="138" align="center">&nbsp;% proyecto</td>
      <td width="50" align="center">accion</td>
    </tr>
    <tr>
      <td align="center"><input type="hidden" id="meta" name="meta" value="<?php echo $obji->metas_periodo;?>"/>
	  <input type="text" <?php echo $disabled;?> id="meta_detalle" name="meta_detalle" value="<?php echo $objd->meta;?>" size="5"/></td>
      <td align="center"><input type="text" <?php echo $disabled;?> id="ejecutado" name="ejecutado" value="<?php echo $objd->ejecutado?>" size="5"/></td>
      <td align="center" id="avance_detalle"><?php  echo $por;?></td>
      <td align="center" id="avance"><input type="hidden" id="avance_t" name="avance_t" value="<?php echo $suma->avance;?>"/><?php echo $suma->avance;?></td>
      <td align="center" id="por"><?php  echo $porr;?></td>
      <td align="center" ><?php if ($oper==0){?><a href="javascript:void(0);" id="save_trimestre">Grabar</a><?php } ?></td>
    </tr>
  </table>
</form>