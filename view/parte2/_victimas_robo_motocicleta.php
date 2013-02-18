<div class="cpreg" id="<?php echo $c011800 ?>" >
    <div class="subtitle">VÍCTIMAS DE ROBO DE MOTOCICLETA / MOTOTAXI</div>
    <div class="npreg"><b>118. </b></div>
    <div class="preg">
        <?php  echo $p011800; ?> : <br>
         <?php
            //printRadios(11800,$item97,$rep011800);
             combo(11800,$item97,$rep011800,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011900 ?>" >
    <div class="npreg"><b>119. </b></div>
    <div class="preg">
        <?php  echo $p011900; ?> : <br>
         Fecha <input type="text" name="011901" id="011901" value="" class="input_text" size="10" maxlength="10" /> -
        Hora <input type="text" name="011902" id="011902" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="011903" id="011903"  maxlength="2" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" class="input_text"/>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012000 ?>" >
    <div class="npreg"><b>120. </b></div>
    <div class="preg">
        <?php  echo $p012000; ?> : <br>
        <input type="text" name="012000" id="012000" value="" class="input_text" readonly="readonly" size="6" />
        <div id="text012000" style="display:inline; color: #0072B2; font-weight: bold;"></div>
        <a href="javascript:popup('index.php?controller=Unicri&action=gridDistritos&preg=012000',370,400)" class="clearr" style="width:50px; text-align: center">Buscar</a>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012100 ?>" >
    <div class="npreg"><b>121. </b></div>
    <div class="preg">
        <?php  echo $p012100; ?> : <br>
        <?php printRadios(12100,$item,$rep012100); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012200 ?>" >
    <div class="npreg"><b>122. </b></div>
    <div class="preg">
        <?php  echo $p012200; ?> : <br>
        <div class="div-link">
            <?php
                if(!$disabled && ($rep012201=="" && $rep012201==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l012200">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep012201=="" && $rep012201=="")
                    {

                        ?>
                            <div style="width: 100%; float: left; padding-bottom: 5px; padding-top: 5px; background: red; color:#fff; text-align: center">
                                No se ha denunciado el hecho
                            </div>
                        <?php
                    }
                    else {
                         ?>
                            <div style="width: 100%; float: left; padding-bottom: 5px; padding-top: 5px; background: green; color:#fff; text-align: center">
                                Se ha denunciado el hecho
                            </div>
                        <?php
                    }
                }
            ?>            
        </div>
        <table class="mytable" id="t012200">
            <tr>
                <td style="width:250px;"><?php echo $p012201; ?></td><td><?php printRadios("12201",$item,$rep012201); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p012202; ?></td><td><?php printRadios("12202",$item,$rep012201); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012300 ?>" >
    <div class="npreg"><b>123. </b></div>
    <div class="preg">
        <?php  echo $p012300; ?> : <br>
        <table>
            <tr id="op012301" style="display:none" >
                <td><b>- <?php echo $p012301; ?> </b></td>
                <td>
                    <?php printRadios(12301,$item); ?>
                </td>
            </tr>
            <tr id="op012302" style="display:none">
                <td><b>- <?php echo $p012302; ?> </b></td>
                <td>
                    <?php printRadios(12302,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012400 ?>" style="display:none" >
    <div class="npreg"><b>124. </b></div>
    <div class="preg">
        <?php  echo $p012400; ?> : <br>
        <?php printCheck("12400", $items82, $rep012400); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012500 ?>" style="display:none" >
    <div class="npreg"><b>125. </b></div>
    <div class="preg">
        <?php  echo $p012500; ?> : <br>
       <?php printCheck("12500", $items82, $rep012500); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012600 ?>" >
    <div class="npreg"><b>126. </b></div>
    <div class="preg">
        <?php  echo $p012600; ?> : <br>
         <?php printCheck("12600", $items84, $rep012600); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012700 ?>" >
    <div class="npreg"><b>127. </b></div>
    <div class="preg">
        <?php  echo $p012700; ?> : <br>
        <?php printCheck("12700", $items85, $rep012700); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c012800 ?>" >
    <div class="npreg"><b>128. </b></div>
    <div class="preg">
        <?php  echo $p012800; ?> : <br>
        <?php
            printRadios(12800,$item86,$rep012800);
        ?>
    </div>
</div>