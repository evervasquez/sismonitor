
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
        <?php if ($rows > 12 ) { $rows = 12;}  ?>
        <?php for ($index = 1; $index <= $rows ; $index++) { ?>
        <tr>
            <td><?php echo $index; ?>
            </td>
            <td>
                <input type="text" name="citas[]" class="input_text" style="width: 50px;" onkeypress="return permite(event,'num')" />
            </td>
            <td>
                <select name="parentesco[]" class="input_text">
                    <option value="">::Seleccione::</option>
                    <option value="1">Jefe</option>
                    <option value="2">Cónyuge</option>
                    <option value="3">Hijo(a)</option>
                    <option value="4">Padre/Madre</option>
                    <option value="5">Suegro</option>
                    <option value="6">Hermano</option>
                    <option value="7">Nieto</option>
                    <option value="8">Yerno/Nuera</option>
                    <option value="9">Otro pariente</option>
                    <option value="10">Otros no parientes</option>
                    <option value="11">Emp. domést.</option>
                </select>
            </td>
            <td>
                <select name="sexo[]" class="input_text">
                    <option value="">::Seleccione::</option>
                    <option value="1">Masculino</option>
                    <option value="2">Femenino</option>
                </select>
            </td>
            <td align="center">
                <input type="text" name="edad[]" class="input_text" style="width: 50px;" onkeypress="return permite(event,'num')" />
            </td>
            <td align="center">
                <select name="nivel[]" class="input_text">
                    <option value="">::Seleccione::</option>
                    <option value="0">Ninguno</option>
                    <option value="1">Primaria incomp.</option>
                    <option value="2">Primaria comp.</option>
                    <option value="3">Secundaria inc.</option>
                    <option value="4">Secundaria comp.</option>
                    <option value="5">Técnica</option>
                    <option value="6">Universitaria</option>
                    <option value="7">No sabe</option>
                </select>
            </td>
            <td>
                <select name="ingreso[]" class="input_text">
                    <option value="">::Seleccione::</option>
                    <option value="1">Si</option>
                    <option value="2">No</option>
                    <option value="3">No sabe</option>
                </select>
            </td>
        </tr>
        <?php } ?>
    </table>