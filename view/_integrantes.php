<?php
    $table = '<div class="cfam">';
    $table .= '<table class="tablilla" border="0" cellpadding="0" cellspacing="0" style="border-bottom:0">';
    $table .= '<tr class="head_tabla"><td style="border-left:1px solid #dadada !important; width:300px;">&nbsp;</td>';
    foreach ($rows as $key => $value)
    {
        $table .= '<td>'.$value[1].'</td>';
    }    
    $table .= '</tr>';

    if($n==6){$disabled = "disabled";}
        else {$disabled="";}
        
    for($i=1;$i<=$n;$i++)
    {
        $table .= '<tr class="td_detail"><td>'.$preguntas[$i].'</td>';
        foreach ($rows as $key => $value)
        {             
            if($n==6 && $i==1) {$table .= '<td align="center"><input type="radio" name="'.$inicio.'_'.$value[0].'" value="00'.($inicio+$i).'" '.$disabled.' checked="checked" /></td>';}
            else {$table .= '<td align="center"><input type="radio" name="'.$inicio.'_'.$value[0].'" value="00'.($inicio+$i).'" '.$disabled.' /></td>';}
        }
        $table .= '</tr>';        
    }
    if($n==4){
    $table .= '<tr style="border:0"><td style="border:0;border-top:1px solid #dadada;">&nbsp;</td>';
        foreach ($rows as $key => $value)
        {
             $table .= '<td align="center"><a title="'.$inicio.'_'.$value[0].'" class="clearr">Limpiar</a></td>';
        }
        $table .= '</tr>';        
    }
    else { $table .= '<tr><td colspan="8" style="border-top:1px solid #dadada;"></td></tr>';}
    $table .= '</table>';
    $table .= '</div>';
    echo $table;
?>
