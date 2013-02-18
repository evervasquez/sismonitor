
<script type="text/javascript">
    $(function(){
		
        $(".btn_other").button();
        $( "#q" ).focus();
    });
</script>
<script type="text/javascript" src="js/app/evt_pregunta.js"  ></script>
<div class="div_container" style="min-height: 700px;">
<h6 class="ui-widget-header"><?php echo $titulo; ?></h6>
<div class="contain_" style="min-width: 600px;">
<div style=" margin:0 auto 0 auto; width: 800px; margin-bottom: 10px;margin-top: 30px;">
    <?php
    if($op=="0")
    {
        $display= "style='display:none;'";
    }
    else
    {
        $display= "";
    }
    ?>
    
    <div style="display:none;" id="frm_preguntas">
        <form method="get" action="" id="frm_pregunta">
        
        <table width="503" >
        	<tr>
            <td colspan="3">
            <input type="hidden" id="preg_id"  name="preg_id"/>
            </td>
            </tr>
           <tr>
           	<td width="53">Numero</td>
                <td width="40" colspan="2"><input type="text" style="width:40px;" class="input_text_" id="det_numero"/><select name="det_tipo" id="det_tipo" style="width: 100px;font-size: 12px;margin: 2px;padding: 1px;"><option value="0"> Seleccion </option><option value="1" >Si/No</option></select></td>
            
           </tr>
           <tr><td> </td><td colspan="2">  <select id="var_id" name="var_id"   style="width: 400px;font-size: 12px;margin: 2px;padding: 1px;"><?php echo $variables; ?></select>  </td>  </tr>
           <tr><td> </td><td colspan="2"> <select id="comp_id" name="comp_id" style="width: 400px;font-size: 12px;margin: 2px;padding: 1px;"><?php  ?></select> </td>  </tr>
           <tr><td> </td><td colspan="2"> <select id="ind_id" name="ind_id"   style="width: 400px;font-size: 12px;margin: 2px;padding: 1px;"><?php ?></select>  </td>  </tr>
           <tr>
           
           </tr>
           <tr>
                <td style="vertical-align: top;">Pregunta</td>
           	<td colspan="2">
                    <textarea  id="det_pregunta" cols="70" rows="5" name="det_pregunta" style="margin-left: 2px;width:439px;"></textarea>
                </td>
           </tr>
           </table>
        </form>
    </div>
    <div>
        <div>
            <form method="get" action="" id="frm_instrumento">
            <table width="767" class="tb_instrumento">
                <tr>
                    <td width="150">ID Instrumento</td>
                    <td width="605">
                        <input type="text" name="ins_id" id="ins_id" class="input_text_" style="width:40px" value="<?php echo $ins_id; ?>"/><input type="hidden" name="op" value="<?php echo $op; ?>">
                        
                    </td>
                </tr>
                <tr>
                    <td>Nombre de Instrumento</td>
                    <td>
                          <input type="text"  name="ins_nombre" id="ins_nombre" class="input_text_" style="width:500px" value="<?php echo $ins_nombre; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Indicaciones</td>
                   
                </tr>
                <tr>
                    <td colspan="2"> 
                     
                        <textarea name="ins_instrucciones" id="ins_instrucciones" style="width: 100%;height: 80px;"><?php echo $ins_instrucciones ?></textarea>
                    
                    </td>
                </tr>
               <tr >
                    	<td>	</td>
	                    <td  height="50">
	                        <div style="float:right">
                                    <a href="javascript:delete_instrumento( <?php echo $ins_id; ?> )" class="btn_other">Eliminar</a>
	                            <a href="javascript:save_instrumento()" class="btn_other">Guardar</a>
	                        </div>
	                    </td>
                    
               </tr>
            </table>
            </form>
        </div>
        <div  <?php echo $display; ?> id="lista_preguntas">
            <form action="index.php" id="lista_preguntas_all">
            <table style="width: 100%" cellspacing="0"  >
                <thead>
                 	
                    <tr >
                    <td colspan="2" height="50">
                        <div>
                            <a href="javascript:add_pregunta()" class="btn_other">Agregar</a>
                            <a href="javascript:odd_selected()" class="btn_other">Quitar</a>
                        </div>
                    </td>
                    
                	</tr>
                </thead>
                <tbody class="preg_list">
                
                <tr class="matriz_header">
                    <td width="80" > Item</td><td width="517">Pregunta</td>
                    <td> Indicador</td>
                    <td> Tipo</td>
                    <td colspan="2"> Acciones</td>
                    
                </tr>
                <?php echo $lista_preguntas; ?>
               
                </tbody>
                <table style="width: 100%" cellspacing="0" >
                     <tr>
                        <td colspan="6" style="text-align: center;height: 30px;"> 
                            <a href="javascript:guardar_detalle_instrumento()" class="btn_other">Guardar</a>
                        </td>
                    </tr>
                </table>
            </table>
            </form>    
              
        </div>
        
    </div>
    
</div>

</div>
<?php echo $pag; ?>

</div>