<div class="cpreg" id="<?php echo $c010800 ?>" >
    <div class="subtitle">VÍCTIMAS DE ROBO DE OBJETOS EN VEHÍCULO AUTOMOTOR</div>
    <div class="npreg"><b>108. </b></div>
    <div class="preg">
        <?php  echo $p010800; ?> : <br>
        <?php            
             combo(10800,$item97,$rep010800,$disabled);
        ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c010900 ?>" >
    <div class="npreg"><b>109. </b></div>
    <div class="preg">
        <?php  echo $p010900; ?> : <br>
        Fecha <input type="text" name="010901" id="010901" value="" class="input_text" size="10" maxlength="10" /> -
        Hora <input type="text" name="010902" id="010902" class="input_text" maxlength="2" size="2" style="border:1px solid #ccc; border-right:0; text-align: right" /><div style="border-top:1px solid #ccc; border-bottom:1px solid #ccc; height: 16px !important; width: 5px; display: inline-block; padding: 2px;">:</div><input type="text" name="010903" id="010903"  maxlength="2" size="2" style="border:1px solid #ccc; border-left:0px; text-align: left" class="input_text"/>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011000 ?>" >
    <div class="npreg"><b>110. </b></div>
    <div class="preg">
        <?php  echo $p011000; ?> : <br>
        <input type="text" name="011000" id="011000" value="" class="input_text" readonly="readonly" size="6" />
        <div id="text011000" style="display:inline; color: #0072B2; font-weight: bold;"></div>
        <a href="javascript:popup('index.php?controller=Unicri&action=gridDistritos&preg=011000',370,400)" class="clearr" style="width:50px; text-align: center">Buscar</a>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011100 ?>" >
    <div class="npreg"><b>111. </b></div>
    <div class="preg">
        <?php  echo $p011100; ?> : <br>
        <div class="div-link">
            <?php
                if(!$disabled && ($rep011101=="" && $rep011101==""))
                {
                $band = true;
            ?>
                    <a class="link link-no" id="l011100">Click aqui si es que NO se denunció</a>

            <?php
                }
                else
                    {
                    if($rep011101=="" && $rep011101=="")
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
        <table class="mytable" id="t011100">
            <tr>
                <td style="width:250px;"><?php echo $p011101; ?></td><td><?php printRadios("11101",$item,$rep011101); ?></td>
            </tr>
            <tr>
                <td style="width:250px;"><?php echo $p011102; ?></td><td><?php printRadios("11102",$item,$rep011101); ?></td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011200 ?>"  >
    <div class="npreg"><b>112. </b></div>
    <div class="preg">
        <?php  echo $p011200; ?> : <br>
        <table>
            <tr id="op011201" style="display:none" >
                <td><b>- <?php echo $p011201; ?> </b></td>
                <td>
                    <?php printRadios(11201,$item); ?>
                </td>
            </tr>
            <tr id="op011202" style="display:none">
                <td><b>- <?php echo $p011202; ?> </b></td>
                <td>
                    <?php printRadios(11202,$item); ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011300 ?>" style="display:none" >
    <div class="npreg"><b>113. </b></div>
    <div class="preg">
        <?php  echo $p011300; ?> : <br/>
        <?php printCheck("11300", $items82, $rep011300); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011400 ?>" style="display:none" >
    <div class="npreg"><b>114. </b></div>
    <div class="preg">
        <?php  echo $p011400; ?> : <br>
         <?php printCheck("11400", $items82, $rep011400); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011500 ?>" >
    <div class="npreg"><b>115. </b></div>
    <div class="preg">
        <?php  echo $p011500; ?> : <br>
         <?php printCheck("11500", $items84, $rep011500); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011600 ?>" style="display:none" >
    <div class="npreg"><b>116. </b></div>
    <div class="preg">
        <?php  echo $p011600; ?> : <br>
         <?php printCheck("11600", $items85, $rep011600); ?>
    </div>
</div>
<div class="cpreg" id="<?php echo $c011700 ?>" >
    <div class="npreg"><b>117. </b></div>
    <div class="preg">
        <?php  echo $p011700; ?> : <br>
        <?php
            printRadios(11700,$item86,$rep011700);
        ?>
    </div>
</div>