<table border='0' cellpadding='0' cellspacing='0' class='tablilla'>
    <tr class='head_tabla'>
        <td align='center' style='border-left:1px solid #dadada !important'>Nro</td>
        <td align='center'>Edad</td>
        <td align='center'>Genero</td>
        <td align='center'>Jefe de Hogar</td>
        <td align='center'>Parentesco</td>
        <td align='center'>Principal Sostén Económico</td>
        <td align='center'>Grado de Instrucción</td>
        <td align='center'>Fecha de Naci. (dd/mm/yyyy)</td>
        <td align='center'>Entrevistado</td>
    </tr>

<?php
    function ffecha($fecha)
    {
        $nfecha = explode("-",$fecha);
        return $nfecha[2]."/".$nfecha[1]."/".$nfecha[0];
    }
    function combo($item,$selected)
    {
        $combo = '<select  class="input_text" disabled="disabled">';
            foreach($item as $key => $valu)
            {
                if($key==$selected){$combo .= '<option selected="selected">'.$valu.'</option>';}
                    else {$combo .= '<option>'.$valu.'</option>';}
                
            }
        $combo .= '</select>';
        echo $combo;
    }
    
    foreach($rows as $key => $val)
    {
        if($val[8]=="") {
        ?>
        <tr class="td_detail22">
            <td align="center"><?php echo ($key+1); ?></td>
            <td><input type="text" name="" size="2" class="input_text" readonly="readonly" value="<?php echo $val[0]; ?>" /></td>
            <td><?php combo(array("1"=>"Masculino","0"=>"Femenino"),$val[1]);?></td>
            <?php if($val[2]==1){ echo '<td align="center"><input type="radio" name="jefe" value="1" checked="checked" disabled="disabled" /></td>'; } else {echo '<td align="center"><input type="radio" name="jefe" value="1"  disabled="disabled" /></td>';} ?>
            <td><?php combo(array("1"=>"Jefe","2"=>"Cónyuge","3"=>"Hijo(a)","4"=>"Padre/Madre","5"=>"Suegro","6"=>"Hermano","7"=>"Nieto","8"=>"Yerno/Nuera","9"=>"Otro pariente","10"=>"Otros no parientes"),$val[3]); ?></td>
            <td align="center">
                <?php if($val[4]==1){echo '<input type="radio" name="pse" value="1" checked="checked" disabled="disabled"  />';}
                        else {echo '<input type="radio" name="pse" value="1" disabled="disabled" />';}
                ?>
            </td>
            <td><?php combo(array("1"=>"Ninguno","2"=>"Primaria incomp.","3"=>"Primaria comp.","4"=>"Secundaria inc.","5"=>"Secundaria comp.","6"=>"Técnica","7"=>"Universitaria","8"=>"No sabe"),$val[5]);?></td>
            <td><input type="text" name="fechan[]" value="<?php echo ffecha($val[6]);?>" class="input_text" size="10" readonly="readonly" /></td>
            <td align="center">
                <?php
                    if($val[7]==1){echo '<input type="radio" name="entrevistado" value="1" checked="checked" disabled="disabled" />';}
                        else {echo '<input type="radio" name="entrevistado" value="1" disabled="disabled" />';}
                ?>
            </td>
        </tr>
        <?php
        }
    }
?>
</table>