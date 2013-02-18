<?php
    include("functions.php");
    function getYear($fecha)
    {
        $nfecha = explode("-",$fecha);
        return $nfecha[0];
    }
  
    function edad($edad)
    {
        list($anio,$mes,$dia) = explode("-",$edad);
        $anio_dif = date("Y") - $anio;
        $mes_dif = date("m") - $mes;
        $dia_dif = date("d") - $dia;
        if ($dia_dif < 0 || $mes_dif < 0)
        $anio_dif--;
        return $anio_dif;
    }
    $disabled = false;
    $readonly = "";
    if($rep001200!=""){$disabled = true; $readonly = "readonly";
                       $update = true;}
        else {$disabled = false;$readonly = ""; $update = false;}
    
?>
<style type="text/css">
    .checks label {
        border: 1px dashed #ccc;
        margin-top: 2px;
        width: 500px;
        text-align: left;
        -moz-border-radius:0;
        -webkit-border-radius:0;
    }
    .option_select { width: 300px;}
    .mytable tr:hover {background: #fafafa;}
    .mytable tr td {font-weight: bold}

</style>
<script type="text/javascript" src="../web/js/app/evt_intro.js"></script>
<div id="resp"></div>
<form action=""  name="frmintro" id="frmintro">
<div class="cpreg" id="<?php echo $c001000 ?>">
    <div class="npreg"><b>10. </b></div>
    <div class="preg">
        <?php  echo $p001000; ?> :<br><input type="text" name="001000" id="001000" value="<?php echo getYear($fecha);?>" size="5" class="input_text" onkeypress="return permite(event,'num')" readonly="readonly" />        
    </div>  
</div>
<div class="cpreg" id="<?php echo $c001100 ?>">
    <div class="npreg"><b>11. </b></div>
    <div class="preg">
        <?php  echo $p001100; ?> :<br> <input type="text" name="001100" id="001100" maxlength="2" value="<?php echo edad($fecha);?>" size="2" class="input_text" onkeypress="return permite(event,'num')" readonly="readonly" />
    </div>
</div>
<div class="cpreg" id="<?php echo $c001200 ?>">
    <div class="npreg"><b>12. </b></div>
    <div class="preg">
        <?php  echo $p001200; ?> :<br>
        <?php
            $item12 = array("Menos de 1 Año",
                            "De 1 Año a menos de 5 Años",
                            "De 5 Años a menos de 10 Años",
                            "10 Años a mas");
            combo(1200,$item12,$rep001200,$disabled);
        ?>
    </div>
    <?php if($update) { ?>
<!--        <div class="cperg" style="float:right"><a href="#" id="u001200">Guardar</a></div>-->
    <?php } ?>
</div>
<div class="cpreg" id="<?php echo $c001300 ?>">
    <div class="npreg"><b>13. </b></div>
    <div class="preg">
        <?php  echo $p001300; ?> :<br> 
        <?php
            $item13 = array("Soltero(a)",
                            "Casado(a)",
                            "Viviendo con alguien",
                            "Divorciado / Separado",
                            "Viudo (a)");
            combo(1300,$item13,$rep001300,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c001400 ?>">
    <div class="npreg"><b>14. </b></div>
    <div class="preg">
        <?php  echo $p001400; ?> :<br> <input type="text" name="001400" id="001400" value="<?php echo $rep001400;?>" size="5" class="input_text" onkeypress="return permite(event,'num')" <?php echo $readonly;?> />
    </div>
</div>
<div class="cpreg" id="<?php echo $c001500 ?>">
    <div class="npreg"><b>15. </b></div>
    <div class="preg" style="text-align: left;">
        <?php  echo $p001500; ?> :<br>
        <?php
            $item15 = array("Trabajando",
                            "Buscando empleo-desempleado",
                            "Ama de Casa",
                            "Jubilado(a) o rentista - discapacitado",
                            "Esta estudiando",
                            "Otro");
            combo(1500,$item15,$rep001500,$disabled);
        ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c001600 ?>">
    <div class="npreg"><b>16. </b></div>
    <div class="preg">
        <?php  echo $p001600; ?> : <br>
        <?php
            $item16 = array("Mucho mejor que la mayoría de los hogares del país",
                            "Mejor que la mayoría de los hogares del país",
                            "Peor que la mayoría de los hogares del país",
                            "Mucho peor que la mayoría de los hogares del país",
                            "No sabe-No responde");
            combo(1600,$item16,$rep001600,$disabled);
        ?>          
    </div>
</div>

<div class="cpreg" id="<?php echo $c001700 ?>">
    <div class="npreg"><b>17. </b></div>
    <div class="preg">        
        <?php  echo $p001700; ?> : <br>
        <?php
            $item17 = array("Católico",
                            "Cristiano no católico",
                            "Otra religión",
                            "Ninguno");
            combo(1700,$item17,$rep001700,$disabled);
        ?>        
    </div>
</div>

<div class="cpreg" id="<?php echo $c001800 ?>">
    <div class="npreg"><b>18. </b></div>
    <div class="preg">
        <?php  echo $p001800; ?> :
    </div>
    <div id="msg001800" class="alerts"></div>
    <div class="preg" style="margin-left:41px;">
        <?php $items18 = array('Desempleo / falta de trabajo',
                             'Consumo de drogas',
                             'Corrupción / coimas',
                             'Costo de la vida / altos precios',
                             'Delincuencia / falta de seguridad',
                             'Desigualdad / diferencias sociales',
                             'Educación inadecuada',
                             'Falta de democracia'.
                             'Narcotráfico',
                             'Pobreza / hambre',
                             'Salud pública inadecuada',
                             'Terrorismo / Subversión',
                             'Violación de derechos humanos',
                             'Otros',
                             'NS / NR');
                printCheck(1800,$items18,$rep001800);
          ?>
        
    </div>
</div>

<div class="cpreg" id="<?php echo $c001900 ?>">
    <div class="npreg"><b>19. </b></div>
    <div class="preg">
        <?php  echo $p001900; ?> :<br> 
        <?php
        
            $item19 = array("Muy probable",
                            "Probable",
                            "Poco probable",
                            "Nada probable",
                            "NS");
            combo(1900,$item19,$rep001900,$disabled);
        ?>   
    </div>
</div>

<div class="cpreg" id="<?php echo $c002000 ?>">
    <div class="npreg"><b>20. </b></div>
    <div class="preg">
        <?php  echo $p002000; ?> : <br>
        <?php
            $item20 = array("Ha aumentado",
                            "Permanece Igual",
                            "Ha disminuido",
                            "NS");
            combo(2000,$item20,$rep002000,$disabled);
        ?>   
    </div>
</div>

<div class="cpreg" id="<?php echo $c002100 ?>">
    <div class="npreg"><b>21. </b></div>
    <div class="preg">
        <?php  echo $p002100; ?> : <br>
        <?php            
            combo(2100,$item20,$rep002100,$disabled);
        ?>
        
    </div>
</div>

<div class="cpreg" id="<?php echo $c002200 ?>">
    <div class="npreg"><b>22. </b></div>
    <div class="preg">
        <?php  echo $p002200; ?> :
       
        <div id="msg002200" class="alerts"></div>
     <div class="preg" style="width:735px">

         <?php $items22 = array('Consumo de drogas, Consumo de bebidas alcohólicas',
                             'Desempleo / falta de trabajo, Deficiencia de las leyes',
                             'Falta de educación',
                             'Falta de rigor en las cárceles',
                             'Ineficiencia policial',
                             'Ineficiencia del poder judicial',
                             'Pérdida de valores',
                             'Pobreza'.
                             'NS / NR');
                printCheck(2200,$items22,$rep002200);
          ?>
     </div>
    </div>
</div>

<div class="cpreg" id="<?php echo $c002300 ?>">
    <div class="npreg"><b>23. </b></div>
    <div class="preg">
        <?php  echo $p002300; ?> :        
         <div id="msg002300" class="alerts"></div>
        <div class="preg" style="width:735px">
            <!-- Code Antiguro aki -->
                    
            <?php $items23 = array('Asalto a mano armada',
                             'Estafa',
                             'Homicidio',
                             'Secuestro',
                             'Soborno / coima',
                             'Robo',
                             'Violación',
                             'NS / NR');
                    printCheck(2300,$items23,$rep002300);
            ?>
     </div>
    </div>
</div>

<div class="cpreg" id="<?php echo $c002400 ?>">
    <div class="npreg"><b>24. </b></div>    
    <div class="preg">
        <?php  echo $p002400; ?> :
        <div id="msg002400" class="alerts"></div>
        <div class="preg" style="margin-left:-10px; width: 740px">
            <div id="problems">
            <table id="tproblems" border="0" class="tablilla" style="width:100%" cellpadding="0" cellspacing="0">
                <tr class="head_tabla">
                    <td style="border-left:1px solid #dadada !important">Problematica</td>
                    <td align="center" width="5%" title="Nunca">Nunca</td>
                    <td align="center" width="5%" title="Algunas Veces">Algunas veces</td>
                    <td align="center" width="5%" title="Frecuentemente">Fre cuente mente</td>
                    <td align="center" width="5%" title="Siempre">Siem pre</td>
                    <td align="center" width="5%" title="Tres Principales">3p</td>
                </tr>
               <?php
                    for($i=1;$i<=16;$i++)
                    {
                        $n = "0024".str_pad($i,2,"0",STR_PAD_LEFT);
                        eval('$preg = $p'.$n.';');
                        eval('$resp = $rep'.$n.';');
                        echo '<tr class="td_detail">';                            
                            echo '<td width="40%"><label id="t'.$n.'">'.$preg.'</lablel></td>';
                            printRadios_($n,array("Nunca","Algunas Veces","Frecuentemente","Siempre"),$resp,$disabled);
                            principales($preg,$rep002500);                            
                        echo '</tr>';
                    }
               ?>

            </table>
            </div>
            <br>
            <?php
                if($rep002401!=""){}
                    else {
            ?>
            <div id="resp24">
            <table border="0" class="tablilla" style="width:100%" cellpadding="0" cellspacing="0">
                <tr class="head_tabla">
                    <td style="border-left:1px solid #dadada !important; width: 10%">Otro</td>
                   <td style="border-top:1px solid #dadada" align="left">
                        <input type="radio" name="002400" <?php if($rep002400=="otro"){echo "checked";} ?> value="otro" />
                    </td>
                </tr>
            </table>
            <br>
            <table border="0" class="tablilla" style="width:100%" cellpadding="0" cellspacing="0">
                <tr class="head_tabla">
                    <td style="border-left:1px solid #dadada !important; width: 10%">Ninguno</td>
                   <td  style="border-top:1px solid #dadada" align="left">
                         <input type="radio" name="002400" <?php if($rep002400=="Ninguno"){echo "checked";} ?> value="Ninguno" />
                    </td>
                </tr>
            </table>
            <br>
            <table border="0" class="tablilla" style="width:100%" cellpadding="0" cellspacing="0">
                <tr class="head_tabla">
                    <td style="border-left:1px solid #dadada !important; width: 10%">NS/NR</td>
                   <td  style="border-top:1px solid #dadada" align="left">
                         <input type="radio" name="002400" <?php if($rep002400=="NS"){echo "checked";} ?> value="NS" />
                    </td>
                </tr>
            </table>
            </div>
            <?php } ?>
        </div>
    </div>
</div>

<div class="cpreg" id="<?php echo $c002500; ?>">
    <div class="npreg"><b>25. </b></div>
    <div class="preg">
        <?php  echo $p002500; ?> :<br>
        <div id="resp25" class="preg">
            <?php
            if($rep002500!=""){
                foreach($rep002500 as $val)
                    {
                        echo "<b>- ".$val."</b><br>";
                    }
                }
            ?>
        </div>
    </div>
</div>
<div class="cperg">
    <?php if(!$disabled) {?>
        <input type="submit" id="Grabar" value="Grabar" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" style="width: 90px; float: right; height: 23px;"/>
    <?php } ?>
</div>
</form>
<div style="clear:both"></div>