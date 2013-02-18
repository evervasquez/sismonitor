<script type="text/javascript" src="js/app/evt_a.js"></script>
<form action="" id="formcab">
  
<div style="clear: both"></div>
        <div class="cpreg" id="PA1" >
            
            <div class="preg"><br />
                <div class="respuesta__">
                <table>
               	  
				  <?php 
				  $i=1;
				   foreach($rows as $key=>$val)
				   {
				     ?>
				   <tr>
				       <td width="600"><span class="head_row_" >OBJETIVO <?php echo $i;?></span></td>

				   </tr>
				   <tr>
		               <td width="600" style='font-size:11px;'><?php echo $val[2];?></td>
				   </tr>
				 <?php  
				   $i++;
				   }
				  ?>
               	  
                    <tr>
                    </tr>
                        <tr>
                        </tr>
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
