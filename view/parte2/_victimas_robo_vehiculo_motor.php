<div class="cpreg" id="<?php echo $c009700 ?>" >
    <div class="subtitle">VÍCTIMAS DE ROBO DE VEHÍCULO AUTOMOTOR</div>
    <div class="npreg"><b>97. </b></div>
    <div class="preg">
        <?php  echo $p009700; ?> : <br>
        <?php             
            combo(9700,$item97,$rep009700,$disabled);
        ?>
        
    </div>
</div>
<div class="cpreg" id="<?php echo $c009800 ?>" >
    <div class="npreg"><b>98. </b></div>
    <div class="preg">
        <?php  echo $p009800; ?> : <br>
        <?php printRadios(9800,$item);  ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c009900 ?>" >
    <div class="npreg"><b>99. </b></div>
    <div class="preg">
        <?php  echo $p009900; ?> : <br>
        Fecha <input type="text" name="009901" onkeypress="return permite(event,'num_car');" id="009901" value="" class="input_text" size="10" maxlength="10" /> -
        Hora <input type="text" name="009902" onkeypress="return permite(event,'num');" id="009902" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="009903" id="009903" onkeypress="return permite(event,'num');"  maxlength="2" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" class="input_text"/>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010000 ?>" >
    <div class="npreg"><b>100. </b></div>
    <div class="preg">
        <?php  echo $p010000; ?> : <br>
        <input type="text" name="010000" id="010000" value="" class="input_text" readonly="readonly" size="6" />
        <div id="text010000" style="display:inline; color: #0072B2; font-weight: bold;"></div>
        <a href="javascript:popup('index.php?controller=Unicri&action=gridDistritos&preg=010000',370,400)" class="clearr" style="width:50px; text-align: center">Buscar</a>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010100 ?>" >
    <div class="npreg"><b>101. </b></div>
    <div class="preg">
        <?php  echo $p010100; ?> : <br>
        <div class="div-link">
            <?php
                if(!$disabled && ($rep010101=="" && $rep010101==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l010100">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep010101=="" && $rep010101=="")
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
        <table class="mytable" id="t010100">
            <tr>
                <td style="width:250px;"><?php echo $p010101; ?></td><td><?php printRadios("10101",$item,$rep010101); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p010102; ?></td><td><?php printRadios("10102",$item,$rep010101); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010200 ?>" >
    <div class="npreg"><b>102. </b></div>
    <div class="preg">
        <?php  echo $p010200; ?> : <br>
        <table>
            <tr id="op010201" style="display:none" >
                <td><b>- <?php echo $p010201; ?> </b></td>
                <td>
                    <?php printRadios(10201,$item); ?>
                </td>
            </tr>
            <tr id="op010202" style="display:none">
                <td><b>- <?php echo $p010202; ?> </b></td>
                <td>
                    <?php printRadios(10202,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010300 ?>" style="display:none" >
    <div class="npreg"><b>103. </b></div>
    <div class="preg">
        <?php  echo $p010300; ?> : <br/>
        <?php printCheck("10300", $items82, $rep010300); ?>        
    </div>
</div>
<div class="cpreg" id="<?php echo $c010400 ?>" style="display:none" >
    <div class="npreg"><b>104. </b></div>
    <div class="preg">
        <?php  echo $p010400; ?> : <br>
        <?php printCheck("10400", $items82, $rep010400); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010500 ?>" >
    <div class="npreg"><b>105. </b></div>
    <div class="preg">
        <?php  echo $p010500; ?> : <br>
        <?php printCheck("10500", $items84, $rep010500); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010600 ?>" style="display:none" >
    <div class="npreg"><b>106. </b></div>
    <div class="preg">
        <?php  echo $p010600; ?> : <br>
        <?php printCheck("10600", $items85, $rep010600); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010700 ?>" >
    <div class="npreg"><b>107. </b></div>
    <div class="preg">
        <?php  echo $p010700; ?> : <br>
        <?php
            printRadios(10700,$item86,$rep010700);
        ?>
    </div>
</div>