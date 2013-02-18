          <?php function selected( $val , $aux ) {
                if ($val == $aux ) {
                    echo 'selected="selected"';
                }
            } ?>
<table border="0" cellpadding="0" cellspacing="0" class="table_encuesta tborder">
        <tr style="background: #dadada; font-weight: bold;">
            <td align="center">&nbsp;</td>
            <td align="center">Citas</td>
            <td align="center">Parentesco</td>
            <td align="center">Sexo</td>
            <td align="center">Edad</td>
            <td align="center">Nivel</td>
            <td align="center">Percibe ingreso</td>
        </tr>        
        <?php foreach ($rows as $value) { ?>
        <tr>
            <td><?php echo $index; ?>
            </td>
            <td>
                <input type="text" name="citas[]" class="input_text" style="width: 50px;" onkeypress="return permite(event,'num')" value="<?php echo $value[7]; ?>" />
            </td>
            <td>
                <select name="parentesco[]" class="input_text">
                    <option value=""   <?php echo selected($value[0], "")  ?> >::Seleccione::</option>
                    <option value="1"  <?php echo selected($value[0], "1") ?> >Jefe</option>
                    <option value="2"  <?php echo selected($value[0], "2") ?> >Cónyuge</option>
                    <option value="3"  <?php echo selected($value[0], "3") ?> >Hijo(a)</option>
                    <option value="4"  <?php echo selected($value[0], "4") ?> >Padre/Madre</option>
                    <option value="5"  <?php echo selected($value[0], "5") ?> >Suegro</option>
                    <option value="6"  <?php echo selected($value[0], "6") ?> >Hermano</option>
                    <option value="7"  <?php echo selected($value[0], "7") ?> >Nieto</option>
                    <option value="8"  <?php echo selected($value[0], "8") ?> >Yerno/Nuera</option>
                    <option value="9"  <?php echo selected($value[0], "9") ?> >Otro pariente</option>
                    <option value="10" <?php echo selected($value[0], "10") ?> >Otros no parientes</option>
                    <option value="11" <?php echo selected($value[0], "11") ?> >Emp. domést.</option>
                </select>
            </td>
            <td>
                <select name="sexo[]" class="input_text">
                    <option value=""  <?php echo selected($value[1], "") ?> >::Seleccione::</option>
                    <option value="1" <?php echo selected($value[1], "1") ?> >Masculino</option>
                    <option value="2" <?php echo selected($value[1], "2") ?> >Femenino</option>
                </select>
            </td>
            <td align="center">
                <input type="text" name="edad[]" class="input_text" style="width: 50px;"  value="<?php echo $value[2]; ?>" onkeypress="return permite(event,'num')" />
            </td>
            <td align="center">
                <select name="nivel[]" class="input_text">
                    <option value="">::Seleccione::</option>
                    <option value="0" <?php echo selected($value[3], "") ?> >Ninguno</option>
                    <option value="1" <?php echo selected($value[3], "1") ?> >Primaria incomp.</option>
                    <option value="2" <?php echo selected($value[3], "2") ?> >Primaria comp.</option>
                    <option value="3" <?php echo selected($value[3], "3") ?> >Secundaria inc.</option>
                    <option value="4" <?php echo selected($value[3], "4") ?> >Secundaria comp.</option>
                    <option value="5" <?php echo selected($value[3], "5") ?> >Técnica</option>
                    <option value="6" <?php echo selected($value[3], "6") ?> >Universitaria</option>
                    <option value="7" <?php echo selected($value[3], "7") ?> >No sabe</option>
                </select>
            </td>
            <td>
                <select name="ingreso[]" class="input_text">
                    <option value=""  <?php echo selected($value[4], "") ?> >::Seleccione::</option>
                    <option value="1" <?php echo selected($value[4], "1") ?> >Si</option>
                    <option value="2" <?php echo selected($value[4], "2") ?> >No</option>
                    <option value="3" <?php echo selected($value[4], "3") ?> >No sabe</option>
                </select>
            </td>
        </tr>
        <?php } ?>
    </table>