<table width="99%" style="border:1px solid #666; margin-bottom:5px;" align="center">
    <?php
        $v0=" ";
        $v=0;
        $cont=0;
        foreach($rows as $key => $v)
        {
            if($v0!=$v[0])
            {
                $v0=$v[0];
                $cont=$cont+1;
                
        ?>
        <tr>
            <td class="label" >
                <label for="descripcion_p">Pregunta:&nbsp<?php echo $cont ?> </label>
            </td>
            <td>
                <input type="hidden" name="pregunta_id[]" id="pregunta_id[]" class="input_text ui-widget-content" style="width: 600px;" readonly="readonly" value="<?php echo $v[0]; ?>" />
                <input type="text" name="descripcion_p[]" id="descripcion_p[]" class="input_text ui-widget-content" style="width: 600px;" readonly="readonly" value="<?php echo $v[1]; ?>" />
            </td>
        </tr>
        <tr>
            <td class="label" ><label for="descripcion_a[]"></label></td>
            <td>
                <select name="descripcion_a[]" id="descripcion_a[]">
                  <!--  <option value="">::Seleccione::</option>-->
        <?php 
            }
				if ($v[4] != $v[2] ) 
				{
					echo '<option value="'.$v[2].'">'.$v[3].'</option>';
				} 
				else 
				{
					echo '<option selected="selected" value="'.$v[2].'">'.$v[3].'</option>';
				} 
        }
        ?>
                </select>
            </td>
        </tr>
</table>